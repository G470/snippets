
<?php
/**
 * THEME OPTIONS PAGE BY G470net
 */
/**
 * Create Page
 */
function gatonet_theme_menu()
{
  add_theme_page( 'Theme Optionen', 'Theme Optionen', 'manage_options', 'gatonet_theme_options.php', 'gatonet_theme_page');  
}
add_action('admin_menu', 'gatonet_theme_menu');

/**
 * Callback function to the add_theme_page
 * Will display the theme options page
 */ 
function gatonet_theme_page()
{
?>
    <div class="section panel">
      <h1>Custom Theme Options</h1>
      <form method="post" enctype="multipart/form-data" action="options.php">
        <?php 
          settings_fields('gatonet_theme_options'); 
        
          do_settings_sections('gatonet_theme_options.php');
        ?>
            <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
            </p>  
            
      </form>
      
      <p>Created by <a href="http://gatonet.de">Steffen G&uuml;rg</a>.</p>
    </div>
    <?php
}
/**
 * Register the settings to use on the theme options page
 */
add_action( 'admin_init', 'gatonet_register_settings' );

/**
 * Function to register the settings
 */
function gatonet_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'gatonet_theme_options', 'gatonet_theme_options', 'gatonet_validate_settings' );

    // Add settings section
    add_settings_section( 'gatonet_text_section', 'Text box Title', 'gatonet_display_section', 'gatonet_theme_options.php' );

    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'gatonet_textbox',
      'name'      => 'gatonet_textbox',
      'desc'      => 'Example of textbox description',
      'std'       => '',
      'label_for' => 'gatonet_textbox',
      'class'     => 'css_class'
    );

    add_settings_field( 'example_textbox', 'Example Textbox', 'gatonet_display_setting', 'gatonet_theme_options.php', 'gatonet_text_section', $field_args );
}
/**
 * Function to add extra text to display on each section
 */
function gatonet_display_section($section){ 

}
/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
function gatonet_display_setting($args)
{
    extract( $args );

    $option_name = 'gatonet_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break;  
    }
}

/**
 * Callback function to the register_settings function will pass through an input variable
 * You can then validate the values and the return variable will be the values stored in the database.
 */
function gatonet_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number
    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      $newinput[$k] = '';
    }
  }

  return $newinput;
}



/**
 *
 * *
 *
 *  USE THIS TO OUTPUT OPTIONS IN THEME ($options = get_option( 'pu_theme_options' );)
 * 
 */



?>