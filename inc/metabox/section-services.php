<?php 

function mealp_services_section_metabox($metabox){
	

		$section_id = 0;
		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
	        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	    }
	    if('section' != get_post_type($section_id)){
			return $metabox;
		}
        $section_meta = get_post_meta($section_id,'mealp-section-type',true);
        $section_type = $section_meta['type'];
	    if('services'!= $section_type ){
	    	return $metabox;
	    }
	    
	    

	    $metabox[] = array(

	        'id'    => 'mealp-section-services',
	        'title' => __('Services Settings','mealpractice'),
	        'post_type' => 'section',
	        'context' => 'normal',
	        'priority' => 'default',
	        'sections' => array( 

	            array(

	                'id' => 'mealp-services-section-one',
	                'icon' => 'fa fa-image',
	                'name' => '',
	                'fields' => array(

	                array(
	                  'id'              => 'services',
					  'type'            => 'group',
					  'title'           => __('Services','mealpractice'),
					  'button_title'    => __('New Services','mealpractice'),
					  'accordion_title' => __('Add New Service','mealpractice'),
					  'fields' => array(

						  	array(
		    
		                    'id' => 'name',
		                    'title' => __('Name','mealpractice'),
		                    'type' => 'text',
		                    ),

		                    array(
		    
		                    'id' => 'icon',
		                    'title' => __('Icon','mealpractice'),
		                    'type' => 'select',
		                    'options'=>array(
                                
                                'flaticon-chicken' => __('Cheicken','mealpractice'),
                                'flaticon-pancake' => __('Pancake','mealpractice'),
                                'flaticon-salad' => __('Salad','mealpractice'),
                                'flaticon-vegetables' => __('Vegetables','mealpractice'),
                                'flaticon-soup' => __('Soup','mealpractice'),
                                'flaticon-tray' => __('Tray','mealpractice'),
		                     )
		                    ),

			              
			                array(
			    
			                    'id' => 'description',
			                    'title' => __('Description','mealpractice'),
			                    'type' => 'textarea',
			                ),


		                 )

	                   ),

	                
	                )
	             )
	        )

	      );
	      return $metabox;
};

add_filter('cs_metabox_options','mealp_services_section_metabox');

 ?>

