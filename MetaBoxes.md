Starting with version 0.9.7, you can customize your manager forms by creating metaboxes.

This relies on WordPress' [add\_meta\_box()](http://codex.wordpress.org/Function_Reference/add_meta_box) function.  You can create your own custom meta boxes when you are managing the custom fields for a post-type.




![http://content.screencast.com/users/fireproofsocks/folders/Snagit/media/191173f0-a40a-4bed-ad96-7bfef8d52b4b/2013-03-19_09-49-24.png](http://content.screencast.com/users/fireproofsocks/folders/Snagit/media/191173f0-a40a-4bed-ad96-7bfef8d52b4b/2013-03-19_09-49-24.png)



# Metabox Settings #

  * D**(_required_): the unique CSS ID for the metabox.
  * itle** (_required_): appears at the top of the box.
  * ontext**: controls where on the page the box will be drawn: advanced, normal, side.
  * riority** : controls order within a context
  * allback Function**: use this if you want you own custom behavior
  * allback Arguments**: use this if you have specified your own callback funciton.

See [add\_meta\_box()](http://codex.wordpress.org/Function_Reference/add_meta_box) for more info.


---


# Custom Formatting #

## Hierarchy ##

Any time (almost) when the CCTM generates HTML in the WordPress manager, the CCTM relies on tokenized formatting template (**.tpl**) files to generate the final output.  Here's a visual example:

![https://img.skitch.com/20110927-mip2pscb7snftaa3eu3isgqjhx.png](https://img.skitch.com/20110927-mip2pscb7snftaa3eu3isgqjhx.png)


---


## Directories ##

You can override the HTML used to draw a metabox by creating the following directory structure inside of your WordPress **wp-content/uploads** directory:

```
cctm/metaboxes/
```

The `_default.tpl` template is used by default if no other matching template file is found.  To use a custom format for a given metabox, create a file corresponding to its ID, e.g. if the metabox ID is "mymetabox", then the file you should create is`cctm/metaboxes/mymetabox.tpl`.

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | Never add to or overwrite the template files inside of the `plugins/custom-content-type-manager/` directory!  Always add your modifications to `wp-content/uploads/cctm/`so that they are not overwritten during updates to the CCTM. |
|:--------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|