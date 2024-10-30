=== Chromeless Widgets Page ===
Contributors: celloexpressions
Tags: Widgets, external, one page, single page
Requires at least: 4.0
Tested up to: 6.7
Stable tag: 1.2
Description: Framework for building a page that's largely external to the rest of the site and uses widgets for all of its content.
License: GPLv2

== Description ==
Chromeless Widgets Page is a framework for building a specific-use page at a custom URL. Once you specify the URL slug, you can add widgets to the page and style it with CSS that's scoped to the page, all from within the Customizer.

This plugin is an open-sourced project originally built for the <a href="http://annenbergdl.org/">USC Annenberg Digital Lounge</a>'s events page, which is displayed on TV screens throughout our physical space. It isn't actively developed or supported, but feel free to fork the plugin if you'd like to make adjustments to make it fit your related or unrelated needs.

== Screenshots ==
1. Customizer options.
2. Example of a page featuring all of the audio on a site (via the Sheet Music library or Featured Audio plugins), with playlist widgets, text widgets, and search. <a href="https://celloexpressions.com/music/playlists/">See the live page here</a>.
3. Example of a page showing a fundraising goal, via the Basic Funding Tracker widget, with its own dedicated URL and widget area setup with the plugin. Styling is managed with live preview in the customizer with the scoped CSS option in the Chromeless Widgets Page section.
4. Example of a page showing upcoming events, via the events calendar plugin's widget, at a dedicated URL with scoped CSS via the customizer. This page is displayed on TV screens in the physical space for the USC Annenberg Digital Lounge, advertising events directly from the website via this page set up with WordPress.

== Installation ==
1. Take the easy route and install through the WordPress plugin adder, OR
1. Download the .zip file and upload the unzipped folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Go to the Customizer (Appearance -> Customize), and set the slug (URL) for the page. Go to that link (on the front-end), then open the Customizer from the admin bar, and you can add widgets and style everything with the scoped custom CSS option.

== Changelog ==
= 1.1 =
* Fix a major bug with custom page slug handling.
* Add a code editor for the custom CSS, based on WordPress core functionality introduced in version 4.7.

= 1.0 =
* First publicly available version of the plugin.

== Upgrade Notice ==
= 1.0 =
* Initial Public Release