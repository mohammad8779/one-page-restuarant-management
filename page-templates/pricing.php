<?php
/**
 * Template Name: Pricing Plan
 */
get_header();

$section_id = 134;
get_template_part( "section-templates/banner" );
the_post();
?>

<?php
  $mealp_pricing_meta = get_post_meta(get_the_ID(),'mealp-pricing-options',true);
  $mealp_pricing_items = explode("\n",$mealp_pricing_meta['items']);
  $mealp_pricing_one_items = explode("\n",$mealp_pricing_meta['plan-one-items']);
  $mealp_pricing_two_items = explode("\n",$mealp_pricing_meta['plan-two-items']);
?>
<div class="main-wrap" id="section-home">
<div <?php post_class( 'single-post' ) ?>>
<div class="container">
<div class="row post-body">
<div class="col-md-12">
    <h1><?php the_title(); ?></h1>
	<?php
	the_content();
	?>
</div>

<div class="col-md-12">
<!-- section start-->
<section class="section-gap">
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="table-responsive">
                <table class="table table-bordered price-plan">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"><?php echo esc_html($mealp_pricing_meta['plan-one-title']);?></th>
                        <th scope="col"><?php echo esc_html($mealp_pricing_meta['plan-two-title']);?></th>
                    </tr>
                    </thead>
                    <tbody>

                        <?php 
                           $mealp_counter = 0;
                           foreach($mealp_pricing_items as $mealp_pricing_item):
                            $mealp_plan_one_data = apply_filters('mealp_pricing_item',$mealp_pricing_one_items[$mealp_counter]);
                             $mealp_plan_two_data = apply_filters('mealp_pricing_item',$mealp_pricing_two_items[$mealp_counter]);
                        ?>
					
                        <tr>
                            <td><strong>
                                <?php echo esc_html( $mealp_pricing_item);?>
                            </strong>
                            </td>
                            <td><?php echo wp_kses_post($mealp_plan_one_data); ?></td>
                            <td><?php echo wp_kses_post($mealp_plan_two_data); ?></td>
                         </tr>

                        <?php 
                           $mealp_counter++;
                           endforeach;
                        ?>

						
                    <tr>
                        <td>
                            <strong><?php _e('Action', 'mealpractice');?></strong>
                        </td>
                        <td>
                            <a href="<?php echo esc_url($mealp_pricing_meta['plan-one-action']);?>"
                               class="btn btn-danger"><?php _e('Get This Plan', 'mealpractice');?></a>
                        </td>
                        <td>
                            <a href="<?php echo esc_url($mealp_pricing_meta['plan-two-action']);?>"
                               class="btn btn-danger">
                                
                            <?php _e('Get This Plan', 'mealpractice');?></a>
                        </td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
<!-- section end-->
</div>
</div>
</div>
</div>
</div>
<?php
get_footer();
?>
