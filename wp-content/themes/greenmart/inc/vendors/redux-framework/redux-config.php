<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/.
 */
if (!class_exists('greenmart_Redux_Framework_Config')) {
    class greenmart_Redux_Framework_Config
    {
        public $args = [];
        public $sections = [];
        public $theme;
        public $ReduxFramework;
        public $output;
        public $default_color;
        public $default_fonts;

        public function __construct()
        {
            if (!class_exists('ReduxFramework')) {
                return;
            }

            add_action('init', [$this, 'initSettings'], 10);
        }

        public function redux_default_color()
        {
            $this->default_color = greenmart_tbay_default_theme_primary_color();
        }

        public function redux_default_fonts()
        {
            $this->default_fonts = greenmart_tbay_default_theme_primary_fonts();
        }

        public function redux_output()
        {
            $this->output = require_once get_parent_theme_file_path(GREENMART_INC.'/skins/'.greenmart_tbay_get_theme().'/output.php');
        }

        public function initSettings()
        {
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            //Create output
            $this->redux_output();

            $this->redux_default_color();

            $this->redux_default_fonts();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections()
        {
            global $wp_registered_sidebars;
            $sidebars = [];

            $output = $this->output;

            $default_color = $this->default_color;
            $default_fonts = $this->default_fonts;

            if (!empty($wp_registered_sidebars)) {
                foreach ($wp_registered_sidebars as $sidebar) {
                    $sidebars[$sidebar['id']] = $sidebar['name'];
                }
            }
            $columns = ['1' => esc_html__('1 Column', 'greenmart'),
                '2' => esc_html__('2 Columns', 'greenmart'),
                '3' => esc_html__('3 Columns', 'greenmart'),
                '4' => esc_html__('4 Columns', 'greenmart'),
                '5' => esc_html__('5 Columns', 'greenmart'),
                '6' => esc_html__('6 Columns', 'greenmart'),
            ];

            $current_theme = greenmart_tbay_get_theme();

            $menu_mobile_type_hidden = false;
            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                $menu_mobile_type_hidden = true;
            }
            // General Settings Tab
            $this->sections[] = [
                'icon' => 'el-icon-cogs',
                'title' => esc_html__('General', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'active_theme',
                        'type' => 'image_select',
                        'compiler' => true,
                        'class' => 'image-large active_skins',
                        'title' => esc_html__('Activated Skin', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Choose a skin for your website.', 'greenmart').'</em>',
                        'options' => greenmart_tbay_get_themes(),
                        'default' => 'organic',
                    ],
                    [
                        'id' => 'preload',
                        'type' => 'switch',
                        'title' => esc_html__('Preload Website', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'select_preloader',
                        'type' => 'image_select',
                        'class' => 'image-preloader',
                        'compiler' => true,
                        'title' => esc_html__('Select Preloader', 'greenmart'),
                        'subtitle' => esc_html__('Choose a Preloader for your website.', 'greenmart'),
                        'required' => ['preload', '=', true],
                        'options' => [
                            'loader1' => [
                                'title' => 'Loader 1',
                                'img' => GREENMART_ASSETS_IMAGES.'/preloader/loader1.png',
                            ],
                            'loader2' => [
                                'title' => 'Loader 2',
                                'img' => GREENMART_ASSETS_IMAGES.'/preloader/loader2.png',
                            ],
                            'loader3' => [
                                'title' => 'Loader 3',
                                'img' => GREENMART_ASSETS_IMAGES.'/preloader/loader3.png',
                            ],
                            'loader4' => [
                                'title' => 'Loader 4',
                                'img' => GREENMART_ASSETS_IMAGES.'/preloader/loader4.png',
                            ],
                            'loader5' => [
                                'title' => 'Loader 5',
                                'img' => GREENMART_ASSETS_IMAGES.'/preloader/loader5.png',
                            ],
                            'loader6' => [
                                'title' => 'Loader 6',
                                'img' => GREENMART_ASSETS_IMAGES.'/preloader/loader6.png',
                            ],
                            'custom_image' => [
                                'title' => 'Custom image',
                                'img' => GREENMART_ASSETS_IMAGES.'/preloader/custom_image.png',
                            ],
                        ],
                        'default' => 'loader1',
                    ],
                    [
                        'id' => 'media-preloader',
                        'type' => 'media',
                        'required' => ['select_preloader', '=', 'custom_image'],
                        'title' => esc_html__('Upload preloader image', 'greenmart'),
                        'subtitle' => esc_html__('Image File (.gif)', 'greenmart'),
                        'desc' => sprintf(wp_kses(__('You can download some the Gif images <a target="_blank" href="%1$s">here</a>.', 'greenmart'), ['a' => ['href' => [], 'target' => []]]), 'https://loading.io/'),
                    ],
                    [
                        'id' => 'config_media',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Config Image Size', 'greenmart'),
                        'subtitle' => esc_html__('Config Image Size in WooCommerce and Media Setting', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'ajax_dropdown_megamenu',
                        'type' => 'switch',
                        'title' => esc_html__('Enable "Ajax Dropdown" Mega Menu', 'greenmart'),
                        'default' => false,
                    ],
                ],
            ];
            // Header
            $this->sections[] = [
                'icon' => 'el el-website',
                'title' => esc_html__('Header', 'greenmart'),
            ];

            // Header
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Header Config', 'greenmart'),
                'fields' => $this->header_sections_fields(),
            ];

            $this->sections[] = $this->search_forum_sections();

            // Footer
            $this->sections[] = [
                'icon' => 'el el-website',
                'title' => esc_html__('Footer', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'footer_type',
                        'type' => 'select',
                        'title' => esc_html__('Footer Layout Type', 'greenmart'),
                        'subtitle' => esc_html__('Choose a footer for your website.', 'greenmart'),
                        'options' => greenmart_tbay_get_footer_layouts(),
                        'default' => 'footer-1',
                    ],
                    [
                        'id' => 'copyright_text',
                        'type' => 'editor',
                        'title' => esc_html__('Copyright Text', 'greenmart'),
                        'default' => esc_html__('<p>Copyright  &#64; 2023 greenmart Designed by ThemBay. All Rights Reserved.</p>', 'greenmart'),
                        'required' => ['footer_type', '=', ''],
                    ],
                    [
                        'id' => 'back_to_top',
                        'type' => 'switch',
                        'title' => esc_html__('Back To Top Button', 'greenmart'),
                        'subtitle' => esc_html__('Toggle whether or not to enable a back to top button on your pages.', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'category_fixed',
                        'type' => 'switch',
                        'title' => esc_html__('Show Menu Category Fixed', 'greenmart'),
                        'subtitle' => esc_html__('Toggle whether or not to show "Menu Category Fixed" on your pages.', 'greenmart'),
                        'default' => true,
                        'required' => ['active_theme', '=', 'restaurant'],
                    ],
                ],
            ];

            // Blog settings
            $this->sections[] = [
                'icon' => 'el el-pencil',
                'title' => esc_html__('Blog', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'show_blog_breadcrumbs',
                        'type' => 'switch',
                        'title' => esc_html__('Breadcrumbs', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'title' => esc_html__('Breadcrumbs Background Color', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'greenmart').'</em>',
                        'id' => 'blog_breadcrumb_color',
                        'required' => ['show_blog_breadcrumbs', '=', true],
                        'type' => 'color',
                        'transparent' => false,
                    ],
                    [
                        'id' => 'blog_breadcrumb_image',
                        'type' => 'media',
                        'required' => ['show_blog_breadcrumbs', '=', true],
                        'title' => esc_html__('Breadcrumbs Background', 'greenmart'),
                        'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'greenmart'),
                    ],
                ],
            ];
            // Archive Blogs settings
            $this->sections[] = $this->blog_archive_sections($sidebars, $columns);

            // Single Blogs settings
            $this->sections[] = $this->blog_single_sections($sidebars, $columns);

            // Woocommerce
            $this->sections[] = [
                'icon' => 'el el-shopping-cart',
                'title' => esc_html__('WooCommerce Theme', 'greenmart'),
                'fields' => $this->woocommerce_sections_fields(),
            ];

            // Archive settings
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Product Archives', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'product_archive_layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => esc_html__('Archive Product Layout', 'greenmart'),
                        'subtitle' => esc_html__('Select the layout you want to apply on your archive product page.', 'greenmart'),
                        'options' => $this->option_product(),
                        'default' => 'left-main',
                    ],
                    [
                        'id' => 'enable_category_image',
                        'type' => 'switch',
                        'title' => esc_html__('Enable/Disable image category', 'greenmart'),
                        'subtitle' => esc_html__('Enable/Disable image category', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'enable_category_title',
                        'type' => 'switch',
                        'title' => esc_html__('Enable/Disable title category', 'greenmart'),
                        'subtitle' => esc_html__('Enable/Disable title category', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'enable_category_description',
                        'type' => 'switch',
                        'title' => esc_html__('Enable/Disable description category', 'greenmart'),
                        'subtitle' => esc_html__('Enable/Disable description category', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'show_top_archive_product',
                        'type' => 'switch',
                        'title' => esc_html__('Show widget Top Archive product', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'product_archive_fullwidth',
                        'type' => 'switch',
                        'title' => esc_html__('Is Full Width?', 'greenmart'),
                        'required' => ['active_theme', '!=', 'fresh-el'],
                        'default' => false,
                    ],
                    [
                        'id' => 'product_archive_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Left Sidebar', 'greenmart'),
                        'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenmart'),
                        'options' => $sidebars,
                        'default' => 'product-left-sidebar',
                    ],
                    [
                        'id' => 'product_archive_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Right Sidebar', 'greenmart'),
                        'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenmart'),
                       'options' => $sidebars,
                        'default' => 'product-right-sidebar',
                    ],
                    [
                        'id' => 'product_display_mode',
                        'type' => 'button_set',
                        'title' => esc_html__('Display Mode', 'greenmart'),
                        'subtitle' => esc_html__('Choose a default layout archive product.', 'greenmart'),
                        'options' => ['grid' => esc_html__('Grid', 'greenmart'), 'list' => esc_html__('List', 'greenmart')],
                        'default' => 'grid',
                    ],
                    [
                        'id' => 'number_products_per_page',
                        'type' => 'text',
                        'title' => esc_html__('Number of Products Per Page', 'greenmart'),
                        'default' => 9,
                        'min' => '1',
                        'step' => '1',
                        'max' => '100',
                        'type' => 'slider',
                    ],
                    [
                        'id' => 'product_columns',
                        'type' => 'select',
                        'title' => esc_html__('Product Columns', 'greenmart'),
                        'options' => $columns,
                        'default' => 3,
                    ],
                ],
            ];
            // Product Page
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Single Product', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'product_single_layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => esc_html__('Single Product Layout', 'greenmart'),
                        'subtitle' => esc_html__('Select the layout you want to apply on your Single Product Page.', 'greenmart'),
                        'options' => $this->option_product(),
                        'default' => 'left-main',
                    ],
                    [
                        'id' => 'product_single_fullwidth',
                        'type' => 'switch',
                        'title' => esc_html__('Is Full Width?', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'product_single_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Single Product Left Sidebar', 'greenmart'),
                        'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenmart'),
                         'options' => $sidebars,
                        'default' => 'product-left-sidebar',
                    ],
                    [
                        'id' => 'product_single_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Single Product Right Sidebar', 'greenmart'),
                        'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenmart'),
                        'options' => $sidebars,
                        'default' => 'product-right-sidebar',
                    ],
                    [
                        'id' => 'style_single_product',
                        'type' => 'select',
                        'title' => esc_html__('Style Single Product Thumbnail', 'greenmart'),
                        'subtitle' => esc_html__('Choose a style single product thumbnail.', 'greenmart'),
                        'options' => [
                                'horizontal' => 'Thumbnail Horizontal',
                                'vertical' => 'Thumbnail Vertical',
                        ],
                        'default' => 'horizontal',
                    ],

                    [
                        'id' => 'enable_buy_now',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Buy Now', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'redirect_buy_now',
                        'required' => ['enable_buy_now', '=', true],
                        'type' => 'button_set',
                        'title' => esc_html__('Redirect to page after Buy Now', 'greenmart'),
                        'options' => [
                                'cart' => 'Page Cart',
                                'checkout' => 'Page CheckOut',
                        ],
                        'default' => 'cart',
                    ],
                    [
                        'id' => 'opt-divide',
                        'class' => 'big-divide',
                        'type' => 'divide',
                    ],
                    [
                        'id' => 'show_product_countdown',
                        'type' => 'switch',
                        'title' => esc_html__('Show Products Countdown', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'show_product_nav',
                        'type' => 'switch',
                        'title' => esc_html__('Show Product navigator', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'show_product_social_share',
                        'type' => 'switch',
                        'title' => esc_html__('Show Social Share', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'style_single_tabs_style',
                        'type' => 'select',
                        'title' => esc_html__('Style Product Tabs', 'greenmart'),
                        'subtitle' => esc_html__('Choose a style tabs.', 'greenmart'),
                        'options' => [
                                'default' => 'Default',
                                'tbhorizontal' => 'Horizontal',
                                'tbvertical' => 'Vertical',
                                'accordion' => 'Accordion ',
                        ],
                        'default' => 'default',
                    ],
                    [
                        'id' => 'show_product_review_tab',
                        'type' => 'switch',
                        'title' => esc_html__('Show Product Review Tab', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'show_product_releated',
                        'type' => 'switch',
                        'title' => esc_html__('Show Products Releated', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'show_product_upsells',
                        'type' => 'switch',
                        'title' => esc_html__('Show Products upsells', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'number_product_thumbnail',
                        'title' => esc_html__('Number Images Thumbnail to show', 'greenmart'),
                        'default' => 4,
                        'min' => '2',
                        'step' => '1',
                        'max' => '5',
                        'type' => 'slider',
                    ],
                    [
                        'id' => 'number_product_releated',
                        'title' => esc_html__('Number of related products to show', 'greenmart'),
                        'default' => 3,
                        'min' => '1',
                        'step' => '1',
                        'max' => '20',
                        'required' => ['show_product_releated', '=', true],
                        'type' => 'slider',
                    ],
                    [
                        'id' => 'releated_product_columns',
                        'type' => 'select',
                        'title' => esc_html__('Releated Products Columns', 'greenmart'),
                        'options' => $columns,
                        'required' => ['show_product_releated', '=', true],
                        'default' => 3,
                    ],
                ],
            ];

            // woocommerce Mini cart settings
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Mini Cart', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'show_mini_cart_qty',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Quantity on Mini-Cart', 'greenmart'),
                        'default' => true,
                    ],
                ],
            ];

            // woocommerce Breadcrumb settings
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Breadcrumb', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'show_product_breadcrumbs',
                        'type' => 'switch',
                        'title' => esc_html__('Breadcrumbs', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'title' => esc_html__('Breadcrumbs Background Color', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'greenmart').'</em>',
                        'id' => 'woo_breadcrumb_color',
                        'required' => ['show_product_breadcrumbs', '=', true],
                        'type' => 'color',
                        'transparent' => false,
                    ],
                    [
                        'id' => 'woo_breadcrumb_image',
                        'required' => ['show_product_breadcrumbs', '=', true],
                        'type' => 'media',
                        'title' => esc_html__('Breadcrumbs Background', 'greenmart'),
                        'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'greenmart'),
                    ],
                ],
            ];

            // woocommerce Other page settings
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Checkout', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'show_checkout_image',
                        'type' => 'switch',
                        'title' => esc_html__('Show Image', 'greenmart'),
                        'subtitle' => esc_html__('Show image on page Checkout', 'greenmart'),
                        'default' => true,
                    ],
                    array(
                        'id' => 'show_checkout_quantity',
                        'type' => 'switch',
                        'title' => esc_html__('Show Quantity Product', 'greenmart'),
                        'subtitle'  => esc_html__('Enable or disable "Quantity Product" on Review Order on page Checkout', 'greenmart'),
                        'default' => true
                    ),
                ],
            ];

            // woocommerce Multi-vendor settings

            $this->sections[] = $this->multi_vendor_sections($columns);

            // Mobile
            $this->sections[] = [
                'icon' => 'el el-photo',
                'title' => esc_html__('Mobile', 'greenmart'),
            ];

            // Mobile Header settings
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Header Mobile', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'mobile-logo',
                        'type' => 'media',
                        'title' => esc_html__('Mobile Logo', 'greenmart'),
                        'desc' => esc_html__('', 'greenmart'),
                        'subtitle' => esc_html__('Upload a .png or .gif image that will be mobile logo', 'greenmart'),
                    ],
                    [
                        'id' => 'logo_img_width_mobile',
                        'type' => 'slider',
                        'title' => esc_html__('Mobile Logo image maximum width (px)', 'greenmart'),
                        'desc' => esc_html__('Set maximum width for logo image in the header. In pixels', 'greenmart'),
                        'default' => 200,
                        'min' => 50,
                        'step' => 1,
                        'max' => 600,
                    ],
                    [
                        'id' => 'logo_mobile_padding',
                        'type' => 'spacing',
                        'mode' => 'padding',
                        'units' => ['px'],
                        'units_extended' => 'false',
                        'title' => esc_html__('Mobile Logo image padding', 'greenmart'),
                        'desc' => esc_html__('Add some spacing around your logo image', 'greenmart'),
                        'default' => [
                            'padding-top' => '0px',
                            'padding-right' => '0px',
                            'padding-bottom' => '0px',
                            'padding-left' => '0px',
                            'units' => 'px',
                        ],
                    ],
                    [
                        'id' => 'logo_all_page',
                        'type' => 'switch',
                        'title' => esc_html__('Logo all page', 'greenmart'),
                        'desc' => esc_html__('Shown logo on all pages', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id'        => 'hidden_header_el_pro_mobile',
                        'type'      => 'switch',
                        'title'     => esc_html__('Hide Header Elementor Pro', 'greenmart'),
                        'subtitle'  => esc_html__('Hide Header Elementor Pro on mobile', 'greenmart'),
                        'default'   => true
                    ],
                ],
            ];

            // Footer
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Footer mobile', 'greenmart'),
                'fields' => $this->footer_mobile_sections_fields(),
            ];

            // Menu mobile social settings
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Menu mobile', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'menu_mobile_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Menu Mobile Type', 'greenmart'),
                        'hidden' => $menu_mobile_type_hidden,
                        'options' => $this->option_menu_mobile(),
                        'default' => 'smart_menu',
                    ],
                     [
                        'id' => 'menu_mobile_themes',
                        'type' => 'button_set',
                        'title' => esc_html__('Menu mobile theme', 'greenmart'),
                        'required' => ['menu_mobile_type', '=', 'smart_menu'],
                        'options' => [
                            'theme-light' => esc_html__('Light', 'greenmart'),
                            'theme-dark' => esc_html__('Dark', 'greenmart'),
                        ],
                        'default' => 'theme-light',
                    ],
                    [
                        'id' => 'enable_menu_mobile_effects',
                        'type' => 'switch',
                        'title' => esc_html__('Menu mobile effects ', 'greenmart'),
                        'required' => ['menu_mobile_type', '=', 'smart_menu'],
                        'default' => false,
                    ],
                    [
                        'id' => 'menu_mobile_effects_panels',
                        'type' => 'select',
                        'title' => esc_html__('Panels effect', 'greenmart'),
                        'required' => ['enable_menu_mobile_effects', '=', true],
                        'options' => [
                            'fx-panels-none' => esc_html__('No effect', 'greenmart'),
                            'fx-panels-slide-0' => esc_html__('Slide 0', 'greenmart'),
                            'no-effect' => esc_html__('Slide 30', 'greenmart'),
                            'fx-panels-slide-100' => esc_html__('Slide 100', 'greenmart'),
                            'fx-panels-slide-up' => esc_html__('Slide uo', 'greenmart'),
                            'fx-panels-zoom' => esc_html__('Zoom', 'greenmart'),
                        ],
                        'default' => 'no-effect',
                    ],
                    [
                        'id' => 'menu_mobile_effects_listitems',
                        'type' => 'select',
                        'title' => esc_html__('List items effect', 'greenmart'),
                        'required' => ['enable_menu_mobile_effects', '=', true],
                        'options' => [
                            'no-effect' => esc_html__('No effect', 'greenmart'),
                            'fx-listitems-drop' => esc_html__('Drop', 'greenmart'),
                            'fx-listitems-fade' => esc_html__('Fade', 'greenmart'),
                            'fx-listitems-slide' => esc_html__('slide', 'greenmart'),
                        ],
                        'default' => 'no-effect',
                    ],
                    [
                        'id' => 'menu_mobile_title',
                        'type' => 'text',
                        'title' => esc_html__('Menu mobile Title', 'greenmart'),
                        'default' => esc_html__('Menu', 'greenmart'),
                    ],
                    [
                        'id' => 'enable_menu_mobile_search',
                        'type' => 'switch',
                        'title' => esc_html__('Search menu item', 'greenmart'),
                        'required' => ['menu_mobile_type', '=', 'smart_menu'],
                        'default' => false,
                    ],
                    [
                        'id' => 'menu_mobile_search_items',
                        'type' => 'text',
                        'title' => esc_html__('Search item menu placeholder', 'greenmart'),
                        'required' => ['enable_menu_mobile_search', '=', true],
                        'default' => esc_html__('Search in menu...', 'greenmart'),
                    ],
                    [
                        'id' => 'menu_mobile_no_esults',
                        'type' => 'text',
                        'title' => esc_html__('“No results” text', 'greenmart'),
                        'required' => ['enable_menu_mobile_search', '=', true],
                        'default' => esc_html__('No results found.', 'greenmart'),
                    ],
                    [
                        'id' => 'menu_mobile_search_splash',
                        'type' => 'textarea',
                        'title' => esc_html__('Search text splash', 'greenmart'),
                        'required' => ['enable_menu_mobile_search', '=', true],
                        'default' => esc_html__('What are you looking for? </br> Start typing to search the menu.', 'greenmart'),
                    ],
                    [
                        'id' => 'enable_menu_mobile_counters',
                        'type' => 'switch',
                        'title' => esc_html__('Menu mobile counters', 'greenmart'),
                        'required' => ['menu_mobile_type', '=', 'smart_menu'],
                        'default' => false,
                    ],
                    [
                        'id' => 'enable_menu_social',
                        'type' => 'switch',
                        'title' => esc_html__('Menu mobile social', 'greenmart'),
                        'required' => ['menu_mobile_type', '=', 'smart_menu'],
                        'default' => false,
                    ],

                    [
                        'id' => 'menu_social_slides',
                        'type' => 'slides',
                        'title' => esc_html__('Menu mobile social slides', 'greenmart'),
                        'desc' => esc_html__('This social will store all slides values into a multidimensional array to use into a foreach loop.', 'greenmart'),
                        'class' => 'remove-upload-slides',
                        'show' => [
                            'title' => true,
                            'description' => false,
                            'url' => true,
                        ],
                        'required' => ['enable_menu_social', '=', true],
                        'placeholder' => [
                            'title' => esc_html__('Enter icon name', 'greenmart'),
                            'url' => esc_html__('Link icon', 'greenmart'),
                        ],
                    ],
                    [
                        'id' => 'opt-divide',
                        'class' => 'big-divide',
                        'type' => 'divide',
                    ],

                    [
                        'id' => 'menu_mobile_one_select',
                        'type' => 'select',
                        'data' => 'menus',
                        'title' => esc_html__('Main menu', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Tab 1 menu option', 'greenmart').'</em>',
                        'desc' => esc_html__('Select the menu you want to display.', 'greenmart'),
                    ],
                    [
                        'id' => 'menu_mobile_tab_one',
                        'type' => 'text',
                        'title' => esc_html__('Tab 1 title', 'greenmart'),
                        'required' => ['enable_menu_second', '=', true],
                        'default' => esc_html__('Menu', 'greenmart'),
                    ],
                    [
                        'id' => 'menu_mobile_tab_one_icon',
                        'type' => 'text',
                        'title' => esc_html__('Tab 1 icon', 'greenmart'),
                        'required' => ['enable_menu_second', '=', true],
                        'desc' => esc_html__('Enter icon name of font: awesome, simplelineicons', 'greenmart'),
                        'default' => 'icon-menu icons',
                    ],
                    [
                        'id' => 'enable_menu_second',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Tab 2', 'greenmart'),
                        'required' => ['menu_mobile_type', '=', 'smart_menu'],
                        'default' => false,
                    ],

                    [
                        'id' => 'menu_mobile_tab_scond',
                        'type' => 'text',
                        'title' => esc_html__('Tab 2 title', 'greenmart'),
                        'required' => ['enable_menu_second', '=', true],
                        'default' => esc_html__('Categories', 'greenmart'),
                    ],

                    [
                        'id' => 'menu_mobile_second_select',
                        'type' => 'select',
                        'data' => 'menus',
                        'title' => esc_html__('Tab 2 menu option', 'greenmart'),
                        'required' => ['enable_menu_second', '=', true],
                        'desc' => esc_html__('Select the menu you want to display.', 'greenmart'),
                    ],
                    [
                        'id' => 'menu_mobile_tab_second_icon',
                        'type' => 'text',
                        'title' => esc_html__('Tab 2 icon', 'greenmart'),
                        'required' => ['enable_menu_second', '=', true],
                        'desc' => esc_html__('Enter icon name of font: awesome, simplelineicons', 'greenmart'),
                        'default' => 'icon-grid icons',
                    ],
                ],
            ];

            // Mobile Header settings
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Woocommerce mobile', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'enable_add_cart_mobile',
                        'type' => 'switch',
                        'title' => esc_html__('Show Add to Cart on Mobile (Home Page and Shop Page)', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'disable_add_cart_fixed',
                        'type' => 'switch',
                        'title' => esc_html__('Disable Add to cart fixed', 'greenmart'),
                        'subtitle' => esc_html__('On Page Single Product', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'mobile_form_cart_style',
                        'type' => 'select',
                        'title' => esc_html__('Add To Cart Form Type', 'greenmart'),
                        'subtitle' => esc_html__('On Page Single Product', 'greenmart'),
                        'required' => ['disable_add_cart_fixed', '!=', '1'],
                        'options' => [
                            'default' => esc_html__('Default', 'greenmart'),
                            'popup' => esc_html__('Popup', 'greenmart'),
                        ],
                        'default' => 'default',
                    ],
                    [
                        'id' => 'enable_quantity_mobile',
                        'type' => 'switch',
                        'title' => esc_html__('Show Quantity', 'greenmart'),
                        'subtitle' => esc_html__('On Page Single Product', 'greenmart'),
                        'default' => false,
                    ],
                ],
            ];

            // Style
            // Mobile Search settings
            $this->sections[] = $this->settings_search_mobile_sections();

            $this->sections[] = [
                'icon' => 'el el-icon-css',
                'title' => esc_html__('Style', 'greenmart'),
            ];

            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Typography', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'show_typography',
                        'type' => 'switch',
                        'title' => esc_html__('Edit Typography', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'title' => esc_html__('Font Source', 'greenmart'),
                        'id' => 'font_source',
                        'type' => 'radio',
                        'required' => ['show_typography', '=', true],
                        'options' => [
                            '1' => 'Standard + Google Webfonts',
                            '2' => 'Google Custom',
                            '3' => 'Custom Fonts',
                        ],
                        'default' => '1',
                    ],
                    [
                        'id' => 'font_google_code',
                        'type' => 'text',
                        'title' => esc_html__('Google Code', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Paste the provided Google Code', 'greenmart').'</em>',
                        'default' => '',
                        'desc' => esc_html__('e.g.: https://fonts.googleapis.com/css?family=Open+Sans', 'greenmart'),
                        'required' => ['font_source', '=', '2'],
                    ],

                    [
                        'id' => 'main_custom_font_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style="margin: 0;">'.sprintf(
                            '%1$s <a href="%2$s">%3$s</a>',
                            esc_html__('Video guide custom font in ', 'greenmart'),
                            esc_url('https://www.youtube.com/watch?v=ljXAxueAQUc'),
                            esc_html__('here', 'greenmart')
                                ).'</h3>',
                        'required' => ['font_source', '=', '3'],
                    ],

                    [
                        'id' => 'main_font_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style="margin: 0;"> '.esc_html__('Font Primary', 'greenmart').'</h3>',
                        'required' => ['show_typography', '=', true],
                    ],

                    // Standard + Google Webfonts
                    [
                        'title' => esc_html__('Font Face Primary', 'greenmart'),
                        'id' => 'main_font',
                        'type' => 'typography',
                        'line-height' => false,
                        'text-align' => false,
                        'font-style' => false,
                        'font-weight' => false,
                        'all_styles' => true,
                        'font-size' => false,
                        'color' => false,
                        'default' => [
                            'font-family' => '',
                            'subsets' => '',
                        ],
                        'required' => [
                            ['font_source', '=', '1'],
                            ['show_typography', '=', true],
                        ],
                    ],

                    // Google Custom
                    [
                        'title' => esc_html__('Google Font Face Primary', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Enter your Google Font Name for the theme\'s Main Typography', 'greenmart').'</em>',
                        'desc' => esc_html__('e.g.: &#39;Open Sans&#39;, sans-serif', 'greenmart'),
                        'id' => 'main_google_font_face',
                        'type' => 'text',
                        'default' => '',
                        'required' => [
                            ['font_source', '=', '2'],
                            ['show_typography', '=', true],
                        ],
                    ],

                    // main Custom fonts
                    [
                        'title' => esc_html__('Custom Font Face Primary', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Enter your Custom Font Name for the theme\'s Main Typography', 'greenmart').'</em>',
                        'desc' => esc_html__('e.g.: &#39;Open Sans&#39;, sans-serif', 'greenmart'),
                        'id' => 'main_custom_font_face',
                        'type' => 'text',
                        'default' => '',
                        'required' => [
                            ['font_source', '=', '3'],
                            ['show_typography', '=', true],
                        ],
                    ],

                    [
                        'id' => 'main_font_second_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style="margin: 0;"> '.esc_html__('Font Second', 'greenmart').'</h3>',
                        'required' => [
                            ['show_typography', '=', true],
                            ['show_typography', '=', $default_fonts['font_second_enable']],
                        ],
                    ],

                    // Standard + Google Webfonts
                    [
                        'title' => esc_html__('Font Face Second', 'greenmart'),
                        'id' => 'main_font_second',
                        'type' => 'typography',
                        'line-height' => false,
                        'text-align' => false,
                        'font-style' => false,
                        'font-weight' => false,
                        'all_styles' => true,
                        'font-size' => false,
                        'color' => false,
                        'default' => [
                            'font-family' => '',
                            'subsets' => '',
                        ],
                        'required' => [
                            ['font_source', '=', '1'],
                            ['show_typography', '=', true],
                            ['show_typography', '=', $default_fonts['font_second_enable']],
                        ],
                    ],

                    // Google Custom
                    [
                        'title' => esc_html__('Google Font Face Second', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Enter your Google Font Name for the theme\'s Main Typography', 'greenmart').'</em>',
                        'desc' => esc_html__('e.g.: &#39;Open Sans&#39;, sans-serif', 'greenmart'),
                        'id' => 'main_second_google_font_face',
                        'type' => 'text',
                        'default' => '',
                        'required' => [
                            ['font_source', '=', '2'],
                            ['show_typography', '=', true],
                            ['show_typography', '=', $default_fonts['font_second_enable']],
                        ],
                    ],

                    // main Custom fonts
                    [
                        'title' => esc_html__('Custom Font Face Second', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Enter your Custom Font Name for the theme\'s Main Typography', 'greenmart').'</em>',
                        'desc' => esc_html__('e.g.: &#39;Open Sans&#39;, sans-serif', 'greenmart'),
                        'id' => 'main_second_custom_font_face',
                        'type' => 'text',
                        'default' => '',
                        'required' => [
                            ['font_source', '=', '3'],
                            ['show_typography', '=', true],
                            ['show_typography', '=', $default_fonts['font_second_enable']],
                        ],
                    ],
                ],
            ];

            $this->sections[] = [
                'title' => esc_html__('Main', 'greenmart'),
                'subsection' => true,
                'fields' => $this->sections_main_fields($default_color),
            ];

            $this->sections[] = $this->sections_color_top_bar($output);
            $this->sections[] = $this->sections_color_header($output);
            $this->sections[] = $this->sections_color_main($output);
            $this->sections[] = $this->sections_color_footer($output);
            $this->sections[] = $this->sections_color_copyright($output);
            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                $this->sections[] = $this->sections_color_header_mobile($output);
            }

            // Social Media
            $this->sections[] = [
                'icon' => 'el el-file',
                'title' => esc_html__('Social Share', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'enable_code_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Code Share', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'select_share_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Please select a sharing type', 'greenmart'),
                        'required' => ['enable_code_share', '=', true],
                        'options' => [
                            'custom' => 'TB Share',
                            'addthis' => 'Add This',
                        ],
                        'default' => 'addthis',
                    ],
                    [
                        'id' => 'code_share',
                        'type' => 'textarea',
                        'required' => ['select_share_type', '=', 'addthis'],
                        'title' => esc_html__('Addthis your code', 'greenmart'),
                        'subtitle' => esc_html__('Addthis your code', 'greenmart'),
                        'desc' => esc_html__('You get your code share in https://www.addthis.com', 'greenmart'),
                        'validate' => 'html_custom',
                        'default' => '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59f2a47d2f1aaba2"></script>',
                    ],
                    [
                        'id' => 'sortable_sharing',
                        'type' => 'sortable',
                        'mode' => 'checkbox',
                        'title' => esc_html__('Sortable Sharing', 'greenmart'),
                        'required' => ['select_share_type', '=', 'custom'],
                        'options' => [
                            'facebook' => 'Facebook',
                            'twitter' => 'Twitter',
                            'linkedin' => 'Linkedin',
                            'pinterest' => 'Pinterest',
                            'whatsapp' => 'Whatsapp',
                            'email' => 'Email',
                        ],
                        'default' => [
                            'facebook' => true,
                            'twitter' => true,
                            'linkedin' => true,
                            'pinterest' => false,
                            'whatsapp' => false,
                            'email' => true,
                        ],
                    ],
                ],
            ];

            // Performance
            $this->sections[] = [
                'icon' => 'el-icon-cog',
                'title' => esc_html__('Performance', 'greenmart'),
            ];
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Performance', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'minified_js',
                        'type' => 'switch',
                        'title' => esc_html__('Include minified JS', 'greenmart'),
                        'subtitle' => esc_html__('Minified version of functions.js and device.js file will be loaded', 'greenmart'),
                        'default' => true,
                    ],
                ],
            ];

            // Custom Code
            $this->sections[] = [
                'icon' => 'el-icon-css',
                'title' => esc_html__('Custom CSS/JS', 'greenmart'),
            ];

            // Css Custom Code
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Custom CSS', 'greenmart'),
                'fields' => [
                    [
                        'title' => esc_html__('Global Custom CSS', 'greenmart'),
                        'id' => 'custom_css',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                    ],
                    [
                        'title' => esc_html__('Custom CSS for desktop (Larger than 1024px)', 'greenmart'),
                        'id' => 'css_desktop',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                    ],
                    [
                        'title' => esc_html__('Custom CSS for tablet ( Screen area 768px to 1023px)', 'greenmart'),
                        'id' => 'css_tablet',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                    ],
                    [
                        'title' => esc_html__('Custom CSS for mobile landscape (Screen area 481px to 767px)', 'greenmart'),
                        'id' => 'css_wide_mobile',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                    ],
                    [
                        'title' => esc_html__('Custom CSS for mobile (Screen smaller 480px)', 'greenmart'),
                        'id' => 'css_mobile',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                    ],
                ],
            ];

            // Js Custom Code
            $this->sections[] = [
                'subsection' => true,
                'title' => esc_html__('Custom Js', 'greenmart'),
                'fields' => [
                    [
                        'title' => esc_html__('Header JavaScript Code', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Paste your custom JS code here. The code will be added to the header of your site.', 'greenmart').'<em>',
                        'id' => 'header_js',
                        'type' => 'ace_editor',
                        'mode' => 'javascript',
                    ],

                    [
                        'title' => esc_html__('Footer JavaScript Code', 'greenmart'),
                        'subtitle' => '<em>'.esc_html__('Here is the place to paste your Google Analytics code or any other JS code you might want to add to be loaded in the footer of your website.', 'greenmart').'<em>',
                        'id' => 'footer_js',
                        'type' => 'ace_editor',
                        'mode' => 'javascript',
                    ],
                ],
            ];

            $this->sections[] = [
                'title' => esc_html__('Import / Export', 'greenmart'),
                'desc' => esc_html__('Import and Export your Redux Framework settings from file, text or URL.', 'greenmart'),
                'icon' => 'el-icon-refresh',
                'fields' => [
                    [
                        'id' => 'opt-import-export',
                        'type' => 'import_export',
                        'title' => 'Import Export',
                        'subtitle' => 'Save and restore your Redux options',
                        'full_width' => false,
                    ],
                ],
            ];

            $this->sections[] = [
                'type' => 'divide',
            ];
        }

        public function multi_vendor_sections($columns)
        {
            if (!greenmart_is_woocommerce_activated() || !greenmart_is_active_option_muilti_vendor()) {
                return;
            }

            $output_array = [
                'subsection' => true,
                'title' => esc_html__('Multi-vendor', 'greenmart'),
                'fields' => $this->multi_vendor_fields($columns),
            ];

            return $output_array;
        }

        public function sections_main_fields($default_color)
        {
            $current_theme = greenmart_tbay_get_theme();
            $fields = [
                [
                    'title' => esc_html__('Theme Main Color', 'greenmart'),
                    'id' => 'main_color',
                    'type' => 'color',
                    'transparent' => false,
                    'default' => $default_color['main_color'],
                ],
            ];

            if ($current_theme === 'fresh-el') {
                $fields_fresh = [
                    [
                        'title' => esc_html__('Theme Color Second', 'greenmart'),
                        'id' => 'main_color_second',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => $default_color['main_color_second'],
                    ],
                ];

                $fields = array_merge($fields, $fields_fresh);
            }

            return $fields;
        }

        public function multi_vendor_fields($columns)
        {
            $mvx_array = $fields_dokan = [];

            if (class_exists('MVX')) {
                $mvx_array = [
                    'id' => 'show_vendor_name_mvx',
                    'type' => 'info',
                    'title' => esc_html__('Enable Vendor Name Only MVX Vendor', 'greenmart'),
                    'subtitle' => sprintf(__('Go to the <a href="%s" target="_blank">Setting</a> Enable "Display Product Seller" for MVX Vendor', 'greenmart'), admin_url('admin.php?page=mvx#&submenu=settings&name=settings-general')),
                ];
            }

            if (class_exists('WeDevs_Dokan') || class_exists('Mvx')) {
                $fields = [
                    [
                        'id' => 'show_vendor_name',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Vendor Name', 'greenmart'),
                        'subtitle' => esc_html__('Enable/Disable Vendor Name on HomePage and Shop page', 'greenmart'),
                        'default' => true,
                    ],
                    $mvx_array,
                ];
            }

            if (class_exists('WeDevs_Dokan')) {
                $fields_dokan = [
                    [
                        'id' => 'divide_vendor_1',
                        'class' => 'big-divide',
                        'type' => 'divide',
                    ],
                    [
                        'id' => 'show_info_vendor_tab',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Tab Info Vendor Dokan', 'greenmart'),
                        'subtitle' => esc_html__('Enable/Disable tab Info Vendor on Product Detail Dokan', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'show_seller_tab',
                        'type' => 'info',
                        'title' => esc_html__('Enable/Disable Tab Products Seller', 'greenmart'),
                        'subtitle' => sprintf(__('Go to the <a href="%s" target="_blank">Setting</a> of each Seller to Enable/Disable this tab of Dokan Vendor.', 'greenmart'), home_url('dashboard/settings/store/')),
                    ],
                    [
                        'id' => 'seller_tab_per_page',
                        'type' => 'slider',
                        'title' => esc_html__('Dokan Number of Products Seller Tab', 'greenmart'),
                        'default' => 4,
                        'min' => 1,
                        'step' => 1,
                        'max' => 10,
                    ],
                    [
                        'id' => 'seller_tab_columns',
                        'type' => 'select',
                        'title' => esc_html__('Dokan Product Columns Seller Tab', 'greenmart'),
                        'options' => $columns,
                        'default' => 4,
                    ],
                ];
            }

            $fields = array_merge($fields, $fields_dokan);

            return $fields;
        }

        public function option_product()
        {
            $current_theme = greenmart_tbay_get_theme();

            $fields = [
                'main' => [
                    'title' => 'Main Content',
                    'alt' => 'Main Content',
                    'img' => get_template_directory_uri().'/inc/assets/images/screen1.png',
                ],
                'left-main' => [
                    'title' => 'Left Sidebar - Main Content',
                    'alt' => 'Left Sidebar - Main Content',
                    'img' => get_template_directory_uri().'/inc/assets/images/screen2.png',
                ],
                'main-right' => [
                    'title' => 'Main Content - Right Sidebar',
                    'alt' => 'Main Content - Right Sidebar',
                    'img' => get_template_directory_uri().'/inc/assets/images/screen3.png',
                ],
            ];

            if ($current_theme !== 'organic-el' && $current_theme !== 'fresh-el') {
                $fields_left_right = [
                    'left-main-right' => [
                        'title' => 'Left Sidebar - Main Content - Right Sidebar',
                        'alt' => 'Left Sidebar - Main Content - Right Sidebar',
                        'img' => get_template_directory_uri().'/inc/assets/images/screen4.png',
                    ],
                ];

                $fields = array_merge($fields_left_right, $fields);
            }

            return $fields;
        }

        public function option_blog()
        {
            $current_theme = greenmart_tbay_get_theme();

            $option_blog = [
                'main' => [
                    'title' => 'Main Only',
                    'alt' => 'Main Only',
                    'img' => get_template_directory_uri().'/inc/assets/images/screen1.png',
                ],
                'left-main' => [
                    'title' => 'Left - Main Sidebar',
                    'alt' => 'Left - Main Sidebar',
                    'img' => get_template_directory_uri().'/inc/assets/images/screen2.png',
                ],
                'main-right' => [
                    'title' => 'Main - Right Sidebar',
                    'alt' => 'Main - Right Sidebar',
                    'img' => get_template_directory_uri().'/inc/assets/images/screen3.png',
                ],
            ];
            $option_left_right = [
                'left-main-right' => [
                    'title' => 'Left - Main - Right Sidebar',
                    'alt' => 'Left - Main - Right Sidebar',
                    'img' => get_template_directory_uri().'/inc/assets/images/screen4.png',
                ],
            ];

            if ($current_theme !== 'organic-el' && $current_theme !== 'fresh-el') {
                $option_blog = array_merge($option_left_right, $option_blog);
            }

            return $option_blog;
        }

        public function option_menu_mobile()
        {
            $current_theme = greenmart_tbay_get_theme();
            $option_menu_mobile = [
                'smart_menu' => esc_html__('Smart Menu', 'greenmart'),
            ];
            $menu_treeview = [
                'tree_view' => esc_html__('Tree Menu', 'greenmart'),
            ];

            if ($current_theme !== 'organic-el' && $current_theme !== 'fresh-el') {
                $option_menu_mobile = array_merge($menu_treeview, $option_menu_mobile);
            }

            return $option_menu_mobile;
        }

        public function settings_search_mobile_sections()
        {
            $skin = greenmart_tbay_get_theme();
            if ($skin !== 'organic-el' && $skin !== 'fresh-el') {
                return;
            }

            $sections = [
                'subsection' => true,
                'title' => esc_html__('Search', 'greenmart'),
                'fields' => $this->settings_search_mobile_fields(),
            ];

            return $sections;
        }

        public function settings_search_mobile_fields()
        {
            $skin = greenmart_tbay_get_theme();

            $fields = [
                [
                    'id' => 'mobile_search_type',
                    'type' => 'button_set',
                    'title' => esc_html__('Search Result', 'greenmart'),
                    'options' => [
                        'post' => esc_html__('Post', 'greenmart'),
                        'product' => esc_html__('Product', 'greenmart'),
                    ],
                    'default' => 'product',
                ],
                [
                    'id' => 'mobile_search_placeholder',
                    'type' => 'text',
                    'title' => esc_html__('Placeholder', 'greenmart'),
                    'default' => esc_html__('Searching for...', 'greenmart'),
                ],
            ];

            if ($skin === 'fresh-el') {
                $fields_fresh = [
                    [
                        'id' => 'mobile_enable_search_category',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Search in Categories', 'greenmart'),
                        'default' => true,
                    ],
                ];

                $fields = array_merge($fields, $fields_fresh);
            }

            $fields_end = [
                [
                    'id' => 'mobile_show_search_product_image',
                    'type' => 'switch',
                    'title' => esc_html__('Show Image of Search Result', 'greenmart'),
                    'default' => 1,
                ],
                [
                    'id' => 'mobile_show_search_product_price',
                    'type' => 'switch',
                    'title' => esc_html__('Show Price of Search Result', 'greenmart'),
                    'required' => ['mobile_search_type', '=', 'product'],
                    'default' => true,
                ],
                [
                    'id' => 'mobile_search_min_chars',
                    'type' => 'slider',
                    'title' => esc_html__('Search Min Characters', 'greenmart'),
                    'default' => 2,
                    'min' => 1,
                    'step' => 1,
                    'max' => 6,
                ],
                [
                    'id' => 'mobile_search_max_number_results',
                    'type' => 'slider',
                    'title' => esc_html__('Number of Search Results', 'greenmart'),
                    'desc' => esc_html__('Max number of results show in Mobile', 'greenmart'),
                    'default' => 5,
                    'min' => 2,
                    'step' => 1,
                    'max' => 20,
                ],
            ];

            $fields = array_merge($fields, $fields_end);

            return $fields;
        }

        public function search_forum_sections()
        {
            $current_theme = greenmart_tbay_get_theme();
            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                return;
            }

            $sections = [
                'subsection' => true,
                'title' => esc_html__('Search Form', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'show_searchform',
                        'type' => 'switch',
                        'title' => esc_html__('Show Search Form', 'greenmart'),
                        'default' => true,
                        'on' => esc_html__('Yes', 'greenmart'),
                        'off' => esc_html__('No', 'greenmart'),
                    ],
                    [
                        'id' => 'search_type',
                        'type' => 'button_set',
                        'title' => esc_html__('Search Content Type', 'greenmart'),
                        'required' => ['show_searchform', 'equals', true],
                        'options' => ['all' => esc_html__('All', 'greenmart'), 'post' => esc_html__('Post', 'greenmart'), 'product' => esc_html__('Product', 'greenmart')],
                        'default' => 'product',
                    ],
                    [
                        'id' => 'search_category',
                        'type' => 'switch',
                        'title' => esc_html__('Show Categories', 'greenmart'),
                        'required' => ['search_type', 'equals', ['post', 'product']],
                        'default' => false,
                        'on' => esc_html__('Yes', 'greenmart'),
                        'off' => esc_html__('No', 'greenmart'),
                    ],
                    [
                        'id' => 'autocomplete_search',
                        'type' => 'switch',
                        'title' => esc_html__('Autocomplete search?', 'greenmart'),
                        'required' => ['show_searchform', 'equals', true],
                        'default' => 1,
                    ],
                    [
                        'id' => 'show_search_product_image',
                        'type' => 'switch',
                        'title' => esc_html__('Show Search Result Image', 'greenmart'),
                        'required' => ['autocomplete_search', '=', '1'],
                        'default' => 1,
                    ],
                    [
                        'id' => 'show_search_product_price',
                        'type' => 'switch',
                        'title' => esc_html__('Show Search Result Price', 'greenmart'),
                        'required' => [['autocomplete_search', '=', '1'], ['search_type', '=', 'product']],
                        'default' => true,
                    ],
                    [
                        'id' => 'search_max_number_results',
                        'title' => esc_html__('Max number of results show', 'greenmart'),
                        'required' => ['autocomplete_search', '=', '1'],
                        'default' => 5,
                        'min' => '2',
                        'step' => '1',
                        'max' => '10',
                        'type' => 'slider',
                    ],
                ],
            ];

            return $sections;
        }

        public function sections_color_main($output)
        {
            $current_theme = greenmart_tbay_get_theme();

            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                return;
            }

            $sections = [
                'subsection' => true,
                'title' => esc_html__('Main Menu', 'greenmart'),
                'fields' => [
                    [
                        'title' => esc_html__('Link Color', 'greenmart'),
                        'id' => 'main_menu_link_color',
                        'output' => $output['main_menu_link_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color Active', 'greenmart'),
                        'id' => 'main_menu_link_color_active',
                        'output' => $output['main_menu_link_color_active'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                ],
            ];

            return $sections;
        }

        public function sections_color_top_bar($output)
        {
            $current_theme = greenmart_tbay_get_theme();
            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                return;
            }

            $sections = [
                'subsection' => true,
                'title' => esc_html__('Top Bar', 'greenmart'),
                'fields' => [
                    [
                        'id' => 'topbar_bg',
                        'type' => 'background',
                        'output' => $output['topbar_bg'],
                        'title' => esc_html__('Background', 'greenmart'),
                        'default' => [
                            'background-color' => '',
                        ],
                    ],
                    [
                        'title' => esc_html__('Text Color', 'greenmart'),
                        'id' => 'topbar_text_color',
                        'output' => $output['topbar_text_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color', 'greenmart'),
                        'id' => 'topbar_link_color',
                        'output' => $output['topbar_link_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                ],
            ];

            return $sections;
        }

        public function sections_color_header($output)
        {
            $current_theme = greenmart_tbay_get_theme();
            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                return;
            }

            $sections = [
                'subsection' => true,
                'title' => esc_html__('Header', 'greenmart'),
                'required' => ['active_theme', '!=', ['organic-el', 'fresh-el']],
                'fields' => [
                    [
                        'id' => 'header_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'greenmart'),
                        'output' => $output['header_bg'],
                        'default' => [
                            'background-color' => '',
                        ],
                    ],
                    [
                        'title' => esc_html__('Text Color', 'greenmart'),
                        'id' => 'header_text_color',
                        'output' => $output['header_text_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color', 'greenmart'),
                        'id' => 'header_link_color',
                        'output' => $output['header_link_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color Active', 'greenmart'),
                        'id' => 'header_link_color_active',
                        'output' => $output['header_link_color_active'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                ],
            ];

            return $sections;
        }

        public function sections_color_footer($output)
        {
            $current_theme = greenmart_tbay_get_theme();
            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                return;
            }

            $sections = [
                'subsection' => true,
                'title' => esc_html__('Footer', 'greenmart'),
                'fields' => [
                    [
                        'title' => esc_html__('Background', 'greenmart'),
                        'id' => 'footer_bg',
                        'output' => $output['footer_bg'],
                        'type' => 'background',
                        'default' => [
                            'background-color' => '',
                        ],
                    ],
                    [
                        'title' => esc_html__('Heading Color', 'greenmart'),
                        'id' => 'footer_heading_color',
                        'output' => $output['footer_heading_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Text Color', 'greenmart'),
                        'id' => 'footer_text_color',
                        'output' => $output['footer_text_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color', 'greenmart'),
                        'id' => 'footer_link_color',
                        'output' => $output['footer_link_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color Hover', 'greenmart'),
                        'id' => 'footer_link_color_hover',
                        'output' => $output['footer_link_color_hover'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                ],
            ];

            return $sections;
        }

        public function sections_color_copyright($output)
        {
            $current_theme = greenmart_tbay_get_theme();
            if ($current_theme === 'organic-el' || $current_theme === 'fresh-el') {
                return;
            }

            $sections = [
                'subsection' => true,
                'title' => esc_html__('Copyright', 'greenmart'),
                'fields' => [
                    [
                        'title' => esc_html__('Background', 'greenmart'),
                        'id' => 'copyright_bg',
                        'output' => $output['copyright_bg'],
                        'type' => 'background',
                        'default' => [
                            'background-color' => '',
                        ],
                    ],
                    [
                        'title' => esc_html__('Text Color', 'greenmart'),
                        'id' => 'copyright_text_color',
                        'output' => $output['copyright_text_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color', 'greenmart'),
                        'id' => 'copyright_link_color',
                        'output' => $output['copyright_link_color'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                    [
                        'title' => esc_html__('Link Color Hover', 'greenmart'),
                        'id' => 'copyright_link_color_hover',
                        'output' => $output['copyright_link_color_hover'],
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ],
                ],
            ];

            return $sections;
        }

        public function sections_color_header_mobile($output)
        {
            $current_theme = greenmart_tbay_get_theme();
            if ($current_theme !== 'organic-el' && $current_theme !== 'fresh-el') {
                return;
            }

            $sections = [
                'title' => esc_html__('Header Mobile', 'greenmart'),
                'subsection' => true,
                'fields' => [
                    [
                        'id' => 'header_mobile_bg',
                        'type' => 'color',
                        'transparent' => false,
                        'output' => $output['header_mobile_bg'],
                        'title' => esc_html__('Header Mobile Background', 'greenmart'),
                    ],
                    [
                        'title' => esc_html__('Header Color', 'greenmart'),
                        'id' => 'color',
                        'type' => 'color',
                        'transparent' => false,
                        'output' => $output['header_mobile_color'],
                    ],
                ],
            ];

            return $sections;
        }

        public function blog_archive_sections_fields($sidebars, $columns)
        {
            $output_fresh = [];
            $skin = greenmart_tbay_get_theme();

            $fields = [
                [
                    'id' => 'blog_archive_layout',
                    'type' => 'image_select',
                    'compiler' => true,
                    'title' => esc_html__('Layout', 'greenmart'),
                    'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'greenmart'),
                    'options' => $this->option_blog(),
                    'default' => 'main-right',
                ],
                [
                    'id' => 'blog_archive_fullwidth',
                    'type' => 'switch',
                    'title' => esc_html__('Is Full Width?', 'greenmart'),
                    'default' => false,
                ],
                [
                    'id' => 'blog_archive_left_sidebar',
                    'type' => 'select',
                    'title' => esc_html__('Archive Left Sidebar', 'greenmart'),
                    'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenmart'),
                    'options' => $sidebars,
                    'default' => 'blog-left-sidebar',
                ],
                [
                    'id' => 'blog_archive_right_sidebar',
                    'type' => 'select',
                    'title' => esc_html__('Archive Right Sidebar', 'greenmart'),
                    'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenmart'),
                   'options' => $sidebars,
                    'default' => 'blog-right-sidebar',
                ],
                [
                    'id' => 'blog_columns',
                    'type' => 'select',
                    'title' => esc_html__('Blog Columns', 'greenmart'),
                    'options' => $columns,
                    'default' => 1,
                ],
            ];

            if ($skin === 'fresh-el') {
                $output_fresh = [
                    [
                        'id' => 'enable_date',
                        'type' => 'switch',
                        'title' => esc_html__('Date', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'enable_author',
                        'type' => 'switch',
                        'title' => esc_html__('Author', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'enable_categories',
                        'type' => 'switch',
                        'title' => esc_html__('Categories', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'enable_comment',
                        'type' => 'switch',
                        'title' => esc_html__('Comment', 'greenmart'),
                        'default' => true,
                    ],
                    [
                        'id' => 'enable_comment_text',
                        'type' => 'switch',
                        'title' => esc_html__('Comment Text', 'greenmart'),
                        'required' => ['enable_comment', '=', true],
                        'default' => false,
                    ],
                    [
                        'id' => 'enable_short_descriptions',
                        'type' => 'switch',
                        'title' => esc_html__('Short descriptions', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'enable_readmore',
                        'type' => 'switch',
                        'title' => esc_html__('Read More', 'greenmart'),
                        'default' => false,
                    ],
                    [
                        'id' => 'text_readmore',
                        'type' => 'text',
                        'title' => esc_html__('Button "Read more" Custom Text', 'greenmart'),
                        'required' => ['enable_readmore', '=', true],
                        'default' => 'Continue Reading',
                    ],
                ];

                $fields = array_merge($fields, $output_fresh);
            }

            return $fields;
        }

        public function blog_archive_sections($sidebars, $columns)
        {
            $sections = [
                'subsection' => true,
                'title' => esc_html__('Blog Article', 'greenmart'),
                'fields' => $this->blog_archive_sections_fields($sidebars, $columns),
            ];

            return $sections;
        }

        public function blog_single_sections_fields($sidebars, $columns)
        {
            $skin = greenmart_tbay_get_theme();
            $fields = [
                [
                    'id' => 'blog_single_layout',
                    'type' => 'image_select',
                    'compiler' => true,
                    'title' => esc_html__('Single Blog Layout', 'greenmart'),
                    'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'greenmart'),
                    'options' => $this->option_blog(),
                    'default' => 'main-right',
                ],
                [
                    'id' => 'blog_single_fullwidth',
                    'type' => 'switch',
                    'title' => esc_html__('Is Full Width?', 'greenmart'),
                    'default' => false,
                ],
                [
                    'id' => 'blog_single_left_sidebar',
                    'type' => 'select',
                    'title' => esc_html__('Single Blog Left Sidebar', 'greenmart'),
                    'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenmart'),
                     'options' => $sidebars,
                    'default' => 'blog-left-sidebar',
                ],
                [
                    'id' => 'blog_single_right_sidebar',
                    'type' => 'select',
                    'title' => esc_html__('Single Blog Right Sidebar', 'greenmart'),
                    'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenmart'),
                    'options' => $sidebars,
                    'default' => 'blog-right-sidebar',
                ],
                [
                    'id' => 'show_blog_social_share',
                    'type' => 'switch',
                    'title' => esc_html__('Show Social Share', 'greenmart'),
                    'default' => 1,
                ],
            ];

            if ($skin !== 'fresh-el') {
                $output_not_fresh = [
                    [
                        'id' => 'show_blog_releated',
                        'type' => 'switch',
                        'title' => esc_html__('Show Related Posts', 'greenmart'),
                        'default' => 1,
                    ],
                    [
                        'id' => 'number_blog_releated',
                        'type' => 'slider',
                        'title' => esc_html__('Number of related posts to show', 'greenmart'),
                        'required' => ['show_blog_releated', '=', '1'],
                        'default' => 2,
                        'min' => '1',
                        'step' => '1',
                        'max' => '20',
                    ],
                    [
                        'id' => 'releated_blog_columns',
                        'type' => 'select',
                        'title' => esc_html__('Related Blogs Columns', 'greenmart'),
                        'required' => ['show_blog_releated', '=', '1'],
                        'options' => $columns,
                        'default' => 2,
                    ],
                ];

                $fields = array_merge($fields, $output_not_fresh);
            }

            return $fields;
        }

        public function blog_single_sections($sidebars, $columns)
        {
            $sections = [
                'subsection' => true,
                'title' => esc_html__('Blog', 'greenmart'),
                'fields' => $this->blog_single_sections_fields($sidebars, $columns),
            ];

            return $sections;
        }

        public function woocommerce_sections_fields()
        {
            $skin = greenmart_tbay_get_theme();

            $fields = [
                [
                   'title' => esc_html__('Sale Tag Settings', 'greenmart'),
                   'subtitle' => '<em>'.esc_html__('Predefined Format', 'greenmart').'</em>',
                   'id' => 'sale_tags',
                   'type' => 'radio',
                   'options' => [
                       'Sale!' => esc_html__('Sale!', 'greenmart'),
                       'Save {percent-diff}%' => esc_html__('Save {percent-diff}% (e.g "Save 50%")', 'greenmart'),
                       'Save {symbol}{price-diff}' => esc_html__('Save {symbol}{price-diff} (e.g "Save $50")', 'greenmart'),
                       'custom' => esc_html__('Custom Format (e.g -50%, -$50)', 'greenmart'),
                   ],
                   'default' => 'custom',
               ],
               [
                   'id' => 'sale_tag_custom',
                   'type' => 'text',
                   'title' => esc_html__('Custom Format', 'greenmart'),
                   'desc' => esc_html__('{price-diff} inserts the dollar amount off.', 'greenmart').'</br>'.
                                  esc_html__('{percent-diff} inserts the percent reduction (rounded).', 'greenmart').'</br>'.
                                  esc_html__('{symbol} inserts the Default currency symbol.', 'greenmart'),
                   'required' => ['sale_tags', '=', 'custom'],
                   'default' => '- {percent-diff}%',
               ],
               [
                   'id' => 'enable_label_featured',
                   'type' => 'switch',
                   'title' => esc_html__('Label featured', 'greenmart'),
                   'subtitle' => esc_html__('Enable/Disable label featured', 'greenmart'),
                   'default' => true,
               ],
               [
                   'id' => 'custom_label_featured',
                   'type' => 'text',
                   'title' => esc_html__('Custom Label featured', 'greenmart'),
                   'required' => ['enable_label_featured', '=', true],
                   'default' => esc_html__('Hot', 'greenmart'),
               ],
               [
                   'id' => 'opt-divide',
                   'class' => 'big-divide',
                   'type' => 'divide',
               ],
               [
                   'id' => 'enable_total_sales',
                   'type' => 'switch',
                   'title' => esc_html__('Enable Total Sales', 'greenmart'),
                   'default' => true,
               ],
               [
                   'id' => 'opt-divide',
                   'class' => 'big-divide',
                   'type' => 'divide',
               ],
               [
                   'id' => 'enable_woocommerce_catalog_mode',
                   'type' => 'switch',
                   'title' => esc_html__('Enable WooCommerce Catalog Mode', 'greenmart'),
                   'default' => false,
               ],
               [
                   'id' => 'ajax_update_quantity',
                   'type' => 'switch',
                   'title' => esc_html__('Enable/Disable Ajax update quantity', 'greenmart'),
                   'subtitle' => esc_html__('Enable/Disable Ajax update quantity (Only Cart Page)', 'greenmart'),
                   'default' => true,
               ],
               [
                   'id' => 'disable_woocommerce_password_strength',
                   'type' => 'switch',
                   'title' => esc_html__('Disable the Password Strength Meter', 'greenmart'),
                   'subtitle' => esc_html__('Disable the Password Strength Meter in WooCommerce', 'greenmart'),
                   'default' => false,
               ],
               [
                   'id' => 'disable_ajax_popup_cart',
                   'type' => 'switch',
                   'title' => esc_html__('Disable Ajax poup cart when click add to cart', 'greenmart'),
                   'default' => false,
               ],
               [
                   'id' => 'enable_hide_sub_title_product',
                   'type' => 'switch',
                   'title' => esc_html__('Hide sub title product', 'greenmart'),
                   'default' => false,
               ],
               [
                    'id' => 'show_swap_image',
                    'type' => 'switch',
                    'title' => esc_html__('Show Second Image (Hover)', 'greenmart'),
                    'default' => 1,
                ],
            ];

            if (($skin === 'fresh-el' && greenmart_is_woocommerce_activated() && !greenmart_is_woo_variation_swatches_pro()) || ($skin !== 'fresh-el' && greenmart_is_woocommerce_activated())) {
                $fields_fresh = [
                    [
                        'id' => 'enable_woocommerce_quantity_mode',
                        'type' => 'switch',
                        'title' => esc_html__('Enable WooCommerce Quantity Mode', 'greenmart'),
                        'subtitle' => esc_html__('Enable/Disable show quantity on Home Page and Shop Page', 'greenmart'),
                        'default' => false,
                    ],
                ];

                $fields = array_merge($fields, $fields_fresh);
            }

            return $fields;
        }

        public function header_sections_fields()
        {
            $skin = greenmart_tbay_get_theme();
            $header_elementor = [];
            if ($skin === 'organic-el') {
                $header_elementor = [
                    ['header_type', '=', 'header_default'],
                    ['active_theme', '=', 'organic-el'],
                ];
            } elseif ($skin === 'fresh-el') {
                $header_elementor = [
                    ['header_type', '=', 'header_default'],
                    ['active_theme', '=', 'fresh-el'],
                ];
            }

            $fields = [
                [
                    'id' => 'header_type',
                    'type' => 'select',
                    'title' => esc_html__('Header Layout Type', 'greenmart'),
                    'subtitle' => esc_html__('Choose a header for your website.', 'greenmart'),
                    'options' => greenmart_tbay_get_header_layouts(),
                    'default' => 'v1',
                ],
                [
                    'id' => 'media-logo',
                    'type' => 'media',
                    'title' => esc_html__('Logo Upload', 'greenmart'),
                    'desc' => esc_html__('', 'greenmart'),
                    'required' => $header_elementor,
                    'subtitle' => esc_html__('Upload a .png or .gif image that will be your logo.', 'greenmart'),
                ],
                [
                    'id' => 'logo_img_width',
                    'type' => 'slider',
                    'title' => esc_html__('Logo image maximum width (px)', 'greenmart'),
                    'desc' => esc_html__('Set maximum width for logo image in the header. In pixels', 'greenmart'),
                    'default' => 160,
                    'min' => 100,
                    'step' => 1,
                    'max' => 600,
                    'required' => $header_elementor,
                ],
                [
                    'id' => 'logo_padding',
                    'type' => 'spacing',
                    'mode' => 'padding',
                    'units' => ['px'],
                    'units_extended' => 'false',
                    'required' => $header_elementor,
                    'title' => esc_html__('Logo image padding', 'greenmart'),
                    'desc' => esc_html__('Add some spacing around your logo image', 'greenmart'),
                    'default' => [
                        'padding-top' => '0px',
                        'padding-right' => '0px',
                        'padding-bottom' => '0px',
                        'padding-left' => '0px',
                        'units' => 'px',
                    ],
                ],
            ];

            if ($skin !== 'organic-el' && $skin !== 'fresh-el') {
                $fields_logo_tablet = [
                    [
                        'id' => 'logo_tablet_img_width',
                        'type' => 'slider',
                        'title' => esc_html__('Tablet Logo image maximum width (px)', 'greenmart'),
                        'desc' => esc_html__('Set maximum width for logo image in the header. In pixels', 'greenmart'),
                        'default' => 100,
                        'min' => 100,
                        'step' => 1,
                        'max' => 600,
                    ],
                    [
                        'id' => 'logo_tablet_padding',
                        'type' => 'spacing',
                        'mode' => 'padding',
                        'units' => ['px'],
                        'units_extended' => 'false',
                        'title' => esc_html__('Tablet logo image padding', 'greenmart'),
                        'desc' => esc_html__('Add some spacing around your logo image', 'greenmart'),
                        'default' => [
                            'padding-top' => '0px',
                            'padding-right' => '0px',
                            'padding-bottom' => '0px',
                            'padding-left' => '0px',
                            'units' => 'px',
                        ],
                    ],
                    [
                        'id' => 'keep_header',
                        'type' => 'switch',
                        'title' => esc_html__('Keep Header', 'greenmart'),
                        'default' => false,
                    ],

                    [
                        'id' => 'header_login',
                        'type' => 'switch',
                        'title' => esc_html__('Header Login', 'greenmart'),
                        'default' => 1,
                    ],
                ];

                $fields = array_merge($fields, $fields_logo_tablet);
            }

            if ($skin === 'organic') {
                $fields_organic = [
                    [
                        'id' => 'enable_ajax_canvas_menu',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Ajax Canvas Menu', 'greenmart'),
                        'required' => ['active_theme', '=', 'organic'],
                        'default' => false,
                    ],
                ];

                $fields = array_merge($fields, $fields_organic);
            }

            return $fields;
        }

        public function footer_mobile_sections_fields()
        {
            $skin = greenmart_tbay_get_theme();
            $fields = [
                [
                    'id' => 'mobile_footer',
                    'type' => 'switch',
                    'title' => esc_html__('Show Desktop Footer', 'greenmart'),
                    'default' => false,
                ],
                [
                    'id' => 'mobile_footer_icon',
                    'type' => 'switch',
                    'title' => esc_html__('Show Mobile Footer Icons', 'greenmart'),
                    'default' => true,
                ],
            ];

            if ($skin === 'fresh-el') {
                $fields_fresh = [
                    [
                        'id' => 'mobile_footer_menu_recent',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Menu Recent Viewed', 'greenmart'),
                        'required' => [
                            ['mobile_footer_icon', '=', true],
                        ],
                        'default' => true,
                    ],
                    [
                        'id' => 'mobile_footer_menu_recent_title',
                        'type' => 'text',
                        'title' => esc_html__('Recent Viewed Title', 'greenmart'),
                        'required' => ['mobile_footer_menu_recent', '=', true],
                        'default' => esc_html__('Viewed', 'greenmart'),
                    ],
                    [
                        'id' => 'mobile_footer_menu_recent_icon',
                        'type' => 'text',
                        'title' => esc_html__('Recent Viewed Icon', 'greenmart'),
                        'required' => ['mobile_footer_menu_recent', '=', true],
                        'desc' => sprintf(
                            wp_kses(__('Enter icon name of fonts: <a href="%s" target="_blank">Awesome</a> and <a href="%s" target="_blank">Materialdesigniconic</a> and <a href="%s" target="_blank">Simplelineicons</a> .  <a href="%s" target="_blank">How to use?</a> ', 'greenmart'),
                                [
                                    'a' => ['href' => []],
                                ]), '//fontawesome.com/v4.7.0/icons/',
                                    '//zavoloklom.github.io/material-design-iconic-font/icons.html',
                                    '//fonts.thembay.com/simple-line-icons',
                                    '//youtu.be/aIfxHEAyN9Q'
                                 ),
                        'default' => 'tb-icon tb-icon-zt-zzgoback',
                    ],
                    [
                        'id' => 'mobile_footer_menu_recent_page',
                        'type' => 'select',
                        'data' => 'pages',
                        'required' => ['mobile_footer_menu_recent', '=', true],
                        'title' => esc_html__('Select Link Page Recent Viewed', 'greenmart'),
                    ],
                ];

                $fields = array_merge($fields, $fields_fresh);
            }

            return $fields;
        }

        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments.
         * */
        public function setArguments()
        {
            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = [
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'greenmart_tbay_theme_options',
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'),
                // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'),
                // Version that appears at the top of your panel
                'menu_type' => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true,
                // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Greenmart Options', 'greenmart'),
                'page_title' => esc_html__('Greenmart Options', 'greenmart'),

                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography' => true,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar' => true,
                // Show the panel pages on the admin bar
                'admin_bar_icon' => 'dashicons-portfolio',
                // Choose an icon for the admin bar menu
                'admin_bar_priority' => 50,
                // Choose an priority for the admin bar menu
                'global_variable' => 'tbay_options',
                // Set a different name for your global variable other than the opt_name
                'dev_mode' => false,
                'forced_dev_mode_off' => false,
                // Show the time the page took to load, etc
                'update_notice' => true,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer' => true,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority' => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon' => '',
                // Specify a custom URL to an icon
                'last_tab' => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options',
                // Page slug used to denote the panel
                'save_defaults' => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show' => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info' => false,
                // REMOVE

                // HINTS
                'hints' => [
                    'icon' => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color' => 'lightgray',
                    'icon_size' => 'normal',
                    'tip_style' => [
                        'color' => 'light',
                        'shadow' => true,
                        'rounded' => false,
                        'style' => '',
                    ],
                    'tip_position' => [
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ],
                    'tip_effect' => [
                        'show' => [
                            'effect' => 'slide',
                            'duration' => '500',
                            'event' => 'mouseover',
                        ],
                        'hide' => [
                            'effect' => 'slide',
                            'duration' => '500',
                            'event' => 'click mouseleave',
                        ],
                    ],
                ],
            ];

            $this->args['intro_text'] = '';

            // Add content after the form.
            $this->args['footer_text'] = '';

            return $this->args;
        }
    }

    global $reduxConfig;
    $reduxConfig = new greenmart_Redux_Framework_Config();
}
