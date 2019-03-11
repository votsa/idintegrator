<?php

Id_integrator_Kirki::add_section( 'wp_bp_frontpage', array(
    'title'          => esc_html__( 'Static Frontpage', 'idintegrator' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

if( class_exists( 'Kirki' ) ) {
    function Id_integrator_move_header_bg_image( $wp_customize ) {
        $wp_customize->get_control( 'header_image' )->section = 'wp_bp_frontpage';
    }
    add_action( 'customize_register', 'Id_integrator_move_header_bg_image' );
}


Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'front_cover_title',
	'label'    => esc_html__( 'Cover Title', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => get_bloginfo( 'name' ),
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'front_cover_lead',
	'label'    => esc_html__( 'Cover Lead', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => get_bloginfo( 'description' ),
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'front_cover_btn_text',
	'label'    => esc_html__( 'Cover Button Text', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => '',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'front_cover_btn_link',
	'label'    => esc_html__( 'Cover Button Link', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'text',
    'default'  => '',
) );


Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'featured_page_1',
	'label'    => esc_html__( '1st Featured Page', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'featured_page_2',
	'label'    => esc_html__( '2nd Featured Page', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'featured_page_3',
	'label'    => esc_html__( '3rd Featured Page', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'dropdown-pages',
) );


Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'show_main_content',
	'label'    => esc_html__( 'Show Main Content', 'idintegrator' ),
	'section'  => 'wp_bp_frontpage',
	'type'     => 'checkbox',
    'default'  => 1
) );
