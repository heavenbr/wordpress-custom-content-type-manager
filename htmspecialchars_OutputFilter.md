

# Description #

The _htmspecialchars_ implements the PHP [htmlspecialchars()](http://php.net/manual/en/function.htmlspecialchars.php) function.  This filter is useful if you need to print HTML data into a form field.


# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$fieldname_ `[`, mixed _$options_ `]` )

  * **$fieldname**: _string_ field name `+ :htmspecialchars`
  * **$options**: _none_.
  * **OUTPUT**: _string_.  An encoded version of the $input.

## Example 1 ##

```
<input type="text" value="<?php print_custom_field('some_field:htmspecialchars'); ?>" />
```

# See Also #