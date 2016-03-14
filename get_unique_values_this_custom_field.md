# get\_unique\_values\_this\_custom\_field #

_array_ **get\_unique\_values\_this\_custom\_field**( string _$fieldname_ )

Given a specific custom field name ($fieldname), return an array of all unique
values contained in this field by **any** published posts which use a custom field
of that name, regardless of post\_type, and regardless of whether or not the custom
field is defined as a "standardized" custom field.

This function filters out empty or null values.

### $fieldname ###
(string) (required) The name of the custom field.

## Example ##

```
$array = get_unique_values_this_custom_field('favorite_cartoon');
print_r($array);
// prints something like : Array ( 'Family Guy', 'South Park', 'The Simpsons' );
```