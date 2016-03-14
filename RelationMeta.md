Added in 0.9.7.5

|![http://s23.postimg.org/eevem113b/relationmeta.png](http://s23.postimg.org/eevem113b/relationmeta.png)| A [RelationMeta](RelationMeta.md) field stores additional data about a related post by adding custom fields to the relation.  <font color='red'>THIS FIELD IS EXPERIMENTAL</font>|
|:------------------------------------------------------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|




---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. `size="10"` or custom javascript.
  * **default\_value** : This is used to determine the default value for new instances of this field type.
  * **output\_filter** : [Output Filters](OutputFilters.md) control how data is filtered before being sent to your theme files. A recommended default output filter for an image field would be: to\_image\_src
  * **metafields** : An array of fieldnames that appear under an instance of this field.


---

## Limitations ##

Important points about RelationMeta fields:

The following fields cannot be added as a relation meta sub-field:

  * Relation
  * Image
  * Media
  * Another Relation Meta
  * WYSIWYG

Also note the following limitations:

  * No validation is supported for the sub-fields. (All validation rules are overridden).
  * Sub-fields may not be repeatable (the "Is Repeatable" setting is overridden).



---


## Included Javascript/CSS files ##

  * `media-upload` (built-in WordPress script)
  * `thickbox` (built-in WordPress script);
  * `/js/relation.js`


---


## Example of Use  in Template File ##

Fair Warning: if you're not comfortable navigating data structures and you need the simplicity of a straight-forward output-filter for everything printed in your template, then Relation-Meta fields are probably not for you.  They store complex data, and I can't think of a straightforward way to format it other than looping over their contents using custom PHP.

RelationMeta fields _always_ store their data as a JSON data structure, e.g.

```
{
   "413":{
      "age":"32",
      "birthday":"1999-12-31"
   }
}
```

Where the post ID is the first key, and then the sub-fields' names are the subsequent keys.


### Recommended Output Filters ###

  * [to\_array](to_array_OutputFilter.md)


---


## Customizing Manager HTML ##

See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information on customizing the appearance of the manager HTML.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_relation.tpl`
  1. `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_relation.tpl`
  1. `fields/wrappers/_default.tpl`

### Multi ###

Relation fields can be repeatable.  If the "repeatable" option is checked, the following tpls are used to format the output:


#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_relation_multi.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_relation_multi.tpl`