|![http://s9.postimage.org/upm05ubgr/date.png](http://s9.postimage.org/upm05ubgr/date.png)|Date fields are used to select and store a date.|
|:----------------------------------------------------------------------------------------|:-----------------------------------------------|




Note that the format you select for your date field affects how the value is stored in the database (see screenshot).

![http://content.screencast.com/users/fireproofsocks/folders/Camtasia/media/ccfd5284-4090-446b-b711-463a2333989f/2013-09-04_08-47-37.png](http://content.screencast.com/users/fireproofsocks/folders/Camtasia/media/ccfd5284-4090-446b-b711-463a2333989f/2013-09-04_08-47-37.png)

Although you can change the format, it's recommended that you stick with the default MySQL format for storing your dates.  If you need to change how the date is formatted in your theme files, you can use the PHP [strtotime function](http://php.net/manual/en/function.strtotime.php) and the [date function](http://php.net/manual/en/function.date.php) to manipulate the date format on the front-end or you can use the CCTM's [datef](datef_OutputFilter.md) filter as a convenience method for this task.


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

  * `/js/datepicker.js`  (Requires jquery-ui-core)


---


## Examples ##

## Ex. 1: Generating a value on Create ##

Create `oncreate.php` inside your `wp-content/uploads/cctm/fields/{fieldname}/` directory.

Add PHP code to the `oncreate.php` file, e.g.

```
<?php
return date('Y-m-d H:i:s');
?>
```

This code is only executed once per post: when the post is _first_ created -- the code executes as the form is _drawn_ (not as it is submitted).  After that, it will not execute again.

The date field supports ONLY the `oncreate.php` code evaluation (unlike the hidden fields, which support modifiers on save and on edit).



## Example of Use  in Template File ##

Usually, you would use a color-selector field to print a value into some HTML element that would actually make use of the color information.

```
<p>The party will be on <?php print_custom_field('my_date'); ?></p>
```

### Recommended Output Filters ###

  * [to\_array](to_array_OutputFilter.md) (if you have "repeatable" checked).



---


## Customizing Manager HTML ##

Date fields use the 2 standard tpls: field and wrapper.  See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_date.tpl`
  1. `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_date.tpl`
  1. `fields/wrappers/_default.tpl`

### Multi ###

Date fields can be repeatable.  If the "repeatable" option is checked, the following tpls are used to format the output:


#### Field tpl ####

The first of following tpls found will be used to format the field:

  1. `fields/elements/{fieldname}.tpl`
  1. `fields/elements/_date_multi.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_date_multi.tpl`
  1. `fields/wrappers/_text_multi.tpl`



---


# Use in  Theme File #

## Example 1 ##

Print the MySQL format into your theme file:

```
print_custom_field('my_date', 'Y-m-d H:i:s');
```