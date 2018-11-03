<?php
//include codestar framwork
require_once get_theme_file_path("/lib/csf/cs-framework.php");
//include mealp section metabox
require_once get_theme_file_path("/inc/metabox/section.php");
require_once get_theme_file_path("/inc/metabox/recipe.php");
require_once get_theme_file_path("/inc/metabox/page.php");
require_once get_theme_file_path("/inc/metabox/pricing.php");
require_once get_theme_file_path("/inc/metabox/section-banner.php");
require_once get_theme_file_path("/inc/metabox/section-featured.php");
require_once get_theme_file_path("/inc/metabox/section-gallery.php");
require_once get_theme_file_path("/inc/metabox/section-chef.php");
require_once get_theme_file_path("/inc/metabox/section-services.php");
require_once get_theme_file_path("/inc/metabox/taxonomy-featured.php");


//constances for csf
 define('CS_ACTIVE_FRAMEWORK', false);
 define('CS_ACTIVE_METABOX', true);
 define('CS_ACTIVE_TAXONOMY', true);
 define('CS_ACTIVE_SHORTCODE', false);
 define('CS_ACTIVE_CUSTOMIZE', false);

 if ( site_url() == "http://localhost/meal-practice" ) {
  define( "VERSION", time() );
} else {
  define( "VERSION", wp_get_theme()->get( "Version" ) );
}

function mealpractice_theme_setup(){

  add_theme_support('post-thumbnails');
  add_theme_support( load_theme_textdomain('mealpractice'), get_template_directory()."/languages" );
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));

  register_nav_menu('primary',__('Main Menu','mealpractice'));


};
add_action('after_setup_theme','mealpractice_theme_setup');


