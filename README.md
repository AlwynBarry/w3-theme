# w3-theme
A ready-to-use Wordpress Gutenberg theme using the w3.css micro-framework, grid-based for fully responsive websites, with added built-in support for the GetWid Gutenberg blocks collection.

# Author
Alwyn Barry

## Copyright
(c) Alwyn Barry, 2021

## License
GPLv2 or later (https://www.gnu.org/licenses/gpl-2.0.html)

## Written
Version 0.1: 9/4/2021

## Version
1.0.2

## Date Published
2022-08-25

# Technologies
Based on `_s` (Underscores) Theme by Automattic, heavily modified to replace base CSS with w3.css

* Uses w3.css (see https://www.w3schools.com/w3css/)
* Uses w3m-navbar (see https://github.com/AlwynBarry/w3m-navbar)
* Uses BreadcrumbTrail (see http://themehybrid.com/plugins/breadcrumb-trail)
* Uses GetWid Blocks Collection (see https://wordpress.org/plugins/getwid/)

# Installation
1. In your Wordpress Admin panel, go to *Appearance* > *Themes* and click the Add New button
2. Click *Upload Theme* and *Choose File*, then select the theme's .zip file. Click Install Now
3. (Ideally install the child theme `w3-child` and customise from that)
4. (Optional) Install the GetWid Gutenberg Block Collection (see https://wordpress.org/plugins/getwid/), activate it, and set it up via the plugin's Settings
5. Click Activate to use your new theme right away
6. The theme has some basic Customizer options to set the site title, sub-title, icon, menus etc (see below)
7. Change the colors, typography, etc. via the child theme style.css file (see below)

# Usage

## Customizer
There are limited options in Customizer, but here you can:
* **Site Identity** - Set the site name and description and whether you want these displayed, and set the site icon and favicon
* **Colors** - Set the whole site background color (white by default)
* **Background image** - Set a whole site background image (none by default, and not really recommended anyway)
* **Menus** - Create and/or assign a menu to a menu area.  Only `primary` is used at present - in the Header for the main menu
* **Widgets** - Create and/or assign blocks or legacy widgets to the widget areas (see more details below)
* **Homepage Settings** - Assign a page as your Front Page and as your blog posts root page
* **Additional CSS** - A place to try out style overrides.  We recommend you do it more permanently in the `style.css` of the child theme. 

## Widgets
There are five widget areas:
* TopBar Left, TopBar Right - above the header bar, these two areas are for one-line content like phone numbers, email, search or login
* Sidebar - available in the default Post Template, a right hand sidebar that collapses below the main content on mobile
* Footer top, Footer bottom - below all content, implemented to distribute the widgets / blocks intelligently across each footer

Using Wordpress **Appearance** > **Widgets** you can add blocks or legacy widgets to each area.

## Menu
The top menu is the `primary` menu area.
* In **Appearance** > **Menus** assign the main menu to `primary`.
* The menu can be up to three-level (top menu bar, dropdown and dropdown submenu).
* The menu is aligned right in the header bar.
* The first menu item should be a Custom Link with label `Close`, URL target `#` and class `w3m-close-button`. This causes the close menu button to show in the menu when the menu is shown on a mobile screen and is required if the menu is to be dismissed without selecting a menu location to go to.

## Colors and Typography
The default colors can be overridden in the child `styles.css` file, which can be edited from **Appearance** > **Theme file editor**.

You will find some commented out colour and text size declarations

Edit as follows:
* Uncomment (put `*/` before and `/*` after) to end and restart the comment before and after the line(s) you are changing
* Change the color value or text size to those you want
  - Common color values can be found here: https://html-color.codes/
  - Complementary color values can be calculated here: https://colour-palette-generator.azurewebsites.net/
  - Or get inspiration here: https://www.shutterstock.com/blog/101-color-combinations-design-inspiration
* Check that the resultant CSS is correct (*really important*) and save

You can also override any of the css in the larger w3-theme `style.css` file within this child theme css file.  Just look at the content of the parent w3-theme `style.css`file to find the style you want to change, copy it, paste it into the child `style.css` and modify it as you need.

## Pages and Posts
Because the theme is designed to work with Gutenberg Blocks, there are only a few base Page and Post Layouts.  You should use Block layouts to layout the pages and posts as you wish (GetWid Blocks Collection works well).

**Page Templates**
* **Default** - content laid out in a centre column 768px wide.  Blocks can also be full-width or wide-width.
* **Full Width** - content laid out using the full width with a 16px border. Useful for embedding content, calendar layouts, large tables, etc.

**Post Templates**
* **Default** - content has a right-side sidebar if sidebar widgets have been added, or full-width with content in centre 768px column if not.
* **Full Width** - content laid out with no right-side sidebar, in 768px centre column. Blocks can be full-width or wide-width.  {ost navigation, featured image and meta data is included as usual.
* **Full Width, no image, no metadata** - content laid out like a Default page.  No post navigations, meta-data or Featured Image

Templates are provided for Front Page, Single Blog Posts, Categories, Archives, and Search results.  These will be auto selected as needed.

## Provided CSS classes to use
Many blocks allow the addition of a css class to apply a modifying style - entered in **Settings** > **Advanced**

We provide the following css styles to use as needed:

* Remove margins on the side specified (useful to get content flush to the next block if such settings are not otherwise provided)

  `wt-margin-top-0`, `wt-margin-right-0`, `wt-margin-bottom-0`, `wt-margin-left-0`,  
  `wt-margin-left-right-0`, `wt-margin-top-bottom-0`, `wt-margins-0`

* Adding shadow to text (e.g. to display text more clearly over images)

  `wt-shadow-text`

* Make text white and shadowed (e.g. to display text more clearly over images)

  `wt-colophon-text`

* Create columns of text from single column paragraphs blocks

  `wt-two-column-text`, `wt-three-column-text`, `wt-four-column-text`

* Hide block on mobile devices

  `wt-hide-mobile`

# Credits
* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., GPLv2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
* Using w3.css https://www.w3schools.com/w3css/, (C) Jan Egil and Borge Refsnes., Free to use without license.
* Using BreadcrumbTrail v0.6.1, (C) Justin Tadlock <justin@justintadlock.com>, 2008 - 2013 (http://themehybrid.com/plugins/breadcrumb-trail, http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

# Frequently Asked Questions

## Does this theme support any plugins?

W3Theme includes support for Gutenberg Blocks, WooCommerce and for Infinite Scroll in Jetpack.

## What features are built in?

* There is built-in support for styles for the GetWid Gutenberg blocks collection, though you will need to install and activate the GetWid plugin
* There is built-in support for responsive mobile-ready main menu, responsive header, footers and content.
* There is also built in support for 'scroll to top', shrinking and sicky headers.
* There is built in support for Yoast Breadcrumbs or native breadcrumbs, depending on what plugins are active.  There is Breadcrumb support for BBPress.

# Changes

*2023/08/25*
Very minor bugfixes to correct an incorrect colour setting and correct spelling in readme.md

*2022/22/25*
Update to 1.0.1 to reflect the progressive additions of: Utility styles, Printing control, Bug fixes
