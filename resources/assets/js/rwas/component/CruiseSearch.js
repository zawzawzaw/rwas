goog.provide('rwas.component.CruiseSearch');
goog.provide('rwas.component.CruiseSearchDataItem');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');



/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
rwas.component.CruiseSearch = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, rwas.component.CruiseSearch.DEFAULT, options);
  this.element = element;

  /**
   * @type {Array}
   */
  this.port_dictionary = [];

  /**
   * @type {Array}
   */
  this.date_dictionary = [];



  /**
   * @type {Array.<rwas.component.CruiseSearchDataItem>}
   */
  this.data_array = [];
  


  console.log('rwas.component.CruiseSearch: init');
};
goog.inherits(rwas.component.CruiseSearch, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
rwas.component.CruiseSearch.DEFAULT = {
  'option_01': '',
  'option_02': ''
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
rwas.component.CruiseSearch.EVENT_01 = '';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
rwas.component.CruiseSearch.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


rwas.component.CruiseSearch.prototype.create_click = function() {
  // this.element.find('#redeem-search-valid-departure-ports')
  // this.element.find('#redeem-search-valid-departure-dates')

};
rwas.component.CruiseSearch.prototype.private_method_02 = function() {};
rwas.component.CruiseSearch.prototype.private_method_03 = function() {};
rwas.component.CruiseSearch.prototype.private_method_04 = function() {};
rwas.component.CruiseSearch.prototype.private_method_05 = function() {};
rwas.component.CruiseSearch.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


/**
 * @param {array} data_array_param
 */
rwas.component.CruiseSearch.prototype.set_data = function(data_array_param) {

    
  /**
   * @type {rwas.component.CruiseSearchDataItem}
   */
  var data_item = null;

  var item = null;
  var date = '';
  var port = '';

  
  var port_dictionary_index = 0;
  var date_dictionary_index = 0;


  for (var i = 0, l=data_array_param.length; i < l; i++) {
    item = data_array_param[i];
    
    data_item = new rwas.component.CruiseSearchDataItem({
      'data': item
    });

    this.data_array[i] = data_item;

    // port

    if (this.port_dictionary[data_item.port_str] == undefined) {
      this.port_dictionary[data_item.port_str] = [];
    }

    port_dictionary_index = this.port_dictionary[data_item.port_str].length;
    this.port_dictionary[data_item.port_str][port_dictionary_index] = data_item;
    


    // date
    
    if (this.date_dictionary[data_item.date_str] == undefined) {
      this.date_dictionary[data_item.date_str] = [];
    }

    date_dictionary_index = this.date_dictionary[data_item.date_str].length;
    this.date_dictionary[data_item.date_str][date_dictionary_index] = data_item;


    
  }

  console.log('this.port_dictionary');
  console.log(this.port_dictionary);

  console.log('this.date_dictionary');
  console.log(this.date_dictionary);



  this.create_port_options();
  this.create_date_options();


  

};

rwas.component.CruiseSearch.prototype.create_port_options = function() {

  /**
   * @type {rwas.component.CruiseSearchDataItem}
   */
  var data_item = null;

  var fragment = $(document.createDocumentFragment());

  for(var port in this.port_dictionary) {
    data_item = this.port_dictionary[port][0];

    var temp = '<p data-value="' + data_item.port_str + '">' + data_item.port_name + '</p>';

    fragment.append(temp);
  }

  this.element.find('#redeem-search-valid-departure-ports').empty();
  this.element.find('#redeem-search-valid-departure-ports').append(fragment);

};

rwas.component.CruiseSearch.prototype.create_date_options = function() {

  /**
   * @type {rwas.component.CruiseSearchDataItem}
   */
  var data_item = null;

  var fragment = $(document.createDocumentFragment());

  for(var date in this.date_dictionary) {
    data_item = this.date_dictionary[date][0];

    var temp = '<p data-value="' + data_item.date_str + '">' + data_item.date_name + '</p>';

    fragment.append(temp);
  }

  this.element.find('#redeem-search-valid-departure-dates').empty();
  this.element.find('#redeem-search-valid-departure-dates').append(fragment);

};

rwas.component.CruiseSearch.prototype.public_method_04 = function() {};
rwas.component.CruiseSearch.prototype.public_method_05 = function() {};
rwas.component.CruiseSearch.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
rwas.component.CruiseSearch.prototype.on_event_handler_01 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearch.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearch.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearch.prototype.on_event_handler_04 = function(event) {
};






rwas.component.CruiseSearch.prototype.sample_method_calls = function() {

  // sample override
  rwas.component.CruiseSearch.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(rwas.component.CruiseSearch.EVENT_01));
};














//    ___ _____ _____ __  __
//   |_ _|_   _| ____|  \/  |
//    | |  | | |  _| | |\/| |
//    | |  | | | |___| |  | |
//   |___| |_| |_____|_|  |_|
//


/**
 * The CruiseSearchDataItem constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
rwas.component.CruiseSearchDataItem = function(options) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, rwas.component.CruiseSearchDataItem.DEFAULT, options);
  
  this.data_object = this.options['data'];

  this.date_str = this.data_object['mon_year'];
  this.port_str = this.data_object['port'];

  this.port_name = this.data_object['port_name'];
  

  var date_arr = this.date_str.split('/');
  var month_number = parseInt(date_arr[0]);
  var month_year = date_arr[1];

  var months = [
    'Jan',
    'Feb',
    'Mar',
    'Apr',
    'May',
    'Jun',

    'Jul',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec'
  ];
  
  this.date_name = months[month_number-1] + ' ' + month_year;



  console.log('rwas.component.CruiseSearchDataItem: init');
};
goog.inherits(rwas.component.CruiseSearchDataItem, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
rwas.component.CruiseSearchDataItem.DEFAULT = {
  'data': null
};

/**
 * CruiseSearchDataItem Event Constant
 * @const
 * @type {string}
 */
rwas.component.CruiseSearchDataItem.EVENT_01 = '';

/**
 * CruiseSearchDataItem Event Constant
 * @const
 * @type {string}
 */
rwas.component.CruiseSearchDataItem.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


rwas.component.CruiseSearchDataItem.prototype.private_method_01 = function() {};
rwas.component.CruiseSearchDataItem.prototype.private_method_02 = function() {};
rwas.component.CruiseSearchDataItem.prototype.private_method_03 = function() {};
rwas.component.CruiseSearchDataItem.prototype.private_method_04 = function() {};
rwas.component.CruiseSearchDataItem.prototype.private_method_05 = function() {};
rwas.component.CruiseSearchDataItem.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


rwas.component.CruiseSearchDataItem.prototype.public_method_01 = function() {};
rwas.component.CruiseSearchDataItem.prototype.public_method_02 = function() {};
rwas.component.CruiseSearchDataItem.prototype.public_method_03 = function() {};
rwas.component.CruiseSearchDataItem.prototype.public_method_04 = function() {};
rwas.component.CruiseSearchDataItem.prototype.public_method_05 = function() {};
rwas.component.CruiseSearchDataItem.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
rwas.component.CruiseSearchDataItem.prototype.on_event_handler_01 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearchDataItem.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearchDataItem.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearchDataItem.prototype.on_event_handler_04 = function(event) {
};






rwas.component.CruiseSearchDataItem.prototype.sample_method_calls = function() {

  // sample override
  rwas.component.CruiseSearchDataItem.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(rwas.component.CruiseSearchDataItem.EVENT_01));
};

