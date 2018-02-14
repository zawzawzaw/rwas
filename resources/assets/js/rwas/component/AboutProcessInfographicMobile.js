goog.provide('tma.component.AboutProcessInfographicMobile');
goog.provide('tma.component.AboutProcessNumberMobile');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The AboutProcessInfographicMobile constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.AboutProcessInfographicMobile = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.AboutProcessInfographicMobile.DEFAULT, options);
  this.element = element;

  this.line_array = [];

  /**
   * @type {Array.<tma.component.AboutProcessNumberMobile>}
   */
  this.number_item_array = [];


  /**
   * @type {tma.component.AboutProcessNumberMobile}
   */
  this.current_number_item = null;

  this.current_index = 0;


  
  this.create_line_array();
  this.create_number_items();


  this.select_number_index(0);


  // console.log('tma.component.AboutProcessInfographicMobile: init');
};
goog.inherits(tma.component.AboutProcessInfographicMobile, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.AboutProcessInfographicMobile.DEFAULT = {
};


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


tma.component.AboutProcessInfographicMobile.prototype.create_line_array = function() {
  var arr = this.element.find('.page-about-process-item-mobile .item-line');
  var temp_item = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);
    this.line_array[i] = temp_item;
  }
};
tma.component.AboutProcessInfographicMobile.prototype.create_number_items = function() {
  var arr = this.element.find('.page-about-process-item-mobile');
  var temp_item = null;

  /**
   * @type {tma.component.AboutProcessNumber}
   */
  var number_item = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);

    number_item = new tma.component.AboutProcessNumberMobile({}, temp_item);
    number_item.i = i;

    goog.events.listen(number_item, tma.component.AboutProcessNumberMobile.ON_CLICK, this.on_number_item_click.bind(this));

    this.number_item_array[i] = number_item;

  }

};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//

/**
 * @param  {number} num_param
 */
tma.component.AboutProcessInfographicMobile.prototype.select_number_index = function(num_param) {

  if (this.number_item_array.length != 0 && goog.isDefAndNotNull(this.number_item_array[num_param])) {

    this.current_index = num_param;
    this.current_number_item = this.number_item_array[num_param];


    /**
     * @type {tma.component.AboutProcessNumberMobile}
     */
    var number_item = null;



    for (var i = 0, l=this.number_item_array.length; i < l; i++) {
      number_item = this.number_item_array[i];

      // console.log('asdf: ' + i == this.current_index);
      // console.log(i);
      
      if (i <= this.current_index) {
        number_item.bg_visible();
      } else {
        number_item.bg_hidden();
      }

      if (i == this.current_index) {
        number_item.set_selected();
      } else {
        number_item.set_unselected();
      }

    } // end for



    // select line
    var item = null;
    
    for (var i = 0, l=this.line_array.length; i < l; i++) {
      item = this.line_array[i];
      if (i <= (this.current_index -1)) {
        item.addClass('selected-version');
      } else {
        item.removeClass('selected-version');
      }
    }
    



  } // end if


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
tma.component.AboutProcessInfographicMobile.prototype.on_number_item_click = function(event) {

  /**
   * @type {tma.component.AboutProcessNumberMobile}
   */
  var number_item = event.currentTarget;

  // console.log('number_item.i: ' + number_item.i);

  this.select_number_index(number_item.i);

};












//    _   _ _   _ __  __ ____  _____ ____
//   | \ | | | | |  \/  | __ )| ____|  _ \
//   |  \| | | | | |\/| |  _ \|  _| | |_) |
//   | |\  | |_| | |  | | |_) | |___|  _ <
//   |_| \_|\___/|_|  |_|____/|_____|_| \_\
//



tma.component.AboutProcessNumberMobile = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.AboutProcessNumberMobile.DEFAULT, options);
  this.element = element;

  this.i = 0;

  this.copy_element = this.element.find('.item-copy');
  
  // this.hitbox = this.element.find('.number-hitbox');
  this.element.click(function(event){

    this.dispatchEvent(new goog.events.Event(tma.component.AboutProcessNumberMobile.ON_CLICK));
    
  }.bind(this));

  /*
  this.hitbox.mouseover(function(event){
    this.element.addClass('hover-version');
  }.bind(this));

  this.hitbox.mouseleave(function(event){
    this.element.removeClass('hover-version');
  }.bind(this));
  */
  


  // console.log('tma.component.AboutProcessNumberMobile: init');
};
goog.inherits(tma.component.AboutProcessNumberMobile, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.AboutProcessNumberMobile.DEFAULT = {
  
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
tma.component.AboutProcessNumberMobile.ON_CLICK = 'on_click';



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


tma.component.AboutProcessNumberMobile.prototype.set_selected = function() {
  this.element.addClass('selected-version');

  this.copy_element.stop(0).slideDown(500);
};
tma.component.AboutProcessNumberMobile.prototype.set_unselected = function() {
  this.element.removeClass('selected-version');
  this.copy_element.stop(0).slideUp(500);
};
tma.component.AboutProcessNumberMobile.prototype.bg_visible = function() {
  this.element.addClass('bg-version');
  this.copy_element.stop(0).slideUp(500);
};
tma.component.AboutProcessNumberMobile.prototype.bg_hidden = function() {
  this.element.removeClass('bg-version');
  this.copy_element.stop(0).slideUp(500);
};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//


