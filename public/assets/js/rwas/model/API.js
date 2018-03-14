goog.provide('rwas.model.API');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('rwas.model.Constants');


/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
rwas.model.API = function() {

  goog.events.EventTarget.call(this);

  /**
   * @type {Array}
   */
  this.cruise_valid_search_parameters = [];


  /**
   * @type {Array}
   */
  this.cruise_itineraries = [];                         // the current result of cruise/get_itineraries

  /**
   * @type {Array}
   */
  this.user_registered = {};                         // the current result of user/register

  /**
   * @type {Array}
   */
  this.user_profile_updated = {};                         // the current result of user/update-profile

  
  console.log('rwas.model.API: init');
};
goog.inherits(rwas.model.API, goog.events.EventTarget);


/**
 * Singleton.
 * @type {rwas.model.API?}
 * @private
 */
rwas.model.API.instance_ = null;


/**
 * @const
 * @type {String}
 */
rwas.model.API.BASE_URL = 'http://52.77.205.209/api/public/'



/**
 * @const
 * @type {string}
 */
rwas.model.API.CRUISE_GET_VALID_SEARCH_PARAMETERS_START = 'cruise_get_valid_search_parameters_start';

/**
 * @const
 * @type {string}
 */
rwas.model.API.CRUISE_GET_VALID_SEARCH_PARAMETERS_COMPLETE = 'cruise_get_valid_search_parameters_complete';




/**
 * @const
 * @type {string}
 */
rwas.model.API.CRUISE_GET_ITINERARIES_START = 'cruise_get_iteniraries_start';

/**
 * @const
 * @type {string}
 */
rwas.model.API.CRUISE_GET_ITINERARIES_COMPLETE = 'cruise_get_iteniraries_complete';






/**
 * @const
 * @type {string}
 */
rwas.model.API.USER_REGISTER_START = 'user_register_start';

/**
 * @const
 * @type {string}
 */
rwas.model.API.USER_REGISTER_COMPLETE = 'user_register_complete';


/**
 * @const
 * @type {string}
 */
rwas.model.API.USER_UPDATE_PROFILE_START = 'user_update_profile_start';

/**
 * @const
 * @type {string}
 */
rwas.model.API.USER_UPDATE_PROFILE_COMPLETE = 'user_update_profile_complete';




/**
 * Singleton lazy initializer.
 * @return {!rwas.model.API} Singleton.
 */
rwas.model.API.get_instance = function() {
  if (!rwas.model.API.instance_) {
    rwas.model.API.instance_ =
        new rwas.model.API();
  }
  return rwas.model.API.instance_;
};




//    _   _ ____  _____ ____
//   | | | / ___|| ____|  _ \
//   | | | \___ \|  _| | |_) |
//   | |_| |___) | |___|  _ <
//    \___/|____/|_____|_| \_\
//

/**
 * @param  {Object} data_param
 */
rwas.model.API.prototype.user_register = function(data_param) {


  console.log('rwas.model.API: user_register');
  

  this.dispatchEvent(new goog.events.Event(rwas.model.API.USER_REGISTER_START));

  var target_url = rwas.model.API.BASE_URL + 'api/user/register';

  $.ajax({
    'url': target_url,
    'method': 'POST',
    'data': data_param,
    'dataType': 'json',
    'error': function( result ) {
      
      alert(JSON.stringify(result));

    },
    'success': function( result ) {
      var data_array = result;

      this.user_registered = data_array;

      // this should be inside the form that created it
      if (goog.isDefAndNotNull(this.user_registered.MemberID)) {
        alert('User Created: ' + this.user_registered.MemberID);
      }
      
      console.log('result');
      console.log(result)

      this.dispatchEvent(new goog.events.Event(rwas.model.API.USER_REGISTER_COMPLETE));

    }.bind(this)
  });

};

/**
 * @param  {Object} data_param
 */
rwas.model.API.prototype.user_update_profile = function(data_param) {

  console.log('rwas.model.API: user_update_profile');
  

  this.dispatchEvent(new goog.events.Event(rwas.model.API.USER_UPDATE_PROFILE_START));

  var target_url = rwas.model.API.BASE_URL + 'api/user/update-profile';

  $.ajax({
    'url': target_url,
    'method': 'POST',
    'data': data_param,
    'dataType': 'json',
    'success': function( result ) {
      var data_array = result;

      this.user_profile_updated = data_array;

      console.log('result');
      console.log(result);

      alert('profile has been updated');

      // this should be inside the form
      // window.location.reload();

      this.dispatchEvent(new goog.events.Event(rwas.model.API.USER_UPDATE_PROFILE_COMPLETE));

    }.bind(this)
  });

};


rwas.model.API.prototype.user_method_02 = function() {};



//    ____   _    ____ _____
//   |  _ \ / \  / ___| ____|
//   | |_) / _ \| |  _|  _|
//   |  __/ ___ \ |_| | |___
//   |_| /_/   \_\____|_____|
//

