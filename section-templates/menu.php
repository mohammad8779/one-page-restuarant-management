<?php 
global $mealp_section_id;

$mealp_section = get_post($mealp_section_id);
$mealp_section_title = $mealp_section->post_title;
$mealp_section_description = $mealp_section->post_content;
?>

<div class="section bg-light"  data-aos="fade-up" id="<?php echo esc_attr($mealp_section->post_name);?>">
<div class="container">
<div class="row section-heading justify-content-center mb-5">
<div class="col-md-8 text-center">

	<h2 class="heading mb-5"><?php echo esc_html($mealp_section_title);?></h2>
	<?php echo apply_filters('the_content',$mealp_section_description);?>

</div>
</div>
<div class="row justify-content-center">
<div class="col-md-8">
<ul class="nav site-tab-nav" id="pills-tab" role="tablist">
   <?php 
      $mealpcounter = 0;
      $mealp_featured_categories = get_terms(array(
           
           'taxonomy' => 'category',
           'meta_key'  => 'mealp-tax-featured',
           'meta_value'=>'a:1:{s:8:"featured";b:1;}'

      ));
      if($mealp_featured_categories): 
      	  
      	  foreach($mealp_featured_categories as $mealp_featured_category):
      	  	$mealpcounter++;
   ?>
    <li class="nav-item">
        <a class="nav-link <?php if($mealpcounter == 1) {echo 'active';}?>" id="pills-breakfast-tab" data-toggle="pill"
           href="#pills-<?php echo esc_attr($mealp_featured_category->name);?>" role="tab" aria-controls="pills-<?php echo esc_attr($mealp_featured_category->name);?>"
           aria-selected="<?php if($mealpcounter == 1) {echo 'true';}?>"><?php echo esc_attr($mealp_featured_category->name);?></a>
    </li>

    <?php 
	       endforeach;
	   endif;
    ?>

    
</ul>


<div class="tab-content" id="pills-tabContent">
	<?php 
	  $mealpcounter = 0;
	  foreach($mealp_featured_categories as $mealp_featured_category):
	  	$mealpcounter++;

     ?>
    <div class="tab-pane fade show <?php if($mealpcounter == 1){echo 'active';}?>" id="pills-<?php echo esc_attr($mealp_featured_category->name);?>" role="tabpanel"
         aria-labelledby="pills-<?php echo esc_attr($mealp_featured_category->name);?>-tab">
        

        <?php 
          $mealpr_arguments = array(
               'post_type' => 'recipe',
               'posts_per_page' => -1,
               'tax_query' => array(
                   array(
                     
                      'taxonomy' => 'category',
                      'field'    => 'slug',
                      'terms'    => $mealp_featured_category->name

                   )
               )
          );

          $mealp_featured_recipe = new WP_Query($mealpr_arguments);
          while($mealp_featured_recipe->have_posts() ):
          	$mealp_featured_recipe->the_post();
        ?>
        <div class="d-block d-md-flex menu-food-item">

            <div class="text order-1 mb-3">
                <?php the_post_thumbnail(array('100','100' ));?>
                <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
                <?php the_excerpt();?>
            </div>
            <div class="price order-2">
                <strong>$
                	<?php
                	$mealp_recipe_meta = get_post_meta(get_the_ID(), 'mealp-recipe',true);
                	   echo $mealp_recipe_meta['price'];
                	?>

                </strong>
            </div>
        </div> <!-- .menu-food-item -->
		
		<?php  endwhile;?>
    <?php wp_reset_query();?>
       

    </div>
    <?php endforeach;?>
</div>


</div>

</div>
</div>
</div> <!-- .section -->