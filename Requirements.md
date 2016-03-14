# Software Requirements #

The CCTM requires the following:

  * WordPress 3.3.0 or newer
  * The [Summarize Posts](http://code.google.com/p/wordpress-summarize-posts/) plugin must NOT be installed!  It is already built into the CCTM, so there is no need to have both plugins.
  * PHP 5.3.0 or newer  (versions prior to 0.9.8 allowed PHP 5.2.6)
  * MySQL 4.1.2 or newer
  * The following WordPress plugins must not be installed: Magic Fields, Custom Post Type UI, CMS Press.  Because the CCTM performs the same functions but in different ways, you cannot activate the CCTM if one of these other plugins is active.

The CCTM defines the following constants:

  * CCTM\_PATH
  * CCTM\_URL
  * CCTM\_3P\_PATH
  * CCTM\_3P\_URL

# Recommendations #

The [Suffusion theme](http://wordpress.org/extend/themes/suffusion) is not recommended for use with the CCTM.  That's because Suffusion behaves as a plugin, and it offers functionality that can easily conflict with the CCTM (just like the incompatible plugins listed above).