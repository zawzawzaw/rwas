goog.provide('tma.component.SidebarDesktop');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.ui.HoverSync');


/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.SidebarDesktop = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.SidebarDesktop.DEFAULT, options);
  this.element = element;

  /**
   * @type {Array}
   */
  this.data_dictionary = [];

  // this is a static thing
  this.window = $(window);
  this.width_element = $('#sidebar-width');

  this.sidebar_element = this.element.find('#sidebar-desktop');


  this.a_elements = this.element.find('#sidebar-desktop-menu nav ul li a');
  this.dot_elements = this.element.find('.sidebar-dot-large');


  this.last_clicked_value = '';
  

  this.create_hover_sync_items();
  


  // console.log('tma.component.SidebarDesktop: init');
};
goog.inherits(tma.component.SidebarDesktop, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.SidebarDesktop.DEFAULT = {
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
tma.component.SidebarDesktop.ON_CLICK = 'on_click';

//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


tma.component.SidebarDesktop.prototype.create_hover_sync_items = function() {


  /**
   * @type {manic.ui.HoverSync}
   */
  var hover_sync = null; 

  var large_dot_array = this.element.find('.sidebar-dot-large');
  var li_array = this.element.find('#sidebar-desktop-menu nav ul li');

  

  var arr = $('.hover-sync-item');
  var temp_item = null;
  var a = null;
  var dot = null;


  // for data object
  var value = '';
  var data_obj = {};

  for (var i = 0, l=li_array.length; i < l; i++) {
    temp_item = $(li_array[i]);

    if (goog.isDefAndNotNull((large_dot_array[i]))) {

      a = temp_item.find('a');
      a.click(this.on_a_click.bind(this));

      dot = $(large_dot_array[i]);

      // console.log('test');

      hover_sync = new manic.ui.HoverSync({
        'item_array': [a, dot]
      }, temp_item);


      value = '' + a.attr('href');
      value = value.split('#').join('');      // remove the #

      if (value == 'javascript:void(0);' || 
          value == '#') {
        value = '';
      }
      
      if (value != '') {
        data_obj = {
          'a': a,
          'dot': dot
        };

        this.data_dictionary[value] = data_obj;
      }

    }
  }

};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


tma.component.SidebarDesktop.prototype.update_layout = function() {

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
tma.component.SidebarDesktop.prototype.set_selected_section = function(str_param) {

  if (goog.isDefAndNotNull(this.data_dictionary[str_param])) {

    this.a_elements.removeClass('section-selected');
    this.dot_elements.removeClass('section-selected');

    var data_obj = this.data_dictionary[str_param];
    var a = data_obj['a'];
    var dot = data_obj['dot'];

    a.addClass('section-selected');
    dot.addClass('section-selected');

  }
};

tma.component.SidebarDesktop.prototype.animate_in = function() {

  // this.sidebar_element.addClass('animated-version');
  /// TweenMax.delayedCall(1.4, this.sidebar_element.addClass, ['animated-version'], this.sidebar_element);
  
  TweenMax.delayedCall(1.8, this.sidebar_element.addClass, ['animated-version'], this.sidebar_element);

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
tma.component.SidebarDesktop.prototype.on_a_click = function(event) {
  var target = $(event.currentTarget);
  var value = '' + target.attr('href');
  value = value.split('#').join('');      // remove the #

  this.last_clicked_value = value;


  this.dispatchEvent(new goog.events.Event(tma.component.SidebarDesktop.ON_CLICK));

};
