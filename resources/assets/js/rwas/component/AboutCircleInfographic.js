goog.provide('tma.component.AboutCircleInfographic');
goog.provide('tma.component.AboutCircleInfographicItem');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The AboutCircleInfographic constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.AboutCircleInfographic = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.AboutCircleInfographic.DEFAULT, options);
  this.element = element;

  
  this.current_index = 0;

  this.item_length = 0;
  this.item_length = this.element.find('.copy-item-container .copy-item').length;     // based on the copy, with checks upon creating the items

  this.has_animate_in = false;
  this.percent_obj = {
    'percent': 0
  };



  this.svg_container = this.element.find('#page-about-whatwedo-infographic .svg-container');

  this.svg_path = null;

  /**
   * @type {Array}
   */
  this.svg_circle_array = [];

  /**
   * @type {Array}
   */
  this.svg_circle_outline_array = [];

  this.paper = null;

  


  this.element.find('.image-item-container').click(function(){
    this.next_index();
  }.bind(this));

  

  

  /**
   * @type {Array.<tma.component.AboutCircleInfographicItem>}
   */
  this.infographic_item_array = [];








  this.create_svg();
  this.create_infographic_items();




  // this.animate_in();

  



  // console.log('tma.component.AboutCircleInfographic: init');
};
goog.inherits(tma.component.AboutCircleInfographic, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.AboutCircleInfographic.DEFAULT = {
};




/**
 * @const
 * @type {string}
 */
tma.component.AboutCircleInfographic.SVG_WIDTH = 500;
tma.component.AboutCircleInfographic.SVG_HEIGHT = 500;


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//

tma.component.AboutCircleInfographic.prototype.create_svg = function() {

  this.paper = Raphael(this.svg_container[0], tma.component.AboutCircleInfographic.SVG_WIDTH, tma.component.AboutCircleInfographic.SVG_HEIGHT);

  // from 'rippledot.component.HomeCircleGraph'
  // has bug, value cannot be 1
  this.paper['customAttributes']['arc'] = function (value, total, R) {
      var alpha = 360,
          alpha2 = 360 / total * value,
          a = (90 - alpha2) * Math.PI / 180,
          x = 250 + R * Math.cos(a),
          y = 250 - R * Math.sin(a),
          path;

      path = [["M", 250, 250 - R], ["A", R, R, 0, +(alpha2 > 180), 1, x, y]];

      /*
      console.log('total: ' + total);
      if (total == value) {
          path = [["M", 250, 250 - R], ["A", R, R, 0, 1, 1, 299.99, 250 - R]];                // 250 = center point
      } else {
          path = [["M", 250, 250 - R], ["A", R, R, 0, +(alpha2 > 180), 1, x, y]];
      }
      */
      
      return {'path': path};
  };



  var svg_path_attr = {"stroke": "#485362", "stroke-width": 1, 'stroke-linecap': "round", 'stroke-opacity': 0};
  this.svg_path = this.paper.path().attr(svg_path_attr).attr({'arc': [0, 1, 237.5]});       // 237.5 = radius of circle





  // CREATE CIRCLES

  var svg_circle_attr = null;
  var svg_circle = null;

  var svg_circle_outline_attr = null;
  var svg_circle_outline = null;

  for (var i = 0, l=this.item_length; i < l; i++) {

    // outline

    svg_circle_outline_attr = {'fill': "#ffffff", "stroke": "#485362", 'stroke-opacity': 0};
    svg_circle_outline = this.paper.circle(0, 0, 10);
    svg_circle_outline.attr(svg_circle_outline_attr);

    this.svg_circle_outline_array[i] = svg_circle_outline;


    // dot

    svg_circle_attr = {'fill': "#485362", "stroke": "#485362", 'stroke-opacity': 0};
    svg_circle = this.paper.circle(0, 0, 6);
    svg_circle.attr(svg_circle_attr);

    this.svg_circle_array[i] = svg_circle;


  }

  this.update_percent_instant(0);
  

};



tma.component.AboutCircleInfographic.prototype.create_infographic_items = function() {

  var image = null;
  var rotating_text = null;
  var copy = null;
  var svg_graphic = null;
  var svg_graphic_outline = null;

  var image_array = [];
  var rotating_text_array = [];
  var copy_array = [];
  var svg_graphic_array = [];                   // not yet available



  // image

  var arr = this.element.find('.image-item-container .image-item');
  for (var i = 0, l=arr.length; i < l; i++) {
    image = $(arr[i]);
    image_array[i] = image;
  }

  // rotating_text
  
  arr = this.element.find('.rotating-text-container .rotating-text');
  for (var i = 0, l=arr.length; i < l; i++) {
    rotating_text = $(arr[i]);
    rotating_text_array[i] = rotating_text;
  }

  // copy
  
  arr = this.element.find('.copy-item-container .copy-item');
  for (var i = 0, l=arr.length; i < l; i++) {
    copy = $(arr[i]);
    copy_array[i] = copy;
  }

  
  // this.item_length = copy_array.length;                               // based on the copy, with checks upon creating the items  // moved up cause creating the svg needed it


  /**
   * @type {tma.component.AboutCircleInfographicItem}
   */
  var infographic_item = null;
  

  // CREATE ITEM

  for (var i = 0, l=this.item_length; i < l; i++) {
    image = image_array[i];
    rotating_text = rotating_text_array[i];
    copy = copy_array[i];
    svg_graphic = this.svg_circle_array[i];
    svg_graphic_outline = this.svg_circle_outline_array[i];
    


    if (goog.isDefAndNotNull(image) && 
        goog.isDefAndNotNull(rotating_text) && 
        goog.isDefAndNotNull(copy) && 
        goog.isDefAndNotNull(svg_graphic)) {

      infographic_item = new tma.component.AboutCircleInfographicItem({
        'i': i,
        'image': image,
        'rotating_text': rotating_text,
        'copy': copy,
        'svg_graphic': svg_graphic,
        'svg_graphic_outline': svg_graphic_outline
      });

      infographic_item.position_percent = i * 0.33;
      infographic_item.update_position();

      goog.events.listen(infographic_item, tma.component.AboutCircleInfographicItem.CLICK, this.on_infographic_item_click.bind(this));
      

      this.infographic_item_array[this.infographic_item_array.length] = infographic_item;


    } // end if

  } // end for

};








//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


/**
 * @param {number} num_param
 */
tma.component.AboutCircleInfographic.prototype.set_index = function(num_param) {

  this.current_index = num_param;

  /**
   * @type {tma.component.AboutCircleInfographicItem}
   */
  var infographic_item = null;

  var target_percent = 0;

  var inc = (1 / this.item_length);
  var percent_offset = 0.25;
  var index_offset = -this.current_index * inc;

  for (var i = 0, l=this.item_length; i < l; i++) {
    target_percent = index_offset + percent_offset + i * inc;
    
    // console.log('target_percent: ' + target_percent);
    infographic_item = this.infographic_item_array[i];

    if (this.current_index == infographic_item.i) {
      infographic_item.show_image();
    } else {
      infographic_item.hide_image();
    }
    
    infographic_item.set_percent(target_percent);

  }

};

tma.component.AboutCircleInfographic.prototype.next_index = function() {

  var target_index = this.current_index + 1;
  target_index = target_index >= this.item_length ? 0 : target_index;

  this.set_index(target_index);

};
tma.component.AboutCircleInfographic.prototype.prev_index = function() {

  var target_index = this.current_index - 1;
  target_index = target_index < 0 ? this.item_length - 1 : target_index;

  this.set_index(target_index);

};




//       _    _   _ ___ __  __    _  _____ ___ ___  _   _
//      / \  | \ | |_ _|  \/  |  / \|_   _|_ _/ _ \| \ | |
//     / _ \ |  \| || || |\/| | / _ \ | |  | | | | |  \| |
//    / ___ \| |\  || || |  | |/ ___ \| |  | | |_| | |\  |
//   /_/   \_\_| \_|___|_|  |_/_/   \_\_| |___\___/|_| \_|
//



/**
 * @param  {Number} percent_param
 */
tma.component.AboutCircleInfographic.prototype.update_percent_instant = function(percent_param) {
  this.percent_obj['percent'] = percent_param;
  this.svg_path.animate({'arc': [percent_param, 1, 237.5]}, 0, ">");

};


/**
 * @param  {Number} percent_param
 */
tma.component.AboutCircleInfographic.prototype.update_percent = function(percent_param) {

  // console.log('update_percent:' + percent_param);

  if (!percent_param || percent_param == 1) {
      percent_param = 1;
      this.svg_path.animate({'arc': [percent_param, 1, 237.5]}, 0);

  } else {
      this.svg_path.animate({'arc': [percent_param, 1, 237.5]}, 0);

  }
  

};
  


tma.component.AboutCircleInfographic.prototype.animate_in = function() {

  if (this.has_animate_in == false) {
    this.has_animate_in = true;

    // TweenMax.to(this.percent_obj, 1.5, {
    TweenMax.to(this.percent_obj, 1.2, {
      // 'percent': 0.9,
      'percent': 0.9999,
      onUpdate: function(){

        this.update_percent(this.percent_obj['percent']);

      },
      onUpdateScope: this
    });

    TweenMax.to(this.svg_path, 0.3, {raphael:{ 'stroke-opacity': 1 }, delay: 0.1});

    TweenMax.to($('#page-about-whatwedo-copy'), 0.5, {opacity:1, delay: 0.6});
    
    

    // animate in items
    this.set_index(0);
    
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
tma.component.AboutCircleInfographic.prototype.on_infographic_item_click = function(event) {
  /**
   * @type {tma.component.AboutCircleInfographicItem}
   */
  var infographic_item = event.currentTarget;

  console.log('infographic_item.i: ' + infographic_item.i);
  
  this.set_index(infographic_item.i);

};













//    ___ _____ _____ __  __
//   |_ _|_   _| ____|  \/  |
//    | |  | | |  _| | |\/| |
//    | |  | | | |___| |  | |
//   |___| |_| |_____|_|  |_|
//


/**
 * The AboutCircleInfographicItem constructor
 * @param {object} options The object extendable like jquery plugins
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.AboutCircleInfographicItem = function(options) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.AboutCircleInfographicItem.DEFAULT, options);
      
  // garanteed not null check before instanciation
  this.i = this.options['i'];

  this.image = this.options['image'];
  this.rotating_text = this.options['rotating_text'];
  this.copy = this.options['copy'];
  this.svg_graphic = this.options['svg_graphic'];
  this.svg_graphic_outline = this.options['svg_graphic_outline'];


  this.position_percent = 0;
  this.position_angle = 0;
  this.position_x = 0;
  this.position_y = 0;

  this.copy_position_x = 0;
  this.copy_position_y = 0;

  this.is_image_visible = false;

  // this.update_position();
  
  this.item_percent_object = {
    'percent': 0
  };

  this.rotating_text.click(function(event){

    // console.log('this.i: ' + this.i);
    this.dispatchEvent(new goog.events.Event(tma.component.AboutCircleInfographicItem.CLICK));

  }.bind(this));

  this.rotating_text.mouseover(this.on_rotating_text_mouseover.bind(this));
  this.rotating_text.mouseleave(this.on_rotating_text_mouseleave.bind(this));


  // console.log('tma.component.AboutCircleInfographicItem: init');
};
goog.inherits(tma.component.AboutCircleInfographicItem, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.AboutCircleInfographicItem.DEFAULT = {
  'i': 0,
  'image': null,
  'rotating_text': null,
  'copy': null,
  'svg_graphic': null,
  'svg_graphic_outline': null
};

/**
 * AboutCircleInfographicItem Event Constant
 * @const
 * @type {string}
 */
tma.component.AboutCircleInfographicItem.CLICK = 'on_click';

//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


tma.component.AboutCircleInfographicItem.prototype.update_position = function() {

  this.position_angle = Math.PI * 2 * this.position_percent - Math.PI/2;

  // this.svg_graphic
  this.position_x = 250 + Math.cos(this.position_angle) * 237.5;
  this.position_y = 250 + Math.sin(this.position_angle) * 237.5;

  TweenMax.to(this.svg_graphic, 0, {raphael:{
    tx: this.position_x,
    ty: this.position_y
  }});


  TweenMax.to(this.svg_graphic_outline, 0, {raphael:{
    tx: this.position_x,
    ty: this.position_y
  }});

  
  


  // rotating text 

  this.rotating_text.css({
    left: this.position_x + 20 + 'px',          // edit
    top: this.position_y - 0 + 'px'
  });


  // copy, center = -290,100, radius = 291

  this.copy_position_x = -290 + Math.cos(this.position_angle) * 292;

  // this.copy_position_y = 100 + Math.sin(this.position_angle) * 292;
  /// this.copy_position_y = 140 + Math.sin(this.position_angle) * 292 * 1.35;
  //// this.copy_position_y = 170 + Math.sin(this.position_angle) * 292 * 1.35;
  this.copy_position_y = 5 + 30 + 180 + Math.sin(this.position_angle) * 292 * 2;      // 5 px is just adjustment

  this.copy.css({
    left: this.copy_position_x + 'px',
    top: this.copy_position_y + 'px'
  });


};


/**
 * @param {number} num_param
 */
tma.component.AboutCircleInfographicItem.prototype.set_percent = function(num_param) {

  

  // var temp_percent = num_param;
  var temp_percent = num_param % 1;
  temp_percent = temp_percent<0 ? 1 + temp_percent : temp_percent;
  //console.log('temp_percent:' + temp_percent );
  


  if (temp_percent >= 0.5) {
    this.rotating_text.addClass('left-version')
  } else {
    this.rotating_text.removeClass('left-version')
  }

  // if (temp_percent >= 0.25 && temp_percent <= 0.75) {
  if (temp_percent >= 0.30 && temp_percent <= 0.70) {
    this.rotating_text.addClass('bottom-version');
  } else {
    this.rotating_text.removeClass('bottom-version');
  }
  


  TweenMax.to(this.item_percent_object, 1.2, {
    'percent': num_param,
    onUpdate: function(){

      this.position_percent = this.item_percent_object['percent'];
      this.update_position();

    },
    onUpdateScope: this,
    ease: Sine.easeInOut
  });

};

tma.component.AboutCircleInfographicItem.prototype.show_image = function() {
  this.is_image_visible = true;
  this.image.addClass('selected');

  TweenMax.to(this.svg_graphic, 0.5, {raphael:{
    'fill': "#485362"
  }});

  TweenMax.to(this.svg_graphic_outline, 0, {raphael:{ 'stroke-opacity': 1 }});
};
tma.component.AboutCircleInfographicItem.prototype.hide_image = function() {
  this.is_image_visible = false;
  this.image.removeClass('selected');

  TweenMax.to(this.svg_graphic, 0.5, {raphael:{
    'fill': "#485362"
  }});

  TweenMax.to(this.svg_graphic_outline, 0, {raphael:{ 'stroke-opacity': 0 }});
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
tma.component.AboutCircleInfographicItem.prototype.on_rotating_text_mouseover = function(event) {
  this.rotating_text.addClass('hover-version');

  TweenMax.to(this.svg_graphic, 0.5, {raphael:{
    'fill': "#d1d3d4"
  }});
  // TweenMax.to(this.svg_graphic_outline, 0, {raphael:{ 'stroke-opacity': 1 }});
  // TweenMax.to(this.svg_graphic_outline, 0, {raphael:{ 'stroke-opacity': 0 }});

};

/**
 * @param {object} event
 */
tma.component.AboutCircleInfographicItem.prototype.on_rotating_text_mouseleave = function(event) {
  this.rotating_text.removeClass('hover-version');

  TweenMax.to(this.svg_graphic, 0.5, {raphael:{
    'fill': "#485362"
  }});

  if (this.is_image_visible == true) {
    // TweenMax.to(this.svg_graphic_outline, 0, {raphael:{ 'stroke-opacity': 1 }});
  } else {
    // TweenMax.to(this.svg_graphic_outline, 0, {raphael:{ 'stroke-opacity': 0 }});

  }

};
