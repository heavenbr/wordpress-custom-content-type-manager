

# Introduction #

A class for querying WordPress posts (including pages or custom post-types), including all custom fields via a unified API.  This class was written to overcome limitations in `WP_Query`, `query_posts`, and other built-in WordPress methods.

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | The most important function here is [get\_posts](get_posts.md).  See its dedicated page as well as the page with [Examples of get\_posts()](get_posts_examples.md). |
|:--------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------|


---


# Methods #

### <font color='green'>public function get_posts()</font> ###

_array_ **get\_posts**(array _$args_ `[`,$ignore\_defaults`]`)

  * **$args** : array of filter criteria.  See [get\_posts](get_posts.md) for details.
  * **$ignore\_defaults** : boolean
  * **OUTPUT**: A record set (an array of arrays). Each post returned is an associative array.

See [get\_posts](get_posts.md) for full documentation.

### <font color='green'>public function get_post()</font> ###

_array_ **get\_post**(integer _$id_)

  * **$id** : integer post id of the post you with to retrieve
  * **OUTPUT**: An associative array: each field is a key in the array.

Do not confuse this with the `get_posts()` function!


### <font color='green'>public function count_posts()</font> ###

_integer_ **count\_posts**(array _$args_ `[`,$ignore\_defaults`]`)

  * **$args** : criteria, inputs the same as for `get_posts()`.
  * **OUTPUT**: Integer count of the number of rows meeting the criteria.

### <font color='green'>public function debug()</font> ###

_string_ **debug**()

  * **OUTPUT**: retrieves debugging information about the query you issued.

You should run this after you have run this class' `get_posts()` function.  Optionally, you can pass arguments to the constructor and then call this method.

### <font color='green'>public function get_args()</font> ###

Returns an HTML formatted version of filtered input arguments useful for debugging.


---


IN PROGRESS...

  * get\_args Returns an HTML formatted version of filtered input arguments useful for debugging.
  * get\_current\_page\_url: Gets the URL of the current page to use in generating pagination links.
  * get\_duration: Gets script execution time (since instantiation) for debugging purposes
  * get\_errors: Format any errors in an unordered list, or returns a message saying there were no errors.
  * get\_found\_rows: Gets the # of rows found given the criteria.  Must be run after get\_posts
  * get\_notices: Format any errors in an unordered list, or returns a message saying there were no errors.
  * get\_pagination\_links: tie into the [CCTM\_Pagination](CCTM_Pagination.md) class. Only valid if the pagination option has been set.  This is how the user should retrieve the pagination links that have been generated.
  * get\_post: returns a single post by its id.  The returned array includes all custom fields.
  * get\_shortcode: gets the equivalent shortcode for the query defined by the arguments.
  * get\_sql: get the raw SQL query
  * get\_warnings: like get\_notices and get\_warnings.
  * set\_default: This sets a default value for any field.  This should kick in only if the field is empty.
  * set\_defaults:
  * set\_include\_hidden\_fields: Should hidden fields be included in the results?
  * set\_tpls: Passthru to pagination library's function of the same name.