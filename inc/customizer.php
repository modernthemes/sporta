<?php
/**
 * Sporta Theme Customizer
 *
 * @package sporta
 */
 
function sporta_theme_customizer( $wp_customize ) {
	
	//allows donations
    class sporta_Info extends WP_Customize_Control { 
     
        public $label = '';
        public function render_content() { 
        ?>

        <?php
        }
    }	
	
	// Donations
    $wp_customize->add_section(
        'sporta_theme_info',
        array(
            'title' => __('Like Sporta? Help Us Out.', 'sporta'),
            'priority' => 5, 
            'description' => __('We do all we can do to make all our themes free for you. While we enjoy it, and it makes us happy to help out, a little appreciation can help us to keep theming.</strong><br/><br/> Please help support our mission and continued development with a donation of $5, $10, $20, or if you are feeling really kind $100..<br/><br/> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=7LMGYAZW9C5GE" target="_blank" rel="nofollow"><img class="" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" alt="Make a donation to ModernThemes" /></a>'), 
        )
    );  
	 
    //Donations section
    $wp_customize->add_setting('sporta_help', array(   
			'sanitize_callback' => 'sporta_no_sanitize', 
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new sporta_Info( $wp_customize, 'sporta_help', array(
        'section' => 'sporta_theme_info', 
        'settings' => 'sporta_help', 
        'priority' => 10
        ) )
    ); 
	
	// Fonts  
    $wp_customize->add_section(
        'sporta_typography',
        array(
            'title' => __('Google Fonts', 'sporta' ),  
            'priority' => 39,
        )
    );
	
    $font_choices = 
        array(
			'Open Sans:400italic,700italic,400,700' => 'Open Sans', 
			'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',    
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'sporta_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Open Sans is the default Heading font.', 'sporta'),
            'section' => 'sporta_typography',
            'choices' => $font_choices
        )
    );
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'sporta_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Open Sans is the default Body font.', 'sporta' ), 
            'section' => 'sporta_typography',  
            'choices' => $font_choices  
        ) 
    );
	
	// Colors 
	
	$wp_customize->add_setting( 'sporta_link_color', array(
        'default'     => '',   
        'sanitize_callback' => 'sanitize_hex_color', 
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sporta_link_color', array(
        'label'	   => 'Link Color', 
        'section'  => 'colors',
        'settings' => 'sporta_link_color',
		'priority' => 3 
    ) ) );
	
	$wp_customize->add_setting( 'sporta_hover_color', array(
        'default'     => '',   
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sporta_hover_color', array(
        'label'	   => 'Hover Color', 
        'section'  => 'colors',
        'settings' => 'sporta_hover_color',
		'priority' => 4  
    ) ) );
	
	$wp_customize->add_setting( 'sporta_custom_color', array( 
        'default'     => '', 
		'sanitize_callback' => 'sanitize_hex_color',
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sporta_custom_color', array(
        'label'	   => 'Theme Color',
        'section'  => 'colors',
        'settings' => 'sporta_custom_color', 
		'priority' => 5
    ) ) );
	
	$wp_customize->add_setting( 'sporta_custom_color_hover', array( 
        'default'     => '', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sporta_custom_color_hover', array(
        'label'	   => 'Theme Hover Color',
        'section'  => 'colors',
        'settings' => 'sporta_custom_color_hover', 
		'priority' => 6
    ) ) ); 

    // Logo upload
    $wp_customize->add_section( 'sporta_logo_section' , array(  
	    'title'       => __( 'Logo and Icons', 'sporta' ),
	    'priority'    => 25,
	    'description' => 'Upload a logo to replace the default site name and description in the header. Also, upload your site favicon and Apple Icons.',
	) );

	$wp_customize->add_setting( 'sporta_logo', 
	array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sporta_logo', array(
		'label'    => __( 'Logo', 'sporta' ),
		'section'  => 'sporta_logo_section', 
		'settings' => 'sporta_logo',
		'priority' => 1,
	) ) );
	
	// Logo Width
	$wp_customize->add_setting( 'logo_size', 
	array(
	    'sanitize_callback' => 'sporta_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'logo_size', array( 
		'label'    => __( 'Change the width of the Logo in PX.', 'sporta' ),
		'description'    => __( 'Only enter numeric value', 'sporta' ),
		'section'  => 'sporta_logo_section',  
		'settings' => 'logo_size', 
		'priority'   => 2 
	) ) );
	
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default' => (get_stylesheet_directory_uri() . '/images/favicon.png'),   
			'sanitize_callback' => 'esc_url_raw',
		) 
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon (16x16 pixels)', 'sporta' ),
			   'type' 			=> 'image',
               'section'        => 'sporta_logo_section',
               'settings'       => 'site_favicon',
               'priority' => 2,
            )
        )
    );
    //Apple touch icon 144
    $wp_customize->add_setting(
        'apple_touch_144',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'sporta' ),
               'type'           => 'image',
               'section'        => 'sporta_logo_section',
               'settings'       => 'apple_touch_144',
               'priority'       => 11,
            )
        )
    );
    //Apple touch icon 114
    $wp_customize->add_setting(
        'apple_touch_114',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw', 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'sporta' ),
               'type'           => 'image',
               'section'        => 'sporta_logo_section',
               'settings'       => 'apple_touch_114',
               'priority'       => 12,
            )
        )
    );
    //Apple touch icon 72
    $wp_customize->add_setting(
        'apple_touch_72',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'sporta' ),
               'type'           => 'image',
               'section'        => 'sporta_logo_section', 
               'settings'       => 'apple_touch_72',
               'priority'       => 13,
            )
        )
    );
    //Apple touch icon 57
    $wp_customize->add_setting(
        'apple_touch_57',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'sporta' ),
               'type'           => 'image',
               'section'        => 'sporta_logo_section',
               'settings'       => 'apple_touch_57',
               'priority'       => 14,
            )
        )
    );
	
	// Home Page
	$wp_customize->add_section( 'sporta_home_section' , array(  
	    'title'       => __( 'Home Page', 'sporta' ),
	    'priority'    => 28, 
	    'description' => __( 'Customize your home page here', 'sporta' )  
	) );
	
	$wp_customize->add_setting('active_featured',
	array(
	        'sanitize_callback' => 'sporta_sanitize_checkbox',
	    ) 
	);
	
	$wp_customize->add_control(
    'active_featured', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Featured Products',  
        'section' => 'sporta_home_section', 
		'priority'   => 1
    ));
	
	$wp_customize->add_setting('active_ads',
	array(
	        'sanitize_callback' => 'sporta_sanitize_checkbox',
	    ) 
	);   
	
	$wp_customize->add_control( 
    'active_ads', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Home Page Ads',  
        'section' => 'sporta_home_section', 
		'priority'   => 2
    ));
	
	$wp_customize->add_setting('active_latest',
	array(
	        'sanitize_callback' => 'sporta_sanitize_checkbox',
	    ) 
	);   
	
	$wp_customize->add_control( 
    'active_latest', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Latest Products',  
        'section' => 'sporta_home_section', 
		'priority'   => 3
    ));
	
	$wp_customize->add_setting('active_blog',
	array(
	        'sanitize_callback' => 'sporta_sanitize_checkbox',
	    ) 
	);   
	
	$wp_customize->add_control( 
    'active_blog', 
    array(
        'type' => 'checkbox',
        'label' => 'Hide Blog',
        'section' => 'sporta_home_section', 
		'priority'   => 4
    ));

	// First Title
	$wp_customize->add_setting( 'sporta_first_title', 
	array(
	    'sanitize_callback' => 'sporta_sanitize_text',
	) );
	   
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sporta_first_title', array( 
    'label' => __( 'First Title', 'sporta' ),   
    'section' => 'sporta_home_section',  
    'settings' => 'sporta_first_title',
	'priority'   => 5
	) ) );
	
	// Second Title
	$wp_customize->add_setting( 'sporta_second_title', 
	array(
	    'sanitize_callback' => 'sporta_sanitize_text',
	) );
	  
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sporta_second_title', array( 
    'label' => __( 'Second Title', 'personal' ),   
    'section' => 'sporta_home_section',
    'settings' => 'sporta_second_title', 
	'priority'   => 6  
	) ) );
	
	// Blog Title
	$wp_customize->add_setting( 'sporta_blog_title', 
	array(
	    'sanitize_callback' => 'sporta_sanitize_text',
	) );
	  
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sporta_blog_title', array( 
    'label' => __( 'Blog Title', 'personal' ),   
    'section' => 'sporta_home_section', 
    'settings' => 'sporta_blog_title',
	'priority'   => 7  
	) ) ); 
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array( 
    	'title' => __( 'Footer', 'sporta' ),
    	'priority' => 34,  
    	'description' => __( 'Customize your footer area', 'sporta' ) 
	) );   
	
	// Footer Byline Text 
	$wp_customize->add_setting( 'sporta_footerid', 
	array(
	    'sanitize_callback' => 'sporta_sanitize_text',
	) );
	  
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sporta_footerid', array( 
    'label' => __( 'Footer Byline Text', 'sporta' ),
    'section' => 'footer-custom',
    'settings' => 'sporta_footerid',
	'priority'   => 9 
	) ) ); 

    // Choose excerpt or full content on blog
    $wp_customize->add_section( 'sporta_layout_section' , array( 
	    'title'       => __( 'Layout', 'sporta' ),
	    'priority'    => 45, 
	    'description' => 'Change how sporta displays posts', 
	) );

	$wp_customize->add_setting( 'sporta_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'sporta_sanitize_index_content',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sporta_post_content', array(
		'label'    => __( 'Post content', 'sporta' ),
		'section'  => 'sporta_layout_section',
		'settings' => 'sporta_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts',
			'option2' => 'Full content',
			),
	) ) );
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
        )       
    );
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 12,  
        'section'     => 'sporta_layout_section',
        'label'       => __('Excerpt length', 'sporta'),
        'description' => __('Choose your excerpt length here. Default: 30 words', 'sporta'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;', 
        ), 
    ) );  

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 10;
	$wp_customize->get_section('nav')->priority = 11; 

	// Enqueue scripts for real-time preview
	wp_enqueue_script( 'sporta_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
 

}
add_action('customize_register', 'sporta_theme_customizer');


