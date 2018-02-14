goog.provide('tma.component.ContactFormMobile');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The ContactFormMobile constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.ContactFormMobile = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.ContactFormMobile.DEFAULT, options);
  this.element = element;

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, tma.component.ContactFormMobile.DEFAULT, options);
  




  


  // console.log('tma.component.ContactFormMobile: init');
};
goog.inherits(tma.component.ContactFormMobile, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.ContactFormMobile.DEFAULT = {
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



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//
