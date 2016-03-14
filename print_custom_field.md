# print\_custom\_field #

This is a convenience function that simple prints the output of the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function.

This is probably the second most important function used in your template files (behind [get\_custom\_field()](get_custom_field.md).  This gets the value of the custom field identified by _$fieldname_ and applies the default [Output Filter](OutputFilters.md).  The default Output Filter can be overridden  by specifying an [Output Filter](OutputFilters.md) verbosely by appending a colon (:) and the filter name, e.g.

```
<?php $print_custom_field('my_field'); ?>
```

In most cases, this function is a merely a convenience function that ties into WordPress' [get\_post\_meta()](http://codex.wordpress.org/Function_Reference/get_post_meta) function. The CCTM plugin requires that each custom field has a unique name (i.e. a key), whereas the WordPress _get\_post\_meta()_ function allows for multiple rows to exist with the same key.

### $fieldname ###
(string) (required) The name of the custom field whose value you want to get.

### $options ###
(mixed) (optional) These are optional arguments passed to the Output Filter.