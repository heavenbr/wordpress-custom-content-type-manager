# Introduction #

The **summarize-posts** shortcode gives you access to the powerful **GetPostsQuery** class.

```
[summarize-posts]
```

<a href='http://www.youtube.com/watch?feature=player_embedded&v=3wsrEGORvIQ' target='_blank'><img src='http://img.youtube.com/vi/3wsrEGORvIQ/0.jpg' width='425' height=344 /></a>


## Parameters ##

The parameters available to the shortcode are the same available to GetPostsQuery [get\_posts](get_posts.md) function.

There are, however, several additional parameters available only to the shortcode:

  * **before**: printed before the results. default = `<ul class="summarize-posts">`
  * **after**: printed after the results. default =  `</ul>`,
  * **paginate**: whether or not to paginate the results. default = false
  * **tpl** you can specify a path (relative to webroot) to a file to be used as the template. For example, a value of "wp-content/my.tpl" would look inside the "wp-content" folder for a file named "my.tpl". <font color='red'>The file <b>must</b> use a <code>.tpl</code> extension!</font> default = `null`
  * **help** If set, the output will include debugging info and examples. default = `false`

## Specifying Shortcode Format ##

What if you don't want the simplistic unordered list?

You can specify a few other arguments here to help you format your results.  Use the full version of the shortcode to specify the formatting template to be used to format each result.

```
[summarize_posts]<li>[+post_title+]</li>[/summarize_posts]
```


# Examples #

## Example 1 ##

Creating an ordered list of your custom post-type named "movies"

```
[summarize_posts post_type="movies" before="<ol>" after="</ol>"]<li>[+post_title+]</li>[/summarize_posts]
```

## Example 2 ##

You can access any standard WordPress field or any custom field via placeholders. Often, you want to create links for specific pages.  The underlying GetPostsQuery class offers the "permalink" placeholder as a convenience placeholder:

```
[summarize_posts post_type="movies" before="<ol>" after="</ol>"]<li><a href="[+permalink+]">[+post_title+]</a></li>[/summarize_posts]
```

## Example 3 ##

You can also print out lots of useful debugging information by setting the "help" parameter on any **summarize\_posts** shortcode:

```
[summarize_posts post_type="movies" help="1"]
```

The debugging output is verbose.  It can help you troubleshoot problems with your selection criteria and it can help you identify all available placeholders.

For example, the output of the debugging information that appears when the "help" parameter is set to 1 might include something like the following:

```
Array
(
    [0] => Array
        (
            [ID] => 25
            [post_author] => 1
            [post_date] => 2012-06-10 20:05:22
            [post_date_gmt] => 2012-06-10 20:05:22
            [post_content] => The Matrix
            // ... etc ...
            [rating] => R
            [runtime] => 2 hours
            [my_custom_field] => Something
            // ... etc ...
```

From this output, you can tell what the corresponding placeholders will be.  `[+ID+]` is available, and in this example, it would be replaced with a value of "25".  All custom fields are available as placeholders.  In the example, you can see that there would be placeholders available for `[+rating+]`, `[+runtime+]`, and `[+my_custom_field+]`.

All you need to understand is that the output of the debugging information prints out data keys surrounded by square-brakets, e.g. `[fieldname]`, and the corresponding placeholder uses square-brackets _and_ the plus-symbol, e.g. `[+fieldname+]`.

# Available Placeholders #

## Built-In WordPress Columns ##

Every WordPress post or page (or any custom post-type) includes the following placeholders corresponding to the columns of the **wp\_posts** table:

  * ID
  * post\_author
  * post\_date
  * post\_date\_gmt
  * post\_content
  * post\_title
  * post\_excerpt
  * post\_status
  * comment\_status
  * ping\_status
  * post\_password
  * post\_name
  * to\_ping
  * pinged
  * post\_modified
  * post\_modified\_gmt
  * post\_content\_filtered
  * post\_parent
  * guid
  * menu\_order
  * post\_type
  * post\_mime\_type
  * comment\_count

Some of these are more useful than others.

## Convenience Placeholders ##

As an aid to users, the GetPostsQuery class will automatically include and populate the following placeholders on every lookup:

  * parent\_ID -- the ID of the parent post or page (if present)
  * parent\_title -- the title of the parent post or page (if present)
  * parent\_excerpt -- the excerpt of the parent post or page (if present)
  * author -- the author's username (differs from the the `post_author` field, which is just the ID of the user)
  * thumbnail\_id -- the ID of the image used for the post's "featured image" (if present)
  * thumbnail\_src -- the full URL source of the image used for the post's "featured image" (if present)
  * permalink -- the permalink of the post.
  * parent\_permalink -- the permalink of the parent post or page (if present)
  * post\_id -- same as the ID field, but presented here for consistency with naming conventions.

## Custom Fields ##

All custom fields are available as placeholders as well.  If your query is pulling up data on movies, then perhaps you have custom fields named "rating" or "plot" etc.  Use the "help" parameter to help you identify all available custom fields available in the output.

## Other Placeholders ##

You may also notice a series of other placeholders that are included in your results.  These are included just in an effort to be transparent: WordPress uses hidden custom fields to track meta data about each post, and the GetPostsQuery class (and the summarize\_posts shortcut) includes this data by default.  Some examples include the following:

  * `_edit_last`
  * `_edit_lock`
  * `_wp_page_template`

These fields are harmless (you probably never would notice them unless they were pointed out here in the docs), but you can control whether or not they are _returned_ by using the **include\_hidden\_fields** argument.  Usually, you are more concerned about what is _printed_ -- if you don't want these fields printed, then don't use their placeholders.