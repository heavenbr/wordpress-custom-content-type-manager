## Deleting a Content Type ##

The behavior here can be configured starting with version 0.9.4 of the plugin.

Starting with version 0.9.4 of the plugin, you can change the [Settings](Settings.md) so that when you delete a content type definition, you can actually force the deletion of any posts of that type.  Be careful about this!  It's probably better for beginners to NOT delete any posts from the database, but if you know what you're doing, you can help keep your database neat and tidy by removing cruft.

| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | Even if your [Settings](Settings.md) will not delete posts from the database, for general intents and purposes, that content will pretty much become invisible if you delete the definition!  So be careful! |
|:--------------------------------------------------------------------------------------------------------|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

Firstly, WordPress must _register_ all custom post\_types (a.k.a. content types) using the [register\_post\_type()](http://codex.wordpress.org/Function_Reference/register_post_type) function in order for WordPress to recognize them.  If a post\_type is not registered, it is essentially becomes invisible to the WordPress application.  This plugin is one of several that manages the registering of custom post types ([see similar plugins here](SeeAlso.md)), but this plugin offers a lot more [Features](Features.md).

When you register a custom\_post type by using the Custom Content Type Manager plugin, the registration includes a lot of information about that post\_type, e.g. which fields should show up in the editor, whether or not a custom menu icon is used, and all of the custom fields that have been defined for that content type.

So when you "delete" a post\_type inside of this plugin, you are actually deleting the _definition_; unless you have changed the plugin [Settings](Settings.md) to force a delete of database rows, all the posts you created will remain the database, but they will essentially become invisible to WordPress.  If you know your way around MySQL, you can verify that the posts are still present in the database, e.g. via a query like this:

```
SELECT * FROM wp_posts WHERE post_type='my_post_type';
```

But unless you're a super geek with database skills, then deleting your definition for that post\_type really makes all that information disappear.  You can make it reappear by redefining a content type of the same name, but that's a lot of work (see the section on "Ghost Posts" below).

Your custom content type definitions can represent **a lot** of work! It includes all the details about that content type and all of its custom fields.  Consider [exporting](ExportDefinition.md) the definition before deleting it.

### Ghost Posts ###

If you re-create a previously defined post type then activate it, WordPress will suddenly recognize all the posts of that type that were previously created.  We call this phenomenon "Ghost Posts" ... the posts existed inside your database and they were floating around hidden until you registered the post\_type to which they belong.  Spooky.