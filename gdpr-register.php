<?php
/**
 * Template for the GDPR checkbox in register form
 *
 * This template can be overridden by copying it to yourtheme/ultimate-member/templates/gdpr-register.php
 *
 * Page: "Register"
 * Call: function display_option()
 *
 * @version 2.6.1
 *
 * @var object $um_content_query
 * @var array  $args
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// This file should primarily consist of HTML with a little bit of PHP.
if ( ! empty( $args['use_gdpr_content_id'] ) ) {
    $um_content_query = get_post( $args['use_gdpr_content_id'] );
    if ( ! empty( $um_content_query ) && ! is_wp_error( $um_content_query ) ) {
        $content = apply_filters( 'um_gdpr_policies_page_content', $um_content_query->post_content, $args );
        $content = apply_filters( 'the_content', $content, $um_content_query->ID );?>
        <style>
            /* Popup container - can be anything you want */
            .popup {
            position: relative;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

            /* The actual popup */
            .popup .popuptext {
            visibility: hidden;
            background-color: white;
            color: black;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            overflow-y: auto;
            height: 400px;
            width: auto;
            }

            /* Popup arrow */
            .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
            }

            /* Toggle this class - hide and show the popup */
            .popup .show {
            visibility: visible;
            -webkit-animation: fadeIn 1s;
            animation: fadeIn 1s;
            }

            /* Add animation (fade in the popup) */
            @-webkit-keyframes fadeIn {
            from {opacity: 0;} 
            to {opacity: 1;}
            }

            @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity:1 ;}
            }
        </style>
        <div class="popup" onclick="show_privacy_policy_function_popup()"><?php echo __( 'Show privacy policy', 'ultimate-member' ); ?>
            <span class="popuptext" id="myPopup">
                <?php echo $content; ?>
            </span>
        </div>
        <script>
        // When the user clicks on div, open the popup
        function show_privacy_policy_function_popup() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
        </script>

<?php
   }
}?>


<div class="um-field um-field-type_terms_conditions" data-key="use_terms_conditions_agreement" style="display:block;padding:0;">
	<div class="um-field-area">

		<?php $confirm = ! empty( $args['use_gdpr_agreement'] ) ? $args['use_gdpr_agreement'] :  __( 'Please confirm that you agree to our privacy policy', 'ultimate-member' ); ?>

		<label class="um-field-checkbox">
			<input type="checkbox" name="use_gdpr_agreement" value="1">
			<span class="um-field-checkbox-state"><i class="um-icon-android-checkbox-outline-blank"></i></span>
			<span class="um-field-checkbox-option"><?php echo esc_html( $confirm ); ?></span>
		</label>
		<div class="um-clear"></div>

		<?php $errors = UM()->form()->errors;

		if ( isset( $errors['use_gdpr_agreement'] ) ) {

			$error_message = ! empty( $args['use_gdpr_error_text'] ) ? $args['use_gdpr_error_text'] :  __( 'Please confirm your acceptance of our privacy policy', 'ultimate-member' ); ?>

			<p class="um-notice err">
                <i class="um-icon-ios-close-empty" onclick="jQuery(this).parent().fadeOut();"></i><?php echo esc_html( $error_message ) ?>
			</p>
			<br/>
		<?php } ?>

		<div class="um-clear"></div>
	</div>
</div>
