<?php 

function mealp_banner_section_metabox($metabox){
	

		$section_id = 0;
		if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
	        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	    }
	    if('section' != get_post_type($section_id)){
			return $metabox;
		}
        $section_meta = get_post_meta($section_id,'mealp-section-type',true);
        $section_type = $section_meta['type'];
	    if('banner'!= $section_type ){
	    	return $metabox;
	    }
	    
	    

	    $metabox[] = array(

	        'id'    => 'mealp-section-banner',
	        'title' => __('Banner Settings','mealpractice'),
	        'post_type' => 'section',
	        'context' => 'normal',
	        'priority' => 'default',
	        'sections' => array( 

	            array(

	                'id' => 'mealp-banner-section-one',
	                'icon' => 'fa fa-image',
	                'name' => '',
	                'fields' => array(
	                array(
	    
	                    'id' => 'banner_image',
	                    'title' => __('Upload Banner Image','mealpractice'),
	                    'type' => 'image',
	                    ),

	                array(
	    
	                    'id' => 'button_title',
	                    'title' => __('Button Title','mealpractice'),
	                    'type' => 'text',
	                    ),

	                array(
	    
	                    'id' => 'button_target',
	                    'title' => __('Button Target','mealpractice'),
	                    'type' => 'text',
	                    )
	                )
	             )
	        )

	      );
	      return $metabox;
};

add_filter('cs_metabox_options','mealp_banner_section_metabox');

 ?>
