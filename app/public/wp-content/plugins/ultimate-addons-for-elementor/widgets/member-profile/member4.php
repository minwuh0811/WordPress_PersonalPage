
<div class="mega_team_case_4">
	<div class="member-image">
		<?php if ($settings['profile_link']['url'] != '') { ?>
			<a href="<?php echo $settings['profile_link']['url']; ?>" <?php echo $target.$nofollow; ?> title="<?php echo esc_html($url['title']); ?>"><?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?></a>
		<?php } ?>
		<?php if ($settings['profile_link']['url'] == NULL) { ?>
			<a><?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?></a>
		<?php } ?>
	</div>
	<div class="mega_wrap">
		<div class="member-name">
			<?php echo $settings['member_name']; ?>
			<span><?php echo $settings['member_pro']; ?></span>
		</div>
		<div class="member-desc">
			<?php echo $settings['member_about']; ?>
		</div>
		<div class="member-social">
			<?php foreach ($settings['social_items'] as $social_items) { ?>
				<a href="<?php echo $social_items['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?>>
					<i class="<?php echo $social_items['social_icon']; ?>"></i>
				</a>
			<?php } ?>
		</div>
	</div>
</div>