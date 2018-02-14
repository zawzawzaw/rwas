goog.provide('tma.page.about.About');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.ui.ExpandContainer');

goog.require('manic.page.Section');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {manic.page.Section}
 */
tma.page.about.About = function(options, element) {

  manic.page.Section.call(this, options, element);
  this.options = $.extend(this.options, tma.page.about.About.DEFAULT, options);
  

  this.about_split_copy = null;

  this.about_copy_container = $('#page-about-about-copy-container');
  this.about_copy_container_container = $('#page-about-about-copy-container-container');

  this.about_image_container = $('#page-about-about-image-container');


  this.about_image_mobile = $('#page-about-about-image-mobile');

  /**
   * @type {manic.ui.ExpandContainer}
   */
  this.about_first_expand_container = null;




  this.create_about_copy();
  this.create_about_first_expand();


  // console.log('tma.page.about.About: init');
};
goog.inherits(tma.page.about.About, manic.page.Section);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.about.About.DEFAULT = {
};




//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//


tma.page.about.About.prototype.create_about_copy = function () {  
  this.about_split_copy = new SplitText('#page-about-about-copy-title h3', {'type':'chars', 'charsClass':'chars'});
};

tma.page.about.About.prototype.create_about_first_expand = function() {

  if ($('#page-about-about-copy-first-expand-container').length != null) {
    this.about_first_expand_container = $('#page-about-about-copy-first-expand-container').data('manic.ui.ExpandContainer');
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
tma.page.about.About.prototype.update_section_layout = function(){

  if (manic.IS_MOBILE == false){

    // COPY HEIGHT
    this.about_copy_container.css({
      'min-height': this.page.window_height + 'px'
    });

    this.about_copy_container_container.css({
      'min-height': this.page.window_height + 'px'
    });

    var target_width = $('#page-about-about-image-container').width()
    $('#page-about-about-image-mask').css({
      'width': target_width + 'px'
    });




    // set padding here (to center the damn thing instead of using a buggy table)
    


  } // endif

  if (manic.IS_MOBILE == true) {

    var target_height = this.page.window_height - 56;   // 56 = mobile header height

    this.about_image_mobile.css({
      'height': target_height + 'px'
    });
    
  }

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
tma.page.about.About.prototype.animate_in_internal = function() {

  if (manic.IS_MOBILE == false){
    // console.log('animate_in_internal');

    // about image mask
    // this.about_image_container.addClass('animated-version');
    TweenMax.delayedCall(0.3, this.about_image_container.addClass, ['animated-version'], this.about_image_container);

    TweenMax.staggerFromTo(this.about_split_copy.chars, 
      0.8 * 0.55, 
      {y:36}, 
      {y:0, ease: Sine.easeInOut, delay: 0.2}, 
      0.06 * 0.55);
    TweenMax.staggerFromTo(this.about_split_copy.chars, 
      0.8 * 0.55, 
      {autoAlpha:0}, 
      {autoAlpha:1, ease: Sine.easeOut}, 
      0.06 * 0.55);

    TweenMax.delayedCall(0.4 + 0.3, $('#page-about-about-copy-expand').addClass, ['animated-version'], $('#page-about-about-copy-expand'));
    

    if (this.about_first_expand_container != null) {

      // this.about_first_expand_container.expand();
      TweenMax.delayedCall(1.2 + 0.3, this.about_first_expand_container.expand, [], this.about_first_expand_container);

    }
  }
  
};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

