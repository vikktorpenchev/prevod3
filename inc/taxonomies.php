<?php

/**********					REGISTERING TAXONOMIES					*********/
add_action('init', 'band_init');

function band_init() {
    if (!is_taxonomy('band')) {
        register_taxonomy(
			'band',
			'post',
			array(
				'hierarchical' => FALSE,
				'label' => 'Band',
				'public' => TRUE,
				'show_ui' => TRUE,
				'query_var' => TRUE,
				'rewrite' => TRUE
			)
		);
    }
}

add_action('init', 'album_init');
function album_init() {
    if (!is_taxonomy('album')) {
        register_taxonomy( 'album', 'post',
                   array(   'hierarchical' => FALSE, 'label' => 'Album', 
                        'public' => TRUE, 'show_ui' => TRUE,
                        'query_var' => TRUE,
                        'rewrite' => TRUE ) );
    }
}

add_action('init', 'year_init');
function year_init() {
    if (!is_taxonomy('year')) {
        register_taxonomy( 'year', 'post',
                   array(   'hierarchical' => FALSE, 'label' => 'Year', 
                        'public' => TRUE, 'show_ui' => TRUE,
                        'query_var' => TRUE,
                        'rewrite' => TRUE ) );
    }
}

add_action('init', 'people_init');
function people_init() {
    if (!is_taxonomy('people')) {
        register_taxonomy( 'people', 'post',
                   array(   'hierarchical' => FALSE, 'label' => 'People', 
                        'public' => TRUE, 'show_ui' => TRUE,
                        'query_var' => TRUE,
                        'rewrite' => TRUE ) );
    }
}


add_filter('post_link', 'band_permalink', 10, 3);
add_filter('post_type_link', 'band_permalink', 10, 3);
 
function band_permalink($permalink, $post_id, $leavename) {
    if (strpos($permalink, '%band%') === FALSE) return $permalink;
     
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;
 
        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'band');   
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0])) $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'unknown';
 
    return str_replace('%band%', $taxonomy_slug, $permalink);
}