# Category-Post-Lists
A super simple WordPress plugin that prints out, from a shortcode, a list of linked category titles and a nested list of related published list of linked post titles

Use the following shortcode: `[catposts]`

The shortcode has the following attributes:

orderby='name' OR 'id' OR 'count' OR 'slug'
hide_empty=1 OR 0
order='DESC' OR 'ASC'
exclude='0' OR '1,20,39'
include='' OR '1,20,39'

eg: `[catposts orderby='id' exclude='1,20,39']`

The list has the class: .catposts

The posts are sorted by date published. 
