

# Description #

The **default** filter kicks in only if the input is empty: whatever you specify as an option will be returned only if the input is empty.  This is one way to establish default values for your fields.

# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$fieldname_ `[`, mixed _$options_ `]` )

  * **$fieldname**: _string_ field name `+ :default`
  * **$options**: _mixed_. Whatever you supply here will be returned if the input is empty
  * **OUTPUT**: _string_. Full path to the image

# Options #

The option argument can be any data type, but most often, you probably want to return a string.

## Example 1 ##

If your custom field is empty, the value you supplied as an option will be returned.

```
<?php
print_custom_field('fax_number:default', 'Number unavailable' );
?>
```

## Example 2 ##

This filter can be powerful when coupled with the [wrapper](wrapper_OutputFilter.md) Output Filter:

```
<?php
print_custom_field('fax_number:wrapper:default'
   , '<span class="my_class"><strong>Fax:</strong> [+content+]</span>'
   , '<em>Fax number unavailable</em>');
?>
```

If the **fax\_number** is set for the post being formatted, the output would be:

```
<span class="my_class"><strong>Fax:</strong>800-555-1212</span>
```

But if the **fax\_number** was empty, then the default value would kick in and the output would be:
```
<em>Fax number unavailable</em>
```




# See Also #

  * [wrapper](wrapper_OutputFilter.md) Output Filter