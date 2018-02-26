goog.provide('rwas.component.CruiseSearch');
goog.provide('rwas.component.CruiseSearchDataItem');
goog.provide('rwas.component.CruiseSearchNumber');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('rwas.model.API');



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

  this.selected_port = '';
  this.selected_date = '';
  this.selected_pax = '';


  this.selected_port_txt = this.element.find('#itinerary-search-form input[name="port"]');
  this.selected_date_txt = this.element.find('#itinerary-search-form input[name="date"]');
  this.selected_pax_txt  = this.element.find('#itinerary-search-form input[name="pax"]');
  
  /**
   * @type {rwas.model.API}
   */
  this.rwas_api = null;


  /**
   * @type {manic.ui.NewFormCheck}
   */
  this.search_form_check = null;



  /**
   * @type {rwas.component.CruiseSearchNumber}
   */
  this.adult_number = null;

  /**
   * @type {rwas.component.CruiseSearchNumber}
   */
  this.child_number = null;

  /**
   * @type {rwas.component.CruiseSearchNumber}
   */
  this.infant_number = null;
  
  
  


  /**
   * @type {Array.<rwas.component.CruiseSearchDataItem>}
   */
  this.data_array = [];


  this.create_api();
  this.create_form_change();
  this.create_number_clicks();
  this.create_form_check();
  


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



rwas.component.CruiseSearch.prototype.create_api = function() {

  this.rwas_api = rwas.model.API.get_instance();


  this.rwas_api.cruise_get_valid_search_parameters();

  goog.events.listen(this.rwas_api, rwas.model.API.CRUISE_GET_VALID_SEARCH_PARAMETERS_COMPLETE, function(event){

    // console.log('the call has finished');
    // console.log(this.rwas_api.cruise_valid_search_parameters);
    
    this.set_data(this.rwas_api.cruise_valid_search_parameters);

  }.bind(this));
};

rwas.component.CruiseSearch.prototype.create_click = function() {

  this.element.find('#redeem-search-valid-departure-ports').on('click','p', function(event){
    var target = $(event.currentTarget);
    var value = target.attr('data-value');

    if (target.hasClass('disabled') == false){
      this.select_port(value);
    }
    
  }.bind(this));


  this.element.find('#redeem-search-valid-departure-dates').on('click','p', function(event){

    var target = $(event.currentTarget);
    var value = target.attr('data-value');
    
    if (target.hasClass('disabled') == false){
      this.select_date(value);
    }

  }.bind(this));
  

};


rwas.component.CruiseSearch.prototype.create_form_change = function(){

  this.selected_port_txt.on('keyup', function(event){

    var value = this.selected_port_txt.val();
    if (value == '') {
      this.reset_port();
    }

  }.bind(this));

  this.selected_date_txt.on('keyup', function(event){

    var value = this.selected_date_txt.val();

    if (value == '') {
      this.reset_date();
    }

  }.bind(this));

  this.selected_pax_txt.on('keyup', function(event){

    var value = this.selected_pax_txt.val();

  }.bind(this));


};



rwas.component.CruiseSearch.prototype.create_number_clicks = function(){

  


  this.adult_number = new rwas.component.CruiseSearchNumber({
    'letter': 'A',
    'min': 1
  }, this.element.find('#redeem-search-valid-pax-adult'));
  goog.events.listen(this.adult_number, rwas.component.CruiseSearchNumber.ON_UPDATE, this.on_number_update.bind(this));
  


  this.child_number = new rwas.component.CruiseSearchNumber({
    'letter': 'C'
  }, this.element.find('#redeem-search-valid-pax-child'));
  goog.events.listen(this.child_number, rwas.component.CruiseSearchNumber.ON_UPDATE, this.on_number_update.bind(this));

  this.infant_number = new rwas.component.CruiseSearchNumber({
    'letter': 'J'
  }, this.element.find('#redeem-search-valid-pax-infant'));
  goog.events.listen(this.infant_number, rwas.component.CruiseSearchNumber.ON_UPDATE, this.on_number_update.bind(this));

};


