# get\_custom\_field #

_mixed_ **get\_custom\_field**( string _$fieldname_`[`, mixed _$options_ `]` )

This is probably the single most important function used in your template files.  This gets the value of the custom field identified by _$fieldname_ and applies the default [Output Filter](OutputFilters.md).  The default Output Filter can be overridden  by specifying an [Output Filter](OutputFilters.md) verbosely by appending a colon (:) and the filter name, e.g.

```
$my_array = get_custom_field('my_field:to_array');
```

In many cases, this function is a merely a convenience function that ties into WordPress' [get\_post\_meta()](http://codex.wordpress.org/Function_Reference/get_post_meta) function. This plugin requires that each custom field has a unique name (i.e. a key), whereas the WordPress _get\_post\_meta()_ function allows for multiple rows to exist with the same key.

When you use an [Output Filter](OutputFilters.md), this function parts ways with WordPress` _get\_post\_meta()_ function: you can modify your output inline using one of the Output Filters that ships with the CCTM, or you [write your own](CustomOutputFilters.md).

### $fieldname ###
(string) (required) The name of the custom field whose value you want to get.

### $options ###
(mixed) (optional) These are optional arguments passed to any referenced [Output Filters](OutputFilters.md) (if any).