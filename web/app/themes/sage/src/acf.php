<?php

/**
 * Add options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Sliders',
		'menu_title'	=> 'Sliders',
		'parent_slug'	=> 'theme-general-settings',
	));
}

function acf_load_select_form( $field ) {
  $field['choices'] = array();
  $forms = Ninja_Forms()->form()->get_forms();
  foreach( $forms as $form ) {
    $label = $form->get_setting( 'title' );
    $value = $form->get_id();
    $field['choices'][ $value ] = $label;
  }
  return $field;
}

add_filter('acf/load_field/name=contact_select_form', 'acf_load_select_form');

function acf_load_select_slider( $field ) {
    
    // reset choices
    $field['choices'] = array();


    // if has rows
    if( have_rows('create_slider', 'option') ) {
        
        // while has rows
        while( have_rows('create_slider', 'option') ) {
            
            // instantiate row
            the_row();
            
            
            // vars
            $value = get_sub_field('slider_name');
            $label = get_sub_field('slider_name');

            
            // append to choices
            $field['choices'][ $value ] = $label;
            
        }
        
    }


    // return the field
    return $field;
    
}

add_filter('acf/load_field/name=select_slider', 'acf_load_select_slider');