//enqueue css and js files
function mealpractice_assets(){
  //css
 wp_enqueue_style("mealpractice-fonts","//fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700", null,'1.0');
  wp_enqueue_style("bootstrap", get_theme_file_uri("/assets/css/bootstrap.css"),null, '1.0');
  wp_enqueue_style("animate", get_theme_file_uri("/assets/css/animate.css"),null, '1.0');
  wp_enqueue_style("owl-carousel", get_theme_file_uri("assets/css/owl.carousel.min.css"),null, '1.0');
  wp_enqueue_style("magnific", get_theme_file_uri("/assets/css/magnific-popup.css"),null, '1.0');
  wp_enqueue_style("aos", get_theme_file_uri("/assets/css/aos.css"),null, '1.0');
  wp_enqueue_style("bootstrap-datepicker", get_theme_file_uri("/assets/css/bootstrap-datepicker.css"),null, '1.0');
  wp_enqueue_style("jquery-timepicker", get_theme_file_uri("/assets/css/jquery.timepicker.css"),null, '1.0');
  wp_enqueue_style("fonts-ionicons", get_theme_file_uri("/assets/fonts/ionicons/css/ionicons.min.css"),null, '1.0');
  wp_enqueue_style("fonts-fontawesome", get_theme_file_uri("/assets/fonts/fontawesome/css/font-awesome.min.css"),null, '1.0');
  wp_enqueue_style("fonts-flaticon", get_theme_file_uri("/assets/fonts/flaticon/font/flaticon.css"),null, '1.0');
  wp_enqueue_style("portfolio", get_theme_file_uri("/assets/css/portfolio.css"),null, '1.0');
  wp_enqueue_style("main-stylesheet", get_theme_file_uri("/assets/css/style.css"),null, '1.0');
  wp_enqueue_style("mealpractice-stylesheet",get_stylesheet_uri(),null,'1.0');

  //js
  
    
  wp_enqueue_script("popper-js", get_theme_file_uri("/assets/js/popper.min.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("bootstrap-js", get_theme_file_uri("/assets/js/bootstrap.min.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("owl-carousel-js", get_theme_file_uri("/assets/js/owl.carousel.min.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("jquery-waypoints-js", get_theme_file_uri("/assets/js/jquery.waypoints.min.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("jquery-magnific-popup-js", get_theme_file_uri("/assets/js/jquery.magnific-popup.min.js"), array('jquery'),"1.0", true);
  wp_enqueue_script("bootstrap-datepicker-js", get_theme_file_uri("/assets/js/bootstrap-datepicker.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("jquery-timepicker-js", get_theme_file_uri("/assets/js/jquery.timepicker.min.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("jquery-stellar-js", get_theme_file_uri("/assets/js/jquery.stellar.min.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("jquery-easing-js", get_theme_file_uri("/assets/js/jquery.easing.1.3.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("aos-js", get_theme_file_uri("/assets/js/aos.js"), array('jquery'),"1.0", true);
  
  wp_enqueue_script("imagesloaded-js", get_theme_file_uri("/assets/js/imagesloaded.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("isotope-js", get_theme_file_uri("/assets/js/isotope.pkgd.min.js"), array('jquery'),VERSION, true);
  wp_enqueue_script("maps-googleapis-js", "//maps.googleapis.com/maps/api/js?key=AIzaSyD1-dY3CyrhClGPQ263uo16RJ8RJxs4GGY", null,"1.0", true);
  
  wp_enqueue_script("portfolio-js", get_theme_file_uri("/assets/js/portfolio.js"), array('jquery','isotope-js','imagesloaded-js','jquery-magnific-popup-js'),VERSION, true);
  //for ajax loadmore of post
   wp_enqueue_script("mealp-loadmore-js", get_theme_file_uri("/assets/js/loadmore.js"), array('jquery'),VERSION, true);
 
   wp_enqueue_script("main-js", get_theme_file_uri("/assets/js/main.js"), array('jquery'),VERSION, true);

  //for ajax of reservation and contact section form
   wp_enqueue_script( 'mealp-reservation-js', get_template_directory_uri() .'/assets/js/reservation.js', array( 'jquery' ), VERSION, true );
  $ajaxurl = admin_url( 'admin-ajax.php' );
   wp_localize_script( 'mealp-reservation-js', 'mealpurl', array( 'ajaxurl' => $ajaxurl ) );
    wp_localize_script( 'portfolio-js', 'mealpurl', array( 'ajaxurl' => $ajaxurl ) );

   wp_enqueue_script( 'contact-js', get_template_directory_uri() .'/assets/js/contact.js', array( 'jquery' ), VERSION, true );
   $ajaxcontact = admin_url( 'admin-ajax.php' );
   wp_localize_script( 'contact-js', 'mealpcontacturl', array( 'ajaxcontact' => $ajaxcontact ) );


   //for mail chimp css and js files integration


  if(is_page_template('page-templates/mailchimp.php')){
    wp_enqueue_style('mailchimp-css','//cdn-images.mailchimp.com/embedcode/classic-10_7.css');
    $style = <<<EOD
#mc_embed_signup {
    background: #fff;
    clear: left;
    font: 14px Helvetica, Arial, sans-serif;
}
EOD;
    wp_add_inline_style('mailchimp-css',$style);

    wp_enqueue_script('mailchimp-js','//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js',array('jquery'),'1.0',true);
    $script = <<<EOD
(function ($) {
    window.fnames = new Array();
    window.ftypes = new Array();
    fnames[0] = 'EMAIL';
    ftypes[0] = 'email';
    fnames[1] = 'FNAME';
    ftypes[1] = 'text';
    fnames[2] = 'LNAME';
    ftypes[2] = 'text';
    fnames[3] = 'ADDRESS';
    ftypes[3] = 'address';
    fnames[4] = 'PHONE';
    ftypes[4] = 'phone';
}(jQuery));
var \$mcj = jQuery.noConflict(true);
EOD;

    wp_add_inline_script('mailchimp-js',$script);
}

 



  
  
  
};

add_action('wp_enqueue_scripts','mealpractice_assets');

//codestar framework init
function mealp_csf_metabox(){

  CSFramework_Metabox::instance(array());
  CSFramework_Taxonomy::instance(array());

}
add_action('init', 'mealp_csf_metabox');

//retrived category taxonomy 

function get_recipe_category($recipe_id){
  $terms = wp_get_post_terms($recipe_id,"category");
  if($terms){
     $first_term = array_shift($terms);
     return $first_term->name;
  }
  return "Food";
}

//send data in wp backend or admin panel from wp fortend form via ajax and wp

function mealp_process_reservation(){
 
  if(check_ajax_referer('reservation','rn')){

      $name = sanitize_text_field($_POST['name']);
      $email = sanitize_text_field($_POST['email']);
      $phone = sanitize_text_field($_POST['phone']);
      $persons = sanitize_text_field($_POST['persons']);
      $date = sanitize_text_field($_POST['date']);
      $time = sanitize_text_field($_POST['time']);

      $data = array(
          'name' => $name,
          'email' => $email,
          'phone' => $phone,
          'persons' => $persons,
          'date' => $date,
          'time' => $time
          
      );
      //print_r($data);

      $reservation_arguments = array(
           
           'post_type' => 'reservation',
           'post_author' => 1,
           'post_date' => date('Y-m-d H:i:s'),
           'post_status' => 'publish',
           'post_title' => sprintf('%s Reservation for %s persons on %s - %s', $name, $persons,$date." ",$time, $email),
           'meta_input' => $data
      );

      $check_reservations = new WP_Query( array(
            
            'post_type' => 'reservation',
            'post_status' => 'publish',
            'meta_query' => array(
                'relation' => 'AND',
                'check_email' => array(
                   'key' => 'email',
                   'value' => $email,
                 ),
                'check_date' => array(
                   'key' => 'date',
                   'value' => $date,
                 ),
                'check_time' => array(
                   'key' => 'time',
                   'value' => $time,
                 ),
            )
       ));

      if( $check_reservations->found_posts > 0 ){
         
         echo "Duplicate";

      }else{

          $wp_error = '';
          $reservation_id = wp_insert_post($reservation_arguments, $wp_error);
          
          //transient check
          $reservation_count = get_transient('res_count')? get_transient('res_count'):0;

          //transient check end

          if(!$wp_error){
            $reservation_count++;
            set_transient('res_count',$reservation_count,0);
            //order fields data
            $_name = explode(' ', $name);
            $order_data = array(
              'first_name' => $_name[0],
              'last_name'  => isset( $_name[1] ) ? $_name[1]:'',
              'email'      => $email,
              'phone'      => $phone
            );

            //order process
            $order = wc_create_order();
            $order->set_address($order_data);
            $order->add_product(wc_get_product(77),1 );
            $order->set_customer_note($reservation_id);
            $order->calculate_totals();
            add_post_meta($reservation_id,'order_id',$order->get_id());
            echo $order->get_checkout_payment_url();
          }
     }

}else{
    echo "Not allowed";
  }
   
  die();
};

add_action('wp_ajax_reservation', 'mealp_process_reservation');
add_action('wp_ajax_nopriv_reservation', 'mealp_process_reservation');


//for removing default woocommerce checkout fields
function mealp_checkout_fields($fields){

  //remove billing fields
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_state']);

 //removoe shipping fields
 unset($fields['shipping']['shipping_first_name']);
 unset($fields['shipping']['shipping_last_name']);
 unset($fields['shipping']['shipping_company']);
 unset($fields['shipping']['shipping_address_1']);
 unset($fields['shipping']['shipping_address_2']);
 unset($fields['shipping']['shipping_city']);
 unset($fields['shipping']['shipping_postcode']);
 unset($fields['shipping']['shipping_country']);
 unset($fields['shipping']['shipping_state']);

  //remove order comments fields
 unset($fields['order']['order_comments']);

 return $fields;


}
add_filter('woocommerce_checkout_fields','mealp_checkout_fields');

function mealp_order_status_processing( $order_id ){

     $order = wc_get_order( $order_id );
     $reservation_id = $order->get_customer_note();
     if( $reservation_id){

        $reservation = get_post($reservation_id);
        wp_update_post(array(
           
           'ID' => $reservation_id,
           'post_title' =>"[Paid] -".$reservation->post_title

        ));
        add_post_meta($reservation_id, 'Paid', 1);
     };


}
add_filter('woocommerce_order_status_processing','mealp_order_status_processing');


//change dashboard menu 

function mealp_change_menu($menu){
   $reservation_count = get_transient('res_count')?get_transient('res_count'):0;
   
   if($reservation_count > 0){

  $menu[5][0] = "Reservation<span class='awaiting-mod'> {$reservation_count} </span>";
  }
  return $menu;
}
add_filter('add_menu_classes','mealp_change_menu');

//delete transient from admin panel by admin_enqueue_scripts
function mealp_admin_scripts($screen){
  $_screen = get_current_screen();
  if('edit.php' == $screen && 'reservation'== $_screen->post_type){
     
     delete_transient('res_count');
  }
}
add_action('admin_enqueue_scripts','mealp_admin_scripts');


//contact info via ajax
function mealpcontact_info(){
  $name = isset($_POST['name'])?$_POST['name']:'';
  $email = isset($_POST['email'])?$_POST['email']:'';
  $phone = isset($_POST['phone'])?$_POST['phone']:'';
  $message = isset($_POST['message'])?$_POST['message']:'';

  $_message = sprintf(
    "%s \nForm: %s\nEmail: %s\nPhone: %s",$message,$name,$email, $phone);
  $admin_email = get_option('admin_email');
  wp_mail('matalukder94@gmail.com',__('Sometried to contact you','mealpractice'),$_message,"Form: matalukder94@gmail.com\r\n");
  die('successful');
}
add_action('wp_ajax_contact','mealpcontact_info');
add_action('wp_ajax_nopriv_contact','mealpcontact_info');


//for changing nav menu 
function mealp_change_nav_menu($menus){
  $string_to_replace = home_url("/")."section/";
  if(is_front_page()){

     foreach($menus as $menu){
        $new_url = str_replace($string_to_replace,"#",$menu->url );

        if($new_url != $menu->url){
          $new_url = rtrim($new_url, "/");
        }
        $menu->url = $new_url;

     }

  }
  return $menus;
}
add_filter('wp_nav_menu_objects','mealp_change_nav_menu');

//wordpress default comment form customize

function mealp_comment_fields($fields){
  /*echo "<pre>";
    print_r($fields);
  echo "</pre>";*/
  $comment_field = $fields['comment'];
  unset($fields['comment']);
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter('comment_form_fields', 'mealp_comment_fields');

//check for icon of pricing table
function mealp_process_pricing_item($item){
   if(trim($item) == '1'){
     return '<i class="fa fa-check plan-active-color fa-2x">';
   }else if(trim($item) == '0'){
    return '<i class="fa fa-ellipsis-h plan-inactive-color fa-2x">';
   }
   return $item;
}
add_filter('mealp_pricing_item','mealp_process_pricing_item');

//find out maximum page number

function get_max_page(){
  global $wp_query;
  return $wp_query->max_num_pages;
}

//portfolio loadmore button by ajax 
function mealp_portfolio_load_button(){
  //print_r($_POST);
   if(wp_verify_nonce($_POST['nonce'],'loadmorep')){
   $mealp_section_id = $_POST['sid'];
   $mealp_offset = $_POST['offset'];
   //$end_offset   = $start_offset + $mealp_number_of_images;
   $mealp_section_meta = get_post_meta($mealp_section_id, 'mealp-section-gallery', true); 
   
   $mealp_number_of_images = $mealp_section_meta['nimage'];
   $mealp_gallery_items = $mealp_section_meta['portfolio'];
   $mealp_gallery_items = array_slice($mealp_gallery_items,$mealp_offset);
   $mealp_image_counter = 0;

   echo "<div class='portfolio'>";
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
echo "</div>";
}
 die();
}
add_action("wp_ajax_loadmorep","mealp_portfolio_load_button");
add_action("wp_ajax_nopriv_loadmorep","mealp_portfolio_load_button");