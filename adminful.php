<?php
/*
* Plugin Name:       Adminful
* Plugin URI:        https://ariellemarin.com/
* Description:       Customize your WordPress dashboard with White label, Dashboard Panels, Media Folders, Admin Menu Editor, Login Customizer, and much more!
* Version:           1.0.0
* Requires at least: 6.7.2
* Requires PHP:      8.1.0
* Author:            Arielle Marin
* Author URI:        https://ariellemarin.com/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       adminful
* Update URI:        false
*/

function adminful_options_page_html() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "adminful_options"
            settings_fields( 'adminful_options' );
            // output setting sections and their fields
            // (sections are registered for "adminful", each field is registered to a specific section)
            do_settings_sections( 'adminful' );
            // output save settings button
            submit_button( __( 'Save Settings', 'textdomain' ) );
            ?>
        </form>
    </div>
    <?php
}

function adminful_options_page() {
    add_menu_page (
        'Adminful', 
        'Adminful',
        'manage_options',
        'adminful',
        'adminful_options_page_html',
        'dashicons-admin-customizer',
        80
    );
}
add_action( 'admin_menu', 'adminful_options_page' );
?>