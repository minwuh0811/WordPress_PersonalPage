<div class="price_table_1 uae_pricing_table" style="background-color: <?php echo $settings['body_bg']; ?>; box-shadow: 0 0 9px rgba(0,0,0,0.5), 0 -3px 0px <?php echo $settings['header_bg']; ?> inset;">
	<div class="type" style="background-color: <?php echo $settings['header_bg']; ?>;">
		<div class="ribbon-right">
			<span style="background: <?php echo $settings['rib_clr']; ?>;"><?php echo $settings['rib_title']; ?></span>
		</div>
		<p class="price_title" style="color: <?php echo $settings['title_clr']; ?>;">
			<?php echo $settings['price_title']; ?>
		</p>
	</div>

	<div class="plan">
		<div class="header">
			<span class="price_curr" style="color: <?php echo $settings['header_bg']; ?>">
				<?php echo $settings['price_sign']; ?>
			</span>
			<span class="amount" style="color: <?php echo $settings['header_bg']; ?>;">
				<?php echo $settings['price_value']; ?>
			</span>
			<p class="month" style="font-size: <?php echo $planesize; ?>px;"><?php echo $settings['price_plan']; ?></p>
		</div>
		<div class="content">
			<ul>
			<?php foreach ($settings['list_items'] as $list_items) { ?>
				<li class="<?php if ($list_items['disable_item'] == 'yes') { ?> disable_item <?php } ?>" style="color: <?php echo $settings['feature_clr']; ?>;"><i style="color: <?php echo $list_items['icon_color']; ?>;padding-right:6px;" class="<?php echo $list_items['list_icon']; ?>"></i> <?php echo $list_items['list_name']; ?></li>
			<?php } ?>
			</ul>
		</div>			
		<div class="price plan-select">
      		<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> class="price-btn" style="font-size: <?php echo $btnsize; ?>px; background-color: <?php echo $settings['header_bg']; ?>; box-shadow: inset 0 -2px <?php echo $settings['header_bg']; ?>;-webkit-box-shadow: inset 0 -2px <?php echo $settings['header_bg']; ?>;">
      			<?php echo $settings['btn_title']; ?>
      		</a>
		</div>
	</div>
</div>