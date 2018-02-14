goog.provide('tma.component.FooterContactMobile');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');


/**
 * The FooterContactMobile constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.FooterContactMobile = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.FooterContactMobile.DEFAULT, options);
  this.element = element;

  this.is_open = false;

  
  /**
   * @type {tma.page.Default}
   */
  this.page = null;                         // this is useful

  this.window_scroll = 0;
  this.window_element = $(window);
  this.body_element = $('body');




  // console.log('tma.component.FooterContactMobile: init');
};
goog.inherits(tma.component.FooterContactMobile, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.FooterContactMobile.DEFAULT = {
};

//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//



//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


tma.component.FooterContactMobile.prototype.open_contact = function() {
  if (this.is_open == false) {
    this.is_open = true;

    this.window_scroll = this.window_element.scrollTop();

    this.body_element.addClass('mobile-contact-open-version');

    this.window_element.scrollTop(0);

    
  }
};
tma.component.FooterContactMobile.prototype.close_contact = function() {
  if (this.is_open == true) {
    this.is_open = false;

    this.body_element.removeClass('mobile-contact-open-version');

    // console.log('this.window_scroll: ' + this.window_scroll);
    this.window_element.scrollTop(this.window_scroll);


  }
};
tma.component.FooterContactMobile.prototype.update_layout = function() {

  var target_height = this.page.window_height - 101;

  this.element.css({
    'min-height': target_height + 'px'
  });
};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//
