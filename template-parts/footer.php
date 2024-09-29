<?php
$defaults = [
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
];

$default_footer_menu = [
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
];

$defaults2 = [
    [
        'info_title'   => esc_html__('Phone', 'zyan'),
        'info_description'   => esc_html__('Loram ipsum eros justo, posuer oborti viverra laor house of street', 'zyan'),
        'info_links'   => esc_html__('<a href="callto:12345664746846">123-45664-746846</a>', 'zyan'),
        'info_icon' => get_template_directory_uri() . '/assets/svg/voice_phone.svg'
    ],
    [
        'info_title'   => esc_html__('Location', 'zyan'),
        'info_description'   => esc_html__('Dhaka 102, m eros justo, posuer oborti viverra laor house of street', 'zyan'),
        'info_links'   => esc_html__('<a href="#">View on map</a>', 'zyan'),
        'info_icon' => get_template_directory_uri() . '/assets/svg/map_issue.svg'
    ],
    [
        'info_title'   => esc_html__('Monday - Sunday', 'zyan'),
        'info_description'   => esc_html__('Dhaka 102, m eros justo, posuer oborti viverra laor house of street', 'zyan'),
        'info_links'   => esc_html__('<a href="mailto:hfavouriteemail@gmail.com" >hfavouriteemail@gmail.com</a >', 'zyan'),
        'info_icon' => get_template_directory_uri() . '/assets/svg/send_mail.svg'
    ],
];

$settings = get_theme_mod('footer_info_repeater', $defaults);
$footer_switch = get_theme_mod('footer_switch', true);
$footer_info_switch = get_theme_mod('footer_info_switch', true);
$footer_copyright_switch = get_theme_mod('footer_copyright_switch', true);
$footer_menu_repeater = get_theme_mod('footer_menu_repeater', $default_footer_menu);
$footer_copyright_text = get_theme_mod('footer_copyright_text', __('© CodeeFly 2023 | All Rights Reserved', 'zyan'));

$footer_contact_from_select = get_theme_mod('footer_contact_from_select',  __('', 'zyan'));

/** Footer 2 */
$footer_2_copyright_switch = get_theme_mod('footer_2_copyright_switch',  true);
$footer_contact_from_switch = get_theme_mod('footer_contact_from_switch',  true);
$footer_2_info_switch = get_theme_mod('footer_2_info_switch', true);
$footer_info_repeater_2 = get_theme_mod('footer_info_repeater_2',  $defaults2);
?>

<?php $page_type = function_exists('get_field') ? get_field('page_type') : ''; ?>
<?php if (!empty($footer_switch)) : ?>
    <?php if ($page_type == 'onepage') : ?>
        <div class="main" id="footer">
            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                <?php if (!empty($footer_info_switch)) : ?>
                    <section id="contact" class="tf__contact_2 pt_95 xs_pt_45">
                        <div class="container">
                            <div class="row animation">
                                <?php foreach ($footer_info_repeater_2 as $setting) : ?>
                                    <div class="col-xl-4 col-md-6 col-lg-4">
                                        <div class="tf__contact_2_text fade_left" data-trigerId="contact">
                                            <span>
                                                <img src="<?php echo esc_url($setting['info_icon']) ?>" alt="<?php esc_attr_e('footer', 'zyan') ?>" class="img-fluid w-100 svg" />
                                            </span>
                                            <h3><?php echo zyan_kses($setting['info_title']) ?></h3>
                                            <p>
                                                <?php echo zyan_kses($setting['info_description']) ?>
                                            </p>
                                            <?php echo zyan_kses($setting['info_links']) ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="contact_form_2">
                                <?php echo do_shortcode('[contact-form-7  id="' . $footer_contact_from_select . '"]'); ?>
                            </div>
                        </div>
                    </section>
                <?php endif ?>
                <?php if (!empty($footer_copyright_switch)) : ?>
                    <div class="footer_2_copyright_area mt_120 xs_mt_80">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tf__footer_copyright">
                                        <p><?php echo zyan_kses($footer_copyright_text) ?></p>
                                        <ul>
                                            <?php foreach ($footer_menu_repeater as $setting) : ?>
                                                <li>
                                                    <a href="<?php print esc_url($setting['footer_menu_url']) ?>" class="text_hover_animaiton"><?php echo zyan_kses($setting['footer_menu_text']) ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    <?php else : ?>
        <footer class="footer" id="footer">
            <div class="footer-container">
                <div class="pt_120 xs_pt_80 sm_pt_80">
                    <div class="container">
                        <?php if (!empty($footer_info_switch)) : ?>
                            <div class="row">
                                <?php foreach ($settings as $setting) : ?>
                                    <div class="col-lg-4">
                                        <div class="tf__footer_content fade_right" data-trigerId="<?php esc_attr_e('footer', 'zyan') ?>" data-stagger=".25">
                                            <div class="icon">
                                                <div class="icon-contianer">
                                                    <img src="<?php echo esc_url($setting['info_icon']) ?>" alt="<?php esc_attr_e('footer', 'zyan') ?>" class="img-fluid w-100 svg" />
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h3><?php echo zyan_kses($setting['info_title']) ?></h3>
                                                <?php echo zyan_kses($setting['info_links']) ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif ?>
                        <?php if (!empty($footer_copyright_switch)) : ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="tf__footer_copyright">
                                        <p><?php echo zyan_kses($footer_copyright_text) ?></p>
                                        <ul>
                                            <?php foreach ($footer_menu_repeater as $setting) : ?>
                                                <li>
                                                    <a href="<?php print esc_url($setting['footer_menu_url']) ?>" class="text_hover_animaiton"><?php echo zyan_kses($setting['footer_menu_text']) ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </footer>
    <?php endif ?>
<?php endif ?>