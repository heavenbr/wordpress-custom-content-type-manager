

# Description #

The **do\_shortcode** filter is the default output filter for [WYSIWYG](WYSIWYG.md) fields -- it is essentially a wrapper for the WordPress function of the same name (see [do\_shortcode](http://codex.wordpress.org/Function_Reference/do_shortcode)).  This output filter forces any WordPress [shortcodes](http://codex.wordpress.org/Shortcode) to be parsed as they would in the normal post content block.

# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$fieldname_ `[`, mixed _$options_ `]` )

  * **$fieldname**: _string_ field name `+ :do_shortcode`
  * **$options**: _boolean_.  Set to true to override the wpautop() behavior.
  * **OUTPUT**: _string_. The contents of your field. Any shortcodes in the input will be parsed in the output.

## Example 1 ##

If you don't parse shortcodes in your custom WYSIWYG fields, they won't be parsed.   For example, if your WYSIWYG content contains a shortcode, e.g.

```
[gallery id="123" size="medium"]
```

Then you must parse that shortcode
```
<?php
print_custom_field('my_wysiwyg:do_shortcode');
?>
```

## Example 2 ##

If you don't want to use this Output Filter, you can instead use WordPress's function:

```
<?php
print do_shortcode( get_custom_field('my_wysiwyg') );
?>
```

See WordPress' documentation for its [do\_shortcode](http://codex.wordpress.org/Function_Reference/do_shortcode) function.

# See Also #

  * [do\_shortcode](http://codex.wordpress.org/Function_Reference/do_shortcode) WordPress function reference.