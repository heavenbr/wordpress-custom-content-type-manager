|![http://s9.postimage.org/la64smtfv/colorselector.png](http://s9.postimage.org/la64smtfv/colorselector.png) |Color-selector text fields use a bit of JavaScript to allow users to pick a color visually ([mColorPicker](http://blog.meta100.com/post/600571131/mcolorpicker)).|
|:-----------------------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------------------------------------------------------------------------------------------|




---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. `size="10"` or custom javascript..
  * **default\_value** : This is used to determine the default value for new instances of this field type.


---


## Included Javascript/CSS files ##

  * `/js/mColorPicker.js`  (Requires jquery-ui-core)


---


## Example of Use  in Template File ##

Usually, you would use a color-selector field to print a value into some HTML element that would actually make use of the color information.

```
<div style="background-color: <?php print_custom_field('my_colorselector'); ?>;">... </div>
```

### Recommended Output Filters ###

  * [to\_array](to_array_OutputFilter.md) (if you have "repeatable" checked).



---


## Customizing Manager HTML ##

Colorselector fields use the 2 standard tpls: field and wrapper.  See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  * `fields/elements/{fieldname}.tpl`
  * `fields/elements/_colorselector.tpl`
  * `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_colorselector.tpl`
  1. `fields/wrappers/_default.tpl`

### Multi ###

Colorselector fields can be repeatable.  If the "repeatable" option is checked, the following tpls are used to format the output:


#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_colorselector_multi.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_colorselector_multi.tpl`