var filterableGalleryHand = function() {
	jQuery('.mega-info-circle').find('.icon-wrapper').each(function(index, el) {
		var inner_section = jQuery(this).closest('.mega-info-circle').find('.mega-inner-section > div > div');
		var content = jQuery(this).find('div').clone();
		
		jQuery(this).hover(function() {
			setTimeout(function(){
				jQuery(inner_section).html(content).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0});
			}, 400);
		}, function() {
			
		});

		if (index % 5 == 0) {
			jQuery(this).trigger('mouseenter');
		}
	});
}

jQuery(window).on('elementor/frontend/init', function () {
    if(elementorFrontend.isEditMode()) {
        isEditMode = true;
    }
    
    elementorFrontend.hooks.addAction( 'frontend/element_ready/info-cirlce.default', filterableGalleryHand);
});