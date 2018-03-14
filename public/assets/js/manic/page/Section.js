goog.provide('manic.page.Section');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The Section constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
manic.page.Section = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, manic.page.Section.DEFAULT, options);
  this.element = element;

  this.data_id = this.element.attr('id');

  /**
   * @type {manic.page.Page}
   */
  this.page = null;                         // this is useful



  this.has_animated_in = false;

  
  /*
  this.init();


  if (manic.IS_MOBILE == false){
    this.init_desktop();
  }
  */

  // console.log('manic.page.Section: init');
  
};
goog.inherits(manic.page.Section, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
manic.page.Section.DEFAULT = {
};

//     _____     _______ ____  ____  ___ ____  _____
//    / _ \ \   / / ____|  _ \|  _ \|_ _|  _ \| ____|
//   | | | \ \ / /|  _| | |_) | |_) || || | | |  _|
//   | |_| |\ V / | |___|  _ <|  _ < | || |_| | |___
//    \___/  \_/  |_____|_| \_\_| \_\___|____/|_____|
//

// manic.page.Section.prototype.init = function() {};
// manic.page.Section.prototype.init_desktop = function() {};

manic.page.Section.prototype.animate_in = function() {
  if(this.has_animated_in == false) {

    this.has_animated_in = true;

    this.animate_in_internal();

  }
};

manic.page.Section.prototype.animate_in_internal = function() {};

manic.page.Section.prototype.update_section_layout = function() {

};


