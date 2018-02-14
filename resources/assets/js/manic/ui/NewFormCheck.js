// added to a <form> element


goog.provide('manic.ui.NewFormCheck');
goog.provide('manic.ui.NewFormCheckItem');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
manic.ui.NewFormCheck = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, manic.ui.NewFormCheck.DEFAULT, options);
  this.element = element;

  this.is_form_valid = false;

  this.has_submitted = false;

  /**
   * @type {Array.<manic.ui.NewFormCheckItem>}
   */
  this.item_array = [];


  this.is_ajax_version = false;
  if (this.element.hasClass('ajax-version')) {
    this.is_ajax_version = true;
  }

  this.element.data('manic.ui.NewFormCheck', this);


  this.action_url = this.element.attr("action");


  this.element.find('.form-check-submit-btn').click(function(event){
    
    event.preventDefault();
    this.element.submit();

  }.bind(this));
  this.element.submit(this.on_form_submit.bind(this));                           // listen to form submit

  

  this.create_item_array();
  


  // console.log('manic.ui.NewFormCheck: init');
};
goog.inherits(manic.ui.NewFormCheck, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
manic.ui.NewFormCheck.DEFAULT = {
  'option_01': '',
  'option_02': ''
};

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
manic.ui.NewFormCheck.EVENT_01 = '';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
manic.ui.NewFormCheck.EVENT_02 = '';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


manic.ui.NewFormCheck.prototype.create_item_array = function() {

  var arr = this.element.find("input,select,textarea");
  var temp_item = null;

  /**
   * @type {manic.ui.NewFormCheckItem}
   */
  var check_item = null;


  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);

    check_item = new manic.ui.NewFormCheckItem({}, temp_item);
    this.item_array[i] = check_item;

  }

};
manic.ui.NewFormCheck.prototype.private_method_02 = function() {};
manic.ui.NewFormCheck.prototype.private_method_03 = function() {};
manic.ui.NewFormCheck.prototype.private_method_04 = function() {};
manic.ui.NewFormCheck.prototype.private_method_05 = function() {};
manic.ui.NewFormCheck.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


manic.ui.NewFormCheck.prototype.check_if_form_valid = function() {

  this.is_form_valid = true;

  /**
   * @type {manic.ui.NewFormCheckItem}
   */
  var check_item = null;

  for (var i = 0, l=this.item_array.length; i < l; i++) {

    check_item = this.item_array[i];
    check_item.check_if_valid();

    if (check_item.is_valid == true) {

    } else {
      this.is_form_valid = false;
    }
    

  }

};

manic.ui.NewFormCheck.prototype.send_ajax = function() {
  var form_data = this.element.serialize();

  $.ajax({
    type: this.element.attr('method'),      // get or post
    async: false,
    cache: false,
    data: form_data,
    url: this.action_url,
    complete: function(event){

      console.log('on_send_ajax_complete');
      // console.log(event);
      console.log(event.responseText);

      this.element.removeClass('form-error-version');
      this.element.removeClass('sending-version');



      if(event.responseText == 'success') {
        this.element.addClass('sent-version');
      } else {
        this.element.addClass('server-error-version');
      }

    }.bind(this)
  });
};
manic.ui.NewFormCheck.prototype.public_method_03 = function() {};
manic.ui.NewFormCheck.prototype.public_method_04 = function() {};
manic.ui.NewFormCheck.prototype.public_method_05 = function() {};
manic.ui.NewFormCheck.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
manic.ui.NewFormCheck.prototype.on_form_submit = function(event) {

  var return_value = true;

  this.check_if_form_valid();


  if (this.has_submitted == true) {
    // subsequent submits
    return_value = false;
    this.element.removeClass('sent-version');
    this.element.removeClass('server-error-version');
    this.element.addClass('submitted-version');
    return false;   // end check
  }





  if (this.is_ajax_version == true) {
    this.element.removeClass('form-error-version');
    this.element.removeClass('sending-version');

    if (this.is_form_valid) {

      // submit form via ajax
      this.has_submitted = true;
      this.element.addClass('sending-version');
      this.send_ajax();
    } else {

      this.element.addClass('form-error-version');
    }

    return false; // always return false to send via ajax

  } else {

    return_value = this.is_form_valid;
    return return_value;
  }
  

  // redundant
  return return_value;

};

/**
 * @param {object} event
 */
manic.ui.NewFormCheck.prototype.on_event_handler_02 = function(event) {
};

/**
 * @param {object} event
 */
manic.ui.NewFormCheck.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
manic.ui.NewFormCheck.prototype.on_event_handler_04 = function(event) {
};






manic.ui.NewFormCheck.prototype.sample_method_calls = function() {

  // sample override
  manic.ui.NewFormCheck.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(manic.ui.NewFormCheck.EVENT_01));
};










