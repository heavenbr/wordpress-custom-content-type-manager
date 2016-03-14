

# Description #

This **raw** Output Filter is the default filter for most fields and it was the _only_ filter available prior to version 0.8.9 of the CCTM.  The raw filter isn't much of a filter at all: it simply returns the input, but you can use it to override the Default Output Filter set for any custom field.


# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _mixed_.
  * **$options**: _none_.
  * **OUTPUT**: _mixed_.  Whatever the $input was.

## Example 1 ##

You probably won't even think of the raw filter as a filter unless you invoke it verbosely using the colon-notation.  For example, imagine a field that normally returns an array of image parameters (to\_image\_array), but you want to see the raw post ID of the image stored:

```
<?php
print get_custom_field('my_img:raw');
?>
```