goog.provide('tma.page.about.Banner');

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
tma.page.about.Banner = function(options, element) {



  manic.page.Section.call(this, options, element);
  this.options = $.extend(this.options, tma.page.about.Banner.DEFAULT, options);
  

  // variables need to be before the init...
  this.about_banner_copy_01 = null;
  this.about_banner_copy_02 = null;

  // full height elements
  this.banner_image = $('#page-about-banner-image');


  this.banner_image_mobile = $('#page-about-banner-image-mobile');


  //    ___ _   _ ___ _____
  //   |_ _| \ | |_ _|_   _|
  //    | ||  \| || |  | |
  //    | || |\  || |  | |
  //   |___|_| \_|___| |_|
  //
  

  if (manic.IS_MOBILE == false){

    this.create_banner_copy();

  }

  




  // console.log('tma.page.about.Banner: init');
};
goog.inherits(tma.page.about.Banner, manic.page.Section);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.about.Banner.DEFAULT = {
};


//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//

/**
 * @override
 * @inheritDoc
 */
tma.page.about.Banner.prototype.init = function() {};




tma.page.about.Banner.prototype.create_banner_copy = function(){


  /*
  var h2_html = $('#page-about-banner-copy-content h2').html();
  var h2_arr = h2_html.split(' ');
  var h2_str = '';
  var target_str = '';

  for (var i = 0, l=h2_arr.length; i < l; i++) {
    target_str = h2_arr[i];

    if (target_str == '||') {
      h2_str += '<span class="ddd' + (i + 1) + '"></span>';
    } else {
      h2_str += '<span class="ddd' + (i + 1) + '">' + target_str + '</span> ';
    }

  }
  $('#page-about-banner-copy-content h2').html(h2_str);




  var h4_html = $('#page-about-banner-copy-content h4').html();
  var h4_arr = h4_html.split(' ');
  var h4_str = '';
  var target_str = '';

  for (var i = 0, l=h4_arr.length; i < l; i++) {
    target_str = h4_arr[i];

    if (target_str == '||') {
      h4_str += '<span class="ddd' + (i + 2) + '"></span>';
    } else {
      h4_str += '<span class="ddd' + (i + 2) + '">' + target_str + '</span> ';
    }

  }
  $('#page-about-banner-copy-content h4').html(h4_str);
  */
  

  /*
  this.about_banner_copy_01 = new SplitText('#page-about-banner-copy-content h2',{'type':'lines', 'linesClass':'lines'});
  this.about_banner_copy_01_array = [];
  var temp = $('#page-about-banner-copy-content h2 .lines');
  var item = null;
  var split = null;

  for (var i = 0, l=temp.length; i < l; i++) {
    item = $(temp[i]);
    split = new SplitText(item,{'type':'chars'});
    this.about_banner_copy_01_array[i] = split;
  }
  */
 
  this.about_banner_copy_01 = new SplitText('#page-about-banner-copy-content h2',{'type':'words', 'wordsClass':'words'});


  // this.about_banner_copy_02 = new SplitText('#page-about-banner-copy-content h4',{'type':'words'});
  this.about_banner_copy_02 = new SplitText('#page-about-banner-copy-content h1',{'type':'words'});
  




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
tma.page.about.Banner.prototype.update_section_layout = function(){

  // console.log('update_section_layout');
  if (manic.IS_MOBILE == false){


    // BANNER IMAGE HEIGHT
    this.banner_image.css({
      'height': this.page.window_height + 'px'
    });
  }




  if (manic.IS_MOBILE == true) {

    // var target_height = this.page.window_height - 56;   // 56 = mobile header height
    var target_height = this.page.window_height;   // 56 = mobile header height

    this.banner_image_mobile.css({
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
tma.page.about.Banner.prototype.animate_in_internal = function() {
  /*
  $('#page-about-banner-copy-content h2').addClass('animated-version');

  // $('#page-about-banner-copy-content h4').addClass('animated-version');
  /// TweenMax.delayedCall(1.7, $('#page-about-banner-copy-content h4').addClass, ['animated-version'], $('#page-about-banner-copy-content h4'));
  TweenMax.delayedCall(2.7, $('#page-about-banner-copy-content h4').addClass, ['animated-version'], $('#page-about-banner-copy-content h4'));
  */
 

  // 01
  

  // TweenMax.staggerFrom(this.about_banner_copy_01.chars, 1, {y:63, autoAlpha:0}, 0.05);
  
  // TweenMax.staggerFrom(this.about_banner_copy_01.chars, 0.4, {y:63, autoAlpha:0}, 0.2);
  /// TweenMax.staggerFrom(this.about_banner_copy_01.chars, 0.7, {y:63, ease: Sine.easeInOut}, 0.08);
  // TweenMax.staggerFrom(this.about_banner_copy_01.chars, 0.5, {y:63, ease: Sine.easeInOut}, 0.08);
  
  // TweenMax.staggerFrom(this.about_banner_copy_01.chars, 0.5, {y:63, ease: Sine.easeInOut}, 0.08);
  
  // TweenMax.staggerFrom(this.about_banner_copy_01.lines, 0.5, {y:63, autoAlpha:0, ease: Sine.easeInOut}, 0.08);
  
  // TweenMax.staggerFrom(this.about_banner_copy_01.lines, 1.2, {y:63, ease: Sine.easeInOut}, 0.6);
  /// TweenMax.staggerFrom(this.about_banner_copy_01.lines, 1.2, {y:63, ease: Back.easeOut}, 0.6);
  

  /// TweenMax.staggerFrom(this.about_banner_copy_01.lines, 1.0, {y:30, ease: Back.easeOut}, 0.5);
  /// TweenMax.staggerFrom(this.about_banner_copy_01.lines, 1.0, {autoAlpha:0, ease: Sine.easeOut}, 0.5);
  

  // 02
  
  /*
  console.log(this.about_banner_copy_01_array);
  var split = null;
  for (var i = 0, l=this.about_banner_copy_01_array.length; i < l; i++) {
    split = this.about_banner_copy_01_array[i];
    // TweenMax.staggerFrom(split.chars, 0.5, {autoAlpha:0, ease: Sine.easeOut, delay: 0 + i*0.5}, 0.05);

    TweenMax.staggerFromTo(split.chars, 
      0.8,
      {y:63}, 
      {y:0, ease: Sine.easeInOut, delay: 0.2 + i*0.9},
      0.04);
    TweenMax.staggerFromTo(split.chars, 
      0.8, 
      {autoAlpha:0}, 
      {autoAlpha:1, ease: Sine.easeOut, delay: 0 + i*0.9},
      0.04);
  }
  */
 




  if (manic.IS_MOBILE == false){

    TweenMax.delayedCall(0.1, $('#page-about-banner-image .banner-white-overlay').addClass, ['animated-version'], $('#page-about-banner-image .banner-white-overlay'));
    

    // 03
    TweenMax.staggerFromTo(this.about_banner_copy_01.words, 
      0.3 * 1.3, 
      {opacity:0},
      {opacity:1, ease: Sine.easeInOut, delay: 0.4}, 
      0.03 * 1.3);

    // TweenMax.staggerFrom(this.about_banner_copy_02.words, 0.5, {autoAlpha:0, ease: Sine.easeOut, delay: 2}, 0.15);
    // TweenMax.staggerFrom(this.about_banner_copy_02.words, 0.5, {autoAlpha:0, ease: Sine.easeOut, delay: 4.5}, 0.15);
    TweenMax.staggerFrom(this.about_banner_copy_02.words, 0.5, {autoAlpha:0, ease: Sine.easeOut, delay: 2.0}, 0.15);

    
    TweenMax.delayedCall(0.1, $('#page-about-banner-copy-content').addClass, ['animated-version'], $('#page-about-banner-copy-content'));

    // TweenMax.delayedCall(2.2, $('#page-about-banner-copy-content').addClass, ['animated-version-02'], $('#page-about-banner-copy-content'));
    // TweenMax.delayedCall(0.3, $('#page-about-banner-copy-content').addClass, ['animated-version-02'], $('#page-about-banner-copy-content')); // lol not needed
  }


};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

