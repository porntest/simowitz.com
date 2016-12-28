<?php
/*
Plugin Name:  Custom Post Types 
Plugin URI:   https://dylan.simowitz.com/
Description:  Custom post types for simowitz.com.
Version:      1.0.0
Author:       Dylan Simowitz
Author URI:   https://dylan.simowitz.com/
License:      MIT License
*/

use PostTypes\PostType;

$cases = new PostType('case');
$cases->icon('dashicons-portfolio');

$testimonials = new PostType('testimonial');
$testimonials->icon('dashicons-testimonial');

$awards = new PostType('award');
$awards->icon('dashicons-awards');
