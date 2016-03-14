# Table of Contents #

Use the following list for navigation.




# Description #

_array_ **get\_posts**( array _$args_ )

This function performs a search on the database, returning a list of posts matching your criteria.  The criteria are very flexible, allowing you to search by custom taxonomies or date ranges and to sort by custom fields.

This function is similar to the built-in WordPress [get\_posts](http://codex.wordpress.org/Template_Tags/get_posts) function, but SummarizePosts offers a more thorough implementation and it avoids some of the weird caveats and awkward limitations present in other solutions.

# Setting Filter Parameters #

All filter parameters can be set in various ways:

  * By passing an associative array passed directly to the object constructor
  * By passing an associative array passed to the get\_posts() function
  * By setting object attributes (see [examples](Examples_get_posts.md)) on the instantiated object.

Which method you use is largely up to you, but certain scenarios may lend themselves to one approach over another.

## Via Object Constructor ##

Here we see how you can pass an associative array to the **GetPostsQuery** constructor:

```
$args = array();
$args['post_type'] = 'page';
$args['orderby'] = 'post_title';
$Q = new GetPostsQuery($args);
$results = $Q->get_posts();
```

## Via get\_posts() ##

Here is the equivalent parameters passed instead to the get\_posts() function:

```
$Q = new GetPostsQuery();
$args = array();
$args['post_type'] = 'page';
$args['orderby'] = 'post_title';
$results = $Q->get_posts($args);
```

## Via Object Attributes ##

And here is the equivalent parameters set as object attributes:

```
$Q = new GetPostsQuery();
$Q->post_type = 'page';
$Q->orderby = 'post_title';
$results = $Q->get_posts();
```



---


# All Parameters #

There is a _long_ list of supported parameters here; most calls to this function will only use a small fraction of the available parameters.  Some inputs accept either comma-delineated strings _or_ arrays: this is intended to increase usability and it allows the function to be accessed via shortcodes or via standard PHP invocation in the theme files.


### limit ###
(integer) The maximum number of posts to retrieve.  If **pagination** is set to true, this value will determine the number of results to display on each page.

Default: 10

### offset ###
(integer) This parameter is used primarily when paginating results. The offset is ignored if no **limit** is set.

Default: null

### orderby ###
(string) The column used to sort the results. You can specify any column name here, either a column from the _wp\_posts_ table, or a custom field from _wp\_postmeta_.  The following column names are in the _wp\_posts_: _ID, post\_author, post\_date, post\_date\_gmt, post\_content, post\_title, post\_excerpt, post\_status, comment\_status, ping\_status, post\_password, post\_name, to\_ping, pinged, post\_modified, post\_modified\_gmt, post\_content\_filtered, post\_parent, guid, menu\_order, post\_type, post\_mime\_type, comment\_count_.

If you use a term that's not in that list, it'll be assumed that you are ordering on a custom field.

There is one reserved keyword here: specifying an orderby of _random_  will cause the results to be ordered randomly, but _be careful_: using this option on a large data set can negatively affect database performance.

Default: ID

### order ###
(string) This specifies the sort direction: **ASC** or **DESC**

Default: DESC

### include ###
(string or array) List of post IDs that you want to return.

Default: null

### exclude ###
(string or array) List of post IDs that you want to exclude from search results.

Default: null

### append ###
(string or array) List of post IDs that you want to append to other search results.  This is useful if you want to conduct a search, but you _always_ want a certain post (or posts) returned.
(string or array)

Default: null

### meta\_key ###
(string) This specifies the name of the custom field that should be searched for the value specified by _meta\_value_. This parameter must be used in combination with _meta\_value_.

Default: null

### meta\_value ###
(string) This specifies the value of the custom field specified in the _meta\_key_ parameter. This parameter must be used in combination with _meta\_key_.

Default: null

### post\_type ###
(string or array) This specifies which post type(s) you want to return.  You can specify input as an array or as a comma-separated string of values. Built-in WordPress post types include "post" or "page", but you can specify any registered post type including custom post types registered via the [register\_post\_type()](http://codex.wordpress.org/Function_Reference/register_post_type) function.

Default: null (i.e. shows all post-types)

### omit\_post\_type ###
(string or array) This specifies which post type(s) you want to omit from your search results.  Set it as a comma-sparated string or an array. As with the **post\_type** argument, input is any registered post type (built-in or custom).  This input is useful because there are several unexpected post-types floating around in the WordPress database that you probably don't want returned in your search results.

Default: revision, nav\_menu\_item

### post\_mime\_type ###
(string) Specify the mime type OR the first part of the mime type.  This is for convenience so you can specify mime types like "image" to match "image/jpeg" and "image/gif".  Common post\_mime\_type's include _image/jpeg, application/pdf, audio/mpeg_

Default: null

### post\_parent ###
(string or array) Specify one or more parent posts by their IDs.

Default: null

### post\_status ###
(string or array) Specify one or more post statuses: _draft, publish, inherit, auto-draft, trash, private_.

Default: publish

### post\_title ###
(string) Specify the full post title.  If you need to conduct partial matches, use the _search\_term_ parameter.

Default: null

### author ###
(string) Defines the author's displayname.

As of version 0.9.7.1, you may use the special constant `CURRENT_USER` to dynamically use the [get\_current\_user\_id()](http://codex.wordpress.org/Function_Reference/get_current_user_id) function.

Default: null

### date ###
(string) Date in YYYY-MM-DD format.  Only records with a matching date will be returned.  The column searched is specified by _date\_column_.

Default: null

### date\_format ###
(string) Specifies a date format that affects the date columns in the _wp\_posts_ table ('post\_date','post\_date\_gmt','post\_modified','post\_modified\_gmt'), and it will format the column specified in the _date\_column_ argument.
Any valid value that can be passed to PHP's date() function can be used (http://php.net/manual/en/function.date.php), but this supports the following shorthands:

  * **1** : e.g. March 10, 2011, 5:16 pm
  * **2** : e.g. 10 March, 2011
  * **3** : e.g. Thursday March 10th, 2011
  * **4** : e.g. 3/30/11
  * **5** : e.g. 3/30/2011

These are provided as a convenience.  For your own customizations, use PHP's date function directly.

Default: null

### yearmonth ###
(integer) Allows you to specify a year and month so you can bring up recent posts for a particular calendar month, e.g. _201101_ would return posts from January 2011.

Default: null

### date\_min ###
(string) Date in YYYY-MM-DD format.  Only records with a date _greater than or equal to_ the **date\_min** will be returned.  Which column is filtered on is determined by the **date\_column** parameter. This argument can optionally include the time, e.g. '2011-02-01 23:30:59'; by default a time of 00:00:00 is assumed.

Default: null

### date\_max ###
(string) Date in YYYY-MM-DD format.  Only records with a date _less than or equal to_ the **date\_max** will be returned. Which column is filtered on is determined by the **date\_column** parameter. This argument can optionally include the time, e.g. '2011-02-01 23:30:59'; by default a time of 00:00:00 is assumed.

Default: null

### taxonomy ###
(string) Name of a single taxonomy used to filter by, e.g. `category` or `post_tag`.  Used in conjunction with either `taxonomy_term` or `taxonomy_slug`.  Capitalization does not matter unless you have specially configured MySQL.

Default: null

### taxonomy\_term ###
(string or array) Used to specify one or more taxonomy terms, e.g. "Mammals" or "Mammals,Dogs"

Default: null


### taxonomy\_slug ###
(string) Alternative to _taxonomy\_term_. Used to specify a taxonomy term as a valid URL-slug (i.e. lowercase with any non-alphanumeric character converted to an underscore).  In practice, you will probably rarely use this parameter since it's not obvious to you as a human what the slug-equivalent is for a given term.

Default: null

### taxonomy\_depth ###
(string) Use this parameter if you are searching hierarchical taxonomies (e.g. Mammals --> Dogs --> Labrador).  If you want posts categorized as "Labrador" to be included in a search for Mammals, then you need to bump the `taxonomy_depth` to 2 (or more).

  * **1**: retrieves posts that belong to the taxonomy specified.
  * **2**: retrieves posts that belong to the specified taxonomy or its children.
  * **3**: retrieves  posts that belong to the specified taxonomy, its children, or its grandchildren.
  * **[...]**: _etc_

Each layer in the hierarchy can potentially trigger an additional database query.  If you're not sure how many levels are in your hierarchy, then you can choose an arbitrarily large number.

Default: 1


### search\_term ###
(string) Used to specify a search term.  You can adjust the `search_columns` parameter to control which columns are searched for this value.

Default: null

### search\_columns ###
(string or array) An array of columns to search for the string specified by the `search_term`. This can accept a comma-separated string or an array.  Note that a record matches if the search\_term appears in ANY (not ALL) of the columns listed: the term may appear in column1 OR column2 OR column3 ...

Default: array('post\_title', 'post\_content')

### join\_rule ###
(string) Defines how multiple criteria are combined using either "AND" or "OR".  If you have specified multiple criteria, this determines how these criteria are combined.  This is an advanced parameter.  Normally your criteria are joined using AND, e.g. "WHERE post\_type='page' AND 'page\_title'='home'.  Changing this to "OR" can give you some flexibility in your searches, but generally "OR" based queries are massively confusing.

Default: AND

### join ###
(string) Comma-separated string which defines which related tables are joined in the query (advanced).  If you are dealing with large data sets (e.g. thousands of users), then query times can get prohibitively slow, so you may need to stop joining on the related tables.  The items may include any combination of the following:

  * <font color='green'><b>author</b></font>: unlocks data for "author" (display name of the post author)
  * <font color='green'><b>taxonomy</b></font>: unlocks comma-separated list for all tags, categories, etc. as "taxonomy\_names" and "taxonomy\_slugs".  <font color='red'>Note: this groups all terms together.  It does not distinguish tags from categories from any custom taxonomies.</font>
  * <font color='green'><b>parent</b></font>: unlocks data for "parent\_ID", "parent\_title", and "parent\_excerpt"
  * <font color='green'><b>thumbnail</b></font>: unlocks data for "thumbnail\_id" and "thumbnail\_src"
  * <font color='green'><b>none</b></font> force the field to be blank if you want to retrieve only minimum post info.

Default: author,parent,thumbnail

Added 0.9.7.1.

### match\_rule ###
(string) Defines how the _search\_term_ matches.  Options are:
  * _contains_: the whole phrase must appear somewhere in the _search\_columns_ being searched
  * _starts\_with_: matching records must begin with the phrase entered
  * _ends\_with_: matching records must end with the phrase entered

Default: contains

### date\_column ###
(string) Specifies which column should be used for date range searches (i.e. the date column in question when you use the _date\_min_ and _date\_max_ parameters).

Default: post\_modified

### paginate ###
(boolean) True or false.  If true, the results are paginated.  The _limit_ parameter dictates how many results are shown per page.

Default: false

### include\_hidden\_fields ###
(boolean) True or false.  Controls whether or not custom fields whose names begin with an underscore (e.g. `_edit_lock`) are included in the output.

Default: false


---


# Direct Values #

You can also filter by direct values on any column.  If you supply a post column name as an argument, the results will be filtered based on the value you supply, e.g. the following will retrieve post ID 123:

```
$args['ID'] = 123;
```

## Built-in WordPress Column Names ##

  * ID
  * post\_title
  * post\_content
  * _... etc..._

The following is a full list of built-in columns:

_ID, post\_author, post\_date, post\_date\_gmt, post\_content, post\_title, post\_excerpt, post\_status, comment\_status, ping\_status, post\_password, post\_name, to\_ping, pinged, post\_modified, post\_modified\_gmt, post\_content\_filtered, post\_parent, guid, menu\_order, post\_type, post\_mime\_type, comment\_count_.

## Custom Column Names ##

If you supply an argument that is not an argument listed here or not one of the WordPress column names, it will be assumed you are filtering on a custom field.

## Special Constants ##

As of version 0.9.7.1, you may use a couple special constants to dynamically calculate values.

  * `CURRENT_USER` may be passed to the "author" and "post\_author" arguments to get the ID of the current user per the [get\_current\_user\_id()](http://codex.wordpress.org/Function_Reference/get_current_user_id) function.
  * `NOW` may be passed as an argument to the date columns: "post\_date", "post\_modified", "post\_date\_gmt", "post\_modified\_gmt", "date\_min", "date\_max", and "date".

For the gmt columns, the `gmdate()` function is used to calculate the UTC time.



---


# Operators #

Normally, the arguments passed to this function assume an "equals" operator.  E.g. if you used the following filter criteria, your search would return posts where the custom field value was equal to "red":

```
$Q = new GetPostsQuery();
//...
$args['my_custom_field'] = 'red';
//...
$results = $Q->get_posts($args);
```

However, you can change the operators that are used for each comparison by including a 2nd layer to the input array.  For example, the following verbosely assigns the "equals" operator to the query:

```
$args['my_custom_field']['='] = 'red';
```

If you wanted to return results where your custom field began with the letter "z", you could use the "starts\_with" operator:

```
$args['my_custom_field']['starts_with'] = 'z';
```

The following operators are available in GetPostsQuery (some aliases are supported for convenience):

  * `!=` or `ne` or `<>`: not equal
  * `>` or `gt` : greater than
  * `>=` or `gte` : greater than or equal to
  * `<` or `lt`: less than
  * `<=` or `lte`: less than or equal to
  * `^` or `starts_with` : starts with
  * `$` or `ends_with`: ends with
  * `%` or `like` or `contains`: like
  * `!%` or `!like` or `not_like`: not like
  * `=` or `in` or `equals`: equals  _(default)_

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | The "equals" operator uses MySQL `IN`, so if you pass it an array, `GetsPostsQuery::get_posts()` will look for posts that match any of the values, e.g. `$args['custom_field'] = array('red','green','blue');` would search for posts where the custom\_field value was red, green, or blue.|
|:--------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|


---


# Return Values #

The `get_posts()` function will return a record set: an array of arrays.  Each record will include all post data, plus any custom fields, plus several convenience attributes and other related data from various joined tables (see the `join` argument).

Sample data from one post:

```
[ID] => 398
[post_author] => 1
[post_date] => 2013-04-04 07:44:37
[post_date_gmt] => 2013-04-04 07:44:37
[post_content] => 
[post_title] => Test Post
[post_excerpt] => 
[post_status] => publish
[comment_status] => closed
[ping_status] => closed
[post_password] => 
[post_name] => test-post
[to_ping] => 
[pinged] => 
[post_modified] => 2013-04-04 07:44:37
[post_modified_gmt] => 2013-04-04 07:44:37
[post_content_filtered] => 
[post_parent] => 0
[guid] => http://yoursite.com/?post_type=xyz&p=398
[menu_order] => 0
[post_type] => order
[post_mime_type] => 
[comment_count] => 0
[parent_ID] => 
[parent_title] => 
[parent_excerpt] => 
[author] => cctm
[thumbnail_id] => 
[thumbnail_src] => 
[_edit_last] => 1
[_edit_lock] => 1365484040:1
[custom_field] => This is a custom field
[permalink] => http://yoursite.com/test-post/
[parent_permalink] => http://yoursite.com/test/parent-test/
[post_id] => 398
```



---


# Examples #

See [Examples of get\_posts()](get_posts_examples.md) on a separate page.