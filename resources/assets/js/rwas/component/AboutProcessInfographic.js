goog.provide('tma.component.AboutProcessInfographic');
goog.provide('tma.component.AboutProcessNumber');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.ui.AnimatedSVG');


/**
 * The AboutProcessInfographic constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.AboutProcessInfographic = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.AboutProcessInfographic.DEFAULT, options);
  this.element = element;

  this.has_slick = false;
  this.slider_element = this.element.find('#page-about-process-slider');

  this.has_animated_in = false;

  this.line_array = [];

  /**
   * @type {Array.<manic.ui.AnimatedSVG>}
   */
  this.icon_array = [];

  /**
   * @type {manic.ui.AnimatedSVG}
   */
  this.first_icon = null;



  /**
   * @type {Array.<tma.component.AboutProcessNumber>}
   */
  this.number_item_array = [];


  /**
   * @type {tma.component.AboutProcessNumber}
   */
  this.current_number_item = null;

  this.current_index = 0;


  


  this.create_line_array();
  this.create_icon_array();
  this.create_number_items();
  this.create_slider();




  this.select_number_index(0);

  // console.log('tma.component.AboutProcessInfographic: init');
};
goog.inherits(tma.component.AboutProcessInfographic, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.AboutProcessInfographic.DEFAULT = {
};



//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


tma.component.AboutProcessInfographic.prototype.create_slider = function() {


  if (this.slider_element.length != 0) {

    this.has_slick = true;

    this.slider_element.slick({
      'speed': 350,
      'dots': false,
      'arrows': false,
      'infinite': false,
      'slidesToShow': 1,
      'slidesToScroll': 1,
      'pauseOnHover': false,
      'autoplay': false,
      'autoplaySpeed': 4000
      // 'autoplay': true,
      // 'autoplaySpeed': 1000,
    });


    this.slider_element.on('afterChange', this.on_slider_after_change.bind(this));

    





  } // end if
  
  

};



tma.component.AboutProcessInfographic.prototype.create_line_array = function() {

  console.log('create_line_array');

  var arr = this.element.find('#page-about-process-number-container .page-about-process-line');
  var temp_item = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);
    this.line_array[i] = temp_item;
  }
  
};


tma.component.AboutProcessInfographic.prototype.create_icon_array = function(){

  // var arr = this.element.find('.item-icon .manic-animated-svg');
  var arr = this.element.find('.manic-animated-svg');

  if (arr.length != 0) {

    /**
     * @type {manic.ui.AnimatedSVG}
     */
    var icon = null;
    var temp_item = null;
    
    for (var i = 0, l=arr.length; i < l; i++) {

      temp_item = $(arr[i]);
      icon = temp_item.data('manic.ui.AnimatedSVG');
      this.icon_array[i] = icon;                  // might be undefined

    }


    this.first_icon = this.icon_array[0];

  }
  
};


tma.component.AboutProcessInfographic.prototype.create_number_items = function() {

  var arr = this.element.find('#page-about-process-number-container .page-about-process-number');
  var temp_item = null;

  /**
   * @type {tma.component.AboutProcessNumber}
   */
  var number_item = null;

  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);

    number_item = new tma.component.AboutProcessNumber({}, temp_item);
    number_item.i = i;

    goog.events.listen(number_item, tma.component.AboutProcessNumber.ON_CLICK, this.on_number_item_click.bind(this));

    this.number_item_array[i] = number_item;

  }


};