rwas.component.CruiseSearch.prototype.on_number_update = function(event) {

  this.selected_pax = '';

  for (var i = 0, l=this.adult_number.current_value; i < l; i++) {
    this.selected_pax += 'A';
  }

  for (var i = 0, l=this.child_number.current_value; i < l; i++) {
    this.selected_pax += 'C';
  }

  for (var i = 0, l=this.infant_number.current_value; i < l; i++) {
    this.selected_pax += 'J';
  }

  // set the counter
  rwas.component.CruiseSearchNumber.COUNTER = this.selected_pax.length;

  


  this.selected_pax_txt.val(this.selected_pax);
  

};

rwas.component.CruiseSearch.prototype.create_form_check = function(event) {

  if (this.element.find('#itinerary-search-form').length != 0) {
    this.search_form_check = this.element.find('#itinerary-search-form').data('manic.ui.NewFormCheck');

    goog.events.listen(this.search_form_check, manic.ui.NewFormCheck.ON_FORM_SUBMIT, function(event){
      var data = this.search_form_check.form_data_object;
      var port = data['port'];
      var date = data['date'];
      var pax = data['pax'];
      
      this.rwas_api.cruise_get_itineraries(port, date, pax);
    }.bind(this));

  }

};















/**
 * @param  {[type]} str_param [description]
 */
rwas.component.CruiseSearch.prototype.select_port = function(str_param) {
    

  /**
   * @type {Array.<rwas.component.CruiseSearchDataItem>}
   */
  var selected_array = this.port_dictionary[str_param];

  /**
   * @type {rwas.component.CruiseSearchDataItem}
   */
  var data_item = null;

  if (goog.isDefAndNotNull(selected_array) == true) {

    // select port
    this.selected_port = str_param;
    this.selected_port_txt.val(this.selected_port);
    this.element.find('#redeem-search-valid-departure-ports').find('p').removeClass('selected');
    this.element.find('#redeem-search-valid-departure-ports').find('p[data-value="' + str_param + '"]').addClass('selected');


    // disable all
    this.element.find('#redeem-search-valid-departure-dates').find('p').addClass('disabled');

    for (var i = 0, l=selected_array.length; i < l; i++) {

      data_item = selected_array[i];
      
      // enable
      this.element.find('#redeem-search-valid-departure-dates').find('p[data-value="' + data_item.date_str + '"]').removeClass('disabled');

    }


    // if any of the selected dates is disabled, reset date
    if (this.element.find('#redeem-search-valid-departure-dates').find('p.selected.disabled').length != 0){
      this.reset_date();
    }


  }

};

rwas.component.CruiseSearch.prototype.reset_port = function() {

  this.selected_port = '';
  this.selected_port_txt.val('');

  this.element.find('#redeem-search-valid-departure-ports').find('p').removeClass('selected');

  // enable all
  this.element.find('#redeem-search-valid-departure-dates').find('p').removeClass('disabled');

};

/**
 * @param  {[type]} str_param [description]
 */
rwas.component.CruiseSearch.prototype.select_date = function(str_param) {

  /**
   * @type {Array.<rwas.component.CruiseSearchDataItem>}
   */
  var selected_array = this.date_dictionary[str_param];

  /**
   * @type {rwas.component.CruiseSearchDataItem}
   */
  var data_item = null;

  if (goog.isDefAndNotNull(selected_array) == true) {

    // select date
    this.selected_date = str_param;
    this.selected_date_txt.val(this.selected_date);
    this.element.find('#redeem-search-valid-departure-dates').find('p').removeClass('selected');
    this.element.find('#redeem-search-valid-departure-dates').find('p[data-value="' + str_param + '"]').addClass('selected');


    // disable all
    this.element.find('#redeem-search-valid-departure-ports').find('p').addClass('disabled');

    for (var i = 0, l=selected_array.length; i < l; i++) {

      data_item = selected_array[i];
      
      // enable
      this.element.find('#redeem-search-valid-departure-ports').find('p[data-value="' + data_item.port_str + '"]').removeClass('disabled');

    }


    // if any of the selected dates is disabled, reset date
    if (this.element.find('#redeem-search-valid-departure-ports').find('p.selected.disabled').length != 0){
      this.reset_port();
    }


  }


  
  
};

