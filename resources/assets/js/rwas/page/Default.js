goog.provide('rwas.page.Default');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.page.Page');
goog.require('manic.ui.BoxItem');

goog.require('rwas.component.HeaderMobile');
goog.require('rwas.component.HeaderDesktop');


goog.require('rwas.component.CruiseSearch');
goog.require('rwas.component.CruiseSearchResult');
goog.require('rwas.component.UserRegisterForm');
goog.require('rwas.component.UserUpdateProfileForm');
goog.require('rwas.model.API');




/**
 * The Default Page constructor
 * @inheritDoc
 * @constructor
 * @extends {manic.page.Page}
 */
rwas.page.Default = function(options, element) {

  manic.page.Page.call(this, options);
  this.options = $.extend(this.options, rwas.page.Default.DEFAULT, options);


  /*
  if ($('body').hasClass('chinese-version')) {
    manic.SITE_LANGUAGE = 'cn';
  }
  if ($('body').hasClass('bahasa-version')) {
    manic.SITE_LANGUAGE = 'in';
  }
  */
  

 
  //   __     ___    ____
  //   \ \   / / \  |  _ \
  //    \ \ / / _ \ | |_) |
  //     \ V / ___ \|  _ <
  //      \_/_/   \_\_| \_\
  //

  

  

  /**
   * @type {rwas.component.HeaderMobile}
   */
  this.header_mobile = null;

  /**
   * @type {rwas.component.HeaderDesktop}
   */
  this.header_desktop = null;



  /**
   * @type {Array.<manic.ui.BoxItem>}
   */
  this.box_item_array = [];


  /**
   * @type {rwas.model.API}
   */
  this.rwas_api = null;








  /**
   * @type {rwas.component.CruiseSearch}
   */
  this.cruise_search = null;

  /**
   * @type {rwas.component.CruiseSearchResult}
   */
  this.cruise_search_result = null;


  


  /**
   * @type {rwas.component.UserRegisterForm}
   */
  this.user_registration_form = null;

  /**
   * @type {rwas.component.UserUpdateProfileForm}
   */
  this.user_update_profile_form = null;







  // min height variables
  this.is_page_min_height = false;
  this.is_page_min_height_mobile = false;

  this.min_height_target = $('.min-height-target');
  this.min_height_target_mobile = $('.min-height-target-mobile');

  if (this.min_height_target.length != 0) {
    this.is_page_min_height = true;
  }
  if (this.min_height_target_mobile.length != 0) {
    this.is_page_min_height_mobile = true;
  }


  // console.log('rwas.page.Default: init');
};
goog.inherits(rwas.page.Default, manic.page.Page);


/**
 * like jQuery options
 * @const {object}
 */
rwas.page.Default.DEFAULT = {
};


//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//


rwas.page.Default.prototype.init = function() {
  rwas.page.Default.superClass_.init.call(this);

  this.create_api();
  this.create_header_mobile();
  this.create_header_desktop();
  


  this.create_redeem_search_header();
  this.create_redeem_search_result();

  this.create_register_form();
  this.create_dashboard();
  this.create_update_profile_form();


  // this.update_page_layout(); // needed by sidebar desktop ?

  console.log('rwas.page.Default: init');

};




//     ____ ____  _____    _  _____ _____
//    / ___|  _ \| ____|  / \|_   _| ____|
//   | |   | |_) |  _|   / _ \ | | |  _|
//   | |___|  _ <| |___ / ___ \| | | |___
//    \____|_| \_\_____/_/   \_\_| |_____|
//


rwas.page.Default.prototype.create_api = function(){
  this.rwas_api = rwas.model.API.get_instance();
};

rwas.page.Default.prototype.create_header_mobile = function(){
  
  if ($('#header-mobile').length != 0) {
    this.header_mobile = new rwas.component.HeaderMobile({}, $('#header-mobile'));
  }

};


rwas.page.Default.prototype.create_header_desktop = function(){
  
  if ($('#header-desktop').length != 0) {
    this.header_desktop = new rwas.component.HeaderDesktop({}, $('#header-desktop'));
  }

};




