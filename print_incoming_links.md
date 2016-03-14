# print\_incoming\_links #

_array_ **print\_incoming\_links**( string $tpl)

If you have relation fields that have linked to a page, this function will show you which pages have linked there.  Each incoming link is formatted using the formatting string $tpl.

Default formatting string is:
```
<span><a href="[+permalink+]">[+post_title+] ([+ID+])</a></span> &nbsp;
```

See also [get\_incoming\_links](get_incoming_links.md)