<?php 
   global $mealp_section_id;
   $mealp_section_meta = get_post_meta($mealp_section_id, 'mealp-section-services', true);
   $mealp_section = get_post($mealp_section_id);
   $mealp_section_title = $mealp_section->post_title;
   $mealp_section_description = $mealp_section->post_content;
 ?>

<div class="section bg-white services-section" data-aos="fade-up" id="<?php echo esc_attr($mealp_section->post_name);?>">
<div class="container">
<div class="row section-heading justify-content-center mb-5">
    <div class="col-md-8 text-center">
    	<h2 class="heading mb-5"><?php echo esc_html($mealp_section_title);?></h2>
		 <?php echo apply_filters('the_content',$mealp_section_description);?>
       
        
    </div>
</div>

<?php 
   $mealp_services = $mealp_section_meta['services'];

   if($mealp_services):
?>
<div class="row">
     
     <?php 
         foreach( $mealp_services as $mealp_service):
     ?>
    <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="media feature-icon d-block text-center">
            <div class="icon">
                <span class="<?php echo esc_html($mealp_service['icon']);?>"></span>
            </div>
            <div class="media-body">
                <h3><?php echo esc_html($mealp_service['name']);?></h3>
                <?php 
                    echo apply_filters('the_content', $mealp_service['description'])
                ?>
            </div>
        </div>
    </div>
 <?php endforeach;?>
   
   <?php endif;?>

</div>
</div>
</div> <!-- .section -->
