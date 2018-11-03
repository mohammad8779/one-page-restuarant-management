<?php 
   global $mealp_section_id;
   $mealp_section_meta = get_post_meta($mealp_section_id, 'mealp-section-gallery', true);
   $mealp_section = get_post($mealp_section_id);
   $mealp_section_title = $mealp_section->post_title;
   $mealp_section_description = $mealp_section->post_content;
 ?>

 <div class="section pb-3 bg-white" data-aos="fade-up" id="<?php echo esc_attr($mealp_section->post_name);?>">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 col-lg-8 section-heading">
                        <h2 class="heading mb-5"><?php echo esc_html($mealp_section_title);?></h2>
                        <?php echo apply_filters('the_content',$mealp_section_description);?>
                    </div>
                </div>
            </div>
 </div> <!-- .section -->

 <?php 
   
 $mealp_gallery_items = $mealp_section_meta['portfolio'];
 $mealp_item_categories = [];
 $mealp_number_of_images = $mealp_section_meta['nimage'];
 $mealp_image_counter = 0;


 foreach( $mealp_gallery_items as $mealp_gallery_item ){
    
    if($mealp_image_counter >= $mealp_number_of_images){
       break;
    }
    $mealp_gallery_item_categories  = explode(",", $mealp_gallery_item["categories"]);

    foreach($mealp_gallery_item_categories as $mealp_gallery_item_category){

      $mealp_gallery_item_category = trim($mealp_gallery_item_category);
      if (!in_array($mealp_gallery_item_category,$mealp_item_categories)) {
         
         array_push($mealp_item_categories,$mealp_gallery_item_category);
      }

    }

    $mealp_image_counter++;

  }

   

?>

 <div class="section bg-white pt-2 pb-2 text-center" data-aos="fade">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="text-center">
                  <ul class="portfolio-filter text-center">
                      <li class="active"><a href="#" data-filter="*"> <?php
                       _e('All', 'mealpractice');?></a></li>

                       <?php
                          foreach ($mealp_item_categories as $mealp_item_category):?>

                         <li><a href="#" data-filter=".<?php echo esc_attr($mealp_item_category);?>">
                           <?php echo esc_html($mealp_item_category);?>
                         </a></li>

                      <?php endforeach;?>

                     
                  </ul>
              </div>
              <?php 
                    wp_nonce_field('loadmorep','loadmorep');
              ?>

              <div class="portfolio-grid portfolio-gallery grid-4 gutter"
              data-images="<?php echo esc_attr($mealp_number_of_images);?>"
              data-sid="<?php echo esc_attr($mealp_section_id);?>"
              data-ni="<?php echo esc_attr($mealp_number_of_images);?>"
              >
                 
                 <?php 
                   $mealp_image_counter = 0;
                   foreach( $mealp_gallery_items as  $mealp_gallery_item):
                      
                   if($mealp_image_counter >= $mealp_number_of_images){
                       break;
                    }

                      $mealp_item_class = str_replace(',', '', $mealp_gallery_item['categories'] );
                      $mealp_item_image_id = $mealp_gallery_item['image'];
                      $mealp_item_thumbnail = wp_get_attachment_image_src($mealp_item_image_id,'medium');
                      $mealp_item_large = wp_get_attachment_image_src($mealp_item_image_id,'large');
                      $mealp_item_categories_array = explode(',', $mealp_gallery_item['categories']);
                  ?>
                  <div class="portfolio-item <?php echo esc_attr($mealp_item_class);?>">
                      <a href="<?php echo esc_attr($mealp_item_large[0]);?>" class="portfolio-image popup-gallery" title="Bread">
                          <img src="<?php echo esc_url($mealp_item_thumbnail[0]);?>" alt=""/>
                          <div class="portfolio-hover-title">
                              <div class="portfolio-content">

                                  <h4><?php echo esc_html($mealp_gallery_item['title']);?></h4>

                                  <div class="portfolio-category">

                                      <?php 
                                         foreach($mealp_item_categories_array as $mealp_item_category):
                                          
                                          printf('<span>%s</span>', trim($mealp_item_category));
                                         
                                         endforeach;

                                      ?>

                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <?php 
                     $mealp_image_counter++;
                     endforeach;

                  ?> 
              
              </div>
              <button id="loadmorepb" class="btn btn-primary"><?php echo esc_html("Load More", "mealpractice");?></button>
          </div>
      </div>
  </div>
</div> <!-- .section -->