/**
 * Menu, search overlay, dark mode
 */
(function () {
	'use strict';
	var nav = document.getElementById('site-navigation');
	var btn = document.querySelector('.menu-toggle');
	if (nav && btn) {
		btn.addEventListener('click', function () {
			nav.classList.toggle('toggled');
			btn.classList.toggle('is-active');
			var exp = btn.getAttribute('aria-expanded') === 'true';
			btn.setAttribute('aria-expanded', !exp);
		});
	}
	var searchToggle = document.getElementById('search-toggle');
	var overlay = document.getElementById('search-overlay');
	var searchClose = document.getElementById('search-close');
	function openSearch() {
		if (!overlay) return;
		overlay.classList.add('is-open');
		document.body.style.overflow = 'hidden';
	}
	function closeSearch() {
		if (!overlay) return;
	overlay.classList.remove('is-open');
		document.body.style.overflow = '';
	}
	if (searchToggle) searchToggle.addEventListener('click', openSearch);
	if (searchClose) searchClose.addEventListener('click', closeSearch);
	if (overlay) {
	overlay.addEventListener('click', function (e) {
			if (e.target === overlay) closeSearch();
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape') closeSearch();
		});
	}
	var themeToggle = document.getElementById('theme-toggle');
	var html = document.documentElement;
	function getTheme() {
		var s = localStorage.getItem('gch-theme');
		if (s) return s;
		return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
	}
	function setTheme(t) {
		html.setAttribute('data-theme', t);
		localStorage.setItem('gch-theme', t);
	}
	setTheme(getTheme());
	if (themeToggle) {
		themeToggle.addEventListener('click', function () {
			setTheme(html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
		});
	}
})();
