|![http://s8.postimage.org/5q2dpjybl/wysiwyg.png](http://s8.postimage.org/5q2dpjybl/wysiwyg.png)|A What-you-see-is-what-you-get (WYSIWYG) field is a textarea with formatting controls like you might see in a word processor (e.g. Microsoft Word).  It allows users to format text without needing to know HTML markup codes.|
|:----------------------------------------------------------------------------------------------|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

Note that some functionality does not work with these extended WYSIWYG (e.g. full-screen mode).  This is due to shortcomings in how WordPress has integrated TinyMCE.





---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. `rows="2" cols="20"` or custom javascript..
  * **default\_value** : This is used to determine the default value for new instances of this field type.
  * **output\_filter**: choose an output filter...


---


## Included Javascript/CSS files ##

  * `/js/wysiwyg.js` Requires jquery, editor, thickbox, media-upload
  * `thickbox` (built-in WordPress script)


---


## Example of Use  in Template File ##


### Example 1 ###

```
<?php print_custom_field('my_wysiwyg'); ?>
```

### Example 2 ###

Often, you want to convert newlines to br tags.  WordPress does this via internal actions and its `do_shortcode` function.  You can achieve a similar result by using the CCTM's [do\_shortcode](do_shortcode_OutputFilter.md) output filter:

```
<?php
print_custom_field('my_wysiwyg:do_shortcode');
?>
```

### Recommended Output Filters ###

  * [do\_shortcode](do_shortcode_OutputFilter.md) : this will parse any shortcodes in the field.  By default, WordPress only parses shortcodes in the post's main content block, not in any custom fields.



---


## Customizing Manager HTML ##

WYSIWYG fields use only the wrapper tpl.  This is due to how WordPress has implemented TinyMCE in a very constrictive manner.  This same deficiency in WordPress prevents WYSIWYG fields from being repeatable. See [issue 271](https://code.google.com/p/wordpress-custom-content-type-manager/issues/detail?id=271) for more information.

See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information.


#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_wysiwyg.tpl`
  1. `fields/wrappers/_default.tpl`