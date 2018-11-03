<?php 

function mealp_chef_section_metabox($metabox){
	

		$section_id = 0;
		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
	        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	    }
	    if('section' != get_post_type($section_id)){
			return $metabox;
		}
        $section_meta = get_post_meta($section_id,'mealp-section-type',true);
        $section_type = $section_meta['type'];
	    if('chef'!= $section_type ){
	    	return $metabox;
	    }
	    
	    

	    $metabox[] = array(

	        'id'    => 'mealp-section-chef',
	        'title' => __('Chef Settings','mealpractice'),
	        'post_type' => 'section',
	        'context' => 'normal',
	        'priority' => 'default',
	        'sections' => array( 

	            array(

	                'id' => 'mealp-chef-section-one',
	                'icon' => 'fa fa-image',
	                'name' => '',
	                'fields' => array(

	                array(
	                  'id'              => 'chef',
					  'type'            => 'group',
					  'title'           => __('Chef','mealpractice'),
					  'button_title'    => __('New Chef','mealpractice'),
					  'accordion_title' => __('Add New Chef','mealpractice'),
					  'fields' => array(

					  	    array(
		    
		                    'id' => 'name',
		                    'title' => __('Chef Name','mealpractice'),
		                    'type' => 'text',
		                    ),

						  	array(
		    
		                    'id' => 'image',
		                    'title' => __('Image','mealpractice'),
		                    'type' => 'image',
		                    ),

		                   

			                array(
			    
			                    'id' => 'title',
			                    'title' => __('Chef Title','mealpractice'),
			                    'type' => 'text',
			                ),

			                array(
			    
			                    'id' => 'bio',
			                    'title' => __('Chef Description','mealpractice'),
			                    'type' => 'textarea',
			                ),

			                array(
							  'id'        => 'social-profile',
							  'type'      => 'fieldset',
							  'title' => __('Chef Social Links','mealpractice'),
							  'fields'    => array(

							    array(
							      'id'    => 'facebook',
							      'type'  => 'text',
							      'title' => __('Facebook Links','mealpractice'),
							    ),
							    array(
							      'id'    => 'twitter',
							      'type'  => 'text',
							      'title' => __('Twitter Links','mealpractice'),
							    ),
							    array(
							      'id'    => 'instagram',
							      'type'  => 'text',
							      'title' => __('Instagram Links','mealpractice'),
							    ),

							    

							    

							  )
							)

		                 )

	                   ),

	                
	                )
	             )
	        )

	      );
	      return $metabox;
};

add_filter('cs_metabox_options','mealp_chef_section_metabox');

 ?>

