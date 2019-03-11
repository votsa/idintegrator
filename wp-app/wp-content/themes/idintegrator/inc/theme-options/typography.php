<?php

Id_integrator_Kirki::add_section( 'wp_bp_typography', array(
    'title'          => esc_html__( 'Typography', 'idintegrator' ),
    'panel'          => 'theme_options',
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'wp_bp_body_typo',
	'section'  => 'wp_bp_typography',
	'type'     => 'typography',
    'label' => esc_html__( 'Body Typography', 'idintegrator' ),
    'default'     => array(
		'font-family'    => "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",
		'variant'        => '',
		'line-height'    => '',
		'letter-spacing' => '',
	),
    'output'      => array(
		array(
			'element' => array( 'body', 'button', 'input', 'optgroup', 'select', 'textarea' ),
		),
	),
) );

Id_integrator_Kirki::add_field( 'Id_integrator_theme', array(
	'settings' => 'wp_bp_heading_typo',
	'section'  => 'wp_bp_typography',
	'type'     => 'typography',
    'label' => esc_html__( 'Heading Typography', 'idintegrator' ),
    'default'     => array(
		'font-family'    => "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",
		'variant'        => '500',
		'line-height'    => '',
		'letter-spacing' => '',
	),
    'output'      => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
		),
	),
) );
