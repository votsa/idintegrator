<?php

Id_integrator_Kirki::add_section( 'blog_home', array(
    'title'          => esc_html__( 'Blog Homepage', 'id-integrator' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'blog_home_title_1',
	'section'  => 'blog_home',
	'type'     => 'custom',
    'default'  => '<h2 class="wp-bp-region-title first-region-title">' . esc_html__( 'Cover Section', 'id-integrator' ) . '</h2>',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'blog_display_cover_section',
	'label'    => esc_html__( 'Display Cover Section', 'id-integrator' ),
	'section'  => 'blog_home',
	'type'     => 'checkbox',
    'default'  => 1,
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings'          => 'blog_cover_title',
	'label'             => esc_html__( 'Cover Title', 'id-integrator' ),
	'section'           => 'blog_home',
	'type'              => 'text',
    'sanitize_callback' => 'wp_kses_post',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings'          => 'blog_cover_lead',
	'label'             => esc_html__( 'Cover Lead Text', 'id-integrator' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings'          => 'blog_cover_btn_text',
	'label'             => esc_html__( 'Cover Button Text', 'id-integrator' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings'          => 'blog_cover_btn_link',
	'label'             => esc_html__( 'Cover Button Link', 'id-integrator' ),
	'section'           => 'blog_home',
	'type'              => 'text',
) );


Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'blog_home_title_2',
	'section'  => 'blog_home',
	'type'     => 'custom',
    'default'  => '<h2 class="wp-bp-region-title">' . esc_html__( 'Featured Posts Slider', 'id-integrator' ) . '</h2>',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'blog_display_posts_slider',
	'label'    => esc_html__( 'Display Posts Slider', 'id-integrator' ),
	'section'  => 'blog_home',
	'type'     => 'checkbox',
    'default'  => 1,
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'featured_count',
	'label'    => esc_html__( 'Number of Posts In Slider', 'id-integrator' ),
	'section'  => 'blog_home',
	'type'     => 'number',
    'default'  => '5',
    'choices'  => array(
		'min'  => 1,
		'max'  => 10,
		'step' => 1,
	),
) );

if( class_exists( 'Kirki_Helper' ) ) {
    Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
    	'settings'    => 'featured_ids',
    	'label'       => esc_html__( 'Select Posts', 'id-integrator' ),
    	'section'     => 'blog_home',
    	'type'        => 'select',
        'multiple'    => 10,
        'choices'     => Kirki_Helper::get_posts( array( 'posts_per_page' => 100, 'post_type' => 'post' ) ),
    ) );
}
