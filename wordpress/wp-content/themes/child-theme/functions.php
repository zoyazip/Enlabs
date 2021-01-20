
<!-- This code is using to load parent theme if @import doesnt work for some reason -->
<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
?>

<?php 
// CREATING OPTION PAGE
// YOU CAN FIND IT IN ADMIN MENU/SETTINGS/Test Option Page
	add_action('admin_menu', 'create_options_page');
		function create_options_page() {  
			add_options_page(
				'Test Option Page',//Title
				'Test Option Page',//Title in admin panel
				'administrator',//Permissions
				__FILE__,//Page name
				'build_options_page');//Callback func
			}
//CREATING SAVING BUTTON
		function build_options_page() {
			?>     
			<form method="post" action="options.php" enctype="multipart/form-data">  
			<?php settings_fields('plugin_options'); ?>
			  <?php do_settings_sections(__FILE__); ?> 
			   <p class="submit"> 
				 <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />  
				</p></form>
				<?php	
			}
					
//REGISTER NEW SETTINGS					
	add_action('admin_init', 'register_and_build_fields');
		function register_and_build_fields() {   
			register_setting(
				'plugin_options',//Setting group
				'plugin_options',//Name of the option
				'validate_setting');//Callback func


		$options = get_option('plugin_options');
		echo $options['value'];
		function validate_setting($plugin_options) {  return $plugin_options;}
			add_settings_section(
				'main_section',//Id
				'Main Settings',//Title
				'section_cb',//Callback func
				 __FILE__);
		function section_cb() {}//Avoid Errors

			add_settings_field(
				'banner_heading',//Id 
				'Banner Heading:',//Title
				'banner_heading_setting',//Callback func
				__FILE__,
				'main_section');//Name of the sections
			}
//TEXT INPUT FIELD		
		function banner_heading_setting() {
		$options = get_option('plugin_options');
				echo "<input name='plugin_options[banner_heading]' type='text' value='{$options['banner_heading']}' />";
			}		
?>