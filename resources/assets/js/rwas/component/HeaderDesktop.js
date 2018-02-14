goog.provide('tma.component.HeaderDesktop');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The HeaderDesktop constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.HeaderDesktop = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.HeaderDesktop.DEFAULT, options);
  this.element = element;

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, tma.component.HeaderDesktop.DEFAULT, options);
  

  // makes more sense to put it in the aside
  // this.menu_btn = this.element.find('#desktop-header-menu-btn');

  


  // console.log('tma.component.HeaderDesktop: init');
};
goog.inherits(tma.component.HeaderDesktop, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.HeaderDesktop.DEFAULT = {
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


tma.component.HeaderDesktop.prototype.hide_bg = function() {
};
tma.component.HeaderDesktop.prototype.show_bg = function() {
};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//
