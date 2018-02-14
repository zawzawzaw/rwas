goog.provide('tma.page.Home');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('tma.page.Default')


/**
 * The Home constructor
 * @inheritDoc
 * @constructor
 * @extends {tma.page.Default}
 */
tma.page.Home = function(options, element) {

  tma.page.Default.call(this, options, element);
  this.options = $.extend(this.options, tma.page.Home.DEFAULT, options);

  

  // console.log('tma.page.Home: init');
};
goog.inherits(tma.page.Home, tma.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.Home.DEFAULT = {
};

/**
 * Home Event Constant
 * @const
 * @type {string}
 */
tma.page.Home.EVENT_01 = '';


//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//


/**
 * @override
 * @inheritDoc
 */
tma.page.Home.prototype.init = function() {
  tma.page.Home.superClass_.init.call(this);

  
  
};


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//




//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//





/**
 * @param {object} event
 */
tma.page.Home.prototype.on_event_handler_02 = function(event) {
};



tma.page.Home.prototype.sample_method_calls = function() {

  // sample override
  tma.page.Home.superClass_.method_02.call(this);

  // sample event
  this.dispatchEvent(new goog.events.Event(tma.page.Home.EVENT_01));
};



//    _        _ __   _____  _   _ _____
//   | |      / \\ \ / / _ \| | | |_   _|
//   | |     / _ \\ V / | | | | | | | |
//   | |___ / ___ \| || |_| | |_| | | |
//   |_____/_/   \_\_| \___/ \___/  |_|
//

/**
 * @override
 * @inheritDoc
 */
tma.page.Home.prototype.update_page_layout = function() {
  tma.page.Home.superClass_.update_page_layout.call(this);


  if (manic.IS_MOBILE == true){

    

  } else {

    

  }

}




//    _   _    _    ____  _   _ _____  _    ____ ____
//   | | | |  / \  / ___|| | | |_   _|/ \  / ___/ ___|
//   | |_| | / _ \ \___ \| |_| | | | / _ \| |  _\___ \
//   |  _  |/ ___ \ ___) |  _  | | |/ ___ \ |_| |___) |
//   |_| |_/_/   \_\____/|_| |_| |_/_/   \_\____|____/
//


/**
 * @override
 * @inheritDoc
 */
tma.page.Home.prototype.scroll_to_target = function(str_param, str_param_2, str_param_3) {
  tma.page.Home.superClass_.scroll_to_target.call(this, str_param, str_param_2, str_param_3);
  

  
}

/**
 * @override
 * @inheritDoc
 */
tma.page.Home.prototype.on_scroll_to_no_target = function() {
  tma.page.Home.superClass_.on_scroll_to_no_target.call(this);

  
}



goog.exportSymbol('tma.page.Home', tma.page.Home);