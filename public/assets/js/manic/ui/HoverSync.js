goog.provide('manic.ui.HoverSync');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The HoverSync constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
manic.ui.HoverSync = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, manic.ui.HoverSync.DEFAULT, options);
  this.element = element;


  /**
   * @type {Array.<jQuery>}
   */
  this.item_array = [];

  this.selector = this.options['selector'];
  this.item_elements = this.element.find(this.selector);


  var arr = this.element.find(this.selector);

  if (this.options['item_array'].length != 0) {
    arr = this.options['item_array'];
  }

  var temp_item = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);
    temp_item.mouseover(this.on_item_mouseover.bind(this));
    temp_item.mouseout(this.on_item_mouseout.bind(this));

    this.item_array[i] = temp_item;
  }


  


  // console.log('manic.ui.HoverSync: init');
};
goog.inherits(manic.ui.HoverSync, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
manic.ui.HoverSync.DEFAULT = {
  'selector': '.hover-sync',
  'item_array': []
};

/**
 * HoverSync Event Constant
 * @const
 * @type {string}
 */
manic.ui.HoverSync.EVENT_01 = '';

/**
 * HoverSync Event Constant
 * @const
 * @type {string}
 */
manic.ui.HoverSync.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


manic.ui.HoverSync.prototype.private_method_01 = function() {};
manic.ui.HoverSync.prototype.private_method_02 = function() {};
manic.ui.HoverSync.prototype.private_method_03 = function() {};
manic.ui.HoverSync.prototype.private_method_04 = function() {};
manic.ui.HoverSync.prototype.private_method_05 = function() {};
manic.ui.HoverSync.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


manic.ui.HoverSync.prototype.public_method_01 = function() {};
manic.ui.HoverSync.prototype.public_method_02 = function() {};
manic.ui.HoverSync.prototype.public_method_03 = function() {};
manic.ui.HoverSync.prototype.public_method_04 = function() {};
manic.ui.HoverSync.prototype.public_method_05 = function() {};
manic.ui.HoverSync.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
manic.ui.HoverSync.prototype.on_item_mouseover = function(event) {

  // this.item_elements.addClass('selected');
  
  var temp_item = null;

  for (var i = 0, l=this.item_array.length; i < l; i++) {
    temp_item = this.item_array[i];
    temp_item.addClass('selected');
  }
  
  
};

/**
 * @param {object} event
 */
manic.ui.HoverSync.prototype.on_item_mouseout = function(event) {

  // this.item_elements.removeClass('selected');
  
  var temp_item = null;

  for (var i = 0, l=this.item_array.length; i < l; i++) {
    temp_item = this.item_array[i];
    temp_item.removeClass('selected');
  }

};

/**
 * @param {object} event
 */
manic.ui.HoverSync.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
manic.ui.HoverSync.prototype.on_event_handler_04 = function(event) {
};






manic.ui.HoverSync.prototype.sample_method_calls = function() {

  // sample override
  manic.ui.HoverSync.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(manic.ui.HoverSync.EVENT_01));
};