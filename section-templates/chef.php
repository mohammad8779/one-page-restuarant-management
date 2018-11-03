<?php 
   global $mealp_section_id;
   $mealp_section_meta = get_post_meta($mealp_section_id, 'mealp-section-chef', true);
   $mealp_section = get_post($mealp_section_id);
   $mealp_section_title = $mealp_section->post_title;
   $mealp_section_description = $mealp_section->post_content;
 ?>

<div class="section bg-white" data-aos="fade-up" id="<?php echo esc_attr($mealp_section->post_name);?>">
<div class="container">
<div class="row mb-5">
    <div class="col-md-12 section-heading text-center">
    	 <h2 class="heading mb-5"><?php echo esc_html($mealp_section_title);?></h2>
         <?php echo apply_filters('the_content',$mealp_section_description);?>
        
    </div>
</div>

<?php 
  $mealp_chefs = $mealp_section_meta['chef'];

  if($mealp_chefs):
  	
?>


<div class="row">

	<?php 
	   foreach($mealp_chefs as $mealp_chef):

	   $mealp_chef_image = wp_get_attachment_image_src($mealp_chef['image'], 'medium');
   ?>
    <div class="col-md-6 pr-md-5 text-center mb-5">
        <div class="ftco-38">
            <div class="ftco-38-img">
                <div class="ftco-38-header">
                    <img src="<?php echo esc_url($mealp_chef_image[0]);?>"
                         alt="Free Website Template for Restaurants by Free-Template.co">
                    <h3 class="ftco-38-heading"><?php echo esc_html($mealp_chef['name']);?></h3>
                    <p class="ftco-38-subheading"><?php echo esc_html($mealp_chef['title']);?></p>
                </div>
                <div class="ftco-38-body">
                    <?php echo apply_filters('the_content',$mealp_chef['bio']);?>

                    <?php if($mealp_chef['social-profile']):?>
                    <p>
                        <a href="<?php echo esc_attr($mealp_chef['social-profile']['facebook']);?>" class="p-2"><span class="fa fa-facebook"></span></a>
                        <a href="<?php echo esc_attr($mealp_chef['social-profile']['twitter']);?>" class="p-2"><span class="fa fa-twitter"></span></a>
                        <a href="<?php echo esc_attr($mealp_chef['social-profile']['instagram']);?>" class="p-2"><span class="fa fa-instagram"></span></a>
                    </p>
                     <?php endif;?>
                </div>
            </div>
        </div>
    </div>
   <?php endforeach;?>
</div>
<?php endif;?>
</div>
</div> <!-- .section -->