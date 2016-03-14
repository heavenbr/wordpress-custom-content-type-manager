# Introduction #

The CCTM was designed to be flexible and extendible, so there are points in its architecture designed with customizations in mind.   The dominant practice here is that the CCTM will look for your customizations in the **wp-content/uploads/cctm** for a given file, and if found, that file will be used (this is the same idea as using a child them to extend/override a parent theme).  If a file is not found, the CCTM will fall-back to the included file inside of **wp-content/plugins/custom-content-type-manager**: it's a simple setup and it allows for dedicated users to customize their site in the way they need.


## Configuration Files ##

These are PHP files, usually containing simple variable or array values.

  * [menus/admin\_menu.php](Config_admin_menu.md): contains code that generates the main CCTM menu.
  * `post_selector/_image.php`: settings
  * [post\_selector/\_media.php](Config_post_selector_media.md): settings for the "Choose Media" buttons on your posts/pages.
  * [post\_selector/\_relation.php](Config_post_selector_relation.md): settings for the "Choose Relation" buttons on your posts/pages.
  * [post\_selector/\_post\_content\_widget.php](Config_post_selector_widget.md): settings for the "Post Content" widget.
  * [search\_parameters/image.php](Config_search_parameters_image.md): controls the form that pops up when you define a custom image field
  * `search_parameters/_media.php`:
  * `search_parameters/_relation.php`:
  * `search_parameters/_summarize_posts.php`: controls the form that pops when you click the SummarizePosts TinyMCE button

## Template Files (.tpl) ##

You can also customize a lot of the HTML used in the manager pages. See [Customizing the Manager](CustomizingManagerHTML.md).