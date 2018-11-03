 <?php 
   global $mealp_section_id;
   $mealp_section_meta = get_post_meta($mealp_section_id, 'mealp-section-featured', true);
   $mealp_section = get_post($mealp_section_id);
   $mealp_section_title = $mealp_section->post_title;
   $mealp_section_description = $mealp_section->post_content;
 ?>

<div class="section" data-aos="fade-up" id="<?php echo esc_attr($mealp_section->post_name);?>">
<div class="container">
    <div class="row section-heading justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <h2 class="heading mb-3"><?php echo esc_html($mealp_section_title);?></h2>
            <p class="sub-heading mb-5">
                <?php echo wp_kses_post($mealp_section_description);?>
            </p>
        </div>
    </div>
    <div class="row">

        <?php 
           
           $mealp_section_recipe = $mealp_section_meta['recipes'];
           
           
           $mealp_recipe_one = get_post($mealp_section_recipe[1]['recipe']);
           $mealp_recipe_two = get_post($mealp_section_recipe[2]['recipe']);
           $mealp_recipe_three = get_post($mealp_section_recipe[3]['recipe']);
           
           ?>

        <div class="ftco-46">
            <div class="ftco-46-row d-flex flex-column flex-lg-row">
                <div class="ftco-46-image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url($mealp_recipe_one, 'large'));?>);"></div>
                <div class="ftco-46-text ftco-46-arrow-left">
                    <h4 class="ftco-46-subheading"><?php echo esc_html(get_recipe_category($mealp_recipe_two->ID));?></h4>
                    <h3 class="ftco-46-heading"><?php echo esc_html($mealp_recipe_two->post_title);?></h3>
                    <p class="mb-5"> <?php echo esc_html($mealp_recipe_two->post_excerpt);?> </p>
                    <p><a href="<?php echo get_the_permalink($mealp_recipe_two);?>" class="btn-link"><?php _e("Learn More","mealpractice");?> <span
                            class="ion-android-arrow-forward"></span></a></p>
                </div>
                <div class="ftco-46-image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url($mealp_recipe_three, 'large'));?>);"></div>
            </div>

            <div class="ftco-46-row d-flex flex-column flex-lg-row">
                <div class="ftco-46-text ftco-46-arrow-right">
                    <h4 class="ftco-46-subheading"><?php echo esc_html(get_recipe_category($mealp_recipe_one->ID));?></h4>
                    <h3 class="ftco-46-heading"><?php echo esc_html($mealp_recipe_one->post_title);?></h3>
                    <p class="mb-5"><?php echo esc_html($mealp_recipe_one->post_excerpt);?></p>
                    <p><a href="<?php echo get_the_permalink($mealp_recipe_one);?>" class="btn-link"><?php _e("Learn More","mealpractice");?> <span
                            class="ion-android-arrow-forward"></span></a></p>
                </div>
                <div class="ftco-46-image" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url($mealp_recipe_two, 'large'));?>);"></div>
                <div class="ftco-46-text ftco-46-arrow-up">
                    <h4 class="ftco-46-subheading"><?php echo esc_html(get_recipe_category($mealp_recipe_three->ID));?></h4>
                    <h3 class="ftco-46-heading"><?php echo esc_html($mealp_recipe_three->post_title);?></h3>
                    <p class="mb-5"><?php echo esc_html($mealp_recipe_three->post_excerpt);?></p>
                    <p><a href="<?php echo get_the_permalink($mealp_recipe_three);?>" class="btn-link"><?php _e("Learn More","mealpractice");?> <span
                            class="ion-android-arrow-forward"></span></a></p>
                </div>
            </div>
        </div>

    </div>
</div>
</div> <!-- .section -->