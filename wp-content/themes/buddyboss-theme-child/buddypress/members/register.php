<?php

/**
 * BuddyBoss - Members/Blogs Registration forms
 *
 * @since BuddyPress 3.0.0
 * @version 3.1.0
 */
?>

<?php _e( '(required)', 'buddypress' ); ?>




<?php bp_nouveau_signup_hook('before', 'page'); ?>

<div id="register-page" class="page register-page">

	<?php bp_nouveau_template_notices(); ?>

	<?php bp_nouveau_user_feedback(bp_get_current_signup_step()); ?>

	<form action="" name="signup_form" id="signup-form" class="standard-form signup-form " method="post" enctype="multipart/form-data">

		<div>
			<?php if ('request-details' === bp_get_current_signup_step()) : ?>

				<?php bp_nouveau_signup_hook('before', 'account_details'); ?>

				<div class="register-section default-profile" id="basic-details-section">

					<?php /***** Basic Account Details ******/ ?>



				</div><!-- #basic-details-section -->

				<?php bp_nouveau_signup_hook('after', 'account_details'); ?>

				<?php /***** Extra Profile Details ******/ ?>

				<?php if (bp_is_active('xprofile') && bp_nouveau_base_account_has_xprofile()) : ?>

					<?php bp_nouveau_signup_hook('before', 'signup_profile'); ?>

					<div class="register-section extended-profile  register-section-form " id="profile-details-section">

						<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>


						<?php while (bp_profile_groups()) : bp_the_profile_group(); ?>

							<?php while (bp_profile_fields()) : bp_the_profile_field();

								if (function_exists('bp_member_type_enable_disable') && false === bp_member_type_enable_disable()) {
									if (function_exists('bp_get_xprofile_member_type_field_id') && bp_get_the_profile_field_id() === bp_get_xprofile_member_type_field_id()) {
										continue;
									}
								}
							?>

								<div <?php bp_field_css_class('editfield');
										bp_field_data_attribute(); ?>>
									<fieldset>



										<div>
											<?php
											$field_type = bp_xprofile_create_field_type(bp_get_the_profile_field_type());
											$field_type->edit_field_html();

											?>
										</div>
									</fieldset>
								</div>

							<?php endwhile; ?>

							<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

						<?php endwhile; ?>

						<?php bp_nouveau_signup_hook('', 'signup_profile'); ?>

					</div><!-- #profile-details-section -->

					<?php bp_nouveau_signup_hook('after', 'signup_profile'); ?>

				<?php endif; ?>




				<div class="signup_password signup_password_confirm">

					<?php bp_nouveau_signup_form(); ?>

				</div>
			
		</div><!-- //.layout-wrap -->

		<?php bp_nouveau_signup_terms_privacy(); ?>

		<?php bp_nouveau_submit_button('register'); ?>

	<?php endif; // request-details signup step 
	?>

	<?php bp_nouveau_signup_hook('custom', 'steps'); ?>

	</form>

</div>

<?php bp_nouveau_signup_hook('after', 'page'); ?>