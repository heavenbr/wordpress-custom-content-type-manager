

# Description #

The **to\_array** filter is the default output filter for [multi-select](MultiSelect.md) fields: the raw format is normally a JSON string, e.g. one stored by using a .  Selecting the "Array" output filter will convert the JSON string into a PHP array.  It is equivalent to the following:

<font color='red'>WARNING</font>: The [print\_custom\_field()](TemplateFunctions#print_custom_field.md) function isn't useful if you are using the **to\_array** output filter: you can't simply print an array, you're going to have to actually _do_ something with it.

# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _mixed_.  Normally a JSON formatted string, e.g. `["dog","cat","pig"]`
  * **$options**: _string_. The name of another Output Filter: each item in the list will be passed through this filter.
  * **OUTPUT**: _array_. E.g. `array('dog','cat','pig')`

## Example 1 ##
```
<?php
$my_array = get_custom_field('my_field');
foreach ($my_array as $item) {
   print $item;
}
?>
```

## Example 2 ##

If the custom field is set to use a different default Output Filter, you can force the output to use the **to\_array** filter by appending _:to\_array_ to the fieldname:

```
<?php
$my_array = get_custom_field('my_field:to_array');
print implode(', ', $my_array);
?>
```


## Example 3 ##

By supplying the name of a 2nd output filter to the arguments, you can apply the filter to each of the items in the array.

In this example, the field is a relation field, storing the post ids of related posts.

```
<?php
$my_array = get_custom_field('my_relations:to_array', 'to_link');
print implode('<br/>', $my_array);
// would print a list of links to the related posts
?>
```


## Example 4 ##

The functionality here relies on PHP's [json\_decode](http://php.net/manual/en/function.json-decode.php) function.

```
// The raw my_multiselect value would be a JSON array, e.g. ["squid","tentacle","ink"]
$raw = get_custom_field('my_multiselect:raw');
$array = json_decode($raw, true);
```


# See Also #

  * [to\_image\_src](to_image_src_OutputFilter.md) Output Filter
  * [to\_image\_tag](to_image_tag_OutputFilter.md) Output Filter