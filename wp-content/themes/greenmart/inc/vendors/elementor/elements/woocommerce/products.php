<?php

if ( ! defined( 'ABSPATH' ) || function_exists('Greenmart_Elementor_Products') ) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;


class Greenmart_Elementor_Products extends Greenmart_Elementor_Carousel_Base {

    public function get_name() {
        return 'tbay-products';
    }

    public function get_title() {
        return esc_html__( 'Greenmart Products', 'greenmart' );
    }

    public function get_categories() {
        return [ 'greenmart-elements', 'woocommerce-elements'];
    }

    public function get_icon() {
        return 'eicon-products';
    }

    /**
     * Retrieve the list of scripts the image carousel widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.3.0
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends()
    {
        return ['slick', 'greenmart-custom-slick'];
    }

    public function get_keywords() {
        return [ 'woocommerce-elements', 'product', 'products' ];
    }

    protected function register_controls() {
        $this->register_controls_heading();

        $this->start_controls_section(
            'general',
            [
                'label' => esc_html__( 'General', 'greenmart' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => esc_html__('Number of products', 'greenmart'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__( 'Number of products to show ( -1 = all )', 'greenmart' ),
                'default' => 6,
                'min'  => -1
            ]
        );


        $this->add_control(
            'advanced',
            [
                'label' => esc_html__('Advanced', 'greenmart'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'layout_type',
            [
                'label'     => esc_html__('Layout Type', 'greenmart'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'carousel',
                'options'   => [
                    'grid'      => esc_html__('Grid', 'greenmart'), 
                    'carousel'  => esc_html__('Carousel', 'greenmart'), 
                ],
            ]
        ); 

       $this->register_woocommerce_order();

       $this->register_woocommerce_categories_operator();

        $this->add_control(
            'product_type',
            [
                'label' => esc_html__('Product Type', 'greenmart'),
                'type' => Controls_Manager::SELECT,
                'default' => 'newest',
                'options' => $this->get_product_type(),
            ]
        );

        $this->add_control(
            'product_style',
            [
                'label' => esc_html__('Product Style', 'greenmart'),
                'type' => Controls_Manager::SELECT,
                'default' => 'v1',
                'options' => $this->get_template_product(),
                'prefix_class' => 'elementor-product-'
            ]
        );
        $this->add_control(
            'hidden_text_cart',
            [
                'label' => esc_html__('Hidden Text Cart', 'greenmart'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'condition' => [
                    'product_style!' => 'v2'
                ],
                'prefix_class' => 'hidden-text-cart-'
            ]
        );
        $this->add_control(
            'hidden_desc',
            [
                'label' => esc_html__('Hidden Description', 'greenmart'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
                'condition' => [
                    'product_style' => 'v3'
                ],
                'prefix_class' => 'hidden-desc-'
            ]
        );
        
        $this->register_button();

        $this->end_controls_section();

        $this->add_control_responsive();
        $this->add_control_carousel(['layout_type' => 'carousel']);
    }
    protected function register_button() {
        $this->add_control(
            'show_more',
            [
                'label'     => esc_html__('Display Show More', 'greenmart'),
                'type'      => Controls_Manager::SWITCHER,
                'default' => 'no'
            ]
        );  
        $this->add_control(
            'text_button',
            [
                'label'     => esc_html__('Text Button', 'greenmart'),
                'type'      => Controls_Manager::TEXT,
                'default' => esc_html__('Show More', 'greenmart'),
                'condition' => [
                    'show_more' => 'yes'
                ]
            ]
        );  
        $this->add_control(
            'icon_button',
            [
                'label'     => esc_html__('Icon Button', 'greenmart'),
                'type'      => Controls_Manager::ICONS,
                'condition' => [
                    'show_more' => 'yes'
                ]
            ]
        );  
        $this->add_responsive_control(
            'button_show_align',
            [
                'label' => esc_html__('Align','greenmart'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left','greenmart'),
                        'icon' => 'fas fa-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__('Center','greenmart'),
                        'icon' => 'fas fa-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__('Right','greenmart'),
                        'icon' => 'fas fa-align-right'
                    ],   
                ],
                'condition' => [
                    'show_more' => 'yes'
                ],
                'selectors' => [
                    '{{WRAPPER}} .readmore-wrapper' => 'text-align: {{VALUE}}',
                ]
            ]
        );

    }
    public function render_item_button() {
        $settings = $this->get_settings_for_display();
        extract( $settings );

        $url_category =  get_permalink(wc_get_page_id('shop'));
        if(isset($text_button) && !empty($text_button)) {?>
            <div>
                <a href="<?php echo esc_url($url_category)?>" class="show-all"><?php echo trim($text_button) ?>
                    <?php 
                        $this->render_item_icon($icon_button);
                    ?>
                    
                </a>
            </div>
            <?php
        }
        
    }
}
$widgets_manager->register(new Greenmart_Elementor_Products());