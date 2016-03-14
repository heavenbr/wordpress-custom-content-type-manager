|![http://s10.postimage.org/4r95kqwpx/media.png](http://s10.postimage.org/4r95kqwpx/media.png)|Media fields are used to select an uploaded media file such as an mp3 or movie file.|
|:--------------------------------------------------------------------------------------------|:-----------------------------------------------------------------------------------|




---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. `size="10"` or custom javascript..
  * **default\_value** : This is used to determine the default value for new instances of this field type.
  * **output\_filter** : [Output Filters](OutputFilters.md) control how data is filtered before being sent to your theme files. A recommended default output filter for a media field would be: to\_image\_src


---


## Included Javascript/CSS files ##

  * `media-upload` (built-in WordPress script)
  * `thickbox` (built-in WordPress script);
  * `/js/relation.js`


---


## Example of Use  in Template File ##


### Example 1: Retrieve the src of the Media item ###

<font color='red'><b>This example is only valid for an image item.</b></font>

Here we show how to use the [to\_image\_src](to_image_src_OutputFilter.md) Output Filter:

```
<img src="<?php print_custom_field('my_video:to_image_src'); ?>" />
```

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | In the case of a media field with no output filter, `print_custom_field('fieldname');` will return _an integer number_ representing the ID of the media item post that has been referenced!  |
|:--------------------------------------------------------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

### Example 2: Get the URL to a PDF ###

WordPress obscures the source of many media items, so you have to dig around to find where the link to an actual file is.  In the case of a PDF, the link to the file is stored inside the **guid** field.  You can create links to the post's _guid_ using the [get\_post](get_post_OutputFilter.md)  or the [to\_link](to_link_OutputFilter.md) Output Filter.  The result is the same, but the syntax is different:

```
<?php print_custom_field('my_pdf:get_post','<a href="[+guid+]">Download PDF</a>'); ?>

OR 

<a href="<?php print_custom_field('my_pdf:get_post','guid'); ?>">Download PDF</a>

OR when using a tpl (e.g. via a summarize-posts shortcode)
// If your query loops over the actual PDFs:
<a href="[+guid+]">Download [+post_title+]</a>

// If your query loops over pages with custom fields that contain the pdfs, you need to get the guid of the referenced pages:
<a href="[+my_pdf:get_post==guid+]">Download [+my_pdf:get_post==post_title+]</a>
```

Note that you cannot control whether the browser will actually download the PDF or open it in the browser.  The WordPress application sends headers before you have a chance to modify them, so you don't have much control over things like forcing downloads, cookies, sessions, etc.  Furthermore, a user's browser may choose to handle the headers differently depending on what plugins are installed.


### Example 3: Retrieving Multiple Media Items ###

Since image fields support the "repeatable" option, your field might store an array of images.  Any time you use the "repeatable" option, you'll have to process a _list_ of items.  One way to make it 100% clear that you're dealing with an array is to use the [to\_array](to_array_OutputFilter.md) Output Filter.


```
<?php
$array_of_media = get_custom_field('my_videos:to_array');

foreach ($array_of_media as $med_id) {
   print CCTM::filter($med_id, 'to_image_src');
}
```

Note here that we are using a foreach loop to iterate over the array, and we're using the [CCTM::filter()](CCTM_filter.md) function to convert each value in the array into the source of the media items via the [to\_image\_src](to_image_tag_OutputFilter.md) Output Filter


### Recommended Output Filters ###

  * [to\_array](to_array_OutputFilter.md) (if you have "repeatable" checked).
  * [to\_image\_tag](to_image_tag_OutputFilter.md)  for converting to a full `<img>` HTML tag.
  * [to\_array](to_image_src_OutputFilter.md)  for retrieving the src of the image being referenced.


---


## Customizing Manager HTML ##

See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information on customizing the appearance of the manager HTML.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_media.tpl`
  1. `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_media.tpl`
  1. `fields/wrappers/_default.tpl`

### Multi ###

Media fields can be repeatable.  If the "repeatable" option is checked, the following tpls are used to format the output:


#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_media_multi.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_media_multi.tpl`