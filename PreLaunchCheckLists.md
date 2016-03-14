These have been deprecated in favor of unit tests.

# Pre-Launch Checklist #

Here's my running list of things to test before releasing a build.

  1. Create a custom content type, check for any errors
  1. Add one of each field to it, check for any errors.
  1. Create a post in this new content type, check for any errors.
  1. Add a value for each field, including each custom field, check for errors.  Try using foreign characters for values, like ü or ∑ as well as html tags, e.g. `<a href="#">click</a>`.
  1. Save the post, navigate away, then edit the post. Verify that all values were preserved.
  1. Verify the same behavior if your content type does NOT contain the main content block.
  1. Check the sample template for the post\_type: are there any errors?  Is it valid?
  1. Try using the sample template: view a post you created.  Are all fields represented correctly?
  1. Try re-ordering custom fields and saving the order.  Is the new order used when you edit the field?
  1. Export the .cctm.json file for this setup.  Try importing that definition on another site.  Any errors?
  1. In the template file, try using different Output Filters.  Any errors or unexpected behavior?
  1. Try adding custom tpls to alter the manager HTML.  Does this work as expected?
  1. Verify that custom hierarchies work
  1. Verify that Tags and Categories work
  1. Try everything on PHP 5.2 AND 5.3
  1. Try updating the previous version to the newest version on a different site than the one used for development.

# WordPress Mechanics #

  1. Update includes/CCTM.php to include the updated version number
  1. Update the index.php to include the correct version number
  1. Update the readme.txt file to include release notes for the version
  1. Update the readme.txt to point to the correct stable release tag
  1. Update the readme.txt to reflect the most recent version of WordPress