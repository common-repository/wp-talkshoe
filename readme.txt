=== WP Talkshoe ===
Contributors: Dr. Robert White
Donate link: <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UKU4GLYTP2JD8">Donate</a>
Tags: talkshoe,widget,live,now,listen,windows,media,player
Requires at least: 3.0.0
Tested up to: 3.0.3
Stable tag: 3.0

This is a Live Now / Listen Now Dynamic Widget for the Talkshoe.com Interactive Podcasting Service that has many features for Talkshoe Hosts and Users.

== Description == 

This plugin is a Wordpress version of the Talkshoe Dynamic Widget, with some added features that the current widget does not possess.  It uses some of the existing Talkshoe API code along with PHP to achieve a decent Wordpress replacement for the Talkshoe Dynamic widgets.

To use this plugin once installed and activated, simply go to your Widgets page in your Admin area and you will find the WP_Talkshoe widget there, drag it to your sidebar and you will have to go to Settings and WP_Talkshoe for options that you can set...i.e. The title or name of the widget and the 5 Digit Show ID for your Talkshoe call and more.

= When your call is live, the widget will display: =
* your show logo
* a Live Now banner
* your Show Title (with a direct link to your Talkshoe show page)
* the Host's name
* the current Episode Title that is airing live
* a Tweet This Now button
* a Streaming Player to listen through the widget
* a Listen Now button to launch Windows Media Player, iTunes, etc. for live streaming
* a button to launch the Talkshoe Pro Client
* direct links to your RSS feed and your iTunes feed

= When your call is not live, the widget will display: =
* Your RSS Feed and iTunes Feed buttons
* Your show logo
* your Show Title (with a direct link to your Talkshoe show page)
* The host's name
* Your Next Scheduled Episode (if any)
* The last 3 past episodes

This plugin has been tested on version 3.0 of Wordpress, but may work on previous versions too.

This plugin is released on a GPL 2.0 license.

== Installation ==

1. Upload `wp_talkshoe.php` to the `/wp-content/plugins/` directory or install via New Plugins section.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Find the widget called WP_Talkshoe and drag it to your sidebar, use the WP_Talkshoe under Settings to set various options.
4. To use in your templates, posts or pages, etc. use '[wp_talkshoe]' (without the quotes).

== Frequently Asked Questions ==

= Do I have to have Wordpress in order to use this plugin? =

Yes, to use this plugin you do, but you can contact me for other possible solutions for this widget.

= Can I use this plugin on other blog sites? =

Nope, must be Wordpress, sorry!  There are other standard widgets available now for Non Wordpress Sites at <a href="http://www.podcastsupport.com/widgets/" target="_blank">http://www.podcastsupport.com/widgets/</a>

= The background color does not change, no matter how I set it.  What is wrong? =

Nothing is really wrong here, some themes will only use their own background colors, and currently, this option is not being overridden.
NOTE: This issue was fixed in version 2.1!

= Some of the graphics are not showing up, did I do something wrong? =

No, just upgrade to the latest version of this plugin and it should fix this issue.

= I upgraded to version 2.0 and get a php error when the widget tries to load! =

No problem, simply this means that some options are not set, go to Settings and WP_Talkshoe and set your options.  Remember to save!

= My colors are not changing! =

All color codes must be entered in Hex format, such as #000000 (note the # sign).

= I deactivated my plugin and when I reactive it again, I get a PHP error. =

Make sure you upgrade to version 2.3 as some changes to the Talkshoe API Code caused issues with previous versions.

= I upgraded to version 2.3 and when I activate my plugin, all my settings are wrong. = 

Due to an oversight in previous versions, the plugin did not save even the basic settings after deactivation.  This will be handled in a future release.  For now, simply reinsert your settings and save and your plugin will function as normal.

= Where is version 2.7? =

When changes were being made to v2.7, so many new items were added during the beta test that this version was skipped and we moved on to v2.8 for the release.

== Screenshots ==

1. Talkshoe Show is Live Now screenshot-1.jpg
2. Talkshoe Show is Not Live Now screenshot-2.jpg
3. Widget Options screenshot-3.jpg
4. Widget Options 2 screenshot-4.jpg

== Changelog ==