//    ___ _____ _____ __  __
//   |_ _|_   _| ____|  \/  |
//    | |  | | |  _| | |\/| |
//    | |  | | | |___| |  | |
//   |___| |_| |_____|_|  |_|
//




/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {goog.events.EventTarget}
 */
manic.ui.NewFormCheckItem = function(options, element) {

  goog.events.EventTarget.call(this);
  this.options = $.extend({}, manic.ui.NewFormCheckItem.DEFAULT, options);
  this.element = element;


  this.is_valid = false;      // !important


  // CHECK FLAGS
  this.is_required = this.element.hasClass('required');
  this.is_only_email = this.element.hasClass('only-email');
  this.is_only_numbers = this.element.hasClass('only-numbers');

  this.has_check = false;

  if (this.is_required || this.is_only_email || this.is_only_numbers) {
    this.has_check = true;

  } else {
    this.is_valid = true;  // valid by default
  }


  // CHECK FOR PLACEHOLDER

  this.has_placeholder = false;
  this.placeholder_str = '';

  /**
   * @type {jQuery}
   */
  this.special_parent = null;


  this.element.focus(this.on_input_item_placeholder_focus.bind(this));
  this.element.blur(this.on_input_item_placeholder_blur.bind(this));

  


  var temp_placeholder_str = this.element.attr('placeholder');

  if (goog.isDefAndNotNull(temp_placeholder_str)) {
    // 
    this.has_placeholder = true;
    this.placeholder_str = temp_placeholder_str;
    this.element.removeAttr('placeholder');

    // initial placeholder
    if (this.element.val() == '') {
      this.element.val(this.placeholder_str);
      this.element.addClass('has-placeholder');
    }

  }

  // CHECK FOR PARENT

  var parent_class_array = this.options['parent_classes'];
  var parent_class = '';

  var temp_parent = null;
  var temp_parent_parent = null;
  var temp_parent_parent_parent = null;
  var temp_parent_parent_parent_parent = null;

  for (var j = 0; j < parent_class_array.length; j++) {
    parent_class = parent_class_array[j];

    temp_parent                           = this.element.parent();
    temp_parent_parent                    = this.element.parent().parent();
    temp_parent_parent_parent             = this.element.parent().parent().parent();
    temp_parent_parent_parent_parent      = this.element.parent().parent().parent().parent();

    if( temp_parent.length != 0 && temp_parent.hasClass(parent_class) ){
      this.special_parent = temp_parent;
    }
    if( temp_parent_parent.length != 0 && temp_parent_parent.hasClass(parent_class) ){
      this.special_parent = temp_parent_parent;
    }
    if( temp_parent_parent_parent.length != 0 && temp_parent_parent_parent.hasClass(parent_class) ){
      this.special_parent = temp_parent_parent_parent;
    }
    if( temp_parent_parent_parent_parent.length != 0 && temp_parent_parent_parent_parent.hasClass(parent_class) ){
      this.special_parent = temp_parent_parent_parent_parent;
    }

  }


  // this.check_if_valid();


  // console.log('manic.ui.NewFormCheckItem: init');
};
goog.inherits(manic.ui.NewFormCheckItem, goog.events.EventTarget);


/**
 * like jQuery options
 * @const {object}
 */
manic.ui.NewFormCheckItem.DEFAULT = {
  'parent_classes': ['form-group']
};



/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
manic.ui.NewFormCheckItem.ERROR_CLASS = 'has-error';

/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
manic.ui.NewFormCheckItem.VALID_CLASS = 'has-valid';




/**
 * CLASSNAME Event Constant
 * @const
 * @type {string}
 */
manic.ui.NewFormCheckItem.EVENT_02 = '';

/**
 * Form Check Constant
 * @type {string}                       // can be changed on runtime :D
 */
manic.ui.NewFormCheckItem.STRING_REQUIRED = ' required';

/**
 * Form Check Constant
 * @type {string}                       // can be changed on runtime :D
 */
manic.ui.NewFormCheckItem.STRING_REQUIRED_GROUP = ' required';

/**
 * Form Check Constant
 * @type {string}
 */
manic.ui.NewFormCheckItem.STRING_ONLY_EMAIL = ' must be a valid email address';

/**
 * Form Check Constant
 * @type {string}
 */
manic.ui.NewFormCheckItem.STRING_ONLY_NUMBERS = ' must be all numbers';


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


manic.ui.NewFormCheckItem.prototype.private_method_01 = function() {};
manic.ui.NewFormCheckItem.prototype.private_method_02 = function() {};
manic.ui.NewFormCheckItem.prototype.private_method_03 = function() {};
manic.ui.NewFormCheckItem.prototype.private_method_04 = function() {};
manic.ui.NewFormCheckItem.prototype.private_method_05 = function() {};
manic.ui.NewFormCheckItem.prototype.private_method_06 = function() {};


