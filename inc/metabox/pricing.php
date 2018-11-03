<?php

function mealp_pricing_metabox($metabox) {

  $page_id = 0;

    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta($page_id,'_wp_page_template',true);
    
    if(!in_array($current_page_template,array('page-templates/pricing.php'))){

      return $metabox;
    }

    $metabox[] = array(

        'id'    => 'mealp-pricing-options',
        'title' => __('Pricing Options','mealpractice'),
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array( 

            array(

                'id' => 'mealp-pricing-section-one',
                'icon' => 'fa fa-image',
                'name' => '',
                'fields' => array(
                array(
                    'id' => 'plan-one-title',
                    'title' => __('Plan One Title','mealpractice'),
                    'type' => 'text',
                 ),
                 array(
                    'id' => 'plan-two-title',
                    'title' => __('Plan Two Title','mealpractice'),
                    'type' => 'text',
                 ),
                 array(
                    'id' => 'plan-one-action',
                    'title' => __('Plan One Action Url','mealpractice'),
                    'type' => 'text',
                 ),
                 array(
                    'id' => 'plan-two-action',
                    'title' => __('Plan Two Action Url','mealpractice'),
                    'type' => 'text',
                 ),

                 array(
                    'id' => 'items',
                    'title' => __('Items','mealpractice'),
                    'type' => 'textarea',
                 ),
                 array(
                    'id' => 'plan-one-items',
                    'title' => __('Plan One Items','mealpractice'),
                    'type' => 'textarea',
                 ),
                  array(
                    'id' => 'plan-two-items',
                    'title' => __('Plan Two Items','mealpractice'),
                    'type' => 'textarea',
                 )
             )


        )
      )
     );

     return $metabox;
};

add_filter('cs_metabox_options','mealp_pricing_metabox');