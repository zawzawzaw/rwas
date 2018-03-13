// goog.provide('rwas.component.CruiseSearchResult');

// goog.require('goog.events.Event');
// goog.require('goog.events.EventTarget');

// goog.require('rwas.model.API');

// /**
//  * The CLASSNAME constructor
//  * @param {object} options The object extendable like jquery plugins
//  * @param {element} element The jQuery element connected to class
//  * @constructor
//  * @extends {goog.events.EventTarget}
//  */
// rwas.component.CruiseSearchResult = function(options, element) {

//   goog.events.EventTarget.call(this);
//   this.options = $.extend({}, rwas.component.CruiseSearchResult.DEFAULT, options);
//   this.element = element;


//   this.search_result_template = '';
//   this.search_result_date_template = '';



//   /**
//    * @type {rwas.model.API}
//    */
//   this.rwas_api = null;


//   this.search_result_container = this.element.find('#redeem-search-result');



//   this.create_api();
//   this.create_templates();


//   console.log('rwas.component.CruiseSearchResult: init');
// };
// goog.inherits(rwas.component.CruiseSearchResult, goog.events.EventTarget);


// /**
//  * like jQuery options
//  * @const {object}
//  */
// rwas.component.CruiseSearchResult.DEFAULT = {
// };

// /**
//  * CLASSNAME Event Constant
//  * @const
//  * @type {string}
//  */
// rwas.component.CruiseSearchResult.EVENT_01 = '';

// /**
//  * CLASSNAME Event Constant
//  * @const
//  * @type {string}
//  */
// rwas.component.CruiseSearchResult.EVENT_02 = '';



// //     ____ ____  _____    _  _____ _____
// //    / ___|  _ \| ____|  / \|_   _| ____|
// //   | |   | |_) |  _|   / _ \ | | |  _|
// //   | |___|  _ <| |___ / ___ \| | | |___
// //    \____|_| \_\_____/_/   \_\_| |_____|
// //


// rwas.component.CruiseSearchResult.prototype.create_api = function() {

//   this.rwas_api = rwas.model.API.get_instance();

//   goog.events.listen(this.rwas_api, rwas.model.API.CRUISE_GET_ITINERARIES_START, function(event){

//     // add loading state

//   }.bind(this));

//   goog.events.listen(this.rwas_api, rwas.model.API.CRUISE_GET_ITINERARIES_COMPLETE, function(event){

//     // if page = 1, reset container
//     // if page >= 2, append to container
    
//     // this.rwas_api.cruise_itineraries['pagination']
    
//     console.log('inside here');
//     console.log(this.rwas_api.cruise_itineraries['data']);

//     this.add_items(this.rwas_api.cruise_itineraries['data']);


//     // update pagination


//   }.bind(this));

// };

// rwas.component.CruiseSearchResult.prototype.create_templates = function() {
//   this.search_result_template = $('#redeem-search-result-item-template').html();
//   this.search_result_date_template = $('#redeem-search-result-item-date-template').html();

//   this.search_result_template = this.search_result_template.replace(/\s+/, "");
//   this.search_result_date_template = this.search_result_date_template.replace(/\s+/, "");


// };



// //    ____  ____  _____     ___  _____ _____
// //   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
// //   | |_) | |_) || | \ \ / / _ \ | | |  _|
// //   |  __/|  _ < | |  \ V / ___ \| | | |___
// //   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
// //


// rwas.component.CruiseSearchResult.prototype.private_method_01 = function() {};
// rwas.component.CruiseSearchResult.prototype.private_method_02 = function() {};
// rwas.component.CruiseSearchResult.prototype.private_method_03 = function() {};
// rwas.component.CruiseSearchResult.prototype.private_method_04 = function() {};
// rwas.component.CruiseSearchResult.prototype.private_method_05 = function() {};
// rwas.component.CruiseSearchResult.prototype.private_method_06 = function() {};


// //    ____  _   _ ____  _     ___ ____
// //   |  _ \| | | | __ )| |   |_ _/ ___|
// //   | |_) | | | |  _ \| |    | | |
// //   |  __/| |_| | |_) | |___ | | |___
// //   |_|    \___/|____/|_____|___\____|
// //

// /**
//  * @param {Array} data_param
//  */
// rwas.component.CruiseSearchResult.prototype.add_items = function(data_param) {


