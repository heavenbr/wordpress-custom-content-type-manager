# Incompatibility Blues #

The support of custom [post types](http://codex.wordpress.org/Post_Types) requires some heavy lifting that delves deep into the core of the WordPress application, so be _extremely_ careful about using multiple plugins that tap into WordPress' custom post\_type functionality. There is a lot of related functionality that this plugin has to integrate in order to make this work and if another plugin is trying to modify that same behavior, the results can be erratic, your site may break, or certain features may become unusable.

It would be a miracle if any two plugins handled the thorough customizations in the same way, so I strongly recommend that you avoid activating multiple plugins that implement custom post types.

One of the shortcomings of WordPress is that it does not have a standardized built-in way to list which post types should be registered via the [register\_post\_type()](http://codex.wordpress.org/Function_Reference/register_post_type) function.  As a result, each plugin that utilizes this function must store its to-do list in its own custom way, and there is no simple way for other plugins to see which post types have been registered already.  Using multiple plugins that tap into this feature can quickly become erratic as each plugin steps on the others' toes.

In an attempt to alert users to the problems that occurs in this situation, the CCTM plugin detects incompatible plugins and alerts the admin users to the potential for catastrophic problems.

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | <font color='red'><b>The use of multiple "post_type" plugins is NOT recommended! There can be only one!</b></font>  |
|:--------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------|


<a href='http://www.youtube.com/watch?feature=player_embedded&v=bv_qcgnOiGk' target='_blank'><img src='http://img.youtube.com/vi/bv_qcgnOiGk/0.jpg' width='425' height=344 /></a>



## List of potentially Incompatible Plugins ##

  * **CMS Press** : http://wordpress.org/extend/plugins/cms-press/
  * **Magic Fields** : http://wordpress.org/extend/plugins/magic-fields/
  * **Custom Post Type UI** : http://wordpress.org/extend/plugins/custom-post-type-ui/