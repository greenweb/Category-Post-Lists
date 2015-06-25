# Category-Post-Lists

A super simple WordPress plugin that prints out, from a shortcode, a list of linked category titles and a nested list of related published list of linked post titles

## Installation

**From github.com**

1. Download catposts.
2. Upload the 'catposts' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate Category Post Lists from your Plugins page. 

## Usage

Use the following shortcode: `[catposts]`

The shortcode has the following attributes:

#### These attributes affect category titles only
____

##### Attribute:
**orderby**
*   **'id'**
*   **'count'**
*   **'name'** - Default
*   **'slug'**

##### Attribute:
**hide_empty**
*   **1** (true) - Default (i.e. Do not show empty categories)
*   **0** (false)

##### Attribute:
**order**
*   **DESC** - Default
*   **ASC**

##### Attribute:
**exclude**
An a string of comma-separated category ids to exclude. e.g.
*   **0** - Default
*   **'1,20,39'**  - i.e. Do not show these categories

##### Attribute:
**include**
An a string of comma-separated category ids to exclude. e.g.
*   **0** - Default
*   **'1,20,39'**  - i.e. Show only these categories

e.g. `[catposts orderby='id' exclude='1,20,39']`

#### These attributes affect post titles only

##### Attribute:
**post_order** 
*   **DESC** - Default
*   **ASC**

##### Attribute:
 **post_orderby** the default is **‘date’** it can be set to:

*   **‘ID’** – Order by post id. Note the capitalization.
*   **‘author’** – Order by author.
*   **‘title’ ** – Order by title.
*   **‘name’** – Order by post name
*   **‘date’** – Order by date.
*   **‘modified’** – Order by last modified date.
*   **‘rand’** – Random order.
*   **‘comment_count’** – Order by number of comments

#### HTML Output
____

CSS classes are included but not styled by the plugin
`h3.cat-titles`
`li.post-titles`

```HTML
<ul class="catposts">
    <li>
        <h3 class="cat-titles">
            <a href="http://wpsite.co/?cat=20">Edge Case</a>
        </h3>
        <ul>
            <li class="post-titles">
                <a href="http://wpsite.co/?p=1000">Nested And Mixed Lists</a>
            </li>
            <li class="post-titles">
                <a href="http://wpsite.co/?p=1151">Many Tags</a>
            </li>
        </ul>
    </li>
    <li>
        <h3 class="cat-titles">
            <a href="http://wpsite.co/?cat=5">Arrangement</a>
        </h3>
        <ul>
            <li class="post-titles">
                <a href="http://wpsite.co/?p=1152">Many Categories</a>
            </li>
        </ul>
    </li>
</ul>
```
## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## License

Copyright (C) 2015  Rew Rixom  (email : rew@rixom.org)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA