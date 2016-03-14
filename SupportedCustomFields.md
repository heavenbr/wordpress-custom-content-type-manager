By default, WordPress supports only text custom fields.  The CCTM plugin allows you to define multiple types of custom fields to include inside your posts.  When you are adding a new custom field, you can choose to create any of the following types of field, or you can [develop your own](CustomCustomFields.md).

# Overview #

It helps to distinguish our language here: when we say "create a custom field", we might be talking about adding a value to a single field within a given post (e.g. adding a phone number to our friend's contact information), or we might be talking about defining a new type of field for use with various content-types (e.g. creating a dropdown list of all possible brands of cell-phones).  Usually when we say "create a custom field", we are referring to the latter: we are talking about _defining_ a type of field.  We are creating a blueprint for a type of field that can be used on many different posts.

Read more about [Custom Field Definitions...](CustomFieldDefinitions.md)

# Types of Custom Fields #

## [Checkbox](Checkbox.md) ##

|![http://s8.postimage.org/fglxaasn5/checkbox.png](http://s8.postimage.org/fglxaasn5/checkbox.png)| [Checkbox](Checkbox.md): A simple checkbox that stores 1 (checked) or 0 (unchecked). You can define whether it is checked by default by setting the default value to "1". |
|:------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

## [Color Selector](ColorSelector.md) ##

|![http://s9.postimage.org/la64smtfv/colorselector.png](http://s9.postimage.org/la64smtfv/colorselector.png) | [ColorSelector](ColorSelector.md):  these text fields use a bit of JavaScript to allow users to pick a color visually ([mColorPicker](http://blog.meta100.com/post/600571131/mcolorpicker)).|
|:-----------------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

## [Date](Date.md) ##

|![http://s9.postimage.org/upm05ubgr/date.png](http://s9.postimage.org/upm05ubgr/date.png)| [Date](Date.md) fields are used to select a date.|
|:----------------------------------------------------------------------------------------|:-------------------------------------------------|

## [Directory](Directory.md) ##

|![http://s13.postimage.org/zfisli0s3/directory.png](http://s13.postimage.org/zfisli0s3/directory.png)| [Directory](Directory.md) fields are used when you want to select a file within a directory.|
|:----------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------|

## [Dropdown](Dropdown.md) ##

|![http://s9.postimage.org/smg6bx11n/dropdown.png](http://s9.postimage.org/smg6bx11n/dropdown.png)| [Dropdown](Dropdown.md) fields let you select a single option from a list of options via a dropdown list or a series of radio buttons.|
|:------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------|

## [Hidden](Hidden.md) ##

|![http://s18.postimg.org/5l9pckpf9/hidden.png](http://s18.postimg.org/5l9pckpf9/hidden.png)| [Hidden](Hidden.md) fields let you store values out of sight from users creating or editing content.  You can execute PHP to calculate dynamic values.|
|:------------------------------------------------------------------------------------------|:------------------------------------------------------------------------------------------------------------------------------------------------------|

## [Image](Image.md) ##

|![http://s8.postimage.org/jqdm96etd/image.png](http://s8.postimage.org/jqdm96etd/image.png)| [Image](Image.md) fields allow users to select a valid image (or images) that has been uploaded into the WordPress Media library.|
|:------------------------------------------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------------------|


## [Media](Media.md) ##

|![http://s10.postimage.org/4r95kqwpx/media.png](http://s10.postimage.org/4r95kqwpx/media.png)| [Media](Media.md) fields are used to select an uploaded media file(s) such as an mp3 or movie file.|
|:--------------------------------------------------------------------------------------------|:---------------------------------------------------------------------------------------------------|


## [Multi-Select](MultiSelect.md) ##

|![http://s8.postimage.org/hud1ssltt/multiselect.png](http://s8.postimage.org/hud1ssltt/multiselect.png)| [MultiSelect](MultiSelect.md) fields are used to store a list of multiple values. The values are encoded as a JSON array, so you probably want to use either the "Array" or "Formatted List" [Output Filter](OutputFilters.md).|
|:------------------------------------------------------------------------------------------------------|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

## Radio ##

See [Dropdown](SupportedCustomFields#Dropdown.md) (above).

## [Relation](Relation.md) ##

|![http://s12.postimage.org/bztgulut5/relation.png](http://s12.postimage.org/bztgulut5/relation.png)| A [Relation](Relation.md) field stores an integer foreign key(s) to another post of some kind: post, page, or a media attachment like an image or video.|
|:--------------------------------------------------------------------------------------------------|:--------------------------------------------------------------------------------------------------------------------------------------------------------|

## [RelationMeta](RelationMeta.md) ##

|![http://s23.postimg.org/eevem113b/relationmeta.png](http://s23.postimg.org/eevem113b/relationmeta.png)| A [RelationMeta](RelationMeta.md) field stores additional data about a related post by adding custom fields to the relation.|
|:------------------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------------------------------------------------------|



## [Text](Text.md) ##

|![http://s12.postimage.org/o4dbpbx2x/text.png](http://s12.postimage.org/o4dbpbx2x/text.png)| [Text](Text.md) fields are the simplest type of custom fields.  They are meant to store arbitrary strings of data, usually no more than a few characters in length.|
|:------------------------------------------------------------------------------------------|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------|


## [Textarea](Textarea.md) ##

|![http://s9.postimage.org/d13g5peh7/textarea.png](http://s9.postimage.org/d13g5peh7/textarea.png)| [Textarea](Textarea.md) fields are meant to store arbitrary strings of data up to several pages in length.|
|:------------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------------------------------------|

## [User](User.md) ##

|![https://img.skitch.com/20120129-b68tkm2edkau7yaarj8187519x.jpg](https://img.skitch.com/20120129-b68tkm2edkau7yaarj8187519x.jpg)|A [User](User.md) field allows you to select a user from your local site. (Added 0.9.5.6)|
|:--------------------------------------------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------------------|


## [WYSIWYG](WYSIWYG.md) ##

|![http://s8.postimage.org/5q2dpjybl/wysiwyg.png](http://s8.postimage.org/5q2dpjybl/wysiwyg.png)|A [What-you-see-is-what-you-get](WYSIWYG.md) (WYSIWYG) field is a textarea with formatting controls like you might see in a word processor (e.g. Microsoft Word).  It allows users to format text without needing to know HTML markup codes.|
|:----------------------------------------------------------------------------------------------|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|


## Custom ##

Developers can develop their own types of custom fields: [read more...](CustomCustomFields.md)