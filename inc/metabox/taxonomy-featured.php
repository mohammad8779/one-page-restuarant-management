<?php

function mealp_featured_category($metabox){
	$metabox[] = array(
        'id' => 'mealp-tax-featured',
        'taxonomy' => 'category',
        'fields' => array(
           
           array(
               'id' => 'featured',
               'type' => 'switcher',
               'title'=>__('Featured','mealpractice') 
           )
        )
	);

	return $metabox;
}
add_filter('cs_taxonomy_options','mealp_featured_category');