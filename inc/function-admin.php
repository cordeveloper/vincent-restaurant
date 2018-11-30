<?php 

/*
@package vincent
    ===========================
        ADMIN PAGE
    ===========================
*/

function vincent_add_admin_page(){

    // Generate Vincent Admin page
    add_menu_page( 'Vincent Opciones', 'Vincent', 'manage_options', 'opts-vincent', 'vincent_theme_create_page', get_template_directory_uri() . '/resources/icons/pizza.svg', 100 );

    // Generate Vincent Admin sub pages
    add_submenu_page('opts-vincent','Vincent Ajustes', 'General', 'manage_options', 'opts-vincent', 'vincent_theme_create_page');
    add_submenu_page('opts-vincent','Vincent Social', 'Redes Sociales', 'manage_options', 'opts-vincent-social', 'vincent_social_page');
    // Activate custom settings
    add_action('admin_init', 'vincent_custom_settings');
}

add_action( 'admin_menu', 'vincent_add_admin_page');

function vincent_custom_settings(){
    register_setting('vincent-settings-group', 'profile_picture');
    register_setting('vincent-settings-group', 'first_name');
    register_setting( 'vincent-settings-group', 'last_name' );
	register_setting( 'vincent-settings-group', 'twitter_handler', 'vincent_sanitize_twitter_handler' );
	register_setting( 'vincent-settings-group', 'facebook_handler' );
	register_setting( 'vincent-settings-group', 'gplus_handler' );

    add_settings_section('vincent-sidebar-options', 'Sidebar Option', 'vincent_sidebar_options', 'opts-vincent');

    add_settings_field('sidebar-profile-picture', 'Profile picture', 'vincent_sidebar_profile','opts-vincent', 'vincent-sidebar-options');
    add_settings_field('sidebar-name', 'Name', 'vincent_sidebar_name','opts-vincent', 'vincent-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter handler', 'vincent_sidebar_twitter','opts-vincent', 'vincent-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook handler', 'vincent_sidebar_facebook','opts-vincent', 'vincent-sidebar-options');
    add_settings_field('sidebar-gplus', 'Google+ handler', 'vincent_sidebar_gplus','opts-vincent', 'vincent-sidebar-options');
}

function vincent_sidebar_options(){
    echo 'Customize your Sidebar Information';
}



function vincent_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}
	
}

function vincent_sidebar_name(){
    $firstName = esc_attr( get_option('first_name') );
    $lastName = esc_attr( get_option('last_name') );
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function vincent_sidebar_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function vincent_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function vincent_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

function vincent_sanitize_twitter_handler($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}

function vincent_theme_create_page(){

    require_once( get_template_directory() . '/inc/templates/sunset-admin.php' );
    
}

function vincent_settings_page(){

    echo '<h1>Vincent Custom CSS</h1>';

}