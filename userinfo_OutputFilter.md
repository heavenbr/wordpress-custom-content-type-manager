

# Description #

This **userinfo** Output Filter is designed to work on [User](User.md) fields: it retrieves information about the referenced user and allows you to format it via a formatting string.


# Usage #

Generic invocation of any Output Filter occurs via the [get\_custom\_field()](TemplateFunctions#get_custom_field.md) function:

_mixed_ **get\_custom\_field**( string _$input_ `[`, mixed _$options_ `]` )

  * **$input**: _mixed_: a single user id or an array of them.
  * **$options**: _string_. A formatting string containing placeholders. Default is

```
<div class="cctm_userinfo" id="cctm_user_[+ID+]">[+user_nicename+]: [+user_email+]</div>
```

  * **OUTPUT**: _string_.  The generated HTML

Available placeholders include:

  * **ID** e.g. `123`
  * **user\_login** e.g. `myusername`
  * **user\_nicename** e.g. `myusername`
  * **user\_email** e.g. `user@mail.com`
  * **user\_url** e.g. `http://craftsmancoding.com`
  * **user\_registered** e.g. `2013-03-17 17:02:36`
  * **user\_activation\_key** optionally contains a random string.
  * **user\_status** e.g. `0`
  * **display\_name** e.g. `Mister User`

`user_pass` is intentionally unset for security reasons.

## Example 1 ##

```
<?php
print get_custom_field('my_user:userinfo');
?>
```

## Example 2 ##

```
<?php
print get_custom_field('my_user:userinfo', '[+display_name+]');
?>
```

## Example 3 (in a form tpl) ##

The placeholders available to you are different depending on which tpl you're editing and how it's used.  In this example, you can see how to edit a form element's tpl, where the value is stored in the `[+value+]` placeholder:

```
<select name="[+name_prefix+][+name+]" class="cctm_dropdown [+class+]" id="[+id_prefix+][+id+]" [+extra+]>
[+all_options+]
</select>
Email: [+value:userinfo=={{user_email}}+]
```

## Example 4 (in a Summarize Posts tpl) ##

As shown in the previous example, the placeholders that are relevant depend on which tpl is used.  If you are using the Summarize Posts shortcode and you want to print out more information about the author of a post, for example, then you need to run the **userinfo** filter on the `post_author` field:

```
<li>
[+post_title+] by [+post_author:userinfo==Email: {{user_email}}+]
</li>
```