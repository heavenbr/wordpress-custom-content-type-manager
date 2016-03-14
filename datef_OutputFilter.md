

Added 0.9.7.1

# Description #

This **datef** Output Filter formats a string as a date.  This is useful if you need to store dates in one format and display them in another.  It is recommended that you store all dates in the MySQL date format and then convert them for display using this type of date conversion.


# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _mixed_: a single user id or an array of them.
  * **$options**: _string_. A formatting string containing placeholders. Default is based on your blog settings: `get_option('date_format');`
  * **OUTPUT**: _string_.  The generated HTML

## Example 1 ##

```
<?php
print get_custom_field('my_date:datef');
?>
```

## Example 2 ##

```
<?php
print get_custom_field('my_date:datef', 'F j, Y, g:i a');
// e.g. March 10, 2001, 5:16 pm
?>
```

## Example 3 (in a tpl placeholder) ##

```
<span>
My Date: [+my_date:datef==F j, Y, g:i a+]
</span>
```