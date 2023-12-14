<?php
/**
* @package activitypub-comments-like-dislike-shim
* @version 0.1
*/
/*
Plugin Name: Activitypub Comments Like Dislike Shim
Plugin URI: https://github.com/mexon/activitypub_comments_like_dislike_shim
Description: Allows likes and dislikes from ActivityPub to be counted with local likes and dislikes
Version: 0.1
Author URI: http://mat.exon.name
*/

if (!class_exists('ActivityPub_CommentsLikeDislike_Shim')) {

    class ActivityPub_CommentsLikeDislike_Shim {

        function __construct() {
            add_action('activitypub_inbox_like', array($this, 'activitypub_inbox_like'), 10, 3);
        }

        function activitypub_inbox_like($data, $user_id, $activity) {
            $type = strtolower($data['type']);
            $query_result = \Activitypub\object_id_to_comment($data['object']);
            if ($query_result) {
                $comment_id = $query_result->comment_ID;
                do_action('cld_comment_add_like_dislike', $comment_id, $type);
            }
        }
    }
    
    new ActivityPub_CommentsLikeDislike_Shim();
}
