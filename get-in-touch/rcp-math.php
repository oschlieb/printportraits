<?php
/*
Plugin Name: Restrict Content Pro - Math Verification
Plugin URL: http://pippinsplugins.com/restrict-content-pro-math/
Description: Adds a simple math captcha to the Restrict Content Pro registration form
Version: 1.0.1
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
Contributors: Pippin Williamson
*/

// displays the math verification fields
function rcp_math_fields() {
	global $rcp_options;
	$math_one = rand(0,10);
	$math_two = rand(0,10);
	$label = isset($rcp_options['math_label']) && $rcp_options['math_label'] != '' ? $rcp_options['math_label'] : __('What does this equal?:', 'rcp');
	ob_start(); ?>		
		<p>
			<input id="rcp_math_1" type="hidden" name="rcp_math_1" value="<?php echo $math_one; ?>"/>
			<input id="rcp_math_2" type="hidden" name="rcp_math_2" value="<?php echo $math_two; ?>"/>
			<label for="rcp_math_one"><?php echo $label . ' ' . $math_one . ' + ' . $math_two; ?></label>
			<input id="rcp_math_answer" type="text" name="rcp_math_answer" value="" class="required"/>
		</p>
		<?php
	echo ob_get_clean();
}
add_action('rcp_before_registration_submit_field', 'rcp_math_fields', 0);

// checks whether a user should be signed up for he mailchimp list
function rcp_verify_math($posted) {
	if(!isset($posted['rcp_math_1']) || !isset($posted['rcp_math_2'])) {
		rcp_errors()->add('do_math', __('Please answer the math question', 'rcp'));
	}
	
	if(!is_numeric($posted['rcp_math_1']) || !is_numeric($posted['rcp_math_2'])) {
		rcp_errors()->add('do_math', __('Please only enter numbers in the math fields', 'rcp'));
	}
	
	$result = $posted['rcp_math_1'] + $posted['rcp_math_2'];
	$answer = $posted['rcp_math_answer'];
	
	if($result != $answer) {
		rcp_errors()->add('incorrect_math', __('Your math is incorrect', 'rcp'));
	}
}
add_action('rcp_form_errors', 'rcp_verify_math');

// add the label setting
function rcp_add_math_label_setting($rcp_options) {
	?>
	<table class="form-table">
		<tr valign="top">
			<th>
				<label for="rcp_settings[math_label]"><?php _e( 'Math Label', 'rcp' ); ?></label>
			</th>
			<td>	
				<input id="rcp_settings[math_label]" style="width: 300px;" name="rcp_settings[math_label]" type="text" value="<?php if(isset($rcp_options['math_label'])) echo $rcp_options['math_label']; ?>" />
				<div class="description"><?php _e('Enter the text shown next to the simple math verification field. Default: "What does this equal?:"', 'rcp'); ?></div>
			</td>
		</tr>
	</table>
	<?php
}
add_action('rcp_forms_settings', 'rcp_add_math_label_setting');