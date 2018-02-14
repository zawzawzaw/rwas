goog.provide('tma.page.Default');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.page.Page');
goog.require('manic.ui.BoxItem');

goog.require('tma.component.SidebarDesktop');
goog.require('tma.component.SidebarTitle');
goog.require('tma.component.HeaderMobile');
goog.require('tma.component.FooterContactMobile');


/**
 * The Default Page constructor
 * @inheritDoc
 * @constructor
 * @extends {manic.page.Page}
 */
tma.page.Default = function(options, element) {

  manic.page.Page.call(this, options);
  this.options = $.extend(this.options, tma.page.Default.DEFAULT, options);


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
   * @type {tma.component.SidebarDesktop}
   */
  this.sidebar_desktop = null;

  /**
   * @type {tma.component.SidebarTitle}
   */
  this.sidebar_title = null;

  /**
   * @type {tma.component.HeaderMobile}
   */
  this.header_mobile = null;


  /**
   * @type {tma.component.FooterContactMobile}
   */
  this.footer_contact_mobile = null;
  
  


  /**
   * @type {Array.<manic.ui.BoxItem>}
   */
  this.box_item_array = [];




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


  // console.log('tma.page.Default: init');
};
goog.inherits(tma.page.Default, manic.page.Page);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.Default.DEFAULT = {
};


//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//


tma.page.Default.prototype.init = function() {
  tma.page.Default.superClass_.init.call(this);

  this.create_sidebar_desktop();
  this.create_sidebar_title();
  this.create_header_mobile();
  this.create_footer_contact_mobile();
  

  /*
  if ($('#desktop-header').length != 0) {
    this.desktop_header = new rippledot.component.DesktopHeader({}, $('#desktop-header'));
  }
  if ($('#desktop-sidebar').length != 0) {
    this.desktop_sidebar = new rippledot.component.DesktopSidebar({}, $('#desktop-sidebar'));
  }

  if ($('#desktop-aside').length != 0) {
    this.desktop_aside = new rippledot.component.DesktopAside({}, $('#desktop-aside'));
  }


  if ($('#mobile-header').length != 0 && $('#mobile-header-expand-container').length != 0){
    this.mobile_header = new rippledot.component.MobileHeader({}, $('#mobile-header'));

    this.mobile_header.update_layout();

    goog.events.listen(this.mobile_header, rippledot.component.MobileHeader.ON_CLOSE_MENU, function(event){

      this.update_page_layout();
      
    }.bind(this));

    

    
    

  }
  

  this.create_box_item();
  */



  this.update_page_layout(); // needed by sidebar desktop ?

  // console.log('tma.page.Default: init');

};




//     ____ ____  _____    _  _____ _____
//    / ___|  _ \| ____|  / \|_   _| ____|
//   | |   | |_) |  _|   / _ \ | | |  _|
//   | |___|  _ <| |___ / ___ \| | | |___
//    \____|_| \_\_____/_/   \_\_| |_____|
//

tma.page.Default.prototype.create_sidebar_desktop = function(){

  
  
  if ($('#sidebar-desktop-container').length != 0) {
    this.sidebar_desktop = new tma.component.SidebarDesktop({}, $('#sidebar-desktop-container'));

    this.sidebar_desktop.animate_in();

    goog.events.listen(this.sidebar_desktop, tma.component.SidebarDesktop.ON_CLICK, this.on_sidebar_desktop_click.bind(this));

  }  
};

// to override :D
tma.page.Default.prototype.on_sidebar_desktop_click = function(event){

};

tma.page.Default.prototype.create_sidebar_title = function(){
  
  if ($('#sidebar-title-desktop-container').length != 0) {
    this.sidebar_title = new tma.component.SidebarTitle({}, $('#sidebar-title-desktop-container'));
  }
  

};


tma.page.Default.prototype.create_header_mobile = function(){
  
  if ($('#header-mobile').length != 0) {
    this.header_mobile = new tma.component.HeaderMobile({}, $('#header-mobile'));
    this.header_mobile.page = this;

    this.header_mobile.update_layout();

    goog.events.listen(this.header_mobile, tma.component.HeaderMobile.ON_OPEN, function(event){

    }.bind(this));

    goog.events.listen(this.header_mobile, tma.component.HeaderMobile.ON_CLOSE, function(event){
      
    }.bind(this));
    
  }

};

tma.page.Default.prototype.create_footer_contact_mobile = function(){

  if ($('#footer-contact-form-mobile-container').length != 0) {

    this.footer_contact_mobile = new tma.component.FooterContactMobile({}, $('#footer-contact-form-mobile-container'));
    this.footer_contact_mobile.page = this;

    

    // footer contact us open
    $('#footer-mobile-cta-contact-us-btn').click(function(event){

      if (this.footer_contact_mobile.is_open == true) {
        $('#footer-mobile-cta-contact-us-btn').html('Contact us');
        this.footer_contact_mobile.close_contact();

      } else {
        $('#footer-mobile-cta-contact-us-btn').html('Close');
        this.footer_contact_mobile.open_contact();

      }

    }.bind(this));


    // menu contact us open
    $('#header-mobile-contact-us-menu-link').click(function(event){

      event.preventDefault();

      // close the menu
      this.header_mobile.close_menu();

      // open the close
      $('#footer-mobile-cta-contact-us-btn').html('Close');
      this.footer_contact_mobile.open_contact();

    }.bind(this));


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
tma.page.Default.prototype.update_page_layout = function(){
  tma.page.Default.superClass_.update_page_layout.call(this);

  if (manic.IS_ACTUAL_MOBILE == true) {
    this.body.addClass('actual-mobile-version');
  } else {
    this.body.removeClass('actual-mobile-version');
  }



  if (this.sidebar_desktop != null) {
    this.sidebar_desktop.update_layout();
  }

  if (this.sidebar_title != null) {
    this.sidebar_title.update_layout();
  }
  
  if (this.header_mobile != null) {
    this.header_mobile.update_layout();
  }

  if (this.footer_contact_mobile != null) {
    this.footer_contact_mobile.update_layout();
  }

  
  /*
  if (manic.IS_MOBILE_HEADER == false) {

  } else {

  }
  */
 


  // update mobile header min height
  // if (manic.IS_MOBILE && goog.isDefAndNotNull(this.mobile_header)) {
  if (manic.IS_ACTUAL_MOBILE && goog.isDefAndNotNull(this.mobile_header)) {
    this.mobile_header.update_layout();
  }





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
tma.page.Default.prototype.scroll_to_target = function(str_param, str_param_2, str_param_3) {
  tma.page.Default.superClass_.scroll_to_target.call(this, str_param, str_param_2, str_param_3);
  

  
}

/**
 * @override
 * @inheritDoc
 */
tma.page.Default.prototype.on_scroll_to_no_target = function() {
  tma.page.Default.superClass_.on_scroll_to_no_target.call(this);

  
}




goog.exportSymbol('tma.page.Default', tma.page.Default);