rwas.model.API.prototype.page_method_01 = function() {};
rwas.model.API.prototype.page_method_02 = function() {};


//     ____ ____  _   _ ___ ____  _____
//    / ___|  _ \| | | |_ _/ ___|| ____|
//   | |   | |_) | | | || |\___ \|  _|
//   | |___|  _ <| |_| || | ___) | |___
//    \____|_| \_\\___/|___|____/|_____|
//


// rwas.model.API.prototype.cruise_get_valid_search_parameters = function() {

//   console.log('rwas.model.API: cruise_get_valid_search_parameters');

//   // todo
//   // save data in cookies (cache)
//   // expires in 1 hr
    
//   this.dispatchEvent(new goog.events.Event(rwas.model.API.CRUISE_GET_VALID_SEARCH_PARAMETERS_START));

//   var target_url = rwas.model.API.BASE_URL + 'cruise/get_valid_search_parameters';

//   $.ajax({
//     'url': target_url,
//     'method': 'GET',
//     'dataType': 'json',
//     'success': function( result ) {
//       var data_array = result;

//       this.cruise_valid_search_parameters = data_array;

//       // parse it a little
//       var item = null;
//       var port_data = null;

//       for (var i = 0, l=this.cruise_valid_search_parameters.length; i < l; i++) {

//         item = this.cruise_valid_search_parameters[i];

//         port_data = rwas.model.Constants.get_port_data(item['port']);

//         if (port_data != null) {
//           item['port_name'] = port_data['en'];                // for english
//         }

//       }

//       this.dispatchEvent(new goog.events.Event(rwas.model.API.CRUISE_GET_VALID_SEARCH_PARAMETERS_COMPLETE));

//     }.bind(this)
//   });

// };


// /**
//  * @param  {String} port_param [description]
//  * @param  {String} date_param [description]
//  * @param  {String} pax_param  [description]
//  */
// rwas.model.API.prototype.cruise_get_itineraries = function(port_param, date_param, pax_param) {

//   console.log('rwas.model.API: cruise_get_itineraries');

//   console.log(
//     {
//       'port': port_param,
//       'date': date_param,
//       'pax': pax_param
//     }
//   );

//   // 'cruise/get_itineraries'
  
//   this.dispatchEvent(new goog.events.Event(rwas.model.API.CRUISE_GET_ITINERARIES_START));

//   var target_url = rwas.model.API.BASE_URL + 'cruise/get_itineraries';

//   $.ajax({
//     'url': target_url,
//     'method': 'GET',
//     'data': {
//       'port': port_param,
//       'date': date_param,
//       'pax': pax_param
//     },
//     'dataType': 'json',
//     'success': function( result ) {
//       var data_array = result;

//       this.cruise_itineraries = data_array;

      
//       // parse it a little
//       var item = null;
//       var ship_data = null;

//       for (var i = 0, l=this.cruise_itineraries['data'].length; i < l; i++) {

//         item = this.cruise_itineraries['data'][i];

//         ship_data = rwas.model.Constants.get_ship_data(item['ship_code']);

//         if (ship_data != null) {
//           item['ship_name'] = ship_data['en'];                // for english
//         } else {
//           console.log('this is the ship code ' + item['ship_code']);
//         }

//       }

//       console.log('this.cruise_itineraries');
//       console.log(this.cruise_itineraries);
      

//       this.dispatchEvent(new goog.events.Event(rwas.model.API.CRUISE_GET_ITINERARIES_COMPLETE));

//     }.bind(this)
//   });

  




// };


//    ____   ___   ___  _  _____ _   _  ____
//   | __ ) / _ \ / _ \| |/ /_ _| \ | |/ ___|
//   |  _ \| | | | | | | ' / | ||  \| | |  _
//   | |_) | |_| | |_| | . \ | || |\  | |_| |
//   |____/ \___/ \___/|_|\_\___|_| \_|\____|
//

rwas.model.API.prototype.booking_method_01 = function() {};
rwas.model.API.prototype.booking_method_02 = function() {};

// http://52.77.205.209/api/public/user/get
// http://52.77.205.209/api/public/user/create
// http://52.77.205.209/api/public/user/edit
// http://52.77.205.209/api/public/user/login
// 
// http://52.77.205.209/api/public/page/get_home_content
// http://52.77.205.209/api/public/page/get_home_content_nonmember
// http://52.77.205.209/api/public/page/get_registration_content
// 
// http://52.77.205.209/api/public/cruise/get_itineraries
// http://52.77.205.209/api/public/cruise/get_valid_search_parameters
// http://52.77.205.209/api/public/cruise/get_home_itineraries
// http://52.77.205.209/api/public/cruise/get_home_itineraries_nonmember
// http://52.77.205.209/api/public/cruise/get_best_redeemable_cruise
// http://52.77.205.209/api/public/cruise/get_cabin_prices
// http://52.77.205.209/api/public/cruise/get_home_cruise_details
// 
// http://52.77.205.209/api/public/booking/book_cruise
// http://52.77.205.209/api/public/booking/get_booking_details