//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


/**
 * @return {Boolean} [description]
 */
manic.ui.NewFormCheckItem.prototype.check_if_valid = function() {

  // console.log('check_if_valid');

  // true by default
  this.is_valid = true;

  var value = this.element.val();

  // check required
  if (this.is_required == true) {

    if (this.has_placeholder == true) {
      if (value == this.placeholder_str) {
        this.is_valid = false;
        this.add_error(manic.ui.NewFormCheckItem.STRING_REQUIRED);

      } else {
        // true
      }

    } else {

      if (value == '') {
        this.is_valid = false;
        this.add_error(manic.ui.NewFormCheckItem.STRING_REQUIRED);

      } else {
        // true
      }
    }
  }



  // email check
  if (this.is_only_email == true) {

    if (this.validate_email(value) == true) {
      // true
      
    } else {
      this.is_valid = false;
      this.add_error(manic.ui.NewFormCheckItem.STRING_ONLY_EMAIL)

    }
  }

  if (this.is_only_numbers == true) {
    if (this.validate_numbers(value) == true) {
      // true
      
    } else {
      this.is_valid = false;
      this.add_error(manic.ui.NewFormCheckItem.STRING_ONLY_NUMBERS)

    }
  }


  // final check
  if (this.is_valid == true) {
    this.remove_error();

    if (this.has_check == true) {
      this.add_valid();
    }
  }

};

/**
 * @param {String} str_param
 */
manic.ui.NewFormCheckItem.prototype.add_error = function(str_param) {

  if (goog.isDefAndNotNull(str_param) == false) {
    str_param = '';
  }

  this.element.addClass(manic.ui.NewFormCheckItem.ERROR_CLASS);
  this.element.attr('data-error', str_param);

  if (this.special_parent != null) {
    this.special_parent.addClass(manic.ui.NewFormCheckItem.ERROR_CLASS);
    this.special_parent.attr('data-error', str_param);
  }

};
manic.ui.NewFormCheckItem.prototype.remove_error = function() {

  this.element.removeClass(manic.ui.NewFormCheckItem.ERROR_CLASS);
  this.element.attr('data-error', '');

  if (this.special_parent != null) {
    this.special_parent.removeClass(manic.ui.NewFormCheckItem.ERROR_CLASS);
    this.special_parent.attr('data-error', '');
  }

};

manic.ui.NewFormCheckItem.prototype.add_valid = function() {
  this.element.addClass(manic.ui.NewFormCheckItem.VALID_CLASS);

  if (this.special_parent != null) {
    this.special_parent.addClass(manic.ui.NewFormCheckItem.VALID_CLASS);
  }
};
manic.ui.NewFormCheckItem.prototype.remove_valid = function() {
  this.element.removeClass(manic.ui.NewFormCheckItem.VALID_CLASS);

  if (this.special_parent != null) {
    this.special_parent.removeClass(manic.ui.NewFormCheckItem.VALID_CLASS);
  }
};
manic.ui.NewFormCheckItem.prototype.public_method_06 = function() {};


//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

/**
 * @param {object} event
 */
manic.ui.NewFormCheckItem.prototype.on_input_item_placeholder_focus = function(event) {

  var value = this.element.val();

  if (this.has_placeholder == true) {
    if (value == this.placeholder_str) {
      this.element.val('');
      this.element.removeClass('has-placeholder');
    }
  }


  this.remove_valid();
  this.remove_error();

};

/**
 * @param {object} event
 */
manic.ui.NewFormCheckItem.prototype.on_input_item_placeholder_blur = function(event) {

  var value = this.element.val();

  if (this.has_placeholder == true) {
    if (value == '') {
      this.element.val(this.placeholder_str);
      this.element.addClass('has-placeholder');
    }
  }

  // check
  this.check_if_valid();
};




/**
 * @param  {string} email
 * @return {boolean}
 */
manic.ui.NewFormCheckItem.prototype.validate_email = function(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
};

/**
 * @param  {string} numbers
 * @return {boolean}         [description]
 */
manic.ui.NewFormCheckItem.prototype.validate_numbers = function(numbers) {
  var re = /^[0-9]+$/;  
  return re.test(numbers);
};


/**
 * @param {object} event
 */
manic.ui.NewFormCheckItem.prototype.on_event_handler_03 = function(event) {
};

/**
 * @param {object} event
 */
manic.ui.NewFormCheckItem.prototype.on_event_handler_04 = function(event) {
};






manic.ui.NewFormCheckItem.prototype.sample_method_calls = function() {

  // sample override
  manic.ui.NewFormCheckItem.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(manic.ui.NewFormCheckItem.EVENT_01));
};