tma.component.AboutProcessInfographic.prototype.animate_in = function() {

  if (this.has_animated_in == false) {

    this.has_animated_in = true;
    this.first_icon.delayed_play_svg(1);
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
tma.component.AboutProcessInfographic.prototype.select_number_index = function(num_param) {
    
  // console.log(goog.isDefAndNotNull(this.number_item_array[num_param]));
  // console.log(goog.isDefAndNotNull(this.number_item_array[num_param]));
  if (this.number_item_array.length != 0 && goog.isDefAndNotNull(this.number_item_array[num_param])) {

    this.current_index = num_param;
    this.current_number_item = this.number_item_array[num_param];


    // console.log('got inside')
    // console.log('this.current_index: ' + this.current_index);

    /**
     * @type {tma.component.AboutProcessNumber}
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
    // console.log(this.line_array);
    // console.log('asdfasdf');

    var item = null;

    for (var i = 0, l=this.line_array.length; i < l; i++) {
      item = this.line_array[i];

      if (i <= (this.current_index -1)) {
        item.addClass('selected-version');
      } else {
        item.removeClass('selected-version');
      }
    }
    

    // animate icon

    /**
     * @type {manic.ui.AnimatedSVG}
     */
    var icon = this.icon_array[this.current_index];

    if (goog.isDefAndNotNull(icon)) {
      // icon.play_svg();

      // icon.delayed_play_svg(0.8);
      
      if (this.has_animated_in == true) {
        icon.delayed_play_svg(0.3);
      }

    }


  } // end if
  
};

/**
 * @param  {number} num_param
 */
tma.component.AboutProcessInfographic.prototype.select_slider_index = function(num_param) {

  if (this.has_slick) {


    this.slider_element.slick('slickGoTo', num_param);
  }
  
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
tma.component.AboutProcessInfographic.prototype.on_number_item_click = function(event) {



  /**
   * @type {tma.component.AboutProcessNumber}
   */
  var number_item = event.currentTarget;

  // console.log('number_item.i: ' + number_item.i);

  this.select_number_index(number_item.i);
  this.select_slider_index(number_item.i);
  
};

/**
 * @param {object} event
 */
tma.component.AboutProcessInfographic.prototype.on_slider_after_change = function(event, currentSlide) {

  var index = this.slider_element.slick('slickCurrentSlide');
  
  this.select_number_index(index);
  
  /*
  console.log(currentSlide);
  var slide = $(currentSlide);
  var index = slide.attr('data-index');
  index = parseInt(index);
  

  console.log('currentSlide: ' + currentSlide);
  console.log('currentSlide: ' + index);
  */
};







//////////////////////////////////
//////////////////////////////////



//    _   _ _   _ __  __ ____  _____ ____
//   | \ | | | | |  \/  | __ )| ____|  _ \
//   |  \| | | | | |\/| |  _ \|  _| | |_) |
//   | |\  | |_| | |  | | |_) | |___|  _ <
//   |_| \_|\___/|_|  |_|____/|_____|_| \_\
//



goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.AboutProcessNumber = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.AboutProcessNumber.DEFAULT, options);
  this.element = element;

  // if class has parent
  //goog.events.EventTarget.call(this, options, element);
  //this.options = $.extend(this.options, tma.component.AboutProcessNumber.DEFAULT, options);
  

  this.i = 0;
  // this.title_element = this.element.find();


  this.hitbox = this.element.find('.number-hitbox');
  this.hitbox.click(function(event){

    this.dispatchEvent(new goog.events.Event(tma.component.AboutProcessNumber.ON_CLICK));
    
  }.bind(this));

  this.hitbox.mouseover(function(event){
    this.element.addClass('hover-version');
  }.bind(this));

  this.hitbox.mouseleave(function(event){
    this.element.removeClass('hover-version');
  }.bind(this));

  


  // console.log('tma.component.AboutProcessNumber: init');
};
goog.inherits(tma.component.AboutProcessNumber, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.AboutProcessNumber.DEFAULT = {
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
tma.component.AboutProcessNumber.ON_CLICK = 'on_click';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
tma.component.AboutProcessNumber.EVENT_02 = '';




//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


tma.component.AboutProcessNumber.prototype.set_selected = function() {
  this.element.addClass('selected-version');
};
tma.component.AboutProcessNumber.prototype.set_unselected = function() {
  this.element.removeClass('selected-version');
};
tma.component.AboutProcessNumber.prototype.bg_visible = function() {
  this.element.addClass('bg-version');
};
tma.component.AboutProcessNumber.prototype.bg_hidden = function() {
  this.element.removeClass('bg-version');
};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//
