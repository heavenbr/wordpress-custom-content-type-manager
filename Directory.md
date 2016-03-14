|![http://s13.postimage.org/zfisli0s3/directory.png](http://s13.postimage.org/zfisli0s3/directory.png)|Directory fields let you choose a file by listing the contents of a directory and filtering by file extension(s).  Optionally, you can traverse sub-directories too.|
|:----------------------------------------------------------------------------------------------------|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------|

Available since version 0.9.7.




---


## Sample Image ##

...



---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. custom javascript..
  * **default\_value** : this should correspond to one of the defined options
  * **source\_dir** : The full path to the directory whose files are being listed.
  * **pattern** : This contains a comma-separated list of possible file extensions, e.g. `.jpg,.jpeg,.gif`
  * **traverse\_dirs** : 0|1. If set to 1, the contents of each sub-directory will also be listed.  Be careful: this can cause a lot of files to be listed.


---




---


## Included Javascript/CSS files ##

  * _none_


---


## Example of Use  in Template File ##

The output of `print_custom_field()` will simply print the selected file, _relative to the source directory_.


```
<img src="/images/<?php print_custom_field('my_file'); ?>" />
```

### Recommended Output Filters ###

  * _none_



---


## Customizing Manager HTML ##

Directory fields use the same tpls as [Dropdown](Dropdown.md) fields.