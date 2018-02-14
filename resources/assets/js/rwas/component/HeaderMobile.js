goog.provide('rwas.component.HeaderMobile');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
rwas.component.HeaderMobile = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, rwas.component.HeaderMobile.DEFAULT, options);
  this.element = element;

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, rwas.component.HeaderMobile.DEFAULT, options);
  




  


  console.log('rwas.component.HeaderMobile: init');
};
goog.inherits(rwas.component.HeaderMobile, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
rwas.component.HeaderMobile.DEFAULT = {
  'option_01': '',
  'option_02': ''
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
rwas.component.HeaderMobile.EVENT_01 = '';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
rwas.component.HeaderMobile.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


rwas.component.HeaderMobile.prototype.private_method_01 = function() {};
rwas.component.HeaderMobile.prototype.private_method_02 = function() {};
rwas.component.HeaderMobile.prototype.private_method_03 = function() {};
rwas.component.HeaderMobile.prototype.private_method_04 = function() {};
rwas.component.HeaderMobile.prototype.private_method_05 = function() {};
rwas.component.HeaderMobile.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


rwas.component.HeaderMobile.prototype.public_method_01 = function() {};
rwas.component.HeaderMobile.prototype.public_method_02 = function() {};
rwas.component.HeaderMobile.prototype.public_method_03 = function() {};
rwas.component.HeaderMobile.prototype.public_method_04 = function() {};
rwas.component.HeaderMobile.prototype.public_method_05 = function() {};
rwas.component.HeaderMobile.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
rwas.component.HeaderMobile.prototype.on_event_handler_01 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.HeaderMobile.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.HeaderMobile.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.HeaderMobile.prototype.on_event_handler_04 = function(event) {
};






rwas.component.HeaderMobile.prototype.sample_method_calls = function() {

  // sample override
  rwas.component.HeaderMobile.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(rwas.component.HeaderMobile.EVENT_01));
};