rwas.component.CruiseSearch.prototype.reset_date = function() {

  this.selected_date = '';
  this.selected_date_txt.val('');

  this.element.find('#redeem-search-valid-departure-dates').find('p').removeClass('selected');

  // enable all
  this.element.find('#redeem-search-valid-departure-ports').find('p').removeClass('disabled');

};

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
  this.create_click();

  

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










//    _   _ _   _ __  __ ____  _____ ____
//   | \ | | | | |  \/  | __ )| ____|  _ \
//   |  \| | | | | |\/| |  _ \|  _| | |_) |
//   | |\  | |_| | |  | | |_) | |___|  _ <
//   |_| \_|\___/|_|  |_|____/|_____|_| \_\
//


/**
 * The CruiseSearchNumber constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
rwas.component.CruiseSearchNumber = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, rwas.component.CruiseSearchNumber.DEFAULT, options);
  this.element = element;

    
  this.current_value = 0;


  this.minus_btn = this.element.find('.number-minus');
  this.add_btn = this.element.find('.number-add');

  this.value_container = this.element.find('.number-value');


  var initial_value = parseInt(this.value_container.html());
  this.current_value = initial_value;
  

  this.data_letter = this.options['letter'];
  this.data_min = this.options['min'];
  
    

  this.minus_btn.click(function(event){

    var target = this.current_value - 1;
    if (target >= this.data_min) {
      this.current_value = target;
      this.update_value();
    }

  }.bind(this));



  this.add_btn.click(function(event){

    if (rwas.component.CruiseSearchNumber.COUNTER != 4) {

      var target = this.current_value + 1;
      if (target <= 4) {

        this.current_value = target;
        this.update_value();
      }
      
    }

  }.bind(this));



  console.log('rwas.component.CruiseSearchNumber: init');
};
goog.inherits(rwas.component.CruiseSearchNumber, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
rwas.component.CruiseSearchNumber.DEFAULT = {
  'letter': '',
  'min': 0,
};

/**
 * CruiseSearchNumber Event Constant
 * @const
 * @type {string}
 */
rwas.component.CruiseSearchNumber.ON_UPDATE = 'on_update';

/**
 * CruiseSearchNumber counter
 * @type {Number}
 */
rwas.component.CruiseSearchNumber.COUNTER = 0;


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


rwas.component.CruiseSearchNumber.prototype.update_value = function() {

  this.value_container.html(this.current_value);

  this.dispatchEvent(new goog.events.Event(rwas.component.CruiseSearchNumber.ON_UPDATE));

  // rwas.component.CruiseSearchNumber.COUNTER

};
rwas.component.CruiseSearchNumber.prototype.private_method_02 = function() {};
rwas.component.CruiseSearchNumber.prototype.private_method_03 = function() {};
rwas.component.CruiseSearchNumber.prototype.private_method_04 = function() {};
rwas.component.CruiseSearchNumber.prototype.private_method_05 = function() {};
rwas.component.CruiseSearchNumber.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


rwas.component.CruiseSearchNumber.prototype.public_method_01 = function() {};
rwas.component.CruiseSearchNumber.prototype.public_method_02 = function() {};
rwas.component.CruiseSearchNumber.prototype.public_method_03 = function() {};
rwas.component.CruiseSearchNumber.prototype.public_method_04 = function() {};
rwas.component.CruiseSearchNumber.prototype.public_method_05 = function() {};
rwas.component.CruiseSearchNumber.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
rwas.component.CruiseSearchNumber.prototype.on_event_handler_01 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearchNumber.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearchNumber.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
rwas.component.CruiseSearchNumber.prototype.on_event_handler_04 = function(event) {
};






rwas.component.CruiseSearchNumber.prototype.sample_method_calls = function() {

  // sample override
  rwas.component.CruiseSearchNumber.superClass_.method_02.call(this);

  // sample event
  
};