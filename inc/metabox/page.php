<?php

function mealp_section_metabox($metabox) {

  $page_id = 0;

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta($page_id,'_wp_page_template',true);
    
    if(!in_array($current_page_template,array('page-templates/landing.php'))){

      return $metabox;
    }

    $metabox[] = array(

        'id'    => 'mealp-page-section',
        'title' => __('Sections','mealpractice'),
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array( 

            array(

                'id' => 'mealp-page-section-section-one',
                'icon' => 'fa fa-image',
                'name' => '',
                'fields' => array(
                array(
    
                    'id' => 'sections',
                    'title' => __('Select Section Type','mealpractice'),
                    'type' => 'group',
                    'button_title'    => __('New Section','mealpractice'),
                    'accordion_title' => __('ADD New Section','mealpractice'),
                    'fields' => array(
                        array(

                           'id' => 'section',
                           'title' => __('Select Section','mealpractice'),
                           'type' => 'select',
                           'options' =>'post',
                           'query_args' => array(
                               'post_type'=> 'section',
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

add_filter('cs_metabox_options','mealp_section_metabox');