<?php

class Greenmart_Merlin_Wpbakery {
	public function import_files_wpb_vc_organic(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'organic';
		$skin_name 	 = 'Organic';
		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-4.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-5.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-6.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";

		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/',
				'group_label_start'          => 'yes',
				'group_label_name'           => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/home-3/',
			),
			array(
				'import_file_name'           => 'Home 4',
				'home'                       => 'home-4',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/home-4/',
			),
			array(
				'import_file_name'           => 'Home 5',
				'home'                       => 'home-5',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/home-5/',
			),
			array(
				'import_file_name'           => 'Home 6',
				'home'                       => 'home-6',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/home-6/',
			),
			array(
				'import_file_name'           => 'Home 7',
				'home'                       => 'home-7',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/home-7/',
			),
			array(
				'import_file_name'           => 'Home 8',
				'home'                       => 'home-8',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart/home-8/',
				'group_label_end'          => 'yes',
			),
		);
	}

	public function import_files_wpb_vc_health(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'health';
		$skin_name 	 = 'Health';

		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";


		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_health/',
				'group_label_start'          => 'yes',
				'group_label_name'          => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_health/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_health/home-3/',
				'group_label_end'          => 'yes',
			),
		);
	}

	public function import_files_wpb_vc_flower(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'flower';
		$skin_name 	 = 'Flower';

		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";

		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_flower/',
				'group_label_start'          => 'yes',
				'group_label_name'          => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_flower/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_flower/home-3/',
				'group_label_end'          => 'yes',
			),
		);
	}


	public function import_files_wpb_vc_organic_dokan(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'organic-dokan';
		$skin_name 	 = 'Organic Dokan';
		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-4.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-5.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-6.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";

		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/',
				'group_label_start'          => 'yes',
				'group_label_name'           => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/home-3/',
			),
			array(
				'import_file_name'           => 'Home 4',
				'home'                       => 'home-4',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/home-4/',
			),
			array(
				'import_file_name'           => 'Home 5',
				'home'                       => 'home-5',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/home-5/',
			),
			array(
				'import_file_name'           => 'Home 6',
				'home'                       => 'home-6',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/home-6/',
			),
			array(
				'import_file_name'           => 'Home 7',
				'home'                       => 'home-7',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/home-7/',
			),
			array(
				'import_file_name'           => 'Home 8',
				'home'                       => 'home-8',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_dokan/home-8/',
				'group_label_end'          => 'yes',
			),
		);
	}

	public function import_files_wpb_vc_organic_mvx(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'organic-mvx';
		$skin_name 	 = 'Organic MVX';
		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-4.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-5.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-6.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";

		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/',
				'group_label_start'          => 'yes',
				'group_label_name'           => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/home-3/',
			),
			array(
				'import_file_name'           => 'Home 4',
				'home'                       => 'home-4',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/home-4/',
			),
			array(
				'import_file_name'           => 'Home 5',
				'home'                       => 'home-5',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/home-5/',
			),
			array(
				'import_file_name'           => 'Home 6',
				'home'                       => 'home-6',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/home-6/',
			),
			array(
				'import_file_name'           => 'Home 7',
				'home'                       => 'home-7',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/home-7/',
			),
			array(
				'import_file_name'           => 'Home 8',
				'home'                       => 'home-8',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_mvx/home-8/',
				'group_label_end'          => 'yes',
			),
		);
	}

	public function import_files_wpb_vc_organic_wcfm(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'organic-wcfm';
		$skin_name 	 = 'Organic WCFM';
		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-4.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-5.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-6.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";

		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/',
				'group_label_start'          => 'yes',
				'group_label_name'           => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/home-3/',
			),
			array(
				'import_file_name'           => 'Home 4',
				'home'                       => 'home-4',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/home-4/',
			),
			array(
				'import_file_name'           => 'Home 5',
				'home'                       => 'home-5',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/home-5/',
			),
			array(
				'import_file_name'           => 'Home 6',
				'home'                       => 'home-6',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/home-6/',
			),
			array(
				'import_file_name'           => 'Home 7',
				'home'                       => 'home-7',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/home-7/',
			),
			array(
				'import_file_name'           => 'Home 8',
				'home'                       => 'home-8',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcfm/home-8/',
				'group_label_end'          => 'yes',
			),
		);
	}

	public function import_files_wpb_vc_organic_wcvendors(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'organic-wcvendors';
		$skin_name 	 = 'Organic WC Vendors';
		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-4.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-5.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-6.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";

		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/',
				'group_label_start'          => 'yes',
				'group_label_name'           => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/home-3/',
			),
			array(
				'import_file_name'           => 'Home 4',
				'home'                       => 'home-4',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/home-4/',
			),
			array(
				'import_file_name'           => 'Home 5',
				'home'                       => 'home-5',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/home-5/',
			),
			array(
				'import_file_name'           => 'Home 6',
				'home'                       => 'home-6',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/home-6/',
			),
			array(
				'import_file_name'           => 'Home 7',
				'home'                       => 'home-7',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/home-7/',
			),
			array(
				'import_file_name'           => 'Home 8',
				'home'                       => 'home-8',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_wcvendors/home-8/',
				'group_label_end'          => 'yes',
			),
		);
	}

	public function import_files_wpb_vc_organic_rtl(){
		$prefix_name = 'WPBakery';
		$prefix 	 = 'wpbakery';
		$skin 		 = 'organic-rtl';
		$skin_name 	 = 'Organic RTL';
		$rev_sliders = [
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-1.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-2.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-3.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-4.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-5.zip",
			"http://demosamples.thembay.com/greenmart/${prefix}/${skin}/revslider/slider-home-6.zip",
		];

		$data_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/data.xml";
		$widget_url = "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/widgets.wie";

		return array(
			array(
				'import_file_name'           => 'Home 1',
				'home'                       => 'home',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home1/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/',
				'group_label_start'          => 'yes',
				'group_label_name'           => $prefix_name.' '. $skin_name,
			),
			array(
				'import_file_name'           => 'Home 2',
				'home'                       => 'home-2',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home2/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/home-2/',
			),
			array(
				'import_file_name'           => 'Home 3',
				'home'                       => 'home-3',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home3/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/home-3/',
			),
			array(
				'import_file_name'           => 'Home 4',
				'home'                       => 'home-4',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home4/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/home-4/',
			),
			array(
				'import_file_name'           => 'Home 5',
				'home'                       => 'home-5',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home5/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/home-5/',
			),
			array(
				'import_file_name'           => 'Home 6',
				'home'                       => 'home-6',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home6/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/home-6/',
			),
			array(
				'import_file_name'           => 'Home 7',
				'home'                       => 'home-7',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home7/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/home-7/',
			),
			array(
				'import_file_name'           => 'Home 8',
				'home'                       => 'home-8',
				'import_file_url'          	 => $data_url,
				'import_widget_file_url'     => $widget_url,
				'import_redux'         => array(
					array(
						'file_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/redux_options.json",
						'option_name' => 'greenmart_tbay_theme_options',
					),
				),
				'rev_sliders'                => $rev_sliders,
				'import_preview_image_url'   => "http://demosamples.thembay.com/greenmart/${prefix}/${skin}/home8/screenshot.jpg",
				'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'greenmart' ),
				'preview_url'                => 'https://wpbakery.thembay.com/greenmart_rtl/home-8/',
				'group_label_end'          => 'yes',
			),
		);
	}
}