# Introduction #

Now that you have a custom image field, what do you do with it?


# Overview #

You'll notice that the **print\_custom\_field()** function will only print out an integer.  This is the expected behavior! This plugin stores a [foreign key](http://en.wikipedia.org/wiki/Foreign_key) as the value for the image custom fields. The key is technically a post ID in the **wp\_posts** table where post\_type is "attachment".

So instead of directly _printing_ the contents of the custom field, your theme files will make use of the Custom Content Type Manager **get\_custom\_field()** function in combination with one of WordPress' dedicated theme functions:

WordPress Image Functions
  * [wp\_get\_attachment\_image](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image)
  * [wp\_get\_attachment\_image\_src](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src)

You can now also use the [get\_custom\_image()](TemplateFunctions#get_custom_image.md) function.

# Examples #

The following examples assume that your custom field is named "my\_image\_field". You can use code like this in any valid theme file, e.g. inside of your active's theme _index.php_ or in your content type's dedicated file, e.g. _single-movie.php_.

## Why print\_custom\_field() won't Work ##
```
The foreign key for this image is:
<?php print_custom_field('my_image_field'); ?>
```

## Using get\_custom\_field() Instead ##

Instead, we _get_ the the custom field (instead of printing it), and we pass it to one of WordPress' functions.

### wp\_get\_attachment\_image() ###
```
<?php $image_id = get_custom_field('my_image_field'); ?>
<?php print wp_get_attachment_image($image_id, 'full'); ?>

Is the same as:
<?php print_custom_image('my_image_field'); ?>
```

### wp\_get\_attachment\_image\_src() ###
```
<?php $image_id = get_custom_field('my_image_field'); ?>
<?php list($src, $w, $h) = wp_get_attachment_image_src($image_id, 'full'); ?>
<img src="<?php print $src; ?>" width="<?php print $w; ?>" height="<?php print $h; ?>" />
```