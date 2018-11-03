<?php

function mealp_featured_section_metabox($metabox) {

  $section_id = 0;

  if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
          $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
      }

      if('section' != get_post_type($section_id)){
      return $metabox;
    }
    
    $section_meta = get_post_meta($section_id,'mealp-section-type',true);
    $section_type = $section_meta['type'];
      if('featured'!= $section_type ){
        return $metabox;
  }

    $metabox[] = array(

        'id'    => 'mealp-section-featured',
        'title' => __('Featured Recipes','mealpractice'),
        'post_type' => 'section',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array( 

            array(

                'id' => 'mealp-recipe-section-one',
                'icon' => 'fa fa-image',
                'name' => '',
                'fields' => array(
                array(
    
                    'id' => 'recipes',
                    'title' => __('Select Recipe','mealpractice'),
                    'type' => 'group',
                    'button_title'    => __('New Recipe','mealpractice'),
                    'accordion_title' => __('Add New Recipe','mealpractice'),
                    'fields' => array(
                        array(

                           'id' => 'recipe',
                           'title' => __('Select Recipe','mealpractice'),
                           'type' => 'select',
                           'options' =>'post',
                           'query_args' => array(
                               'post_type'=> 'recipe',
                               'posts_per_page' => -1,
                           )

                        )
                    )
                        
    
                 )
             )


        )
      )
     );

     return $metabox;
};

add_filter('cs_metabox_options','mealp_featured_section_metabox');