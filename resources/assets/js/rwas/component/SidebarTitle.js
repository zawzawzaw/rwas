goog.provide('tma.component.SidebarTitle');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
tma.component.SidebarTitle = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, tma.component.SidebarTitle.DEFAULT, options);
  this.element = element;


  /**
   * @type {Array}
   */
  this.data_dictionary = [];



  // this is a static thing
  this.window = $(window);
  this.width_element = $('#sidebar-width');


  this.data_container = $('#page-about-section-data-item-container');

  this.change_index = 0;


  this.copy_01 = this.element.find('#sidebar-title-desktop-copy-01');
  this.copy_02 = this.element.find('#sidebar-title-desktop-copy-02');

  this.h3_element = this.element.find('#sidebar-title-desktop-copy-01 h3');
  this.h5_element = this.element.find('#sidebar-title-desktop-copy-01 h5');

  this.h3_element_02 = this.element.find('#sidebar-title-desktop-copy-02 h3');
  this.h5_element_02 = this.element.find('#sidebar-title-desktop-copy-02 h5');

  this.current_data_obj = null;

  this.parse_data();


  // console.log('tma.component.SidebarTitle: init');
};
goog.inherits(tma.component.SidebarTitle, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
tma.component.SidebarTitle.DEFAULT = {
};



//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


tma.component.SidebarTitle.prototype.parse_data = function() {

  if (this.data_container.length != 0) {

    var arr = this.data_container.find('.page-about-section-data-item');
    var temp_item = null;

    var value = '';
    var h3 = '';
    var h5 = '';
    var color = '';

    var data_obj = null;

    for (var i = 0, l=arr.length; i < l; i++) {
      temp_item = $(arr[i]);

      value = '' + temp_item.attr('data-value');
      color = ''+ temp_item.attr('data-logo-menu-color');

      h3 = '' + temp_item.find('h3').html();
      h5 = ''+ temp_item.find('h5').html();

      data_obj = {
        'h3': h3,
        'h5': h5,
        'color': color
      };

      this.data_dictionary[value] = data_obj;
    }


  }
};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//




tma.component.SidebarTitle.prototype.update_layout = function() {

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
tma.component.SidebarTitle.prototype.set_selected_section = function(str_param) {

  if (goog.isDefAndNotNull(this.data_dictionary[str_param])) {

    this.current_data_obj = this.data_dictionary[str_param];

    this.change_index++;

    var is_white = this.current_data_obj['color'] == 'white';

    if (this.change_index % 2 == 0) {

      //     ___ ____
      //    / _ \___ \
      //   | | | |__) |
      //   | |_| / __/
      //    \___/_____|
      //

      this.copy_02.addClass('animated-version');
      this.copy_01.removeClass('animated-version');

      if (is_white) {
        this.copy_02.addClass('white-version');
      } else {
        this.copy_02.removeClass('white-version');
      }

      this.h3_element_02.html(this.current_data_obj['h3']);
      this.h5_element_02.html(this.current_data_obj['h5']);
      
    } else {

      //     ___  _
      //    / _ \/ |
      //   | | | | |
      //   | |_| | |
      //    \___/|_|
      //

      this.copy_01.addClass('animated-version');
      this.copy_02.removeClass('animated-version');

      if (is_white) {
        this.copy_01.addClass('white-version');
      } else {
        this.copy_01.removeClass('white-version');
      }

      this.h3_element.html(this.current_data_obj['h3']);
      this.h5_element.html(this.current_data_obj['h5']);

    }



  }

};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//
