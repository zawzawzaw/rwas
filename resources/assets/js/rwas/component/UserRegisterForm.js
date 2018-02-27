goog.provide('rwas.component.UserRegisterForm');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The UserRegisterForm constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
rwas.component.UserRegisterForm = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, rwas.component.UserRegisterForm.DEFAULT, options);
  this.element = element;

  /**
   * @type {rwas.model.API}
   */
  this.rwas_api = null;


  /**
   * @type {manic.ui.NewFormCheck}
   */
  this.account_register_form_check = null;




  this.create_api();
  this.create_form_check();
  


  console.log('rwas.component.UserRegisterForm: init');
};
goog.inherits(rwas.component.UserRegisterForm, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
rwas.component.UserRegisterForm.DEFAULT = {
  'option_01': '',
  'option_02': ''
};

/**
 * UserRegisterForm Event Constant
 * @const
 * @type {string}
 */
rwas.component.UserRegisterForm.EVENT_01 = '';

/**
 * UserRegisterForm Event Constant
 * @const
 * @type {string}
 */
rwas.component.UserRegisterForm.EVENT_02 = '';


//     ____ ____  _____    _  _____ _____
//    / ___|  _ \| ____|  / \|_   _| ____|
//   | |   | |_) |  _|   / _ \ | | |  _|
//   | |___|  _ <| |___ / ___ \| | | |___
//    \____|_| \_\_____/_/   \_\_| |_____|
//


rwas.component.UserRegisterForm.prototype.create_api = function() {

  this.rwas_api = rwas.model.API.get_instance();


  /*
  goog.events.listen(this.rwas_api, rwas.model.API.CRUISE_GET_VALID_SEARCH_PARAMETERS_COMPLETE, function(event){

    

  }.bind(this));
  */
 
};

rwas.component.UserRegisterForm.prototype.create_form_check = function() {


  if (this.element.find('#account-register-form').length != 0) {
    this.account_register_form_check = this.element.find('#account-register-form').data('manic.ui.NewFormCheck');

    goog.events.listen(this.account_register_form_check, manic.ui.NewFormCheck.ON_FORM_SUBMIT, function(event){

      var data = this.account_register_form_check.form_data_object;

      console.log('the data that is to be submitted');
      console.log(data);

      this.rwas_api.user_register(data);

      /*
      var data = this.search_form_check.form_data_object;
      var port = data['port'];
      var date = data['date'];
      var pax = data['pax'];
      
      this.rwas_api.cruise_get_itineraries(port, date, pax);
      */
      
    }.bind(this));

  }

};


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//



rwas.component.UserRegisterForm.prototype.private_method_02 = function() {};
rwas.component.UserRegisterForm.prototype.private_method_03 = function() {};
rwas.component.UserRegisterForm.prototype.private_method_04 = function() {};
rwas.component.UserRegisterForm.prototype.private_method_05 = function() {};
rwas.component.UserRegisterForm.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


rwas.component.UserRegisterForm.prototype.public_method_01 = function() {};
rwas.component.UserRegisterForm.prototype.public_method_02 = function() {};
rwas.component.UserRegisterForm.prototype.public_method_03 = function() {};
rwas.component.UserRegisterForm.prototype.public_method_04 = function() {};
rwas.component.UserRegisterForm.prototype.public_method_05 = function() {};
rwas.component.UserRegisterForm.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
rwas.component.UserRegisterForm.prototype.on_event_handler_01 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.UserRegisterForm.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.UserRegisterForm.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.UserRegisterForm.prototype.on_event_handler_04 = function(event) {
};






rwas.component.UserRegisterForm.prototype.sample_method_calls = function() {

  // sample override
  rwas.component.UserRegisterForm.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(rwas.component.UserRegisterForm.EVENT_01));
};