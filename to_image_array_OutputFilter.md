

# Description #

The **to\_image\_array** breaks down a referenced image into an array of its component parts: src, width, height.  This offers the template designer more flexibility in how they want to handle its display.

This filter relies on WordPress' [wp\_get\_attachment\_image\_src()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src) function.

# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _string_.  Technically an integer post ID
  * **$options**: _mixed_. Size of the image shown for an image attachment: either a string keyword (thumbnail, medium, large or full) or a 2-item array representing width and height in pixels, e.g. `array(32,32)`. As of WordPress Version 2.5, this parameter does not affect the size of media icons, which are always shown at their original size.
  * **OUTPUT**: _array_. Contains the image _src_, _width_, _height_ (in that order).

# Options #

Available options include the following:

  * thumbnail
  * medium
  * large
  * full (default)
  * or a 2-item array representing width and height in pixels

And any option available to the **size** paramter of the [wp\_get\_attachment\_image()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image) function.

## Example 1 ##

The output of this filter is an array.  The items are ordered in the array as follows:

  * **0**: the image src attribute
  * **1**: the image width attribute
  * **2**: the image height attribute

```
<?php
$my_img_array = get_custom_field('my_img:to_image_array');
?>
<img src="<?php print $my_img_array[0]; ?>" width="<?php print $my_img_array[1]; ?>" height="<?php print $my_img_array[2]; ?>" />
?>
```

## Example 2 ##

Using [PHP's list pragma](http://php.net/manual/en/function.list.php) can save you some footwork in your code:

```
<?php
list($src, $w, $h) = get_custom_field('my_img:to_image_array');
?>
<img src="<?php print $src; ?>" width="<?php print $w; ?>" height="<?php print $h; ?>" />
```

## Example 3 ##

What if you wanted to avoid this filter entirely?  You can use the [wp\_get\_attachment\_image\_src()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src) directly:

```
<?php
$image_id = get_custom_field('my_img:raw'); // <-- get the raw post id
list($src, $w, $h) = wp_get_attachment_image_src($image_id);
?>
<img src="<?php print $src; ?>" width="<?php print $w; ?>" height="<?php print $h; ?>" />
```

# See Also #

See WordPress' [wp\_get\_attachment\_image\_src()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src) function.