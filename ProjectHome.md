# Overview #

This plugin was created in part for the book [WordPress 3 Plugin Development Essentials](http://www.packtpub.com/wordpress-3-plugin-development-essentials/book) published by Packt Publishing.

The **Custom Content Type Manager** (or CCTM) plugin allows WordPress 3.x users to create, extend, and manage custom content types (a.k.a. post types) and their fields like a true CMS. You can define custom fields for any content type, including checkboxes, textareas, and dropdowns.  Developers can also create their own types of fields.

Custom fields can be added to any post type so that each time you create a new post, page, book, or movie post, a standard set of user-defined fields will be there.  Custom field can hold any type of information: dropdown lists, checkboxes, WYSIWYG, and even images.

<a href='http://www.youtube.com/watch?feature=player_embedded&v=rbRHrdKwo5A' target='_blank'><img src='http://img.youtube.com/vi/rbRHrdKwo5A/0.jpg' width='425' height=344 /></a>

# [FAQ](FAQ.md) #

See answers to commonly asked questions at the [FAQ](FAQ.md).

# ![http://s13.postimage.org/91ykm58lv/newspaper.png](http://s13.postimage.org/91ykm58lv/newspaper.png) [Newsletter](http://eepurl.com/dlfHg) #

Sign up for our newsletter here:
http://eepurl.com/dlfHg

# ![http://s14.postimage.org/63f8dyde5/forum.png](http://s14.postimage.org/63f8dyde5/forum.png) [Forum](http://wordpress.org/tags/custom-content-type-manager?forum_id=10) #
The forum for this plugin is here:
http://wordpress.org/tags/custom-content-type-manager?forum_id=10

There you can discuss general issues with this plugin, including features, tips and tricks. (Note that I briefly hosted a forum on freeforums.org, but it was too distracting with its ads; ultimately I concluded it was best to keep the discussion under the WordPress roof).

# ![https://img.skitch.com/20120822-mt2qe2ms768fxrk153qe2qeup9.jpg](https://img.skitch.com/20120822-mt2qe2ms768fxrk153qe2qeup9.jpg) [Donations](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FABHDKPU7P6LN) #

This project is heavily funded by user contributions.  [Make a donation](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=FABHDKPU7P6LN)!


# ![http://s8.postimage.org/x8qtby77l/space_invader.png](http://s8.postimage.org/x8qtby77l/space_invader.png) [Issues Bug Reporting](http://code.google.com/p/wordpress-custom-content-type-manager/issues/entry) #
If you have found a bug, please file it here by clicking the [Issues](http://code.google.com/p/wordpress-custom-content-type-manager/issues/entry) tab.

# [Download](http://code.google.com/p/wordpress-custom-content-type-manager/wiki/Downloads?tm=2) #
For the latest download, see the [Downloads](http://code.google.com/p/wordpress-custom-content-type-manager/wiki/Downloads?tm=2) tab.

# Architecture #
This builds off of existing WordPress architecture: it does not require **any** database modifications.  If you extend your post-types with custom fields, your template files must also be extended to display the new data, but the way this is built will work with the default _the\_meta()_ function.

The architecture was inspired by the MODx CMS (http://modx.com/).

# Translations #

[Serbo-Croatian version](http://science.webhostinggeeks.com/upravljac-kucanja) of this page provided by Andrijana Nikolic from [Webhostinggeeks.com](http://webhostinggeeks.com/wordpresshosting.html)


Starting for version 0.9.6, I'm accepting [Translations](Translations.md) (we'll need to do a few more rounds as we add more features).

