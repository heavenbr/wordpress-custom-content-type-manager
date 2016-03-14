

# Description #

The **to\_image\_src** converts an image ID into the full URL to the image, used for example in your own image tag or links.  This is a convenience function that wraps the [wp\_get\_attachment\_image\_src](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src) function.

# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _string_ a post ID (ID of an attachment post, i.e. an image ID).
  * **$options**: _string_. src of a default image if an empty $input is supplied.
  * **OUTPUT**: _string_. Full path to the image

# Options #

Supply a string as an option to specify a default image path.  See Example 2

## Example 1 ##

```
print_custom_field('my_image:to_image_src');

// prints something like
// http://yoursite.com/wp-content/uploads/2011/03/IMG_1045.jpg
```

## Example 2 ##

Here's how you can specify a default image:

```
print_custom_field('my_image:to_image_src', 'http://yoursite.com/wp-content/uploads/2011/03/default.jpg');

// prints something like
// http://yoursite.com/wp-content/uploads/2011/03/IMG_1045.jpg
```

Don't get confused between this method of setting a default value and specifying a default image inside of your custom field.

## Example 3: Inside GetPostsQuery ##

A common task involves looping over results from GetPostsQuery (or any other function that loops over a list of posts).  In cases where you're not printing values for a single post, you cannot rely on `get_custom_field` or `print_custom_field` since those functions are designed to print a value from a _single_ post (notably, the single post being viewed via the `singe-xxxxx.php` template page.

Instead, you need to roll up your sleeves and convert the values from their raw values.  You can do this using using the built-in WordPress [wp\_get\_attachment\_src](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src)
or you can invoke the `to_image_src` filter like this:

```
<?php
$Q = new GetPostsQuery();
$args = array();
$args['post_type'] = 'slideshow';
$results = $Q->get_posts($args);

foreach ($results as $r) { 
?>
    <img src="<?php print CCTM::filter(123, 'to_image_src'); ?>" />
    OR
     <img src="<?php print wp_get_attachment_image($image_id); ?>" />
<?php
endforeach;
?>
```

# See Also #

  * [to\_image\_array](to_image_array_OutputFilter.md) Output Filter
  * [to\_image\_tag](to_image_tag_OutputFilter.md) Output Filter