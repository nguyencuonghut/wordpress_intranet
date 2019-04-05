<?php

add_action( 'admin_init', 'profitmag_action_convert_settings_to_customizer' );

/**
 * Options to customizer conversion.
 */
function profitmag_action_convert_settings_to_customizer(){

  $update_options = get_option('profitmag_options_to_customizer');
  if( 1 == absint($update_options) ) {
    return false;
  } else {

    // Valid nonce
    $old_options = get_option( 'profitmag_options' );
    $new_options = array();
    $keymaps = profitmag_conversion_keymaps();


    foreach($old_options as $key => $value) {
      
      if( in_array( $key, array('media_gallery', 'left_side_gallery', 'right_side_gallery') )) {
        $image_ids = array();
        if(! empty($value) ) {
          foreach ($value as $image_url) {
            $image_ids[] = profitmag_imgid_from_url($image_url);
          }
        }

        if(! empty($image_ids)) {
          $value = '[gallery ids="'. implode(',', $image_ids) .'"]';
        } else {
          $value = '';
        }
      }
      $new_options[$keymaps[$key]] = $value;
    }
    
    set_theme_mod( 'profitmag_theme_options', $new_options );
    
    // redirect to Customize page
    update_option( 'profitmag_options_to_customizer', '1' );
    wp_safe_redirect( admin_url( 'customize.php' ) );
    exit;

  }


}


/**
 * theme options to customizer settings mapping
 */
function profitmag_conversion_keymaps() {
  $keymaps = array(
    'responsive_design'             => 'profitmag_responsive_setting',
    'footer_copyright'              => 'profitmag_copyright_setting',    
    'webpage_layout'                => 'profitmag_layout_setting',
    'featured_block_beside'         => 'profitmag_fbxbesideslider_setting',
    'featured_block_one'            => 'profitmag_fbxone_setting',
    'no_of_block_one'               => 'profitmag_fbxonepostnum_setting',
    'featured_block_two'            => 'profitmag_fbxtwo_setting',
    'no_of_block_two'               => 'profitmag_fbxtwopostnum_setting',
    'featured_block_three'          => 'profitmag_fbxthree_setting',
    'no_of_block_three'             => 'profitmag_fbxthreepostnum_setting',
    'featured_block_four'           => 'profitmag_fbxfour_setting',
    'no_of_block_four'              => 'profitmag_fbxfourpostnum_setting',
    'featured_block_left'           => 'profitmag_fbxfiveleft_setting',
    'no_of_block_left'              => 'profitmag_fbxfiveleftpostnum_setting',
    'featured_block_right'          => 'profitmag_fbxfiveright_setting',
    'no_of_block_right'             => 'profitmag_fbxfiverightpostnum_setting',
    'left_cat_post_one'             => 'profitmag_leftsidebar_top_setting',                             
    'left_no_of_cat_post_one'       => 'profitmag_cat_one_num_setting',
    'left_cat_post_two'             => 'profitmag_leftsidebar_bottom_setting',
    'left_no_of_cat_post_two'       => 'profitmag_cat_two_num_setting',
    'left_sidebar_middle_ads'       => 'profitmag_left_mid_ads_setting',
    'left_sidebar_bottom_ads_one'   => 'profitmag_left_bottom_ads_setting',
    'left_sidebar_bottom_ads_two'   => 'profitmag_left_bottom_ads_two_setting',
    'right_cat_post_one'            => 'profitmag_rightsidebar_top_setting',                             
    'right_no_of_cat_post_one'      => 'profitmag_post_one_num_setting',
    'right_cat_post_two'            => 'profitmag_rightsidebar_bottom_setting',
    'right_no_of_cat_post_two'      => 'profitmag_post_two_num_setting',
    'right_sidebar_middle_ads'      => 'profitmag_right_mid_ads_setting',
    'right_sidebar_bottom_ads_one'  => 'profitmag_right_bottom_ads_setting',
    'right_sidebar_bottom_ads_two'  => 'profitmag_right_bottom_ads_two_setting',       

    'sidebar_layout'                => 'profitmag_sidebar_layout_setting',
    'show_search'                   => 'profitmag_search_setting',                          

    'slider_options'                => 'profitmag_slider_type_setting',
    'slider_cat'                    => 'profitmag_slider_cat_setting',
    'slider1'                       =>'profitmag_slider_post_setting1',
    'slider2'                       =>'profitmag_slider_post_setting2',
    'slider3'                       =>'profitmag_slider_post_setting3',
    'slider4'                       =>'profitmag_slider_post_setting4',
    'slider4'                       =>'profitmag_slider_post_setting5',
    'slider_show_controls'          => 'profitmag_slider_arrow_setting',
    'slider_auto'                   => 'profitmag_slider_transition_setting',
    'slider_speed'                  => 'profitmag_slider_speed_setting', 

    'header_ads'                    => 'profitmag_header_ads_setting',
    'mid_section_ads'               => 'profitmag_home_ads_setting',  
    'custom_css'                    => 'profitmag_custom_css_setting',
    'custom_code'                   => 'profitmag_analytics_setting',
    'menu_alignment'                =>'profitmag_menu_setting',                          
    'show_social_header'            => 'profitmag_social_op_setting',
    'facebook'                      => 'profitmag_facebook_setting',
    'twitter'                       => 'profitmag_twitter_setting',
    'gplus'                         => 'profitmag_google_plus_setting',
    'youtube'                       => 'profitmag_youtube_setting',
    'pinterest'                     => 'profitmag_pinterest_setting',
    'flickr'                        => 'profitmag_flickr_setting',
    'vimeo'                         => 'profitmag_vimeo_setting',
    'stumbleupon'                   => 'profitmag_stumbleupon_setting',
    'dribble'                       => 'profitmag_dribble_setting',
    'tumblr'                        => 'profitmag_tumblr_setting',
    'linkedin'                      => 'profitmag_linkedin_setting',
    'sound_cloud'                   => 'profitmag_sound_cloud_setting',
    'skype'                         => 'profitmag_skype_setting',
    'rss'                           => 'profitmag_rss_setting',
    'hide_date'                     => 'profitmag_postdate_setting',
    'read_more'                     => 'profitmag_readmore_setting',

    'media_gallery'                 => 'profitmag_gallery_setting',
    'left_side_gallery'             => 'profitmag_left_gallery_setting',
    'right_side_gallery'            => 'profitmag_right_gallery_setting'
    );

  return $keymaps;
}

/**
 * retreive the image id from its url
 */
function profitmag_imgid_from_url($image_url) {
  global $wpdb;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
      return $attachment[0]; 
}