<?php

/**
 * The form to be loaded on the plugin's admin page
 */
	if( current_user_can( 'edit_users' ) ) {		
		
		// Populate the dropdown list with exising users.
        $dropdown_html = '<select required id="nds_user_select" name="nds[user_select]">
                            <option value="">'.__( 'Select a User', $this->plugin_text_domain ).'</option>';
        $wp_users = get_users( array( 'fields' => array( 'user_login', 'display_name' ) ) );		
		
		foreach ( $wp_users as $user ) {
			$user_login = esc_html( $user->user_login );
			$user_display_name = esc_html( $user->display_name );
			
			$dropdown_html .= '<option value="' . $user_login . '">' . $user_login . ' (' . $user_display_name  . ') ' . '</option>' . "\n";
		}
        $dropdown_html .= '</select>';
		
		// Generate a custom nonce value.
		$nds_add_meta_nonce = wp_create_nonce( 'nds_add_user_meta_form_nonce' ); 
		
		// Build the Form
?>				
		<h2><?php _e( 'WordPress AJAX form request via wp-admin/admin-ajax.php', $this->plugin_name ); ?></h2>		
		<div class="nds_add_user_meta_form">
					
		<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="nds_add_user_meta_ajax_form" >			

			<!-- <?php echo $dropdown_html; ?> -->
			<input type="hidden" name="action" value="nds_form_response">
			<input type="hidden" name="nds_add_user_meta_nonce" value="<?php echo $nds_add_meta_nonce ?>" />			
			<div>
				<br>
				<label for="<?php echo $this->plugin_name; ?>-user_meta_key"> <?php _e('Add a Meta Key', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-user_meta_key" type="text" name="<?php echo "nds"; ?>[user_meta_key]" value="" placeholder="<?php _e('Meta Key', $this->plugin_name);?>" /><br>
			</div>
			<div>
				<label for="<?php echo $this->plugin_name; ?>-user_meta_value"> <?php _e('Enter a Value for the Meta Key', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-user_meta_value" type="text" name="<?php echo "nds"; ?>[user_meta_value]" value="" placeholder="<?php _e('Meta Value', $this->plugin_name);?>"/><br>
			</div>
			<!-- ???????? ???????? -->
			<div>
				<label for="<?php echo $this->plugin_name; ?>-user_meta_value2"> <?php _e('Enter a Value for the Meta Key', $this->plugin_name); ?> </label><br>
				<input required id="<?php echo $this->plugin_name; ?>-user_meta_value2" type="text" name="<?php echo "nds"; ?>[user_meta_value2]" value="" placeholder="<?php _e('Meta Value2', $this->plugin_name);?>"/><br>
			</div>
			<!-- ???????? ???????????????????? ?????????? ???1 -->
			<div class="add-file">
				<label class="uploadFile" for="fileFF <?php echo $this->plugin_name; ?>-user_meta_value3">
  					<!-- <i class="fas fa-paperclip fa-md mr-2"></i> -->
  					<span class="filename">Attachment</span>
  					<input type="file" class="inputfile form-control" name="file <?php echo "nds"; ?>[user_meta_value3]" value="" placeholder="<?php _e('Meta Value3', $this->plugin_name);?>" required id="fileFF <?php echo $this->plugin_name; ?>-user_meta_value3">
				</label>
			</div>
			<!-- ???????? -->
			<!-- ???????? ???????????????????? ?????????? ???1 -->
			<div class="add-file">
				<label class="uploadFile" for="fileFF <?php echo $this->plugin_name; ?>-user_meta_value4">
  					<!-- <i class="fas fa-paperclip fa-md mr-2"></i> -->
  					<span class="filename">Attachment</span>
  					<input type="file" class="inputfile form-control" name="file <?php echo "nds"; ?>[user_meta_value4]" value="" placeholder="<?php _e('Meta Value4', $this->plugin_name);?>" required id="fileFF <?php echo $this->plugin_name; ?>-user_meta_value4">
				</label>
			</div>
			<!-- ???????? -->
			<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Submit Form"></p>
		</form>
		<br/><br/>
		<div id="nds_form_feedback">321</div>
		<br/><br/>			
		</div>
	<?php    
	}
	else {  
	?>
		<p> <?php __("You are not authorized to perform this operation.", $this->plugin_name) ?> </p>
	<?php   
	}
