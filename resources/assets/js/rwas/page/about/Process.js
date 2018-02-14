goog.provide('tma.page.about.Process');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');


goog.require('manic.page.Section');

goog.require('tma.component.AboutProcessInfographic');
goog.require('tma.component.AboutProcessInfographicMobile');



/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {manic.page.Section}
 */
tma.page.about.Process = function(options, element) {

  manic.page.Section.call(this, options, element);
  this.options = $.extend(this.options, tma.page.about.Process.DEFAULT, options);
  

  this.process_split_copy = null;
  this.process_split_copy_02 = null;



  /**
   * @type {tma.component.AboutProcessInfographic}
   */
  this.process_infographic = null;


  
  
  

  
  this.create_process_copy();
  this.create_process_infographic();
  this.create_process_infographic_mobile();

  



  // console.log('tma.page.about.Process: init');
};
goog.inherits(tma.page.about.Process, manic.page.Section);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.about.Process.DEFAULT = {
};



//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//

tma.page.about.Process.prototype.create_process_copy = function(){
  this.process_split_copy = new SplitText('#page-about-process-copy h3', {'type':'chars', 'charsClass':'chars'});
  this.process_split_copy_02 = new SplitText('#page-about-process-copy p', {'type':'lines', 'linesClass':'lines'});
};

tma.page.about.Process.prototype.create_process_infographic = function(){

  if ($('#page-about-process-infographic').length != 0) {
    this.process_infographic = new tma.component.AboutProcessInfographic({}, $('#page-about-process-infographic'));
  }

};


tma.page.about.Process.prototype.create_process_infographic_mobile = function(){

  if ($('#page-about-process-item-mobile-container').length != 0) {
    this.process_infographic_mobile = new tma.component.AboutProcessInfographicMobile({}, $('#page-about-process-item-mobile-container'));
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
tma.page.about.Process.prototype.update_section_layout = function(){

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
tma.page.about.Process.prototype.animate_in_internal = function() {

  if (manic.IS_MOBILE == false){
    
    TweenMax.staggerFromTo(this.process_split_copy.chars, 
      0.8 * 0.75, 
      {y:36}, 
      {y:0, ease: Sine.easeInOut, delay: 0.4 + 0.2}, 
      0.06 * 0.75);
    TweenMax.staggerFromTo(this.process_split_copy.chars, 
      0.8 * 0.75, 
      {autoAlpha:0}, 
      {autoAlpha:1, ease: Sine.easeOut, delay: 0.4}, 
      0.06 * 0.75);


    // 01
    
    // TweenMax.staggerFromTo(this.process_split_copy_02.lines, 
    //   0.7, 
    //   {maxHeight:0, y:10},
    //   {maxHeight:22, y:0, ease: Sine.easeInOut, delay: 0.5}, 
    //   0.2);
    // TweenMax.staggerFromTo(this.process_split_copy_02.lines, 
    //   0.7, 
    //   {autoAlpha:0},
    //   {autoAlpha:1, ease: Sine.easeOut, delay: 0.5}, 
    //   0.2);
    
    TweenMax.staggerFromTo(this.process_split_copy_02.lines, 
      0.6 * 0.5, 
      {y:10},
      {y:0, ease: Sine.easeInOut, delay: 0.6}, 
      0.13 * 0.5);
    TweenMax.staggerFromTo(this.process_split_copy_02.lines, 
      0.6 * 0.5, 
      {autoAlpha:0},
      {autoAlpha:1, ease: Sine.easeOut, delay: 0.6}, 
      0.13 * 0.5);



    this.process_infographic.animate_in();


    $('#page-about-process-slider-container').addClass('animated-version');
    // TweenMax.delayedCall(0.7, $('#page-about-process-slider-container').addClass, ['animated-version'], $('#page-about-process-slider-container'));

    TweenMax.delayedCall(0.4, $('#page-about-process-number-container').addClass, ['animated-version'], $('#page-about-process-number-container'));



    TweenMax.delayedCall(0.6, $('#page-about-process-copy').addClass, ['animated-version'], $('#page-about-process-copy'));
  }


};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

