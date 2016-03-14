|![http://s18.postimg.org/5l9pckpf9/hidden.png](http://s18.postimg.org/5l9pckpf9/hidden.png)|Hidden fields store data out of site from users, useful if you need to keep your UI tidy.  They can also execute PHP to dynamically calculate values.|
|:------------------------------------------------------------------------------------------|:----------------------------------------------------------------------------------------------------------------------------------------------------|




---


## Field Definition (Meta Data) ##

The field definition affects how instances of this field type will display in the WordPress manager while creating or posts that contain instances of this field type.

  * **label** : the label identifies this field when you create or edit a post in the WordPress manager
  * **name** : the name is a unique identifier used when saving values for instances of this field; it corresponds to the **meta\_key** column **wp\_postmeta** table.  You will use this name when retrieving field values inside of your themes via the `print_custom_field()` or `get_custom_field()` functions.
  * **description** : the description provides extra information to users as they create or edit a post in the WordPress manager.
  * **class** : this affects the CSS class in the WordPress manager that is used to display instances of this field type.
  * **extra** : this can be used to provide additional parameters to the text input, e.g. `size="10"` or custom javascript..
  * **default\_value** : This is used to determine the default value for new instances of this field type.
  * **output\_filter** : [Output Filters](OutputFilters.md) control how data is filtered before being sent to your theme files.
  * **create\_value\_code** : any PHP code that returns a value.  Runs only if the **evaluate\_create\_value** box is checked.
  * **update\_value\_code** : any PHP code that returns a value. Runs only if the **evaluate\_update\_value** box is checked.
  * **onsave\_code** : any PHP code that returns a value. Runs only if the **evaluate\_onsave** box is checked.

DEPRECATED as of 0.9.8

  * **evaluate\_create\_value** : if checked, the PHP code in the **create\_value\_code** textarea will be evaluated when the post containing this field is first created (i.e. it runs once only).
  * **evaluate\_update\_value** : if checked, the PHP code in the **update\_value\_code** textarea will be evaluated when the post containing this field is edited.
  * **evaluate\_onsave** : if checked, the PHP code in the **onsave\_code** textarea will be evaluated when the post containing this field is saved.

Instead, you can use files in `wp-content/uploads/cctm/fields/{fieldname}/`: `onsave.php`, `onedit.php`,'oncreate.php`

The `onsave.php` will likely conflict with the `oncreate.php` or `onedit.php` behaviors, so combining all files is not recommended unless you're doing something really custom.


---


## Included Javascript/CSS files ##

NONE.


---


# Examples #

Hidden fields usually store basic values, so they can usually be printed quite easily, without modification:

### Use in your Template File ###

```
<?php print_custom_field('my_hidden'); ?>
```


## Ex. 1: Generating a Value on Create ##

Create `oncreate.php` inside your `wp-content/uploads/cctm/fields/{fieldname}/` directory.

Add PHP code to the `oncreate.php` file, e.g.

```
<?php
return rand(1,100);
?>
```

This code is only executed once per post: when the post is _first_ created -- the code executes as the form is _drawn_ (not as it is submitted).  After that, it will not execute again.

## Ex. 2: Generating a Value on Edit ##

Create `onedit.php` inside your `wp-content/uploads/cctm/fields/{fieldname}/` directory.

Add PHP code to the `onedit.php` file, e.g. this code to get the current timestamp

```
<?php
return date('Y-m-d H:i:s');
?>
```

This code executes every time the edit form is _drawn_ (not when it is submitted).


## Ex. 3: Calculate Values on Save ##

Perhaps the most powerful option is to calculate a value when the form is saved.  This code executes when the form is submitted, so it's a good place to calculate and modify content based on other values.  Use the `$_POST` variable to read or modify submitted values.

Create `onsave.php` inside your `wp-content/uploads/cctm/fields/{fieldname}/` directory.

Add PHP code to the `onsave.php` file, e.g.

```
<?php
return 'Saved at '. date('Y-m-d H:i:s');
?>
```


Note that the `$_POST` array is populated, but that all the CCTM's custom fields will be prefixed with a constant defined by `CCTM_FormElement::post_name_prefix`.  For example, if you have a custom field named `firstname`, it would appear in the `$_POST` array keyed as `cctm_firstname`.

Another important thing to note is that any repeatable fields will appear as _arrays_ in the `$_POST` array.  For example, if you have a repeatable field named **email** to store a person's one (or many) emails, then the `$_POST` array would contain a bit like this:

```
Array
(
// ... other posted values here ...
  [cctm_email] => Array
        (
            [0] => some@email.com
        )
)
```

## Ex. 4: Concatenate Two Fields ##

Let's say we want to concatenate 2 submitted fields into one.  **first\_name** and **last\_name** with a space in between.

Create `onsave.php` inside your `wp-content/uploads/cctm/fields/{fieldname}/` directory.

Add PHP code to the `onsave.php` file, e.g.

```
<?php
$value = sprintf('%s %s', 
    CCTM::get_value($_POST, 'cctm_first_name'),
    CCTM::get_value($_POST, 'cctm_last_name')
);
return trim($value);
?>
```

Note a couple of the CCTM functions used here:

  * `CCTM::get_value()` -- used to safely get an item out of an array, without the PHP notices that occur if the index does not exist.  Pass it the `$array` you wish to search, the `$key` you want to retrieve, and optionally, you can pass it a default value for the third argument.
  * `CCTM_FormElement::post_name_prefix` -- it's wired to `cctm_` (and unlikely to change), but to be thorough, you can reference it as a class constant.  It is used to ensure that the CCTM's custom fields do not conflict with any WordPress custom fields.

The `onsave.php` code is executed every time the post form is submitted.

## Ex. 5: Calculate a Total ##

Here's another scenario: you have custom fields with numbers in them, and you want to display a total to your user.  To do this, you need to use PHP to do the math, and then you need to edit your tpls to make the total visible.

Create `onsave.php` inside your `wp-content/uploads/cctm/fields/{fieldname}/` directory.

Add PHP code to the `onsave.php` file, e.g.

```
<?php
$a = (int) CCTM::get_value($_POST, CCTM_FormElement::post_name_prefix.'number1', 0);
$b = (int) CCTM::get_value($_POST, CCTM_FormElement::post_name_prefix.'number2', 0);
return $a + $b;
?>
```

The above example assumes that fields **number1** and **number2** are _integers_ (no decimals), so it uses _(int)_ type-casting to force the values to be integers.

If you're dealing with decimals or other numbers, you would want to omit the _(int)_ type-cast and rely on `is_numeric()` or some other function to validate the input.  Keep in mind that when data is posted on a form, it comes through to PHP as strings (i.e. all data typing is lost).

If you're working with several related fields, you may want to store your calculations back in the `$_POST` array so you don't have to repeat calculations in each field, e.g.

```
// ... do calculations...
$_POST[ CCTM_FormElement::post_name_prefix.'my_total'] = $my_total;
return $my_total;
```


| ![http://s2.postimage.org/by3ngezo/warning_icon.png](http://s2.postimage.org/by3ngezo/warning_icon.png) | If your PHP code has errors in it, when the form is saved and it executes, you may just get a white screen, or you may see errors displayed on the page (depending on your logging settings). Test your code carefully!|
|:--------------------------------------------------------------------------------------------------------|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

## Ex. 6: Doing your Own Ajax Action ##

Because the CCTM lets you customize the manager HTML, you can put in your own custom Javascript into the manager, and you can use that to issue your own Ajax requests.  For example, we can put a button into our HTML and trigger an Ajax request when it is clicked.

If your custom field is named **my\_ajax**, then you would create your own tpl file inside **wp-content/uploads/cctm/tpls/fields/elements/my\_ajax.tpl**:

```
<script type="text/javascript">

    function do_my_ajax_action() {  
        var post_id = jQuery('#post_ID').val();  // just an ex. of values available on your form
    	var data = {
    		"action": "my_ajax_action",
    		"post_id": post_id
    	};

    	jQuery.post(ajaxurl, data, function(response) {
    		alert('Got this from the server: ' + response);
    	});
	}

</script>
<span class="button" onclick="javascript:send_email_quote();">Send Email</span>
<input type="hidden" name="[+name_prefix+][+name+]"  id="[+id_prefix+][+id+]" value="[+value+]"/>

```

The **ajaxurl** variable is available to requests inside the WordPress manager.

The other part of this is that you need to tell WordPress to route the request to your own custom PHP.  Register a new action inside your **functions.php** file:

**Inside your functions.php file:**
```
// In your theme's functions.php file
function my_ajax_action() {
        // Do something.
        print 'Send this back to the Javascript request';
        die(); // Stop the Ajax request
}
add_action('wp_ajax_my_ajax_action', 'my_ajax_action');
```

The goal here is that when the button is clicked, the PHP code inside the `my_ajax_function()` is executed and text is returned to the Javascript.


---


### Recommended Output Filters ###

None.


---


## Customizing Manager HTML ##

Hidden fields use the 2 standard tpls: field and wrapper.  See [CustomizingManagerHTML](CustomizingManagerHTML.md) for more information.

#### Field tpl ####

The first of following tpls found will be used to format the field:

  * `fields/elements/{fieldname}.tpl`
  * `fields/elements/_hidden.tpl`
  * `fields/elements/_default.tpl`

#### Wrapper tpl ####

The first of the following tpls found will be used to wrap the output:

  1. `fields/wrappers/{fieldname}.tpl`
  1. `fields/wrappers/_hidden.tpl`
  1. `fields/wrappers/_default.tpl`