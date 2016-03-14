

# Introduction #

The GetPostsForm class helps draw forms, specifically forms for searching the contents of the `wp_posts` table (and the related `wp_postmeta` table).  The form elements contain names that are intended to be passed directly to the [GetPostsQuery::get\_posts()](get_posts.md) function.

Sorry, this class is not yet documented much here in the wiki.  Refer to the source code inside of `includes/GetPostsForm.php`


---


# Methods #

### <font color='green'>public function generate()</font> ###

_string_ **generate**(`[` array _$search\_by`[`,$existing\_values`]]`)_

  * **$search\_by** : array of items you want to search by.
  * **$existing\_values** : array of key/value pairs to specify default values for any field
  * **OUTPUT**: An HTML form

The `$search_by` array can contain any of the built-in WordPress columns from the `wp_posts` table (`post_content`, `comment_status`, etc.) and any of the following:

  * append : text field for specifying post IDs to always include in results
  * author : dropdown for selecting a user by their display name. Limited to 100 users.
  * date\_column : text field for specifying a column to use as the date\_column
  * date\_format : text field for specifying the date format to be used when records are returned.
  * date\_max : text field with jQuery datepicker attached.
  * date\_min : text field with jQuery datepicker attached.
  * exclude : text field for specifying post IDs to always exclude from results
  * include : text field for specifying post IDs to always include in results
  * limit : text field for specifying the maximum number of results to return.
  * match\_rule : dropdown for specifying how the search term should be matched
  * meta\_key : text field for specifying a custom field name
  * meta\_value : text field for specifying a custom field value
  * offset : text field for specifying the number of results to offset when returning results (used in pagination)
  * omit\_post\_type : text field for specifying a list of post-types to omit from results
  * order : dropdown or radio button that specifies ASC or DESC sort order for results
  * orderby : text field for specifying a column to sort by.
  * paginate : checkbox to determine whether or not results should be paginated.
  * post\_date : text field with jQuery datepicker attached.
  * post\_mime\_type : text field for specifying a MIME type
  * post\_modified : text field with jQuery datepicker attached.
  * post\_parent : text field for specifying a parent post ID
  * post\_status : multi-select field displaying all valid post-statuses.
  * post\_title :  text field
  * post\_type : multi-select field displaying all public post-types
  * search\_columns :  text field for specifying which columns should be searched when a `search_term` is supplied.
  * search\_term : text field
  * taxonomy : dropdown for selecting a registered taxonomy
  * taxonomy\_depth : text field for specifying an integer depth of taxonomy.  Useful if you need to allow/limit expensive hierarchical category-based searches.
  * taxonomy\_slug : text field
  * taxonomy\_term : text field
  * yearmonth : dropdown field for selecting a year + month combo.  This can be an expensive query!