# Global Career Hub WordPress Theme

**Theme Name:** Global Career Hub  
**Version:** 1.5.0  
**Author:** Global Career Hub .ORG / Abdul Faheem  
**Repository:** https://github.com/faham112/global-career-hub-theme  

Custom WordPress theme for [Global Career Hub](https://globalcareerhub.org) — *Connecting Talent, Creating Futures*.

## Features

- Centered logo header + top bar (pages + social)
- Category nav, dark/light mode, search overlay
- News-style homepage (LATEST ticker + TOP STORIES grid)
- Fully responsive (mobile / tablet / desktop)
- Gray & white color palette
- **GitHub auto-updates** (checks this repo for new versions)

## Installation

### Method 1 — ZIP (recommended)
1. Download latest release: https://github.com/faham112/global-career-hub-theme/releases
2. WordPress Admin → **Appearance → Themes → Add New → Upload Theme**
3. Upload ZIP → Install → Activate

### Method 2 — Git clone
```bash
cd wp-content/themes
git clone https://github.com/faham112/global-career-hub-theme.git global-career-hub
```
Then activate in Appearance → Themes.

## Auto Updates

Theme checks this GitHub repo for updates.

1. Create a **Release** on GitHub (e.g. tag `v1.5.1`) with a ZIP of the theme folder
2. Sites using the theme will see the update under **Dashboard → Updates**

Update checker is in `inc/github-updater.php`.

## Menus (Appearance → Menus)

| Menu | Location |
|------|----------|
| Top Pages (Home, About, Contact) | Top Pages Menu |
| Categories | Header Categories |
| Mobile menu | Primary Menu (Mobile) |

## Customizer

- **Site Identity** → Logo (transparent PNG recommended)
- **Homepage** → Your latest posts

## Recommended plugins

- Rank Math SEO (or Yoast)
- LiteSpeed Cache / WP Super Cache

## License

GPL v2 or later
