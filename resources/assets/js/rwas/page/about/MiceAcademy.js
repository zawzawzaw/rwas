goog.provide('tma.page.about.MiceAcademy');

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
tma.page.about.MiceAcademy = function(options, element) {

  manic.page.Section.call(this, options, element);
  this.options = $.extend(this.options, tma.page.about.MiceAcademy.DEFAULT, options);
  

  this.mice_academy_copy = null;
  this.mice_academy_copy_02 = null;
  this.mice_academy_copy_03 = null;

  this.mice_academy_content_container = $('#page-about-mice-academy-section-content-container');





  this.create_mice_academy_copy();


  // console.log('tma.page.about.MiceAcademy: init');
};
goog.inherits(tma.page.about.MiceAcademy, manic.page.Section);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.about.MiceAcademy.DEFAULT = {
};



//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//

tma.page.about.MiceAcademy.prototype.create_mice_academy_copy = function(){

  this.mice_academy_copy = new SplitText('#page-about-mice-academy-title h2', {'type':'chars', 'charsClass':'chars'});

  this.mice_academy_copy_02 = new SplitText('#page-about-mice-academy-copy p', {'type':'lines', 'linesClass':'lines'});
  this.mice_academy_copy_03 = new SplitText('#page-about-mice-academy-intro h6', {'type':'lines', 'linesClass':'lines'});



  /*
  this.mice_academy_parallax_tween = new TimelineMax ();
  this.mice_academy_parallax_tween.add([
    TweenMax.fromTo("#page-about-mice-academy-section-content-parallax", 1, {y:-150}, {y:150, ease: Linear.easeNone})
  ]);
    
  this.mice_academy_parallax_scene = new ScrollMagic.Scene({
    'duration': this.window_height * 2,
    'triggerHook': 1,
    'triggerElement': '#page-about-mice-academy-section'
  });
  this.mice_academy_parallax_scene.addTo(this.controller);
  this.mice_academy_parallax_scene.setTween(this.mice_academy_parallax_tween);
  // this.mice_academy_parallax_scene.addIndicators({name:'Test Parallax'});

  */

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
tma.page.about.MiceAcademy.prototype.update_section_layout = function(){
  if (manic.IS_MOBILE == false){


    this.mice_academy_content_container.css({
      'height': this.page.window_height + 'px'
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
tma.page.about.MiceAcademy.prototype.animate_in_internal = function() {

  if (manic.IS_MOBILE == false){

    // TweenMax.staggerFrom(this.mice_academy_copy.chars, 0.5, {y:63, ease: Sine.easeInOut}, 0.08);
    /// TweenMax.staggerFrom(this.mice_academy_copy.chars, 1, {y:63, ease: Back.easeInOut}, 0.08);
    TweenMax.staggerFromTo(this.mice_academy_copy.chars, 
      1 * 0.77, 
      {y:63}, 
      {y:0, ease: Sine.easeInOut, delay: 0.2}, 
      0.08 * 0.77);
    TweenMax.staggerFromTo(this.mice_academy_copy.chars, 
      1 * 0.77, 
      {autoAlpha:0}, 
      {autoAlpha:1, ease: Sine.easeOut}, 
      0.08 * 0.77);

    $('#page-about-mice-academy-title').addClass('animated-version');


    TweenMax.staggerFromTo(this.mice_academy_copy_02.lines, 
      0.5 * 0.77, 
      // {maxHeight:0, y:10},
      // {maxHeight:22, y:0, ease: Sine.easeInOut, delay: 1.4}, 
      {y:10},
      {y:0, ease: Sine.easeInOut, delay: 1.4}, 
      0.2 * 0.77);

    TweenMax.staggerFromTo(this.mice_academy_copy_02.lines, 
      0.5 * 0.77, 
      {autoAlpha:0},
      {autoAlpha:1, ease: Sine.easeOut, delay: 1.4}, 
      0.2 * 0.77);
    

    TweenMax.delayedCall(1.4 * 0.77, $('#page-about-mice-academy-copy').addClass, ['animated-version'], $('#page-about-mice-academy-copy'));




    // TweenMax.staggerFrom(this.mice_academy_copy_03.lines, 0.7, {y:25, ease: Sine.easeInOut, delay: 1.0 + 0.6}, 0.3);
    // TweenMax.staggerFrom(this.mice_academy_copy_03.lines, 0.7, {autoAlpha:0, ease: Sine.easeOut, delay: 1.0 + 0.6}, 0.3);

    TweenMax.staggerFromTo(this.mice_academy_copy_03.lines, 
      0.5 * 0.77, 
      // {maxHeight:0, y:10},
      // {maxHeight:24, y:0, ease: Sine.easeInOut, delay: 1.4 + 0.2}, 
      {y:10},
      {y:0, ease: Sine.easeInOut, delay: 1.4 + 0.2}, 
      0.2 * 0.77);
    TweenMax.staggerFromTo(this.mice_academy_copy_03.lines, 
      0.5 * 0.77, 
      {autoAlpha:0},
      {autoAlpha:1, ease: Sine.easeOut, delay: 1.4 + 0.2}, 
      0.2 * 0.77);

    TweenMax.delayedCall((1.4 + 0.2) * 0.77, $('#page-about-mice-academy-intro').addClass, ['animated-version'], $('#page-about-mice-academy-intro'));



    TweenMax.delayedCall(3.5 * 0.77, $('#page-about-mice-academy-mailing-list-form-container-container').addClass, ['animated-version'], $('#page-about-mice-academy-mailing-list-form-container-container'));
    
  }
};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//
