

# Description #

The **to\_image\_tag** returns a full image tag for your image field.  This is the default output filter for image fields starting with version 0.8.9.

# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _string_ a post ID
  * **$options**: _mixed_. any option available to the **size** parameter of WordPress' [wp\_get\_attachment\_image()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image). See examples below.
  * **OUTPUT**: _string_. Full path to the image

# Options #

Available options include the following:

  * thumbnail
  * medium
  * large
  * full (default)
  * or a 2-item array representing width and height in pixels

And any option available to the **size** paramter of the [wp\_get\_attachment\_image()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image) function.


## Example 1 ##

Basic usage requires no options:

```
print_custom_field('my_image:to_image_tag');

// Might return a value like:

<img width="640" height="480" 
 src="http://yoursite.com/wp-content/uploads/2011/03/IMG_1045.jpg" 
 class="attachment-" alt="IMG_1045" title="IMG_1045" />
```

## Example 2 ##

Available options include any option available to the **size** paramter of the [wp\_get\_attachment\_image()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image) function:

  * thumbnail
  * medium
  * large
  * full (default)
  * or a 2-item array representing width and height in pixels

```
print_custom_field('my_image:to_image_tag', 'thumbnail');
// prints out a thumbnail for the referenced image
```

# See Also #

  * [to\_image\_src](to_image_src_OutputFilter.md) Output Filter
  * [to\_image\_array](to_image_array_OutputFilter.md) Output Filter
  * WordPress' [wp\_get\_attachment\_image()](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image) function.