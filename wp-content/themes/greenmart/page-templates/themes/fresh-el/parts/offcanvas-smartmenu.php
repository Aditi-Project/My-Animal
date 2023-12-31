<?php 
    $tbay_header = apply_filters( 'greenmart_tbay_get_header_layout', greenmart_tbay_get_config('header_type') );
    if ( empty($tbay_header) ) {
        $tbay_header = 'v1';
    }
    $location = 'mobile-menu';
    $tbay_location  = '';
    if ( has_nav_menu( $location ) ) {
        $tbay_location = $location;
    }

    $menu_option            = apply_filters( 'greenmart_menu_mobile_option', 10 );

    $menu_attribute         = '';
    $menu_title             = greenmart_tbay_get_config('menu_mobile_title', 'Menu mobile');

    if( $menu_option == 'smart_menu' ) {
        $search_items           = greenmart_tbay_get_config('menu_mobile_search_items', 'Search menu item');
        $search_no_results      = greenmart_tbay_get_config('menu_mobile_no_esults', 'No results found.');
        $search_splash          = greenmart_tbay_get_config('menu_mobile_search_splash', 'What are you looking for? Start typing to search the menu.');
        $search_enable          = greenmart_tbay_get_config('enable_menu_mobile_search', false);
        $menu_counters          = greenmart_tbay_get_config('enable_menu_mobile_counters', false);  

        $menu_second            = greenmart_tbay_get_config('enable_menu_second', false);  
 




        $menu_mobile_themes            = greenmart_tbay_get_config('menu_mobile_themes', 'light');
        $menu_attribute                .= 'data-themes="' . $menu_mobile_themes . '" ';  

        /*Socials*/
        $enable_menu_social           = greenmart_tbay_get_config('enable_menu_social', false); 
        $menu_attribute           .= 'data-enablesocial="' . $enable_menu_social . '" '; 
        if( $enable_menu_social ) {
            $social_slides            = greenmart_tbay_get_config('menu_social_slides');  


            $social_array = array();
            foreach ($social_slides as $index => $val) {
                $social_array[$index]['icon']     =   $val['title'];
                $social_array[$index]['url']      =   $val['url'];
            }

            $social_json = str_replace('"', "'", json_encode($social_array));


            $menu_attribute         .= 'data-socialjsons="' . $social_json . '" ';


        }

        /*tabs icon*/
        if( $menu_second ) {

            $menu_second_id         =  greenmart_tbay_get_config('menu_mobile_second_select');

            $menu_tab_one           = greenmart_tbay_get_config('menu_mobile_tab_one', 'Menu');
            $menu_tab_one_icon      = greenmart_tbay_get_config('menu_mobile_tab_one_icon', 'fa fa-bars');            

            $menu_tab_second        = greenmart_tbay_get_config('menu_mobile_tab_scond', 'Categories');
            $menu_tab_second_icon   = greenmart_tbay_get_config('menu_mobile_tab_second_icon', 'fa fa-th');


            $menu_attribute         .= 'data-enabletabs="' . $menu_second . '" ';


            $menu_attribute         .= 'data-tabone="' . $menu_tab_one . '" ';
            $menu_attribute         .= 'data-taboneicon="' . $menu_tab_one_icon . '" ';            

            $menu_attribute         .= 'data-tabsecond="' . $menu_tab_second . '" ';
            $menu_attribute         .= 'data-tabsecondicon="' . $menu_tab_second_icon . '" ';

        }

        /*Effect */
        $enable_effects            = greenmart_tbay_get_config('enable_menu_mobile_effects', false);  
        $menu_attribute           .= 'data-enableeffects="' . $enable_effects . '" '; 

        if($enable_effects) {
            $effects_panels        =  greenmart_tbay_get_config('menu_mobile_effects_panels', '');
            $effects_listitems     =  greenmart_tbay_get_config('menu_mobile_effects_listitems', '');

            $menu_attribute         .= 'data-effectspanels="' . $effects_panels . '" ';
            $menu_attribute         .= 'data-effectslistitems="' . $effects_listitems . '" ';
        }


        $menu_attribute         .= 'data-counters="' . $menu_counters . '" ';
        $menu_attribute         .= 'data-title="' . $menu_title . '" ';
        $menu_attribute         .= 'data-enablesearch="' . $search_enable . '" ';
        $menu_attribute         .= 'data-textsearch="' . $search_items . '" ';
        $menu_attribute         .= 'data-searchnoresults="' . $search_no_results . '" ';
        $menu_attribute         .= 'data-searchsplash="' . $search_splash . '" ';
    }


    $menu_one_id    =  greenmart_tbay_get_config('menu_mobile_one_select');

?>
  

<?php if( $menu_option == 'smart_menu' ) : ?>
<div id="tbay-mobile-smartmenu" <?php echo trim($menu_attribute); ?> class="tbay-mmenu hidden-lg hidden-md <?php echo esc_attr($tbay_header);?>"> 
    <div class="tbay-offcanvas-body">

        <nav id="tbay-mobile-menu-navbar" class="menu navbar navbar-offcanvas navbar-static">
            <?php
                $args = array(
                    'fallback_cb' => '',
                );

                $menu_name = '';
                if ( empty($menu_one_id) ) {
                    $locations  = get_nav_menu_locations();

                    if (isset($locations[ $tbay_location ]) && !empty($locations[ $tbay_location ])) {
                        $menu_id    = $locations[ $tbay_location ] ;
                        $menu_obj   = wp_get_nav_menu_object( $menu_id );
                        $menu_name  = greenmart_get_transliterate($menu_obj->slug);
                    }

                    $args['theme_location']     = $tbay_location;
                } else {
                    $menu_obj       = wp_get_nav_menu_object($menu_one_id);
                    $menu_name  = greenmart_get_transliterate($menu_obj->slug);
                    $args['menu']   = $menu_one_id;
                }

                

                $args['container_id']       =   'main-mobile-menu-mmenu';
                $args['items_wrap']         =   '<ul id="%1$s" class="%2$s" data-id="'. $menu_name .'">%3$s</ul>';
                $args['menu_id']            =   'main-mobile-menu-mmenu-wrapper';

                if( class_exists('Greenmart_Tbay_Nav_Menu') ) {
                    $args['walker']             =   new Greenmart_Tbay_Nav_Menu();
                } else { 
                    $args['walker']             =   new Greenmart_Tbay_mmenu_menu();
                }
 
                wp_nav_menu($args);


                if( isset($menu_second) && $menu_second ) {

                    $args_second = array(
                        'menu'    => $menu_second_id,
                        'fallback_cb' => '',
                    );

                    $menu_second_name = $menu_second_id;
                    if( !empty($menu_second_id) ) {
                        $menu_second_obj = wp_get_nav_menu_object($menu_second_id);
                        $menu_second_name = greenmart_get_transliterate($menu_second_obj->slug);
                    }  

                    $args_second['container_id']       =   'mobile-menu-second-mmenu';
                    $args_second['menu_id']            =   'main-mobile-second-mmenu-wrapper';
                    $args_second['items_wrap']         =   '<ul id="%1$s" class="%2$s" data-id="'. $menu_second_name .'">%3$s</ul>';

                    if( class_exists('Greenmart_Tbay_Nav_Menu') ) {
                        $args_second['walker']             =   new Greenmart_Tbay_Nav_Menu();
                    } else { 
                        $args_second['walker']             =   new Greenmart_Tbay_mmenu_menu();
                    }
               

                    wp_nav_menu($args_second);

                }


            ?>
        </nav>


    </div>
</div>

<?php endif; ?>