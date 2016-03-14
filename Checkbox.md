| ![http://s8.postimage.org/fglxaasn5/checkbox.png](http://s8.postimage.org/fglxaasn5/checkbox.png) | Custom checkbox fields are meant to store one of two values; the implementation here differs slightly from the standard HTML checkbox where a value is either present, or the variable is absent altogether.|
|:--------------------------------------------------------------------------------------------------|:------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|




---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. custom javascript..
  * **checked\_by\_default** : 1 | 0 representing whether or not this field will be checked by default when a new post is created in the WordPress manager.  If you change the either the _checked\_value_ or _unchecked\_value_, you should update this value so it reflects one of the two options.
  * **checked\_value**: The value stored in the database when a field instance is checked.
  * **unchecked\_value**: The value stored in the database when a field instance is unchecked.


---


## Included Javascript/CSS files ##

NONE: _Checkbox fields do not include external files._


---


## Example of Use  in Template File ##

The output of `print_custom_field()` will either be the the **unchecked\_value** or the **checked\_value** defined in you field definition.


```
<?php
print_custom_field('my_checkbox'); 
?>
```

### Recommended Output Filters ###

  * [default](default_OutputFilter.md)
  * [wrapper](wrapper_OutputFilter.md)



---


## Customizing Manager HTML ##

Checkbox fields use the 2 standard tpls: field and wrapper.  See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_checkbox.tpl`
  1. `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_checkbox.tpl`
  1. `fields/wrappers/_default.tpl`


Checkbox fields do not have a "repeatable" option, so there is not a separate set of "multi" tpls.