# Create a Virtual Page in WordPress

This plugin goes along with the a tutorial on Return True. Please check out the [tutorial](http://return-true.com/creating-a-custom-page-with-wordpress-endpoints/) for a more indepth look at the code.

This plugin creates a virtual page. However unlike most other implementations I have seen it maintains template loading and allows loading a custom template file either from the plugin directory, or the theme folder.

### What is a Virtual Page?
A virtual page is simply a term I have seen used often for creating a custom page that does not already exist within WordPress, and is not available to edit via the admin. This is normally helpful for pages where the data is generated automatically by the plugin or it a plugin needs to make a static page public without wanting to create it via the database as an actual page.

### What does this plugin do?
This plugin, quite pointlessly, outputs a dump of the data contained within `$wp_query->post` in a list when you visit the permalink for a post with /dump on the end of the URL. For example, a post URL such as:

http://example.com/2014/01/01/sample-post/dump

Will produce a dump instead of the post text normally shown. This is obviously pointless & not advised for production use, but the code used should be sound & helpful if you need to use this kind of thing in production.

### What else does it do?
This plugin also adds a virtual page using `add_rewrite_rule()` this allows you to make a page that is accessable via any URL you wish to define. This is very useful if you wish to make a page that is completely undeleteable or uneditable via the Wordpress admin but maintaining template loading while doing so. Most other implementations use `exit()` and therefore stop WordPress' execution preventing the active theme from being loaded.

To see the page this plugin generates visit:

http://my-website.com/the-page

### Version
1.2

### Installation

Pretty simple. Just clone into a folder in your WordPress plugin's directory using:

```sh
git clone https://github.com/Nabesaka/wp-virtual-page-tutorial.git virtual-page-tutorial
```

Active via the plugins screen then visit a single post & add /dump to the URL. That will show a page, with templates intact, that should give a neat (sort-of) list of the data from `$wp_query->post`. The template provided is for twentyfifteen so it may not work with other templates. It is, however, just a matter of altering your template file.

### Updating
If you have installed this plugin before the recent update & are pulling the latest copy from Github please make sure to deactivate & reactivate the plugin, or click save on the permalinks settings page to flush rewrite rules or the new page will not be available.

### License

WordPress' GPL v2

Check the license file for more details
