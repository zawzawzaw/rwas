goog.provide('tma.page.about.Whatwedo');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.page.Section');

goog.require('tma.component.AboutCircleInfographic');


/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {manic.page.Section}
 */
tma.page.about.Whatwedo = function(options, element) {

  manic.page.Section.call(this, options, element);
  this.options = $.extend(this.options, tma.page.about.Whatwedo.DEFAULT, options);
  


  /**
   * @type {tma.component.AboutCircleInfographic}
   */
  this.whatwedo_infographic = null;

  this.last_clicked_infographic_cta = '';

  this.create_infographic();
  this.create_infographic_cta();
  this.create_mobile_text();


  // console.log('tma.page.about.Whatwedo: init');
};
goog.inherits(tma.page.about.Whatwedo, manic.page.Section);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.about.Whatwedo.DEFAULT = {
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
tma.page.about.Whatwedo.ON_INFOGRAPHIC_CTA_CLICK = 'on_infographic_cta_click';


//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//

tma.page.about.Whatwedo.prototype.create_infographic = function(){
  
  if ($('#page-about-whatwedo-infographic-container').length != 0) {
    this.whatwedo_infographic = new tma.component.AboutCircleInfographic({}, $('#page-about-whatwedo-infographic-container'));
  }

};

tma.page.about.Whatwedo.prototype.create_infographic_cta = function(){

  $('#whatwedo-incentive-learn-more-btn').click(function(event){

    this.last_clicked_infographic_cta = 'incentive';
    this.dispatchEvent(new goog.events.Event(tma.page.about.Whatwedo.ON_INFOGRAPHIC_CTA_CLICK));

  }.bind(this));

  $('#whatwedo-automotive-learn-more-btn').click(function(event){

    this.last_clicked_infographic_cta = 'automotive';
    this.dispatchEvent(new goog.events.Event(tma.page.about.Whatwedo.ON_INFOGRAPHIC_CTA_CLICK));

  }.bind(this));

  $('#whatwedo-gala-learn-more-btn').click(function(event){

    this.last_clicked_infographic_cta = 'gala';
    this.dispatchEvent(new goog.events.Event(tma.page.about.Whatwedo.ON_INFOGRAPHIC_CTA_CLICK));

  }.bind(this));

};

tma.page.about.Whatwedo.prototype.create_mobile_text = function(){

  var arr = $('#page-about-whatwedo-item-mobile-container .page-about-whatwedo-item-mobile');
  var temp_item = null;
  var arrow_cta = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);
    arrow_cta = temp_item.find('.item-cta-container .arrow-cta')
    arrow_cta.data('parent', temp_item)
    
    arrow_cta.click(function(event){
      var target = $(event.currentTarget);
      var parent = target.data('parent');

      parent.find('.item-cta-container').stop(0).slideUp(300);
      parent.find('.item-expand').stop(0).delay(300).slideDown(500);
      
    });
  }
}

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
tma.page.about.Whatwedo.prototype.update_section_layout = function(){

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
tma.page.about.Whatwedo.prototype.animate_in_internal = function() {

  if (manic.IS_MOBILE == false){
    this.whatwedo_infographic.animate_in();

    $('#page-about-whatwedo-infographic-container').addClass('animated-version');
    // TweenMax.delayedCall(0.3, $('#page-about-whatwedo-infographic-container').addClass, ['animated-version'], $('#page-about-whatwedo-infographic-container'));
  }
};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