/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
function sporta_sanitize_hex_color( $color ) {
	if ( '#FF0000' === $color ) 
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function sporta_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}

//Checkboxes
function sporta_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
} 

//Integers
function sporta_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function sporta_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Sanitizes Fonts 
function sporta_sanitize_fonts( $input ) {
    $valid = array(
            'Open Sans:400italic,700italic,400,700' => 'Open Sans', 
			'Oswald:400,700' => 'Oswald',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
			'Raleway:400,700' => 'Raleway',    
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function sporta_no_sanitize( $input ) {
}

/**
 * Add CSS in <head> for styles handled by the theme customizer
 *
 * @since 1.5
 */
function sporta_add_customizer_css() {
	$color = sporta_sanitize_hex_color( get_theme_mod( 'sporta_link_color' ) );
	?>
	<!-- sporta customizer CSS -->
	<style>
		body {
			border-color: <?php echo $color; ?>;
		}
		a, .product_list_widget a, .site-footer a {
			color: <?php echo get_theme_mod( 'sporta_link_color' ) ?>;      
		}
		
		a:hover, .cbp-spmenu a:hover, .main-navigation li:hover > a, .main-navigation ul ul li:hover a, .social-media-icons .fa:hover {    
			color: <?php echo get_theme_mod( 'sporta_hover_color' ) ?>; 
		}  
	 
		.amount, a:focus, a:active { color: <?php echo get_theme_mod( 'sporta_custom_color' ) ?> !important; } 
	    button.red, .featured-title, .latest-title, button span { background: <?php echo get_theme_mod( 'sporta_custom_color' ) ?>; }    
		  
		blockquote, .latest-products, #sequence, .site-footer, .site-header, .plus { border-color: <?php echo get_theme_mod( 'sporta_custom_color' ) ?>; }  
		 
	    button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo get_theme_mod( 'sporta_custom_color' ) ?>; border-color: <?php echo get_theme_mod( 'sporta_custom_color' ) ?>; }  
		 
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { border-color: <?php echo get_theme_mod( 'sporta_custom_color_hover') ?>; background: <?php echo get_theme_mod( 'sporta_custom_color_hover') ?>; }
		
		#site-navigation button:hover { background: none; } 
		 
	</style>
<?php }
add_action( 'wp_head', 'sporta_add_customizer_css' );  
