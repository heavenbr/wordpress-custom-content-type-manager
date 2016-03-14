# Introduction #

Version 0.9.4 of the CCTM brings a lot of changes and improvements, so please be careful when upgrading!


<a href='http://www.youtube.com/watch?feature=player_embedded&v=BX2eJwA4_As' target='_blank'><img src='http://img.youtube.com/vi/BX2eJwA4_As/0.jpg' width='425' height=344 /></a>

## Where did my Content Types Go?!? ##

Oops... I'm trying to track down that bug, but some users have reported that their custom post-types disappear after updating.  Sorry about that, but it's easy to fix: just edit the content type in question and save it again.   Re-saving it reinforces the new data structure and it should make your content types re-appear.

## Custom Fields ##

Starting with 0.9.4, custom field definitions are _normalized_.  That means you define them _once_ and you can add them to any content type you want.  This provided consistency in behavior for your site, but the normalization process may play havoc on your template files!  The update script should migrate your data the best it can, but it cannot easily update your template files, so instead it issues warnings!

Any duplicate field names are given a new name, e.g. **my\_field** might get morphed into **my\_fielg**, so your templates for a given content type might be using code that references the old field name, e.g.

`print_custom_field('my_field');`

### The Solution ###

Before you update your template files, consider using the **Merge** command to merge together field definitions that may have been split up inadvertently during the upgrade.

## Output Filters ##

Version 0.9.4 brings with it some serious improvements in [Output Filters](OutputFilters.md).  The [Sample Template](SampleTemplates.md) for each content type now includes a full example of how to use each type of custom field.  This was done to help cut down on the confusion: many users simply did not understand how the data was stored or how to retrieve it (primarily images and arrays proved problematic).