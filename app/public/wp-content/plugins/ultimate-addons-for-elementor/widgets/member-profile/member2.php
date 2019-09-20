<div class="mega_team_case_2">
	<div class="mega_team_head">
		<div class="mega_team_wrap">
			<div class="member-image">
				<?php if ($settings['profile_link']['url'] != '') { ?>
					<a href="<?php echo $settings['profile_link']['url']; ?>" <?php echo $target.$nofollow; ?> title="<?php echo esc_html($url['title']); ?>"><?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?></a>
				<?php } ?>
				<?php if ($settings['profile_link']['url'] == NULL) { ?>
					<a><?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?></a>
				<?php } ?>
			</div>
			<div class="member-name">
				<?php echo $settings['member_name']; ?>
				<span style="background-color: <?php echo $settings['profile_clr']; ?>;"><?php echo $settings['member_pro']; ?></span>
			</div>
		</div>
	</div>
	<div class="mega_team_footer">
		<div class="member-skills">
			<?php foreach ($settings['skill_items'] as $skill_items) { ?>
				<?php if (!empty($skill_items['skill'])) { ?>
					<div class="skill-label"><?php echo $skill_items['skill']; ?></div>
					<div class="skill-prog">
						<div class="fill" data-progress-animation="90%" data-appear-animation-delay="400" style="width: <?php echo $skill_items['skill_strength']; ?>%; background-color: <?php echo $settings['profile_clr']; ?>;">
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="member-info" style="font-size: <?php echo $info_size; ?>px; color: <?php echo $info_clr; ?>">
			<?php if (!empty($settings['email'])) { ?>
				<p><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $settings['email']; ?></p>
			<?php } ?>
			<?php if (!empty($settings['site_url'])) { ?>
				<p><i class="fa fa-globe" aria-hidden="true"></i> <?php echo $settings['site_url']; ?></p>
			<?php } ?>
			<?php if (!empty($settings['contact'])) { ?>
				<p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $settings['contact']; ?></p>
			<?php } ?>
			<?php if (!empty($settings['address'])) { ?>
				<p><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo $settings['address']; ?></p>
			<?php } ?>
		</div>
		<div class="member-social">
			<?php foreach ($settings['social_items'] as $social_items) { ?>
				<a href="<?php echo $social_items['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="background-color: <?php echo $social_items['social_bg']; ?>" target="_blank">
					<i class="<?php echo $social_items['social_icon']; ?>"></i>
				</a>
			<?php } ?>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="member-desc">
		<?php echo $settings['member_about']; ?>
	</div>
</div>