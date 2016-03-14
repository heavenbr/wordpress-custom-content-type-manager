|![http://s12.postimage.org/bztgulut5/relation.png](http://s12.postimage.org/bztgulut5/relation.png)|The relation field stores a reference to another post of some kind: post, page, or a media attachment like an image or video.|
|:--------------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------------------------------------------------------|




---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. `size="10"` or custom javascript..
  * **default\_value** : This is used to determine the default value for new instances of this field type.
  * **output\_filter** : [Output Filters](OutputFilters.md) control how data is filtered before being sent to your theme files. A recommended default output filter for an image field would be: to\_image\_src


---


## Included Javascript/CSS files ##

  * `media-upload` (built-in WordPress script)
  * `thickbox` (built-in WordPress script);
  * `/js/relation.js`


---


## Example of Use  in Template File ##


### Example 1: Retrieve a Link to the Related Post ###

Here we show how to use the [to\_image\_src](to_link_href_OutputFilter.md) Output Filter:

```
<a href="<?php print_custom_field('my_relation: to_link_href'); ?>">Click me</a>
```

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | In the case of a relation field with no output filter, `print_custom_field('fieldname');` will return _an integer number_ representing the ID of the related  post. |
|:--------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------|


### Example 2: Retrieving Multiple Related Items ###

Since image fields support the "repeatable" option, your field might store an array of images.  Any time you use the "repeatable" option, you'll want to use the [to\_array](to_array_OutputFilter.md) Output Filter.


```
<?php
$array_of_posts = get_custom_field('my_brothers:to_array');

foreach ($array_of_posts as $post_id) {
   print CCTM::filter($post_id, 'to_link_href');
}
```

Note here that we are using a foreach loop to iterate over the array, and we're using the [CCTM::filter()](CCTM_filter.md) function to convert each value in the array into the source of the media items via the [to\_image\_src](to_image_tag_OutputFilter.md) Output Filter


### Recommended Output Filters ###

  * [to\_array](to_array_OutputFilter.md) (if you have "repeatable" checked).
  * [to\_link\_href](to_link_href_OutputFilter.md)  for linking to the related item.
  * [to\_link](to_link_OutputFilter.md)  for generating a full link tag
  * [get\_post](get_post_OutputFilter.md) for getting the entire related post.


---


## Customizing Manager HTML ##

See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information on customizing the appearance of the manager HTML.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_relation.tpl`
  1. `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_relation.tpl`
  1. `fields/wrappers/_default.tpl`

### Multi ###

Relation fields can be repeatable.  If the "repeatable" option is checked, the following tpls are used to format the output:


#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_relation_multi.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_relation_multi.tpl`