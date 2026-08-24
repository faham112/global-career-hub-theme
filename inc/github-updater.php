<?php
/**
 * Simple GitHub theme auto-updater for Global Career Hub
 * Checks GitHub releases / tags and shows update in WP admin.
 *
 * @package Global_Career_Hub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GCH_GitHub_Theme_Updater {

	private $repo = 'faham112/global-career-hub-theme';
	private $theme_slug = 'global-career-hub';
	private $cache_key = 'gch_github_update_data';
	private $cache_hours = 12;

	public function __construct() {
		add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_for_update' ) );
		add_filter( 'themes_api', array( $this, 'theme_info' ), 20, 3 );
	}

	private function get_remote_info() {
		$cached = get_transient( $this->cache_key );
		if ( false !== $cached ) {
			return $cached;
		}

		// Prefer latest release
		$response = wp_remote_get(
			'https://api.github.com/repos/' . $this->repo . '/releases/latest',
			array(
				'timeout' => 15,
				'headers' => array(
					'Accept'     => 'application/vnd.github.v3+json',
					'User-Agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . home_url(),
				),
			)
		);

		$data = null;

		if ( ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
			$body = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( ! empty( $body['tag_name'] ) ) {
				$version = ltrim( $body['tag_name'], 'v' );
				$package = '';
				if ( ! empty( $body['assets'] ) ) {
					foreach ( $body['assets'] as $asset ) {
						if ( ! empty( $asset['browser_download_url'] ) && false !== strpos( $asset['name'], '.zip' ) ) {
							$package = $asset['browser_download_url'];
							break;
						}
					}
				}
				if ( ! $package ) {
					$package = 'https://github.com/' . $this->repo . '/archive/refs/tags/' . $body['tag_name'] . '.zip';
				}
				$data = array(
					'version'     => $version,
					'package'     => $package,
					'url'         => 'https://github.com/' . $this->repo,
					'requires'    => '5.8',
					'tested'      => '6.7',
					'last_updated'=> isset( $body['published_at'] ) ? $body['published_at'] : '',
					'sections'    => array(
						'description' => isset( $body['body'] ) ? $body['body'] : 'Global Career Hub theme update.',
					),
				);
			}
		}

		// Fallback: latest tag from tags API
		if ( ! $data ) {
			$response = wp_remote_get(
				'https://api.github.com/repos/' . $this->repo . '/tags?per_page=1',
				array(
					'timeout' => 15,
					'headers' => array(
						'Accept'     => 'application/vnd.github.v3+json',
						'User-Agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . home_url(),
					),
				)
			);
			if ( ! is_wp_error( $response ) && 200 === wp_remote_retrieve_response_code( $response ) ) {
				$tags = json_decode( wp_remote_retrieve_body( $response ), true );
				if ( ! empty( $tags[0]['name'] ) ) {
					$version = ltrim( $tags[0]['name'], 'v' );
					$data    = array(
						'version' => $version,
						'package' => 'https://github.com/' . $this->repo . '/archive/refs/tags/' . $tags[0]['name'] . '.zip',
						'url'     => 'https://github.com/' . $this->repo,
					);
				}
			}
		}

		if ( $data ) {
			set_transient( $this->cache_key, $data, $this->cache_hours * HOUR_IN_SECONDS );
		}

		return $data;
	}

	public function check_for_update( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		$theme = wp_get_theme( $this->theme_slug );
		if ( ! $theme->exists() ) {
			// Folder might be named differently
			$theme = wp_get_theme();
			if ( 'Global Career Hub' !== $theme->get( 'Name' ) ) {
				return $transient;
			}
			$this->theme_slug = $theme->get_stylesheet();
		}

		$current = $theme->get( 'Version' );
		$remote  = $this->get_remote_info();

		if ( ! $remote || empty( $remote['version'] ) ) {
			return $transient;
		}

		if ( version_compare( $current, $remote['version'], '<' ) ) {
			$transient->response[ $this->theme_slug ] = array(
				'theme'       => $this->theme_slug,
				'new_version' => $remote['version'],
				'url'         => $remote['url'],
				'package'     => $remote['package'],
				'requires'    => isset( $remote['requires'] ) ? $remote['requires'] : '',
				'requires_php'=> '7.4',
			);
		}

		return $transient;
	}

	public function theme_info( $result, $action, $args ) {
		if ( 'theme_information' !== $action ) {
			return $result;
		}
		if ( empty( $args->slug ) || $args->slug !== $this->theme_slug ) {
			return $result;
		}

		$remote = $this->get_remote_info();
		if ( ! $remote ) {
			return $result;
		}

		$info                 = new stdClass();
		$info->name           = 'Global Career Hub';
		$info->slug           = $this->theme_slug;
		$info->version        = $remote['version'];
		$info->download_link  = $remote['package'];
		$info->sections       = isset( $remote['sections'] ) ? $remote['sections'] : array();
		$info->requires       = isset( $remote['requires'] ) ? $remote['requires'] : '5.8';
		$info->tested         = isset( $remote['tested'] ) ? $remote['tested'] : '6.7';
		$info->last_updated   = isset( $remote['last_updated'] ) ? $remote['last_updated'] : '';

		return $info;
	}
}

new GCH_GitHub_Theme_Updater();
