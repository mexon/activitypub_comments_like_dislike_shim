# activitypub_comments_like_dislike_shim

Shim to connect ActivityPub plugin to Comments Like Dislike plugin

This plugin allows "like" and "unlike" reactions from ActivityPub to show up on a Wordpress blog.

*This plugin is just a proof of concept, do not use it.*

To use this, you need to install [the Comments Like Dislike plugin](https://en-ca.wordpress.org/plugins/comments-like-dislike/) and [the ActivityPub plugin](https://wordpress.org/plugins/activitypub/).  You then need to patch the Comments Like Dislike plugin with the supplied patch, like this:

    $ svn patch comments_like_dislike_cld_ajax_php.patch
    U         trunk/inc/classes/cld-ajax.php
