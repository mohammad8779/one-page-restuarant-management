<?php 

function mealp_gallery_section_metabox($metabox){
	

		$section_id = 0;
		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
	        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	    }
	    if('section' != get_post_type($section_id)){
			return $metabox;
		}
        $section_meta = get_post_meta($section_id,'mealp-section-type',true);
        $section_type = $section_meta['type'];
	    if('gallery'!= $section_type ){
	    	return $metabox;
	    }
	    
	    

	    $metabox[] = array(

	        'id'    => 'mealp-section-gallery',
	        'title' => __('Gallery Settings','mealpractice'),
	        'post_type' => 'section',
	        'context' => 'normal',
	        'priority' => 'default',
	        'sections' => array( 

	            array(

	                'id' => 'mealp-gallery-section-one',
	                'icon' => 'fa fa-image',
	                'name' => '',
	                'fields' => array(

	                	array(
		    
		                    'id' => 'nimage',
		                    'title' => __('Number Of Images','mealpractice'),
		                    'type' => 'text',
		                    'default' => 5
		                    ),


	                array(
	                  'id'              => 'portfolio',
					  'type'            => 'group',
					  'title'           => __('Portfolio','mealpractice'),
					  'button_title'    => __('New Image ','mealpractice'),
					  'accordion_title' => __('Add New Image','mealpractice'),
					  'fields' => array(

					  		 array(
		    
		                    'id' => 'title',
		                    'title' => __('Image Title','mealpractice'),
		                    'type' => 'text',
		                    ),

						  	array(
		    
		                    'id' => 'image',
		                    'title' => __('Image','mealpractice'),
		                    'type' => 'image',
		                    ),

		                   

			                array(
			    
			                    'id' => 'categories',
			                    'title' => __('Categories','mealpractice'),
			                    'type' => 'text',
			                )
		                 )

	                   ),

	                
	                )
	             )
	        )

	      );
	      return $metabox;
};

add_filter('cs_metabox_options','mealp_gallery_section_metabox');

 ?>

