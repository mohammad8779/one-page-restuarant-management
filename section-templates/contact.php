 <?php 
   global $mealp_section_id;
   $mealp_section_meta = get_post_meta($mealp_section_id, 'mealp-section-services', true);
   $mealp_section = get_post($mealp_section_id);
   $mealp_section_title = $mealp_section->post_title;
   $mealp_section_description = $mealp_section->post_content;
 ?>

<div class="section" data-aos="fade-up" id="<?php echo esc_attr($mealp_section->post_name);?>">
<div class="container">
<div class="row section-heading justify-content-center mb-5">
<div class="col-md-8 text-center">
    <h2 class="heading mb-5"><?php echo esc_html($mealp_section_title);?></h2>
    <?php echo apply_filters('the_content',$mealp_section_description);?>
   
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-10 p-5 form-wrap">
    <form action="#">
        <?php wp_nonce_field('contact','contact');?>
        <div class="row mb-4">
            <div class="form-group col-md-4">
                <label for="name" class="label"><?php _e('Name', 'mealpractice');?> </label>
                <div class="form-field-icon-wrap">
                    <span class="icon ion-android-person"></span>
                    <input type="text" class="form-control" id="cname">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="email" class="label"><?php _e('Email', 'mealpractice');?></label>
                <div class="form-field-icon-wrap">
                    <span class="icon ion-email"></span>
                    <input type="email" class="form-control" id="cemail">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="phone" class="label">Phone<?php _e('Phone', 'mealpractice');?></label>
                <div class="form-field-icon-wrap">
                    <span class="icon ion-android-call"></span>
                    <input type="text" class="form-control" id="cphone">
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="message" class="label"><?php _e('Message', 'mealpractice');?></label>
                <textarea name="message" id="cmessage" cols="30" rows="10"
                          class="form-control"></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <input type="submit" id="send-message" class="btn btn-primary btn-outline-primary btn-block"
                       value="Send Message">
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div> <!-- .section -->