//   var data_item = null;
//   var date_item = null;
//   var result_template_data = {};
//   var result_date_template_data = {};

//   var result_item_str = '';
//   var result_item_element = null;

//   var result_item_date_str = '';

//   var fragment = $(document.createDocumentFragment());

//   var date_item_date_input_str = '';
//   var date_item_date_input_arr = '';
//   var date_item_date_str = '';
//   var date_item_price_str = '';


//   var months = [
//     'Jan',
//     'Feb',
//     'Mar',
//     'Apr',
//     'May',
//     'Jun',

//     'Jul',
//     'Aug',
//     'Sep',
//     'Oct',
//     'Nov',
//     'Dec'
//   ];


//   for (var i = 0, l=data_param.length; i < l; i++) {

//     var data_item = data_param[i];
//     var date_items_str = '';

//     for (var ii = 0, ll=data_item['cruise_array'].length; ii < ll; ii++) {

//       date_item = data_item['cruise_array'][ii];

//       // "14/01/2018"
//       date_item_date_input_str = date_item['departure_date']
//       date_item_date_input_arr = date_item_date_input_str.split('/');
//       date_item_date_str = date_item_date_input_arr[0] + ' ' + months[parseInt(date_item_date_input_arr[1]) - 1] + ' ' + date_item_date_input_arr[2];

//       date_item_price_str = '';

//       // this must reflect if the user doesn't have gp/cc
//       // date_item['cheapest_cabin']['gp_cash_added']
      
//       date_item_price_str += '<span class="number">' + date_item['cheapest_cabin']['gp'] + '</span>';
//       date_item_price_str += '<span class="currency">gp</span>';


//       result_date_template_data = {
//         'iten_code': data_item['iten_code'],
//         'ship_code': data_item['ship_code'],
//         'cruise_id': date_item['cruise_id'],
//         'departure_date': date_item['departure_date'],
//         'date_str': date_item_date_str,
//         'price_str': date_item_price_str
//       }

//       // result_item_date_str = nano(this.search_result_date_template, result_date_template_data);

//       date_items_str += result_item_date_str;
      
//     }

    

//     result_template_data = {
//       'iten_code': data_item['iten_code'],
//       'ship_name': data_item['ship_name'],
//       'date_items': date_items_str,
//     };

//     // result_item_str = nano(this.search_result_template, result_template_data)
//     result_item_element = $(result_item_str);
//     // this.search_result_date_template

//     fragment.append(result_item_element);

//     // this.search_result_template
//     // this.search_result_date_template

    
    

//   }

//   this.search_result_container.empty();
//   this.search_result_container.append(fragment);

// };

// rwas.component.CruiseSearchResult.prototype.public_method_02 = function() {};
// rwas.component.CruiseSearchResult.prototype.public_method_03 = function() {};
// rwas.component.CruiseSearchResult.prototype.public_method_04 = function() {};
// rwas.component.CruiseSearchResult.prototype.public_method_05 = function() {};
// rwas.component.CruiseSearchResult.prototype.public_method_06 = function() {};


// //    _______     _______ _   _ _____ ____
// //   | ____\ \   / / ____| \ | |_   _/ ___|
// //   |  _|  \ \ / /|  _| |  \| | | | \___ \
// //   | |___  \ V / | |___| |\  | | |  ___) |
// //   |_____|  \_/  |_____|_| \_| |_| |____/
// //

// /**
//  * @param {object} event
//  */
// rwas.component.CruiseSearchResult.prototype.on_event_handler_01 = function(event) {
// };

// /**
//  * @param {object} event
//  */
// rwas.component.CruiseSearchResult.prototype.on_event_handler_02 = function(event) {
// };

// /**
//  * @param {object} event
//  */
// rwas.component.CruiseSearchResult.prototype.on_event_handler_03 = function(event) {
// };

// /**
//  * @param {object} event
//  */
// rwas.component.CruiseSearchResult.prototype.on_event_handler_04 = function(event) {
// };






// rwas.component.CruiseSearchResult.prototype.sample_method_calls = function() {

//   // sample override
//   rwas.component.CruiseSearchResult.superClass_.method_02.call(this);

//   // sample event
//   this.dispatchEvent(new goog.events.Event(rwas.component.CruiseSearchResult.EVENT_01));
// };