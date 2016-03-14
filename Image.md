|![http://s8.postimage.org/jqdm96etd/image.png](http://s8.postimage.org/jqdm96etd/image.png)|This allows users to select a valid image that has been uploaded into the WordPress Media library.|
|:------------------------------------------------------------------------------------------|:-------------------------------------------------------------------------------------------------|

Custom image fields are used to store a foreign key reference to another post, specifically to an "attachment" post representing an image.  Because the raw post\_id of the attachment post is not terribly useful in and of itself, image fields most often use some kind of [Output Filter](OutputFilters.md) that will convert the ID into an image tag or the image src.




---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. `size="10"` or custom javascript..
  * **default\_value** : This is used to determine the default value for new instances of this field type.
  * **output\_filter** : [Output Filters](OutputFilters.md) control how data is filtered before being sent to your theme files. A recommended default output filter for an image field would be: to\_image\_src, to\_image\_tag, or to\_image\_array


---


## Included Javascript/CSS files ##

  * `media-upload` (built-in WordPress script)
  * `thickbox` (built-in WordPress script);
  * `/js/relation.js`


---


## Example of Use  in Template File ##


### Example 1: Retrieve the src of the Image ###

Here we show how to use the [to\_image\_src](to_image_src_OutputFilter.md) Output Filter:

```
<img src="<?php print_custom_field('my_image:to_image_src'); ?>" />
```

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | In the case of an image field with no output filter, `print_custom_field('fieldname');` or `print_custom_field('fieldname:raw');`will return _an integer number_ representing the ID of the image post that has been referenced!  |
|:--------------------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|


### Example 2: Get the Full `<img>` tag ###

When the **Full `<img>` tag** output filter is selected ([to\_image\_tag](to_image_tag_OutputFilter.md)), the output of the `print_custom_field('fieldname');`function is a complete `<img>` tag.  The returned result relies on the [wp\_get\_attachment\_image\_src()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src) function.

Remember that you can pass as an option any valid option for the **size** parameter in the [wp\_get\_attachment\_image()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image) function, e.g.

```
print_custom_field('my_image:to_image_tag', 'thumbnail');
// Might output something like 
// <img src="wp-content/uploads/2012/03/14/thumbnail.jpg" />
```


### Example 3: Array of image src, width, height ###


The [to\_image\_array](to_image_array_OutputFilter.md) output filter is intended for users who require a bit more control in their theme files: instead of returning a _string_ value,  it returns an _array_ containing the the referenced image's src, width, and height, for example:

```
<?php
list($src, $w, $h) = get_custom_field('my_image:to_image_array');
?>
<img src="<?php print $src; ?>" width="<?php print $w; ?>" height="<?php print $h; ?>" />
```

Or:

```
<?php
$my_array = get_custom_field('my_image');
// print_r($my_array);
<img src="<?php print $my_array[0]; ?>" width="<?php print $my_array[1]; ?>" height="<?php print $my_array[2]; ?>" />
```

To achieve the same effect in your themes _without_ the use of this output filter, you would make use of the [wp\_get\_attachment\_image\_src()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src) function, e.g.:

```
global $post;
$image_id = get_post_meta($post->ID, $fieldname, true);
list($src, $w, $h) = wp_get_attachment_image_src( $image_id, 'full', true);
```

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | **Using this output filter will effectively break any instances of `print_custom_field()`: use `get_custom_field()` instead.**  This is because an _ARRAY_ is returned, so you can't simply print it; you must iterate over its contents. |
|:--------------------------------------------------------------------------------------------------------|:------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|


### Example 4: Retrieving Multiple Images ###

Since image fields support the "repeatable" option, your field might store an array of images.  Any time you use the "repeatable" option, you'll want to use the [to\_array](to_array_OutputFilter.md) Output Filter.


```
<?php
$array_of_images = get_custom_field('my_images:to_array');

foreach ($array_of_images as $img_id) {
   print CCTM::filter($img_id, 'to_image_tag');
}
```

Note here that we are using a foreach loop to iterate over the array, and we're using the [CCTM::filter()](CCTM_filter.md) function to convert each value in the array into an image tag via the [to\_image\_tag](to_image_tag_OutputFilter.md) Output Filter


### Example 5: Retrieving Multiple Images ###

Any time you use the "repeatable" option, you'll want to use the [to\_array](to_array_OutputFilter.md) Output Filter.  The trick with this example is passing the name of another output filter to the **to\_array** filter's argument: each item in the array is processed with the filter you specify:


```
<?php
$array_of_images = get_custom_field('my_images:to_array', 'to_image_src');

foreach ($array_of_images as $img) {
   print $img;
}
```

Note here that we are using a foreach loop to iterate over the array, and we're using the [CCTM::filter()](CCTM_filter.md) function to convert each value in the array into an image tag via the [to\_image\_tag](to_image_tag_OutputFilter.md) Output Filter


### Example 5: All an Image's Data ###

Sometimes you may want to get more info about the image than just its src or h or w.  You can use the [get\_post](get_post_OutputFilter.md) output filter to get ALL attributes from another post.  Remember that an image is just another type of post.  Remember that the **guid** is the image src.

```
<?php $img = get_custom_field('my_image:get_post'); ?>
<img src="<?php print $img['guid']; ?>" title="<?php print $img['post_title']; ?>" />
```

### Example 6: All an Image's Data ###

Just like example 5, but with multiple images: you want all the image data, but for an _array_ of images.  There are LOTS of ways to do this: remember, **the fundamental problem is converting an image's id to information you need**.

```
<?php 
$images = get_custom_field('my_image:to_array', 'get_post'); 
foreach($images as $img) {
?>
    <img src="<?php print $img['guid']; ?>" title="<?php print $img['post_title']; ?>" />
<?php  
}
?>
```

See also the similar question in the [FAQ](http://code.google.com/p/wordpress-custom-content-type-manager/wiki/FAQ#I_used_a_Multi-Relation_field_to_select_3_other_posts.__How_do_p) -- remember: **images are just a different kind of post**.

The other image data is buried deeper, unfortunately.


### Recommended Output Filters ###

  * [to\_array](to_array_OutputFilter.md) (if you have "repeatable" checked).
  * [to\_image\_tag](to_image_tag_OutputFilter.md)  for converting to a full `<img>` HTML tag.
  * [to\_image\_src](to_image_src_OutputFilter.md)  for retrieving the src of the image being referenced.
  * [to\_image\_array](to_image_array_OutputFilter.md)  for retrieving the width, height, and src of the image.


---


## Customizing Manager HTML ##

See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information on customizing the appearance of the manager HTML.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_image.tpl`
  1. `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_image.tpl`
  1. `fields/wrappers/_relation.tpl`

### Multi ###

Image fields can be repeatable.  If the "repeatable" option is checked, the following tpls are used to format the output:


#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_image_multi.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_image_multi.tpl`