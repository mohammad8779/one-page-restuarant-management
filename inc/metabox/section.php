<?php 
//for section metabox by codestar framework
function mealp_section_type_metabox($metabox){

     $metabox[] = array(

        'id'    => 'mealp-section-type',
        'title' => __('Section Type','mealpractice'),
        'post_type' => 'section',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(

            array(

                'name' => 'mealp-section-type-section-one',
                'icon' => 'fa fa-image',
                'name' => '',
                'fields' => array(
                    array(
    
                        'id' => 'type',
                        'title' => __('Select Section Type','mealpractice'),
                        'type' => 'select',
                        'options' => array(
    
                            'banner' => __('Banner', 'mealpractice'),
                            'featured' => __('Featured Recipes', 'mealpractice'),
                            'gallery' => __('Gallery', 'mealpractice'),
                            'chef' => __('Chef', 'mealpractice'),
                            'menu' => __('Menu', 'mealpractice'),
                            'services' => __('Services', 'mealpractice'),
                            'reservation' => __('Reservation', 'mealpractice'),
                            'testimonial' => __('Testimonials', 'mealpractice'),
                            'contact' => __('Contact', 'mealpractice')
                         )
    
                    )
                )


            )
            
       
        )

     );


     return $metabox;
  
};
add_filter('cs_metabox_options', 'mealp_section_type_metabox');