//    ____  _____ ____  _____ _____ __  __
//   |  _ \| ____|  _ \| ____| ____|  \/  |
//   | |_) |  _| | | | |  _| |  _| | |\/| |
//   |  _ <| |___| |_| | |___| |___| |  | |
//   |_| \_\_____|____/|_____|_____|_|  |_|
//




rwas.page.Default.prototype.create_redeem_search_header = function(){
  

  if ($('#redeem-search-header-section').length != 0) {

    this.cruise_search = new rwas.component.CruiseSearch({
    }, $('#redeem-search-header-section'));


  } // if
  

};

rwas.page.Default.prototype.create_redeem_search_result = function(){

  if ($('#redeem-search-result-section').length != 0) {

    this.cruise_search_result = new rwas.component.CruiseSearchResult({
    }, $('#redeem-search-result-section'));

  }

};


//    _   _ ____  _____ ____
//   | | | / ___|| ____|  _ \
//   | | | \___ \|  _| | |_) |
//   | |_| |___) | |___|  _ <
//    \___/|____/|_____|_| \_\
//

rwas.page.Default.prototype.create_register_form = function(){



  if ($('#account-register-form-section').length != 0) {

    this.user_registration_form = new rwas.component.UserRegisterForm({
    }, $('#account-register-form-section'));

  }
};

rwas.page.Default.prototype.create_dashboard = function(){


  if ($('#account-dashboard-section').length != 0) {

    if ($('#account-dashboard-name-span').length != 0) {

      var name_str = $('#account-dashboard-name-span').text();

      // name_str = name_str.replaceAll("\\[", '<span class="underline">');
      // name_str = name_str.replaceAll("\\]", '</span>');
      // 
      name_str = name_str.split('[').join('<span class="underline">');
      name_str = name_str.split(']').join('</span>');

      $('#account-dashboard-name-span').html(name_str);

    }
  }
  

};

rwas.page.Default.prototype.create_update_profile_form = function(){

  

  if ($('#account-edit-user-form-section').length != 0) {

    this.user_update_profile_form = new rwas.component.UserUpdateProfileForm({
    }, $('#account-edit-user-form-section'));

  }
  
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
rwas.page.Default.prototype.update_page_layout = function(){
  rwas.page.Default.superClass_.update_page_layout.call(this);

  if (manic.IS_ACTUAL_MOBILE == true) {
    this.body.addClass('actual-mobile-version');
  } else {
    this.body.removeClass('actual-mobile-version');
  }

  /*
  if (this.header_mobile != null) {
    this.header_mobile.update_layout();
  }
  */

  

  /*
  // update mobile header min height
  // if (manic.IS_MOBILE && goog.isDefAndNotNull(this.mobile_header)) {
  if (manic.IS_ACTUAL_MOBILE && goog.isDefAndNotNull(this.mobile_header)) {
    this.mobile_header.update_layout();
  }
  */





  // update min height
  if (this.is_page_min_height == true && manic.IS_MOBILE == false) {

   // var target_height = this.window_height - this.desktop_footer_element.outerHeight();
   var target_height = this.window_height;

    this.min_height_target.css({
      'min-height': target_height + 'px'
    });
  }

  if (this.is_page_min_height_mobile == true && manic.IS_MOBILE == true) {

    // var target_height = this.window_height - this.mobile_header_element.outerHeight();
    var target_height = this.window_height;

    this.min_height_target_mobile.css({
      'min-height': target_height + 'px'
    });
  }








};




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
rwas.page.Default.prototype.scroll_to_target = function(str_param, str_param_2, str_param_3) {
  rwas.page.Default.superClass_.scroll_to_target.call(this, str_param, str_param_2, str_param_3);
  

  
}

/**
 * @override
 * @inheritDoc
 */
rwas.page.Default.prototype.on_scroll_to_no_target = function() {
  rwas.page.Default.superClass_.on_scroll_to_no_target.call(this);

  
}




goog.exportSymbol('rwas.page.Default', rwas.page.Default);