# get\_posts\_sharing\_custom\_field\_value #

_array_ **get\_posts\_sharing\_custom\_field\_value**( string _$fieldname_, string _$value_ )

Returns an array of posts (including all custom fields).  Posts are returned as associative arrays (not objects). This relies on the _get\_post\_complete()_ function (see this page), but it is a database intensive operation.

For a more efficient query that returns the same type of results (including more search options), please see the [SummarizePosts](http://wordpress.org/extend/plugins/summarize-posts/) plugin.

### $fieldname ###
(string) (required) The name of the custom field.

### $value ###
(string) (required) The value being searched for.

## Example ##

```
$posts = get_posts_sharing_custom_field_value('genre', 'comedy');	
foreach ($posts as $p) {
	print $p['post_title'];
}

```