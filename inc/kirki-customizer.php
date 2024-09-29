<?php

/**
 * zyan customizer
 * @package zyan
 */

/** Exit if accessed directly */
if (!defined('ABSPATH')) {
     exit;
}

function get_tp_contact_form()
{
     if (!class_exists('WPCF7')) {
          return;
     }
     $tp_cfa         = array();
     $tp_cf_args     = array('posts_per_page' => -1, 'post_type' => 'wpcf7_contact_form');
     $tp_forms       = get_posts($tp_cf_args);
     $tp_cfa         = ['0' => esc_html__('Select Form', 'zyan')];
     if ($tp_forms) {
          foreach ($tp_forms as $tp_form) {
               $tp_cfa[$tp_form->ID] = $tp_form->post_title;
          }
     } else {
          $tp_cfa[esc_html__('No contact form found', 'zyan')] = 0;
     }
     return $tp_cfa;
}

/** Added Panels & Sections */
function zyan_kirki_customizer_panels_sections($wp_customize)
{
     /** Add panel */
     $wp_customize->add_panel('zyan_customizer', [
          'priority' => 10,
          'title'    => esc_html__('Zyan Customizer', 'zyan'),
     ]);
     /** Side Info Setting */
     $wp_customize->add_section('side_setting', [
          'title'       => esc_html__('Side Info', 'zyan'),
          'description' => '',
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);

     /** Side Bar Setting */
     $wp_customize->add_section('side_bar_setting', [
          'title'       => esc_html__('Side Bar', 'zyan'),
          'description' => '',
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);
     /** Breadcrumb Setting */
     $wp_customize->add_section('breadcrumb_setting', [
          'title'       => esc_html__('Breadcrumb', 'zyan'),
          'description' => '',
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);
     /** Subscribe Setting */
     $wp_customize->add_section('subscribe_setting', [
          'title'       => esc_html__('Subscribe', 'zyan'),
          'description' => '',
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);
     /** Footer Setting */
     $wp_customize->add_section('footer_setting', [
          'title'       => esc_html__('Default Footer', 'zyan'),
          'description' => '',
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);
     /** Footer Setting 2 */
     $wp_customize->add_section('footer_setting_2', [
          'title'       => esc_html__('Footer 2', 'zyan'),
          'description' => '',
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);
     /** Colors Setting */
     $wp_customize->add_section('colors_setting', [
          'title'       => esc_html__('Colors', 'zyan'),
          'description' => '',
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);
     /** Typography Settings */
     $wp_customize->add_section('typo_setting', [
          'title'       => esc_html__('Typography Setting', 'zyan'),
          'description' => '',
          'priority'    => 14,
          'capability'  => 'edit_theme_options',
          'panel'       => 'zyan_customizer',
     ]);
}
add_action('customize_register', 'zyan_kirki_customizer_panels_sections');

/** Side Settings */
function _side_info($fields)
{
     $fields[] = [
          'type'     => 'switch',
          'settings' => 'preloader',
          'label'    => esc_html__('Preloader Swicher', 'zyan'),
          'section'  => 'side_setting',
          'default'  => '0',
          'priority' => 10,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'switch',
          'settings' => 'cursor',
          'label'    => esc_html__('Cursor Swicher', 'zyan'),
          'section'  => 'side_setting',
          'default'  => '0',
          'priority' => 10,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'image',
          'settings' => 'logo',
          'label'    => esc_html__('Logo', 'zyan'),
          'section'  => 'side_setting',
          'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
          'priority' => 10,

     ];

     $fields[] = [
          'type'     => 'image',
          'settings' => 'seconday_logo',
          'label'    => esc_html__('Header Secondary Logo', 'zyan'),
          'section'  => 'side_setting',
          'default'     => get_template_directory_uri() . '/assets/img/logo/logo2.png',
          'priority' => 10,

     ];

     return $fields;
}
add_filter('kirki/fields', '_side_info');


/** Side bar Settings */
function _side_bar_setting($fields)
{
     $fields[] = [
          'type'     => 'switch',
          'settings' => 'about_us',
          'label'    => esc_html__('About/Bio Swicher', 'zyan'),
          'section'  => 'side_bar_setting',
          'default'  => '0',
          'priority' => 10,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'text',
          'settings' => 'about_us_title',
          'label'    => esc_html__('About/Bio Title', 'zyan'),
          'section'  => 'side_bar_setting',
          'default'  => 'About us',
          'priority' => 10,
          'active_callback' => [
               [
                    'setting'  => 'about_us',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     $fields[] = [
          'type'     => 'textarea',
          'settings' => 'about_us_text',
          'label'    => esc_html__('About/Bio Text', 'zyan'),
          'section'  => 'side_bar_setting',
          'default'  => 'Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et magna aliqua. Ut enim ad minim veniam laboris.',
          'priority' => 10,
          'active_callback' => [
               [
                    'setting'  => 'about_us',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     $fields[] = [
          'type'     => 'switch',
          'settings' => 'contact_from_swicher',
          'label'    => esc_html__('Contact From Swicher', 'zyan'),
          'section'  => 'side_bar_setting',
          'default'  => '0',
          'priority' => 10,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'text',
          'settings' => 'contact_from_title',
          'label'    => esc_html__('Contact Title', 'zyan'),
          'section'  => 'side_bar_setting',
          'default'  => 'Get In Touch',
          'priority' => 10,
          'active_callback' => [
               [
                    'setting'  => 'contact_from_swicher',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     $fields[] = [
          'type'     => 'select',
          'settings' => 'contact_from_select',
          'label'    => esc_html__('Contact Select', 'zyan'),
          'section'  => 'side_bar_setting',
          'placeholder' => esc_html__('Choose an option', 'zyan'),
          'priority' => 10,
          'choices'     => get_tp_contact_form(),
          'active_callback' => [
               [
                    'setting'  => 'contact_from_swicher',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     $fields[] = [
          'type'     => 'switch',
          'settings' => 'logo_swicher',
          'label'    => esc_html__('Logo Swicher', 'zyan'),
          'section'  => 'side_bar_setting',
          'default'  => '0',
          'priority' => 10,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     return $fields;
}
add_filter('kirki/fields', '_side_bar_setting');

/** breadcrumb Settings */
function _breadcrumb_setting($fields)
{
     $fields[] = [
          'type'     => 'switch',
          'settings' => 'breadcrumb_switch',
          'label'    => esc_html__('Breadcrumb Swicher', 'zyan'),
          'section'  => 'breadcrumb_setting',
          'default'  => '0',
          'priority' => 10,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'background',
          'settings' => 'breadcrumb_bg',
          'label'    => esc_html__('Breadcrumb Background', 'zyan'),
          'section'  => 'breadcrumb_setting',
          'priority' => 10,
          'default'     => [
               'background-image'      => get_template_directory_uri() . '/assets/img/bg/breadcrumb.jpg',
               'background-color'      => '#09101A',
               'background-repeat'     => 'repeat',
               'background-position'   => 'center center',
               'background-size'       => 'cover',
               'background-attachment' => 'scroll',
          ],
          'transport'   => 'auto',
          'output'      => [
               [
                    'element' => '.tf__breadcrumb',
               ],
          ],
          'active_callback' => [
               [
                    'setting'  => 'breadcrumb_switch',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     return $fields;
}
add_filter('kirki/fields', '_breadcrumb_setting');

/** subscribe Settings */
function _subscribe_setting($fields)
{
     $fields[] = [
          'type'     => 'switch',
          'settings' => 'subscribe_switch',
          'label'    => esc_html__('Subscribe Swicher', 'zyan'),
          'section'  => 'subscribe_setting',
          'default'  => '0',
          'priority' => 10,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'text',
          'settings' => 'subscribe_title',
          'label'    => esc_html__('Title', 'zyan'),
          'section'  => 'subscribe_setting',
          'default'  => 'SUBSCRIBE MY NEWSLETTER',
          'priority' => 10,
          'active_callback' => [
               [
                    'setting'  => 'subscribe_switch',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     $fields[] = [
          'type'     => 'select',
          'settings' => 'subscribe_from_select',
          'label'    => esc_html__('Subscribe from Select', 'zyan'),
          'section'  => 'subscribe_setting',
          'placeholder' => esc_html__('Choose an option', 'zyan'),
          'priority' => 10,
          'choices'     => get_tp_contact_form(),
          'active_callback' => [
               [
                    'setting'  => 'subscribe_switch',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     $fields[] = [
          'type'     => 'background',
          'settings' => 'subscribe_bg',
          'label'    => esc_html__('subscribe Background', 'zyan'),
          'section'  => 'subscribe_setting',
          'priority' => 10,
          'default'     => [
               'background-image'      => get_template_directory_uri() . '/assets/img/bg/subscribe.jpg',
               'background-color'      => '#09101A',
               'background-repeat'     => 'repeat',
               'background-position'   => 'center center',
               'background-size'       => 'cover',
               'background-attachment' => 'scroll',
          ],
          'transport'   => 'auto',
          'output'      => [
               [
                    'element' => '.tf__subscribe',
               ],
          ],
          'active_callback' => [
               [
                    'setting'  => 'subscribe_switch',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     return $fields;
}
add_filter('kirki/fields', '_subscribe_setting');

/** footer Settings */
function _footer_setting_2($fields)
{

     $fields[] = [
          'type'     => 'switch',
          'settings' => 'footer_2_copyright_switch',
          'label'    => esc_html__('Footer 2 Copyright Swicher', 'zyan'),
          'section'  => 'footer_setting_2',
          'default'  => '0',
          'priority' => 1,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'switch',
          'settings' => 'footer_2_info_switch',
          'label'    => esc_html__('Footer Info Swicher', 'zyan'),
          'section'  => 'footer_setting_2',
          'default'  => '0',
          'priority' => 2,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'color',
          'settings' => 'footer_icon_color_2',
          'label'    => esc_html__('Footer Icon Color', 'zyan'),
          'section'  => 'footer_setting_2',
          'default'  => '0',
          'priority' => 3,
          'default' => '#55E6A5',
          'output' => array(
               array(
                    'element'  => '#footer_2 svg path',
                    'property' => 'stroke',
               ),
          ),
     ];

     new \Kirki\Field\Repeater(
          [
               'settings'     => 'footer_info_repeater_2',
               'label'        => esc_html__('Footer 2 Info Repeater', 'zyan'),
               'section'      => 'footer_setting_2',
               'priority'     => 4,
               'row_label'    => [
                    'type'  => 'field',
                    'value' => esc_html__('Your Custom Value', 'zyan'),
                    'field' => 'info_title',
               ],
               'button_label' => esc_html__('Add new Info', 'zyan'),
               'default'      => [
                    [
                         'info_title'   => esc_html__('Address', 'zyan'),
                         'info_description'   => esc_html__('2118 Thornridge Cir. Syracuse, Connecticut 35624', 'zyan'),
                         'info_icon' => get_template_directory_uri() . '/assets/svg/map.svg'
                    ],
                    [
                         'info_title'   => esc_html__('Lets talk us', 'zyan'),
                         'info_description'   => esc_html__('<a href="callto:1234567890">(603) 555-0123</a> <a href="callto:1234567890">(603) 555-0123</a>', 'zyan'),
                         'info_icon' => get_template_directory_uri() . '/assets/svg/phone.svg'
                    ],
                    [
                         'info_title'   => esc_html__('Send us email', 'zyan'),
                         'info_description'   => esc_html__('<a href="mailto:example@gmail.com">deanna.curtis@example.com</a><a href="mailto:example@gmail.com">curtis@example.com</a>', 'zyan'),
                         'info_icon' => get_template_directory_uri() . '/assets/svg/envelope.svg'
                    ],
               ],
               'fields'       => [
                    'info_title'   => [
                         'type'        => 'text',
                         'label'       => esc_html__('Info Title', 'zyan'),
                         'default'     => 'Info Title',
                    ],
                    'info_description'    => [
                         'type'        => 'textarea',
                         'label'       => esc_html__('Description', 'zyan'),
                         'default'     => 'Description',
                    ],
                    'info_links'    => [
                         'type'        => 'textarea',
                         'label'       => esc_html__('Links', 'zyan'),
                         'default'     => 'Links',
                    ],
                    'info_icon'    => [
                         'type'        => 'upload',
                         'label'       => esc_html__('Upload Icon', 'zyan'),
                         'description' => esc_html__('Upload SVG Icon', 'zyan'),
                         'default'     => get_template_directory_uri() . '/assets/svg/map.svg',
                    ],
               ],
          ]
     );


     $fields[] = [
          'type'     => 'switch',
          'settings' => 'footer_contact_from_switch',
          'label'    => esc_html__('Footer Contact From Swicher', 'zyan'),
          'section'  => 'footer_setting_2',
          'default'  => '0',
          'priority' => 5,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];


     $fields[] = [
          'type'     => 'select',
          'settings' => 'footer_contact_from_select',
          'label'    => esc_html__('Contact Select', 'zyan'),
          'section'  => 'footer_setting_2',
          'placeholder' => esc_html__('Choose an option', 'zyan'),
          'priority' => 6,
          'choices'     => get_tp_contact_form(),
          'active_callback' => [
               [
                    'setting'  => 'footer_contact_from_switch',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     return $fields;
}
add_filter('kirki/fields', '_footer_setting_2');

/** footer Settings */
function _footer_setting($fields)
{
     $fields[] = [
          'type'     => 'switch',
          'settings' => 'footer_switch',
          'label'    => esc_html__('Footer Swicher', 'zyan'),
          'section'  => 'footer_setting',
          'default'  => '0',
          'priority' => 1,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'background',
          'settings' => 'footer_bg',
          'label'    => esc_html__('Breadcrumb Background', 'zyan'),
          'section'  => 'footer_setting',
          'priority' => 2,
          'default'     => [
               'background-color'      => '#02050A',
               'background-image'      => '',
               'background-repeat'     => 'repeat',
               'background-position'   => 'center center',
               'background-size'       => 'cover',
               'background-attachment' => 'scroll',
          ],
          'transport'   => 'auto',
          'output'      => [
               [
                    'element' => '.footer',
               ],
          ],
          'active_callback' => [
               [
                    'setting'  => 'footer_switch',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     $fields[] = [
          'type'     => 'switch',
          'settings' => 'footer_info_switch',
          'label'    => esc_html__('Footer Info Swicher', 'zyan'),
          'section'  => 'footer_setting',
          'default'  => '0',
          'priority' => 3,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'color',
          'settings' => 'footer_icon_color',
          'label'    => esc_html__('Footer Icon Color', 'zyan'),
          'section'  => 'footer_setting',
          'default'  => '0',
          'priority' => 4,
          'default' => '#55E6A5',
          'output' => array(
               array(
                    'element'  => '#footer svg path',
                    'property' => 'stroke',
               ),
          ),
     ];

     new \Kirki\Field\Repeater(
          [
               'settings'     => 'footer_info_repeater',
               'label'        => esc_html__('Footer Info Repeater', 'zyan'),
               'section'      => 'footer_setting',
               'priority'     => 5,
               'row_label'    => [
                    'type'  => 'field',
                    'value' => esc_html__('Your Custom Value', 'zyan'),
                    'field' => 'info_title',
               ],
               'button_label' => esc_html__('Add new Info', 'zyan'),
               'default'      => [
                    [
                         'info_title'   => esc_html__('Address', 'zyan'),
                         'info_links'   => esc_html__('2118 Thornridge Cir. Syracuse, Connecticut 35624', 'zyan'),
                         'info_icon' => get_template_directory_uri() . '/assets/svg/map.svg'
                    ],
                    [
                         'info_title'   => esc_html__('Lets talk us', 'zyan'),
                         'info_links'   => esc_html__('<a href="callto:1234567890">(603) 555-0123</a> <a href="callto:1234567890">(603) 555-0123</a>', 'zyan'),
                         'info_icon' => get_template_directory_uri() . '/assets/svg/phone.svg'
                    ],
                    [
                         'info_title'   => esc_html__('Send us email', 'zyan'),
                         'info_links'   => esc_html__('<a href="mailto:example@gmail.com">deanna.curtis@example.com</a><a href="mailto:example@gmail.com">curtis@example.com</a>', 'zyan'),
                         'info_icon' => get_template_directory_uri() . '/assets/svg/envelope.svg'
                    ],
               ],
               'fields'       => [
                    'info_title'   => [
                         'type'        => 'text',
                         'label'       => esc_html__('Info Title', 'zyan'),
                         'default'     => 'Info Title',
                    ],
                    'info_links'    => [
                         'type'        => 'textarea',
                         'label'       => esc_html__('Links', 'zyan'),
                         'default'     => 'Links',
                    ],
                    'info_icon'    => [
                         'type'        => 'upload',
                         'label'       => esc_html__('Upload Icon', 'zyan'),
                         'description' => esc_html__('Upload SVG Icon', 'zyan'),
                         'default'     => get_template_directory_uri() . '/assets/svg/map.svg',
                    ],
               ],
               'active_callback' => [
                    [
                         'setting'  => 'footer_info_switch',
                         'operator' => '==',
                         'value'    => true,
                    ],
               ],
          ]
     );

     $fields[] = [
          'type'     => 'switch',
          'settings' => 'footer_copyright_switch',
          'label'    => esc_html__('Footer Copyright Swicher', 'zyan'),
          'section'  => 'footer_setting',
          'default'  => '0',
          'priority' => 6,
          'choices'  => [
               'on'  => esc_html__('Enable', 'zyan'),
               'off' => esc_html__('Disable', 'zyan'),
          ],
     ];

     $fields[] = [
          'type'     => 'textarea',
          'settings' => 'footer_copyright_text',
          'label'    => esc_html__('Copyright text', 'zyan'),
          'section'  => 'footer_setting',
          'default'  => '© CodeeFly 2023 | All Rights Reserved',
          'priority' => 7,
          'active_callback' => [
               [
                    'setting'  => 'footer_copyright_switch',
                    'operator' => '==',
                    'value'    => true,
               ],
          ],
     ];

     new \Kirki\Field\Repeater(
          [
               'settings'     => 'footer_menu_repeater',
               'label'        => esc_html__('Footer Menu Repeater', 'zyan'),
               'section'      => 'footer_setting',
               'priority'     => 8,
               'row_label'    => [
                    'type'  => 'field',
                    'value' => esc_html__('Your Custom Value', 'zyan'),
                    'field' => 'footer_menu_text',
               ],
               'button_label' => esc_html__('Add new Menu', 'zyan'),
               'default'      => [
                    [
                         'footer_menu_text'   => esc_html__('Trams & Condition', 'zyan'),
                         'footer_menu_url'    => '#',
                    ],
                    [
                         'footer_menu_text'   => esc_html__('Privacy Policy', 'zyan'),
                         'footer_menu_url'    => '#',
                    ],
                    [
                         'footer_menu_text'   => esc_html__('Sitemap', 'zyan'),
                         'footer_menu_url'    => '#',
                    ],
               ],
               'fields'       => [
                    'footer_menu_text'   => [
                         'type'        => 'text',
                         'label'       => esc_html__('Text', 'zyan'),
                         'default'     => 'Sitemap',
                    ],
                    'footer_menu_url'    => [
                         'type'        => 'text',
                         'label'       => esc_html__('Button URL', 'zyan'),
                         'default'     => '#',
                    ],
               ],
               'active_callback' => [
                    [
                         'setting'  => 'footer_copyright_switch',
                         'operator' => '==',
                         'value'    => true,
                    ],
               ],
          ]
     );

     return $fields;
}
add_filter('kirki/fields', '_footer_setting');

/** Colors Settings */
function _color_settings($fields)
{
     $fields[] =  [
          'type'        => 'color',
          'settings'    => 'zyan_primary_color',
          'label'       => __('Primary Color', 'zyan'),
          'description' => esc_html__('This is a Theme Primary color control.', 'zyan'),
          'section'     => 'colors_setting',
          'default'     => '#55e6a5',
          'priority'    => 10,
          'output'        => array(
               array(
                    'element'  => ':root',
                    'property' => '--colorPrimary',
               ),
          ),
     ];
     $fields[] =  [
          'type'        => 'color',
          'settings'    => 'zyan_background_color_1',
          'label'       => __('Background Color', 'zyan'),
          'description' => esc_html__('This is a Theme background color control.', 'zyan'),
          'section'     => 'colors_setting',
          'default'     => '#02050a',
          'priority'    => 10,
          'output'        => array(
               array(
                    'element'  => ':root',
                    'property' => '--bodyBg',
               ),
          ),
     ];

     $fields[] =  [
          'type'        => 'color',
          'settings'    => 'zyan_background_color_2',
          'label'       => __('background Color 2', 'zyan'),
          'description' => esc_html__('This is a Theme background color 2 control.', 'zyan'),
          'section'     => 'colors_setting',
          'default'     => '#09101a',
          'priority'    => 10,
          'output'        => array(
               array(
                    'element'  => ':root',
                    'property' => '--bgColor',
               ),
          ),
     ];

     $fields[] =  [
          'type'        => 'color',
          'settings'    => 'zyan_text_color',
          'label'       => __('Text Color', 'zyan'),
          'description' => esc_html__('This is a Theme Text color control.', 'zyan'),
          'section'     => 'colors_setting',
          'default'     => '#a2a2a2',
          'priority'    => 10,
          'output'        => array(
               array(
                    'element'  => ':root',
                    'property' => '--bodyColor',
               ),
          ),
     ];

     $fields[] =  [
          'type'        => 'color',
          'settings'    => 'zyan_white',
          'label'       => __('White Color', 'zyan'),
          'description' => esc_html__('This is a Theme White color control.', 'zyan'),
          'section'     => 'colors_setting',
          'default'     => '#fff',
          'priority'    => 10,
          'output'        => array(
               array(
                    'element'  => ':root',
                    'property' => '--colorWhite',
               ),
          ),
     ];

     $fields[] =  [
          'type'        => 'color',
          'settings'    => 'zyan_black',
          'label'       => __('Black Color', 'zyan'),
          'description' => esc_html__('This is a Theme Black color control.', 'zyan'),
          'section'     => 'colors_setting',
          'default'     => '#02050a',
          'priority'    => 10,
          'output'        => array(
               array(
                    'element'  => ':root',
                    'property' => '--colorBlack',
               ),
          ),
     ];

     return $fields;
}
add_filter('kirki/fields', '_color_settings');

/** Typo settings */
function _typo_setting($fields)
{
     $fields[] = [
          'type'        => 'typography',
          'settings'    => 'typography_setting',
          'label'       => esc_html__('Body Font Control', 'zyan'),
          'section'     => 'typo_setting',
          'priority'    => 9,
          'transport'   => 'auto',
          'default'     => [
               'font-family'     => 'Poppins',
               'variant'         => '',
               'font-style'      => '',
               'font-size'       => '',
               'line-height'     => '',
               'letter-spacing'  => '',
               'text-transform'  => '',
               'text-decoration' => '',
          ],
          'output'      => [
               [
                    'element' => ['body', 'p', 'span'],
               ],
          ],
     ];

     $fields[] = [
          'type'        => 'typography',
          'settings'    => 'typography_setting_h1',
          'label'       => esc_html__('H1 Font Control', 'zyan'),
          'section'     => 'typo_setting',
          'priority'    => 20,
          'transport'   => 'auto',
          'default'     => [
               'font-family'     => '',
               'variant'         => '',
               'font-style'      => '',
               'font-size'       => '',
               'line-height'     => '',
               'letter-spacing'  => '',
               'text-transform'  => '',
               'text-decoration' => '',
          ],
          'output'      => [
               [
                    'element' => ['h1', '.tf__breadcrum_text h1', '.tf__banner_text h1'],
               ],
          ],
     ];

     $fields[] = [
          'type'        => 'typography',
          'settings'    => 'typography_setting_h2',
          'label'       => esc_html__('H2 Font Control', 'zyan'),
          'section'     => 'typo_setting',
          'priority'    => 20,
          'transport'   => 'auto',
          'default'     => [
               'font-family'     => '',
               'variant'         => '',
               'font-style'      => '',
               'font-size'       => '',
               'line-height'     => '',
               'letter-spacing'  => '',
               'text-transform'  => '',
               'text-decoration' => '',
          ],
          'output'      => [
               [
                    'element' => ['h2', '.tf__section_heading h2'],
               ],
          ],
     ];

     $fields[] = [
          'type'        => 'typography',
          'settings'    => 'typography_setting_h3',
          'label'       => esc_html__('H3 Font Control', 'zyan'),
          'section'     => 'typo_setting',
          'priority'    => 20,
          'transport'   => 'auto',
          'default'     => [
               'font-family'     => '',
               'variant'         => '',
               'font-style'      => '',
               'font-size'       => '',
               'line-height'     => '',
               'letter-spacing'  => '',
               'text-transform'  => '',
               'text-decoration' => '',
          ],
          'output'      => [
               [
                    'element' => ['h3', '.tf__single_service h3'],
               ],
          ],
     ];

     $fields[] = [
          'type'        => 'typography',
          'settings'    => 'typography_setting_h4',
          'label'       => esc_html__('H4 Font Control', 'zyan'),
          'section'     => 'typo_setting',
          'priority'    => 20,
          'transport'   => 'auto',
          'default'     => [
               'font-family'     => '',
               'variant'         => '',
               'font-style'      => '',
               'font-size'       => '',
               'line-height'     => '',
               'letter-spacing'  => '',
               'text-transform'  => '',
               'text-decoration' => '',
          ],
          'output'      => [
               [
                    'element' => ['h4'],
               ],
          ],
     ];

     $fields[] = [
          'type'        => 'typography',
          'settings'    => 'typography_setting_h5',
          'label'       => esc_html__('H5 Font Control', 'zyan'),
          'section'     => 'typo_setting',
          'priority'    => 20,
          'transport'   => 'auto',
          'default'     => [
               'font-family'     => '',
               'variant'         => '',
               'font-style'      => '',
               'font-size'       => '',
               'line-height'     => '',
               'letter-spacing'  => '',
               'text-transform'  => '',
               'text-decoration' => '',
          ],
          'output'      => [
               [
                    'element' => ['h5', '.tf__section_heading h5'],
               ],
          ],
     ];

     $fields[] = [
          'type'        => 'typography',
          'settings'    => 'typography_setting_h6',
          'label'       => esc_html__('H6 Font Control', 'zyan'),
          'section'     => 'typo_setting',
          'priority'    => 20,
          'transport'   => 'auto',
          'default'     => [
               'font-family'     => '',
               'variant'         => '',
               'font-style'      => '',
               'font-size'       => '',
               'line-height'     => '',
               'letter-spacing'  => '',
               'text-transform'  => '',
               'text-decoration' => '',
          ],
          'output'      => [
               [
                    'element' => ['h6'],
               ],
          ],
     ];

     return $fields;
}
add_filter('kirki/fields', '_typo_setting');

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 **/

function zyan_THEME_option($name)
{
     $value = '';
     if (class_exists('zyan')) {
          $value = Kirki::get_option(zyan_get_theme(), $name);
     }
     return apply_filters('zyan_THEME_option', $value, $name);
}

/**
 * Get config ID
 * @return string
 **/

function zyan_get_theme()
{
     return 'zyan';
}
