goog.provide('tma.component.HeaderMobile');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');



/**
 * The HeaderMobile constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.HeaderMobile = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.HeaderMobile.DEFAULT, options);
  this.element = element;

  this.is_open = false;

  this.element.find('#header-mobile-menu-btn').click(this.on_menu_click.bind(this));

  this.content_container = $('#header-expand-content-container');

  this.window_scroll = 0;
  this.window_element = $(window);
  this.body_element = $('body');

  this.page_wrapper_overlay = $('#page-wrapper-overlay');



  /**
   * @type {tma.page.Default}
   */
  this.page = null;                         // this is useful



  this.create_menu_links();


  // console.log('tma.component.HeaderMobile: init');
};
goog.inherits(tma.component.HeaderMobile, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.HeaderMobile.DEFAULT = {
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
tma.component.HeaderMobile.ON_OPEN = 'on_open';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
tma.component.HeaderMobile.ON_CLOSE = 'on_close';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//



tma.component.HeaderMobile.prototype.create_menu_links = function(){

  $('#header-menu-mobile nav ul li a').click(function(event){

    event.preventDefault();

    this.close_menu();

    var target = $(event.currentTarget);
    var href = target.attr('href');
    href = href.split('#').join('');      // remove the #

    // var hash = '' + window.location.hash;
    // hash = hash.split('#').join('');      // remove the #



    TweenMax.killDelayedCallsTo(this.on_menu_click_delayed);
    TweenMax.delayedCall(0.6, this.on_menu_click_delayed, [href], this);

    /*
    if (manic.IS_TABLET_PORTRAIT == true) {

      // buggy hashtag performance on tablet
      this.page.scroll_to_target(href);

    } else {

      if (hash == href) {
        this.page.scroll_to_target(href);
      } else {
        window.location.hash = href;         // much better
      }
    }

    */
    
  }.bind(this));

};

/**
 * @param  {String} href_param
 */
tma.component.HeaderMobile.prototype.on_menu_click_delayed = function(href_param) {

  var hash = '' + window.location.hash;
  hash = hash.split('#').join('');      // remove the #
  
  if (manic.IS_TABLET_PORTRAIT == true) {

    // buggy hashtag performance on tablet
    this.page.scroll_to_target(href_param);

  } else {

    if (hash == href_param) {
      this.page.scroll_to_target(href_param);
    } else {
      window.location.hash = href_param;         // much better
    }
  }


};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


tma.component.HeaderMobile.prototype.open_menu = function() {
  if (this.is_open == false) {
    this.is_open = true;

    this.window_scroll = this.window_element.scrollTop();

    this.body_element.addClass('mobile-menu-open-version');

    // this.window_element.scrollTop(0);

    TweenMax.to(this.page_wrapper_overlay, 0.5, {autoAlpha:1});
      
    TweenMax.killDelayedCallsTo(this.open_menu_delayed);
    TweenMax.killDelayedCallsTo(this.close_menu_delayed);
    TweenMax.delayedCall(0.5, this.open_menu_delayed, [], this);

    this.dispatchEvent(new goog.events.Event(tma.component.HeaderMobile.ON_OPEN));

  }
};

tma.component.HeaderMobile.prototype.open_menu_delayed = function(){
  this.window_element.scrollTop(0);
  this.body_element.addClass('mobile-menu-open-open-version');
};

tma.component.HeaderMobile.prototype.close_menu = function() {
  if (this.is_open == true) {
    this.is_open = false;

    // this.body_element.removeClass('mobile-menu-open-version');
    this.body_element.removeClass('mobile-menu-open-open-version');
    this.body_element.removeClass('mobile-menu-open-version');

    // console.log('this.window_scroll: ' + this.window_scroll);
    this.window_element.scrollTop(this.window_scroll);

    
    TweenMax.killDelayedCallsTo(this.open_menu_delayed);
    TweenMax.killDelayedCallsTo(this.close_menu_delayed);
    TweenMax.delayedCall(0.5, this.close_menu_delayed, [], this);

    this.dispatchEvent(new goog.events.Event(tma.component.HeaderMobile.ON_CLOSE));

  }
};

tma.component.HeaderMobile.prototype.close_menu_delayed = function() {

  

  this.window_element.scrollTop(this.window_scroll);
  TweenMax.to(this.page_wrapper_overlay, 0.5, {autoAlpha:0});

};









tma.component.HeaderMobile.prototype.update_layout = function() {
  // console.log('update_layout');
  // var target_height = this.page.window_height - 56;
  var target_height = this.page.window_height - 56 - 20;    // 20 px offset

  this.content_container.css({
    'height': target_height + 'px'
  });

};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//


/**
 * @param {object} event
 */
tma.component.HeaderMobile.prototype.on_menu_click = function(event) {

  if (this.is_open == true) {
    this.close_menu();
  } else {
    this.open_menu();
  }

};


