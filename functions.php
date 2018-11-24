
<?php 
/*
-------------------------------------------------------------
@@@  @@@  @@@  @@@  @@@   @@@@@@@  @@@@@@@@  @@@  @@@  @@@@@@@  
@@@  @@@  @@@  @@@@ @@@  @@@@@@@@  @@@@@@@@  @@@@ @@@  @@@@@@@  
@@!  @@@  @@!  @@!@!@@@  !@@       @@!       @@!@!@@@    @@!    
!@!  @!@  !@!  !@!!@!@!  !@!       !@!       !@!!@!@!    !@!    
@!@  !@!  !!@  @!@ !!@!  !@!       @!!!:!    @!@ !!@!    @!!    
!@!  !!!  !!!  !@!  !!!  !!!       !!!!!:    !@!  !!!    !!!    
:!:  !!:  !!:  !!:  !!!  :!!       !!:       !!:  !!!    !!:    
 ::!!:!   :!:  :!:  !:!  :!:       :!:       :!:  !:!    :!:    
  ::::     ::   ::   ::   ::: :::   :: ::::   ::   ::     ::    
   :      :    ::    :    :: :: :  : :: ::   ::    :      :     
------------------------------------------------------------*/

/*------------------------------------*\
	FUNCTIONS
\*------------------------------------*/

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function vincent_setup() {

    // Theme features support

    // Logo
    add_theme_support( 'custom-logo');
    // HTML5
    add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
/**
 * Enqueue scripts and styles.
 */
function vincent_scripts() {
    wp_enqueue_style( 'vicent-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0');
}

add_filter( 'get_custom_logo', 'change_logo_class' );

/**
 * Change logo class.
 */
function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo', 'logo-main', $html );
    $html = str_replace( 'custom-logo-link', 'logo-link', $html );

    return $html;
}


/*------------------------------------*\
	ACTIONS
\*------------------------------------*/

add_action( 'after_setup_theme', 'vincent_setup' );
add_action( 'wp_enqueue_scripts', 'vincent_scripts' );

/*------------------------------------*\
	ACTIONS
\*------------------------------------*/

add_filter( 'get_custom_logo', 'change_logo_class' );
                                                                