= 3.0 [2010-12-23] =
* Cosmetic changes on Live Now screen (per requests)
* Cleaned up some code that had become redundant.

= 2.9 [2010-12-11] =
* Removed some of the transparent GIF's and replaced them with text links to make the widget adjust to smaller sidebar settings.
* Made some cosmetic changes to the Options page to make the page more appealing.
* Added contact link to the Author name on Options page for direct e-mail support of this plugin.
* Added Gravatar image and donation links to Options page.

= 2.8 [2010-10-09] =
* Incorporated Talkshoe's new self hosted Dynamic Widget into the Non Live Screen for the past episode player.
* Removed some of the outer graphics to streamline the look of the widget itself.
* Added version information on Non Live screen
* Added feature to retain certain settings after deactivation of plugin
* Added more inital settings on new install/activation of plugin to insure a cleaner startup

= 2.6 [2010-08-21] =
* Added BluBrry Media Redirect Statistics support
* Added Popup Color Selector Chart on Options Page for color selection or manual input of hex code.
* Optimized the look of the Live Now screen
* Added new instructions to Options Page

= 2.5 [2010-08-15] =
* More housecleaning on the code
* Added new buttons for a cleaner layout
* Added border color to Options Page
* Added More Past Episodes button for direct link to Show Page

= 2.4 [2010-08-10] =
* Repaired a style sheet error that caused all tables to become the same background color.
* Added full border around widget.
* Added Direct Link to Talkshoe Support.

= 2.3 [2010-08-09] =
* Added some error checking due to the Talkshoe API code failing recently causing issues.
* Added a default Show ID to initialize the plugin to prevent errors if no settings are present.
* Fixed a deactivation error, must rewrite the deactivation function (will happen in a future release)

= 2.2 [2010-08-05] =
* Added more options for Font Color changes on Settings page
* Changed and centered layout to center everything on the widget
* Added Version Number information into options as a saved option for future upgrades
* Added borders to better outline the table
* Added Widget Display on Settings Options page
* Cleaned up the layout on the Options page

= 2.1 [2010-07-30] =
* Cleaned up some of the graphics to make them more readable
* Added font color options for Now Playing title
* Background color now set using built in style sheet.  This overrides the default theme background color.
* Added color charts to options page

= 2.0 [2010-07-27] =
* Added color change options for Host Title and Past Episodes Title
* Cleaned up some erroneous misc. code
* Added better global paths instead of hardcoded paths for more compatibility

= 1.0.9 [2010-07-26] =
* Added Options Page under Settings to allow for future upgrades and additions
* Added Wordpress Version Checker 

= 1.0.8 [2010-07-25] =
* Included Connection and Parser Classes in main plugin code removing the need for external class calls

= 1.0.7 [2010-07-24] =
* Added Live Now player for listeners to listen through the widget
* Changed flash players for Past Episodes

= 1.0.6 [2010-07-23] =
* Added ability to change background color by entering Hex code for color (Will use your theme background color as the default)
* Corrected pathing statements to localized graphics

= 1.0.5 [2010-07-22] =
* Changed Logo size to 75x75
* Added iTunes Feed button
* Added Colored Text to Host and Next Episode titles

= 1.0.4 [2010-07-21] =
* Added IE compatibility to Flash players for Past Episodes
* If no Next Episode Scheduled, Past Episodes show up when not live
* Changed Talkshoe Live Pro button to Transparent GIF, loads from Plugins folder now

= 1.0.3 [2010-07-20] =
* Added Previous 3 Episodes to Non Live Screen
* Made it so that when live, Past Episodes and Next Episode does not show up

= 1.0.2 [2010-07-20] =
* Added Show Logo

= 1.0.1 [2010-07-20] =
* Added Next Scheduled Episode to show when available
* Added Talkshoe Logo with direct link to show page

= 1.0 [2010-07-20] =
* Our premiere version incorporating many new changes from our beta copies that were not distributed..
* Live Now banner and Windows Media Player launcher added.

= Support =
To report bugs, issues, features, etc., please use my Support Request Form at <a href="http://newmediaanswers.com/bbpress" target="_blank">Support Forum</a>

== Upgrade Notice ==

= 3.0 [2010-12-23] =
Many new features and options added since prior versions have been released.  If you are still on an older version, you need to upgrade now!
