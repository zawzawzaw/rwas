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




  /**
   * @type {manic.ui.Dropdown}
   */
  this.title_dropdown = null;

  /**
   * @type {manic.ui.Dropdown}
   */
  this.gender_dropdown = null;





  this.create_api();
  this.create_form_check();
  
  this.create_temporary_date_pickers();


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



      
      
      if (data['pin'].length != 6) {
        alert('pin must be 6 digits');

      } else if (data['pin'] != data['pin_confirm']) {
        alert('pin must match');

      } else {
        this.rwas_api.user_register(data);
      }

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

rwas.component.UserRegisterForm.prototype.create_temporary_date_pickers = function() {
    
  var date_of_birth_txt = this.element.find('#account-register-form input[name="date_of_birth"]');
  var doc_issue_date_txt = this.element.find('#account-register-form input[name="doc_issue_date"]');
  var doc_expiry_date_txt = this.element.find('#account-register-form input[name="doc_expiry_date"]');



  if (date_of_birth_txt.length != 0) {
    date_of_birth_txt.datepicker({

      'changeMonth': true,
      'changeYear': true,

      'maxDate': '-18Y',

      //'yearRange': "c-20:c+20",
      'yearRange': "c-90:c",

      // minDate: -20, maxDate: "+1M +10D"
      

      // 'minDate': 0,
      'dateFormat': 'dd/mm/yy',
      'altFormat': 'dd/mm/yy',
      'dayNamesMin': [ "S", "M", "T", "W", "T", "F", "S" ],
      'altField': this.item_txt,
      'onSelect': function(event){

        var date_of_birth_txt = this.element.find('#account-register-form input[name="date_of_birth"]');
        date_of_birth_txt.trigger('blur');

      }.bind(this)
    });

  }


  if (doc_issue_date_txt.length != 0) {
    doc_issue_date_txt.datepicker({

      'changeMonth': true,
      'changeYear': true,

      'maxDate': 0,
      'yearRange': "c-30:c",

      'dateFormat': 'dd/mm/yy',
      'altFormat': 'dd/mm/yy',
      'dayNamesMin': [ "S", "M", "T", "W", "T", "F", "S" ],
      'altField': this.item_txt,
      'onSelect': function(event){

      }.bind(this)
    });

  }

  if (doc_expiry_date_txt.length != 0) {
    doc_expiry_date_txt.datepicker({

      'changeMonth': true,
      'changeYear': true,

      'minDate': 0,
      'yearRange': "c:c+30",

      // 'maxDate': '-18Y',
      // minDate: -20, maxDate: "+1M +10D"

      // 'minDate': 0,
      'dateFormat': 'dd/mm/yy',
      'altFormat': 'dd/mm/yy',
      'dayNamesMin': [ "S", "M", "T", "W", "T", "F", "S" ],
      'altField': this.item_txt,
      'onSelect': function(event){

      }.bind(this)
    });

  }
  

  /*
  this.item_datepicker.datepicker({
    // dateFormat: 'dd-mm-yyyy',
    'minDate': 0,
    'dateFormat': 'dd/mm/yy',
    'altFormat': 'dd/mm/yy',
    'dayNamesMin': [ "S", "M", "T", "W", "T", "F", "S" ],
    'altField': this.item_txt,
    'onSelect': this.on_datepicker_select.bind(this)
  });
  */
  


  

  if (this.element.find('#register-title-dropdown').length != 0) {
    this.title_dropdown = this.element.find('#register-title-dropdown').data('manic.ui.Dropdown');
  }
  
  if (this.element.find('#register-gender-dropdown').length != 0) {
    this.gender_dropdown = this.element.find('#register-gender-dropdown').data('manic.ui.Dropdown');
  }


  if (this.title_dropdown != null && this.gender_dropdown != null) {


    goog.events.listen(this.title_dropdown, manic.ui.Dropdown.ON_CHANGE, function(event){

      if (this.title_dropdown.current_value == 'MR') {
        this.gender_dropdown.set_value('M');
      } else if (this.title_dropdown.current_value == 'MS') {
        this.gender_dropdown.set_value('F');
      } else if (this.title_dropdown.current_value == 'MDM') {
        this.gender_dropdown.set_value('F');
      }
      
    }.bind(this));

    goog.events.listen(this.gender_dropdown, manic.ui.Dropdown.ON_CHANGE, function(event){

      if (this.gender_dropdown.current_value == 'F') {

        if (this.title_dropdown.current_value == 'MR') {
          this.title_dropdown.set_value('MS');
        }
        
      } else if (this.gender_dropdown.current_value == 'M') {

        if (this.title_dropdown.current_value == 'MS') {
          this.title_dropdown.set_value('MR');
        } else if (this.title_dropdown.current_value == 'MDM') {
          this.title_dropdown.set_value('MR');
        }

      }

    }.bind(this));
    
  }


  
  
  

};


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//




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