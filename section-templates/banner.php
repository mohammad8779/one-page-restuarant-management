 <?php 
   global $mealp_section_id;
   
   $mealp_section_meta = get_post_meta($mealp_section_id, 'mealp-section-banner', true);
   $mealp_banner_image = get_template_directory_uri()."/assets/images/slider-1.jpg";
   if(isset($mealp_section_meta['banner_image'])){
      $mealp_banner_image = wp_get_attachment_image_src( $mealp_section_meta['banner_image'],'full');
   }
   $mealp_section = get_post($mealp_section_id);
   $mealp_section_title = $mealp_section->post_title;
   $mealp_section_description = $mealp_section->post_content;
 ?>

 <div class="cover_1 overlay bg-slant-white bg-light" id="<?php echo esc_attr($mealp_section->post_name);?>">
            <div class="img_bg" style="background-image: url(<?php echo esc_url($mealp_banner_image[0]); ?>);" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">
                        <div class="col-md-10" data-aos="fade-up">
                            <h2 class="heading mb-5">
                                <?php 
                                   echo esc_html(
                                      $mealp_section_title
                                   );
                                ?>
                            </h2>

                             <p class="sub-heading mb-5">
                               <?php echo wp_kses_post($mealp_section_description);
                                ?>
                             </p>

                            <?php 
                            /*
                               $description = apply_filters( 'the_content',$mealp_section_description);
                               $description = str_replace('<p', '<p class="sub-heading mb-5"',  $description );
                               echo wp_kses_post($description); */
                            ?>
                            <p>
                                <a href="<?php echo esc_url($mealp_section_meta['button_target']); ?>" class="smoothscroll btn btn-outline-white px-5 py-3">
                                    <?php echo esc_html($mealp_section_meta['button_title']); ?>
                               </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
</div> <!-- .cover_1 -->