// a copy of sidebar title
// this and the sidebar title has too much code that should be in about.js

goog.provide('tma.component.SidebarKeys');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.SidebarKeys = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.SidebarKeys.DEFAULT, options);
  this.element = element;


  this.logo_element = this.element.find('#sidebar-keys-desktop-logo');

  this.logo_container_element = this.element.find('#sidebar-keys-desktop');


  // this is a static thing
  this.window = $(window);
  this.width_element = $('#sidebar-width');


  // console.log('tma.component.SidebarKeys: init');
};
goog.inherits(tma.component.SidebarKeys, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.SidebarKeys.DEFAULT = {
  
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




tma.component.SidebarKeys.prototype.update_layout = function() {

  var window_width = this.window.width();
  var width_element_width = this.width_element.width();

  var target_x = Math.round((window_width - width_element_width) / 2);

  this.element.css({
    'left': target_x + 'px'
  });

};


/**
 * @param {String} str_param
 */
tma.component.SidebarKeys.prototype.set_color = function(str_param) {

  if (str_param == 'white') {
    this.logo_element.removeClass('grey-version');

  } else if (str_param == 'grey') {
    this.logo_element.addClass('grey-version');

  } else {
    this.logo_element.addClass('grey-version');    // default = grey;

  }

};

tma.component.SidebarKeys.prototype.hide_keys = function() {
  this.logo_container_element.addClass('hidden-version');
};
tma.component.SidebarKeys.prototype.show_keys = function() {
  this.logo_container_element.removeClass('hidden-version');
};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//



