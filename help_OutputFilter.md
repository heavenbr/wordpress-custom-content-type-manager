

# Description #

The **help** filter exists solely as an aid to template designers and developers: if used, it will print out a summary of all available output filters and a blurb on how to use them.

# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _string_ field name `+ :help`.
  * **$options**: _none_.
  * **OUTPUT**: _string_. A help message

## Example 1 ##

Anything in the field is ignored -- a help message is returned.

```
<?php
print_custom_field('any_field:help');
// prints out a help message
?>
```

# Sample Output #

The **help** filter prints out something that looks like this (exact styling may be different due to CSS conflicts):

![https://img.skitch.com/20111208-rqdyyaixj8np2mgt8r471h8f8s.jpg](https://img.skitch.com/20111208-rqdyyaixj8np2mgt8r471h8f8s.jpg)