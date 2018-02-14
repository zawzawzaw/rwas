goog.provide('tma.page.about.Testimonial');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.page.Section');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {manic.page.Section}
 */
tma.page.about.Testimonial = function(options, element) {

  manic.page.Section.call(this, options, element);
  this.options = $.extend(this.options, tma.page.about.Testimonial.DEFAULT, options);
  
  this.testimony_split_copy = null;



  this.create_testimony_slider();
  this.create_testimony_slider_mobile();
  this.create_testimony_copy();       // create split text after slider has initiated

  // console.log('tma.page.about.Testimonial: init');
};
goog.inherits(tma.page.about.Testimonial, manic.page.Section);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.about.Testimonial.DEFAULT = {
};




//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//

tma.page.about.Testimonial.prototype.create_testimony_copy = function(){

  // this.testimony_split_copy = new SplitText('#page-about-testimonial-first-slide h2', {'type':'lines', 'linesClass':'lines'});
  this.testimony_split_copy = new SplitText('#page-about-testimonial-first-slide h2', {'type':'words'});

};

tma.page.about.Testimonial.prototype.create_testimony_slider = function() {

  if ($('#page-about-testimonial-slider').length != 0) {

    this.testimonial_slider = $('#page-about-testimonial-slider').slick({
      'speed': 750,
      'dots': true,
      'arrows': true,
      // 'infinite': false,
      'infinite': true,             // it's okay, since it's all text so far
      'slidesToShow': 1,
      'slidesToScroll': 1,
      'pauseOnHover': true,
      'autoplay': false
      // 'autoplay': true,
      // 'autoplaySpeed': 6000
    });

  }

};

tma.page.about.Testimonial.prototype.create_testimony_slider_mobile = function(){
  if ($('#page-about-testimonial-slider-mobile').length != 0) {

    this.testimonial_slider = $('#page-about-testimonial-slider-mobile').slick({
      'speed': 750,
      'dots': true,
      'arrows': true,
      // 'infinite': false,
      'infinite': true,             // it's okay, since it's all text so far
      'slidesToShow': 1,
      'slidesToScroll': 1,
      'pauseOnHover': true,
      'autoplay': false
      // 'autoplay': true,
      // 'autoplaySpeed': 6000
    });

  }
};


//    _        _ __   _____  _   _ _____
//   | |      / \\ \ / / _ \| | | |_   _|
//   | |     / _ \\ V / | | | | | | | |
//   | |___ / ___ \| || |_| | |_| | | |
//   |_____/_/   \_\_| \___/ \___/  |_|
//

/**
 * @override
 * @inheritDoc
 */
tma.page.about.Testimonial.prototype.update_section_layout = function(){

};

//       _    _   _ ___ __  __    _  _____ ___ ___  _   _
//      / \  | \ | |_ _|  \/  |  / \|_   _|_ _/ _ \| \ | |
//     / _ \ |  \| || || |\/| | / _ \ | |  | | | | |  \| |
//    / ___ \| |\  || || |  | |/ ___ \| |  | | |_| | |\  |
//   /_/   \_\_| \_|___|_|  |_/_/   \_\_| |___\___/|_| \_|
//


/**
 * @override
 * @inheritDoc
 */
tma.page.about.Testimonial.prototype.animate_in_internal = function() {


  if (manic.IS_MOBILE == false){
    
    TweenMax.staggerFromTo(this.testimony_split_copy.words, 
      0.3, 
      {opacity:0},
      {opacity:1, ease: Sine.easeInOut, delay: 1.3 - 0.5}, 
      0.03);


    

    /*
    TweenMax.staggerFromTo(this.testimony_split_copy.lines, 
      0.4 * 1.2, 
      {autoAlpha:0.5},
      {autoAlpha:1, ease: Sine.easeOut, delay: 0.3}, 
      0.15 * 1.2);
    */
   
    /*
    TweenMax.staggerFromTo(this.testimony_split_copy.lines, 
       0.4 * 1.2, 
       {maxHeight:0, y:10},
       {maxHeight:30, y:0, ease: Sine.easeInOut, delay: 1.3}, 
       0.15 * 1.2);
    */

    TweenMax.delayedCall(1.3 - 0.5, $('#page-about-testimonial-first-slide').addClass, ['animated-version-02'], $('#page-about-testimonial-first-slide'));
    TweenMax.delayedCall(1.9, $('#page-about-testimonial-first-slide').addClass, ['animated-version'], $('#page-about-testimonial-first-slide'));
    
    // TweenMax.delayedCall(2, $('#page-about-testimonial-slider-container').addClass, ['animated-version'], $('#page-about-testimonial-slider-container'));
    $('#page-about-testimonial-slider-container').addClass('animated-version');

    // TweenMax.delayedCall(0.8, $('#page-about-testimonial-slider').addClass, ['animated-version'], $('#page-about-testimonial-slider'));
    TweenMax.delayedCall(0.4, $('#page-about-testimonial-slider').addClass, ['animated-version'], $('#page-about-testimonial-slider'));
  }


};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//
