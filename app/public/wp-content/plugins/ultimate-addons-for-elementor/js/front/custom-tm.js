// Slick Carousal Slider

  var maAdvancedCarousel = function() {
  jQuery(".tm-slider").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });

  jQuery(".post-slider").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    ]
  });

  }

  jQuery(window).on('elementor/frontend/init', function () {
    if(elementorFrontend.isEditMode()) {
        isEditMode = true;
    }
    
      elementorFrontend.hooks.addAction( 'frontend/element_ready/advanced-carousel.default', maAdvancedCarousel);
  });

