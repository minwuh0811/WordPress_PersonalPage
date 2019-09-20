var modalPopup = function() {
	jQuery(document).ready(function($) {
	 	var y_url = $('iframe').attr('src');
		$('.model-popup-btn').bind('click', function(event) {
			var modal_id = $(this).data('id');
			var bgcolor = $(this).closest('.modal-popup-box').data('bodybg');
			$('#'+modal_id).bPopup({
				followSpeed: 200,
				speed: 200,
				opacity: 0.8,
	            modalColor: bgcolor,
	            onClose: function() { 
	            	// player.stopVideo();
	            	$("iframe").each(function() { 
				        var src= $(this).attr('src');
				        $(this).attr('src',src);  
					});
	            }
	        });
		});

		$('.mega-model-popup').prependTo('body');
	});
}

jQuery(window).on('elementor/frontend/init', function () {
    if(elementorFrontend.isEditMode()) {
        isEditMode = true;
    }
    
      elementorFrontend.hooks.addAction( 'frontend/element_ready/modalpopup.default', modalPopup);
});