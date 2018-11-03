<?php 

function mealp_recipe_metabox($metabox){

     $metabox[] = array(

        'id'    => 'mealp-recipe',
        'title' => __('Recipe Details','mealpractice'),
        'post_type' => 'recipe',
        'context' => 'normal',
        'priority' => 'default',
        'sections' => array(

            array(

                'name' => 'mealp-recipe-section-one',
                'icon' => 'fa fa-image',
                'name' => '',
                'fields' => array(
                    array(
    
                        'id' => 'price',
                        'title' => __('Price','mealpractice'),
                        'type' => 'text',
                        'default' => '0.0',
                        
                    )
                )


            )
            
       
        )

     );


     return $metabox;
  
};
add_filter('cs_metabox_options', 'mealp_recipe_metabox');

