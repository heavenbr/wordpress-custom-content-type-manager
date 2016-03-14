# Introduction #

A widget that encapsulated the Summarize Posts functionality was released in verison 0.9.5.8

![https://img.skitch.com/20120216-1f9jssi4565kfya3q6eb6rwctq.jpg](https://img.skitch.com/20120216-1f9jssi4565kfya3q6eb6rwctq.jpg)

<a href='http://www.youtube.com/watch?feature=player_embedded&v=peJCcor1ofM' target='_blank'><img src='http://img.youtube.com/vi/peJCcor1ofM/0.jpg' width='425' height=344 /></a>


# Settings #

  * **Title:** set the title of the widget (similar to many other widgets)
  * **Search Criteria:** this allows you to define which posts you want to list.  Note that the controls that show up on this form are configurable by the configuration file in _config/search\_parameters/**widget.php** (see [Customizations](Customizations.md) for information on customizing this and other forms in the CCTM).
  * **Formatting String:** this is what formats each result returned._It should be a list item_!_

The default formatting string is this:

```
<li><a href="[+permalink+]">[+post_title+]</a></li>
```

Note that the formatting string uses `[+placeholders+]` that get replaced with data, just as the formatting templates do when you [customize the Manager HTML](CustomizingManagerHTML.md).  Any field available to the posts you are listing will have a  corresponding placeholder.  This includes all built-in columns to the wp\_posts table AND any custom fields you have defined.  You can use the `[+help+]` placeholder to print out any available placeholders for you.