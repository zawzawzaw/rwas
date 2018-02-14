goog.provide('tma.page.About');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('tma.page.Default');


goog.require('tma.component.SidebarKeys');

goog.require('tma.page.about.Banner');
goog.require('tma.page.about.Whatwedo');
goog.require('tma.page.about.About');
goog.require('tma.page.about.Process');
goog.require('tma.page.about.Testimonial');
goog.require('tma.page.about.MiceAcademy');
goog.require('tma.page.about.Contact');



/**
 * The About constructor
 * @inheritDoc
 * @constructor
 * @extends {tma.page.Default}
 */
tma.page.About = function(options, element) {

  tma.page.Default.call(this, options, element);
  this.options = $.extend(this.options, tma.page.About.DEFAULT, options);


  // SECTIONS
  
  

  /**
   * @type {tma.page.about.Banner}
   */
  this.banner_section = null;

  /**
   * @type {tma.page.about.Whatwedo}
   */
  this.whatwedo_section = null;

  /**
   * @type {tma.page.about.About}
   */
  this.about_section = null;

  /**
   * @type {tma.page.about.Process}
   */
  this.process_section = null;

  /**
   * @type {tma.page.about.Testimonial}
   */
  this.testimonial_section = null;

  /**
   * @type {tma.page.about.MiceAcademy}
   */
  this.mice_academy_section = null;

  /**
   * @type {tma.page.about.Contact}
   */
  this.contact_section = null;





  


  /**
   * @type {Array}
   */
  this.scene_data_array = [];

  /**
   * @type {Array.<string>}
   */
  this.scene_id_array = [];


  /**
   * @type {Array}
   */
  this.section_array = [];


  
  









  /**
   * @type {Array.<jQuery>}
   */
  this.scene_array = [];

  /**
   * @type {Array.<jQuery>}
   */
  this.parallax_scene_array = [];



  this.current_section_index = 0;
  this.current_section = 'banner';


  this.current_section_data = {};



  

  /**
   * @type {tma.component.SidebarKeys}
   */
  this.sidebar_keys = null;

  



  
  //    ____  _____ _____ ___  ____  _____   ___ _   _ ___ _____
  //   | __ )| ____|  ___/ _ \|  _ \| ____| |_ _| \ | |_ _|_   _|
  //   |  _ \|  _| | |_ | | | | |_) |  _|    | ||  \| || |  | |
  //   | |_) | |___|  _|| |_| |  _ <| |___   | || |\  || |  | |
  //   |____/|_____|_|   \___/|_| \_\_____| |___|_| \_|___| |_|
  //
  
  // this.create_smooth_scroll();

  


  

  this.create_section_data();
  // ABOUT SECTION VERTICAL SPACING                             // intial update
  if (manic.IS_MOBILE == false){
    this.update_about_section_margin();
  }


  // force immediate update of hash                       // not waiting for it anymore
  this.on_window_hash_change(null);

  
  
  

  // console.log('tma.page.About: init');
};
goog.inherits(tma.page.About, tma.page.Default);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.About.DEFAULT = {
};

/**
 * About Event Constant
 * @const
 * @type {string}
 */
tma.page.About.EVENT_01 = '';


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
tma.page.About.prototype.init = function() {
  tma.page.About.superClass_.init.call(this);

  this.create_page_sections();                // important


  this.create_back_to_top();
  this.create_sidebar_arrow_btn();      // only for about page

  this.create_sidebar_keys();
  

  this.create_section_scenes();
  this.create_scenes();



  // don't create parallax on IE
  if (goog.userAgent.product.IE == false) {
    this.create_parallax_scenes();
  }



  

  this.update_page_layout();      // needed by update_about_section_margin  (data only available after init)

  this.on_window_hash_change(null);

  // console.log('end of init');

};


//    ____  ____  _____     ___  _____ _____
//   |  _ \|  _ \|_ _\ \   / / \|_   _| ____|
//   | |_) | |_) || | \ \ / / _ \ | | |  _|
//   |  __/|  _ < | |  \ V / ___ \| | | |___
//   |_|   |_| \_\___|  \_/_/   \_\_| |_____|
//


tma.page.About.prototype.create_smooth_scroll = function(){

  /*
  // https://github.com/simov/simplr-smoothscroll
  if (manic.IS_MOBILE == false){

    if (goog.userAgent.WINDOWS || goog.userAgent.LINUX){

      if (goog.userAgent.WEBKIT) {

        console.log('added smooth scrolll');

        $.srSmoothscroll({
          // defaults
          // step: 55,
          'step': 80,
          // speed: 400,
          /// speed: 300,
          'speed': 700,
          // ease: 'swing',
          'ease': 'easeInOutSine',
          'target': $('body'),
          'container': $(window)
        });
      }
    }  
  }
  */
};


tma.page.About.prototype.create_page_sections = function(){


  if ($('#page-about-banner-section').length != 0) {
    this.banner_section = new tma.page.about.Banner({}, $('#page-about-banner-section'));
    this.add_page_section(this.banner_section);
  }

  if ($('#page-about-whatwedo-section').length != 0) {
    this.whatwedo_section = new tma.page.about.Whatwedo({},$('#page-about-whatwedo-section'));
    this.add_page_section(this.whatwedo_section);

    goog.events.listen(this.whatwedo_section, tma.page.about.Whatwedo.ON_INFOGRAPHIC_CTA_CLICK, function(event){
      var value = this.whatwedo_section.last_clicked_infographic_cta;
      this.contact_section.set_subject(value);

      this.scroll_to_target('contact');
      
    }.bind(this));
    
  }

  if ($('#page-about-about-section').length != 0) {
    this.about_section = new tma.page.about.About({},$('#page-about-about-section'));
    this.add_page_section(this.about_section);
  }

  if ($('#page-about-process-section').length != 0) {
    this.process_section = new tma.page.about.Process({},$('#page-about-process-section'));
    this.add_page_section(this.process_section);
  }

  if ($('#page-about-testimonial-section').length != 0) {
    this.testimonial_section = new tma.page.about.Testimonial({},$('#page-about-testimonial-section'));
    this.add_page_section(this.testimonial_section);
  }

  if ($('#page-about-mice-academy-section').length != 0) {
    this.mice_academy_section = new tma.page.about.MiceAcademy({},$('#page-about-mice-academy-section'));
    this.add_page_section(this.mice_academy_section);
  }

  if ($('#page-about-contact-section').length != 0) {
    this.contact_section = new tma.page.about.Contact({},$('#page-about-contact-section'));
    this.contact_section.is_last_section = true;
    
    this.add_page_section(this.contact_section);
  }

};

tma.page.About.prototype.create_back_to_top = function(){


  var back_to_top_targets = $('#header-desktop-logo, #sidebar-keys-desktop-logo, #header-mobile-logo');

  back_to_top_targets.click(function(event){

    event.preventDefault();

    var hash = '' + window.location.hash;
    hash = hash.split('#').join('');      // remove the #

    if (hash == 'banner') {
      this.scroll_to_target('banner');
      
    } else {
      window.location.hash = 'banner';         // much better
    }


  }.bind(this));

  /*
  $('#header-mobile-logo').click(function(event){

    event.preventDefault();

    var hash = '' + window.location.hash;
    hash = hash.split('#').join('');      // remove the #

    if (hash == 'banner') {
      this.scroll_to_target('banner');
    } else {
      window.location.hash = 'banner';         // much better
    }


  }.bind(this));
  */
  

  $('#page-about-banner-cta-mobile').click(function(event){
    // this.goto_section_index(1);
    this.scroll_to_target('whatwedo');
  }.bind(this));

};


























tma.page.About.prototype.create_section_data = function(){

  var arr = $('#page-about-section-data-item-container .page-about-section-data-item');
  var temp_item = null;
  var data_obj = null;

  var value = '';
  var logo_menu_color = '';
  var h3_content = '';
  var h5_content = '';

  for (var i = 0, l=arr.length; i < l; i++) {

    temp_item = $(arr[i]);

    value = temp_item.attr('data-value');
    logo_menu_color = temp_item.attr('data-logo-menu-color');

    h3_content = temp_item.find('h3').html();
    h5_content = temp_item.find('h5').html();

    data_obj = {
      'h3': h3_content,
      'h5': h5_content,
      'logo_menu_color': logo_menu_color
    };

    this.scene_data_array[i] = data_obj;

    this.scene_id_array[i] = value;
  }



  arr = $('.page-about-section');
  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);

    if (temp_item.hasClass('no-margin-version') == false) {
      this.section_array[this.section_array.length] = temp_item;
    }


  }




};





tma.page.About.prototype.create_section_scenes = function() {

  // this.scene_array = [];

  var arr = $('.page-about-section');
  var temp_item = null;
  var value = '';
  var target_selector = '';

  var about_section_scene = null;
  var about_section_height = 0;


  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);

    value = temp_item.attr('data-value');

    
    if (goog.isDefAndNotNull(value) == false) {
      value = 'none';
    }

    // about_section_height = temp_item.height();
    about_section_height = temp_item.outerHeight();

    target_selector = '#' + temp_item.attr('id');


    about_section_scene = new ScrollMagic.Scene({
      'duration': about_section_height,
      // 'triggerHook': 0.0,
      // 'triggerHook': 0.3,
      'triggerHook': 0.75,
      'triggerElement': target_selector
    });
    about_section_scene['data-value'] = value;
    about_section_scene['item'] = temp_item;

    

    about_section_scene.on('enter', function(event){

      var scene = event.target;                                                 // might fail advanced optimization
      var value = scene['data-value'];
      
      this.update_section_display(value);
      

    }.bind(this));
    about_section_scene.addTo(this.controller);
    // about_section_scene.addIndicators();

    this.scene_array[this.scene_array.length] = about_section_scene;

    

  }


};


tma.page.About.prototype.update_about_section_margin = function(){
  
  var temp_item = null;

  var space = 0;
  var next_space = null;

  var space_array = [];
  var top_array = [];
  var bottom_array = [];

  var section_height = 0;

  var target_margin_top = 100;
  var target_margin_bottom = 100;
  
  for (var i = 0, l=this.section_array.length; i < l; i++) {
    temp_item = this.section_array[i];

    section_height = temp_item.outerHeight();

    space = (this.window_height - section_height) / 2;
    space_array[i] = space;
  }

  
  // loop ends 1 from length
  for (var i = 0, l=this.section_array.length - 1; i < l; i++) {

    space = space_array[i];
    prev_space = space_array[i - 1];
    next_space = space_array[i + 1];


    
    if (goog.isDefAndNotNull(prev_space)) {

      if (prev_space >= space) {
        target_margin_top = space;
      } else {
        target_margin_top = space;
      }



    } else {
      target_margin_top = space;      // default to space
    }




    if (goog.isDefAndNotNull(next_space)) {
      if (next_space >= space) {
        target_margin_bottom = 0;
      } else {
        target_margin_bottom = space - next_space;
      }
    } else {
      target_margin_bottom = space;   // default to space
    }
    

    top_array[i] = target_margin_top;
    bottom_array[i] = target_margin_bottom;

  }



  // last item 
  var last_index = this.section_array.length - 1;
  top_array[last_index] = space_array[last_index];
  bottom_array[last_index] = space_array[last_index];
  
  // add to css
  for (var i = 0, l=this.section_array.length; i < l; i++) {
    temp_item = this.section_array[i];

    target_margin_top = top_array[i];
    target_margin_bottom = bottom_array[i];

    // this offset is for animation only
    // target_margin_top = target_margin_top != 0 ? target_margin_top + 75: target_margin_top;
    // target_margin_bottom = target_margin_bottom != 0 ? target_margin_bottom + 75: target_margin_bottom;
    // target_margin_top += 75;
    target_margin_bottom += 100;


    
    
    if (temp_item.hasClass('last-version') == true) {

      target_margin_top -= 25;
      target_margin_bottom += 25;
      target_margin_bottom -= (100 + 49);
    }


    
    temp_item.css({
      'margin-top': target_margin_top + 'px',
      'margin-bottom': target_margin_bottom + 'px'
    });
  }
  
};

tma.page.About.prototype.create_scenes = function() {


  // LOGO

  /*
  this.banner_logo_scene = new ScrollMagic.Scene({
    'triggerHook': 0.0,
    'offset': -166,                                                 // 166 = height of logo
    'triggerElement': "#page-about-banner-after-section"
  });


  // this might fail
  // this.banner_logo_scene.setClassToggle('#header-desktop-logo', 'grey-version');
  this.banner_logo_scene.on('enter', function(){
    $('#header-desktop-logo').addClass('grey-version');
  }.bind(this));
  this.banner_logo_scene.on('leave', function(){


  }.bind(this));

  this.banner_logo_scene.addIndicators();
  this.banner_logo_scene.addTo(this.controller);
  */




  // SIDEBAR COLOR
  /*
  this.sidebar_color_scene = new ScrollMagic.Scene({
    'triggerHook': 0,
    // 'offset': -445,                                           // 445 - 190
    'offset': -445 - 95,                                           // 445 - 190/2
    'triggerElement': "#page-about-banner-after-section"
  });

  // this might fail
  this.sidebar_color_scene.setClassToggle('#sidebar-desktop', 'grey-version');

  // this.sidebar_color_scene.addIndicators();
  this.sidebar_color_scene.addTo(this.controller);
  */

  /*
  this.sidebar_footer_pin_scene = new ScrollMagic.Scene({
    'triggerHook': 1.0,
    'offset': 100,
    'duration': 100,
    // 'offset': -445 - 95,                                           // 445 - 190/2
    'triggerElement': "#page-about-contact-last-content-trigger"
  });

  // this.sidebar_footer_pin_scene.addIndicators({name:'BEFORE FOOTER'});
  this.sidebar_footer_pin_scene.setTween(TweenMax.to($('#sidebar-desktop'),1,{ease:Linear.easeNone, autoAlpha:0}));
  this.sidebar_footer_pin_scene.addTo(this.controller);

  // sidebar-desktop-dot-container
  */

   
  
 

  this.sidebar_footer_pin_scene = new ScrollMagic.Scene({
    'triggerHook': 1.0,
    'duration': 50,
    'triggerElement': "#page-about-last-content-trigger"
  });
  // this.sidebar_footer_pin_scene.addIndicators({name:'BEFORE FOOTER'});
  this.sidebar_footer_pin_scene.setClassToggle('#footer-desktop-mailing-list-02-container', 'animated-version');
  this.sidebar_footer_pin_scene.addTo(this.controller);






  this.sidebar_footer_pin_scene_02 = new ScrollMagic.Scene({
    'triggerHook': 1.0,
    'duration': 50,
    'triggerElement': "#page-about-last-content-trigger"
  });
  this.sidebar_footer_pin_scene_02.setTween(TweenMax.to($('#sidebar-keys-desktop-pin-container'), 1, {ease:Linear.easeNone, y:-25}));
  this.sidebar_footer_pin_scene_02.addTo(this.controller);


  /*
  this.sidebar_footer_pin_scene_03 = new ScrollMagic.Scene({
    'triggerHook': 1.0,
    'duration': 50,
    'triggerElement': "#page-about-last-content-trigger"
  });
  this.sidebar_footer_pin_scene_03.setTween(TweenMax.to($('#sidebar-desktop'), 1, {ease:Linear.easeNone, y:-50}));
  this.sidebar_footer_pin_scene_03.addTo(this.controller);
  */
  

  



  

};


tma.page.About.prototype.create_parallax_scenes = function(){

  var arr = $('.page-about-parallax-container');
  var temp_item = null;
  var content = null;

  var target_selector = '';

  var parallax_tween = null;
  var parallax_scene = null;

  var speed = 150;

  for (var i = 0, l=arr.length; i < l; i++) {
    temp_item = $(arr[i]);
    content = temp_item.find('.page-about-parallax-content');

    speed = 150;
    if (goog.isDefAndNotNull(content.attr('data-speed'))){
      speed = parseInt(content.attr('data-speed'));
    }

    

    target_selector = '#' + temp_item.attr('id');

    /*
    parallax_tween = new TimelineMax ();
    parallax_tween.add([
      TweenMax.fromTo(content, 1, {y:-150}, {y:150, ease: Linear.easeNone})
    ]);
    */
   
    if (temp_item.hasClass('first-version')) {

      parallax_scene = new ScrollMagic.Scene({
        'duration': this.window_height,
        'triggerHook': 0,
        'triggerElement': target_selector
      });
      parallax_scene.addTo(this.controller);
      parallax_scene.setTween(TweenMax.fromTo(content, 1, {y:0}, {y:speed, ease: Linear.easeNone}));
      //parallax_scene.addIndicators({name:'' + temp_item.attr('id')});


    } else if (temp_item.hasClass('last-version')) {

      parallax_scene = new ScrollMagic.Scene({
        'duration': this.window_height,
        'triggerHook': 1,
        'triggerElement': target_selector
      });
      parallax_scene.addTo(this.controller);
      // parallax_scene.setTween(parallax_tween);
      parallax_scene.setTween(TweenMax.fromTo(content, 1, {y:-1 * speed}, {y:0, ease: Linear.easeNone}));
      // parallax_scene.addIndicators({name:'' + temp_item.attr('id')});

    } else {

      // regular version

      parallax_scene = new ScrollMagic.Scene({
        'duration': this.window_height * 2,
        'triggerHook': 1,
        'triggerElement': target_selector
      });
      parallax_scene.addTo(this.controller);
      // parallax_scene.setTween(parallax_tween);
      parallax_scene.setTween(TweenMax.fromTo(content, 1, {y:-1 * speed}, {y:speed, ease: Linear.easeNone}));
      //parallax_scene.addIndicators({name:'' + temp_item.attr('id')});
    }
      

  } // end for
  
};


tma.page.About.prototype.create_sidebar_arrow_btn = function() {

  $('#sidebar-desktop-next-btn').click(function(){
    this.goto_next_section();
  }.bind(this));

  $('#sidebar-desktop-prev-btn').click(function(){
    this.goto_prev_section();
  }.bind(this));

};



tma.page.About.prototype.create_sidebar_keys = function() {

  if ($('#sidebar-keys-desktop-container').length != 0) {

    this.sidebar_keys = new tma.component.SidebarKeys({}, $('#sidebar-keys-desktop-container'));

    
  }
  
  
};




//    ____  _   _ ____  _     ___ ____
//   |  _ \| | | | __ )| |   |_ _/ ___|
//   | |_) | | | |  _ \| |    | | |
//   |  __/| |_| | |_) | |___ | | |___
//   |_|    \___/|____/|_____|___\____|
//


tma.page.About.prototype.update_scene_duration = function(){

  if (this.scene_array.length != 0) {

    var scene = null;                                               // might fail advanced optmization
    var temp_item = null;
    var target_duration = 0;

    for (var i = 0, l=this.scene_array.length; i < l; i++) {
      scene = this.scene_array[i];
      temp_item = scene['item'];
      target_duration = temp_item.outerHeight();

      scene.duration(target_duration);

    }
    
  }
  
};






/**
 * @param  {String} str_param
 */
tma.page.About.prototype.update_section_display = function(str_param){


  this.current_section = str_param;
  this.current_section_index = this.scene_id_array.indexOf(this.current_section);
  
  // console.log('update_section_display: ' + str_param);


  if (this.scene_data_array.length != 0) {
    this.current_section_data = this.scene_data_array[this.current_section_index];
    var color = this.current_section_data['logo_menu_color'];

    this.set_logo_color(color);
    this.set_sidebar_color(color);
    this.sidebar_keys.set_color(color);   // new

  };


  if (this.sidebar_desktop != null) {
    this.sidebar_desktop.set_selected_section(str_param);
  }

  if (this.sidebar_title != null) {
    this.sidebar_title.set_selected_section(str_param);
  }



  // on banner only, sidebar text will be visible
  if (str_param == 'banner') {
    this.set_sidebar_text_visible();

  } else {
    this.set_sidebar_text_hidden();
    
  }

  /*
  if (str_param == 'contact') {
    this.sidebar_keys.hide_keys();
    
  } else {
    this.sidebar_keys.show_keys();

  }
  */





  // CASE BY CASE BASIS

  switch(str_param) {

    case 'banner':
      if (this.banner_section != null) {
        this.banner_section.animate_in();
      }
      break;

    case 'whatwedo':
      if (this.whatwedo_section != null) {
        this.whatwedo_section.animate_in();
      }
      break;

    case 'about':
      if (this.about_section != null) {
        this.about_section.animate_in();
      }
      break;

    case 'process':
      if (this.process_section != null) {
        this.process_section.animate_in();
      }
      break;

    case 'testimonial':
      if (this.testimonial_section != null) {
        this.testimonial_section.animate_in();
      }
      break;

    case 'mice-academy':
      if (this.mice_academy_section != null) {
        this.mice_academy_section.animate_in();
      }
      break;

    case 'contact':
      if (this.contact_section != null) {
        this.contact_section.animate_in();
      }
      break;

      
    default:
      
      break;
  }
  
};





//    ____  _____ ____ _____ ___ ___  _   _
//   / ___|| ____/ ___|_   _|_ _/ _ \| \ | |
//   \___ \|  _|| |     | |  | | | | |  \| |
//    ___) | |__| |___  | |  | | |_| | |\  |
//   |____/|_____\____| |_| |___\___/|_| \_|
//


/**
 * @param  {number} num_param
 */
tma.page.About.prototype.goto_section_index = function(num_param){

  var target_id = this.scene_id_array[num_param];

  // console.log('goto_section_index: ' + target_id );
  
  if (goog.isDefAndNotNull(target_id)) {
    // this.util_scroll_to(target_id);
    /// this.scroll_to_target(target_id);
    window.location.hash = target_id;         // much better
  }


};


/**
 * @override
 * @inheritDoc
 */
tma.page.About.prototype.on_sidebar_desktop_click = function(event){

  var value = this.sidebar_desktop.last_clicked_value;
  var hash = '' + window.location.hash;
  hash = hash.split('#').join('');      // remove the #

  // console.log('on_sidebar_desktop_click');
  // console.log('value: ' + value);
  // console.log('window.location.hash: ' + window.location.hash);


  if (manic.IS_TABLET_LANDSCAPE == true) {


    // buggy hashtag performance on tablet
    // console.log('on sidebar desktop tablet click');
    
    this.scroll_to_target(value);

  } else {

    if (hash == value) {
      this.scroll_to_target(value);

    } else {
      // do nothing
    }
  }

  


};


tma.page.About.prototype.goto_next_section = function(){

  var target_index = this.current_section_index + 1;
  target_index = target_index > this.scene_id_array.length - 1 ? this.scene_id_array.length - 1 : target_index;

  this.goto_section_index(target_index);

};

tma.page.About.prototype.goto_prev_section = function(){

  var target_index = this.current_section_index - 1;
  target_index = target_index < 0 ? 0 : target_index;
  
  this.goto_section_index(target_index);
};




//       _    _   _ ___ __  __    _  _____ ___ ___  _   _
//      / \  | \ | |_ _|  \/  |  / \|_   _|_ _/ _ \| \ | |
//     / _ \ |  \| || || |\/| | / _ \ | |  | | | | |  \| |
//    / ___ \| |\  || || |  | |/ ___ \| |  | | |_| | |\  |
//   /_/   \_\_| \_|___|_|  |_/_/   \_\_| |___\___/|_| \_|
//



tma.page.About.prototype.set_logo_color = function(str_param){

  switch(str_param) {
    case 'grey':
      $('#header-desktop-logo').addClass('grey-version');
      break;

    case 'white':
    default:
      $('#header-desktop-logo').removeClass('grey-version');
      break;
  }

};



// these should be in sidebar
tma.page.About.prototype.set_sidebar_color = function(str_param){

  switch(str_param) {
    case 'grey':
      $('#sidebar-desktop').addClass('grey-version');
      break;

    case 'white':
    default:
      $('#sidebar-desktop').removeClass('grey-version');
      break;
  }

};

tma.page.About.prototype.set_sidebar_text_visible = function(){
  $('#sidebar-desktop').removeClass('hidden-version');
};
tma.page.About.prototype.set_sidebar_text_hidden = function(){
  $('#sidebar-desktop').addClass('hidden-version');
};

// these should be in sidebar








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
tma.page.About.prototype.update_page_layout = function() {
  tma.page.About.superClass_.update_page_layout.call(this);



  // ABOUT SECTION VERTICAL SPACING
  if (manic.IS_MOBILE == false){
    this.update_about_section_margin();
  }


  if (this.sidebar_keys != null) {
    this.sidebar_keys.update_layout();
  }


  if (manic.IS_MOBILE == true){

    

  } else {

    

  }


  this.update_scene_duration();

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
tma.page.About.prototype.scroll_to_target = function(str_param, str_param_2, str_param_3) {
  tma.page.About.superClass_.scroll_to_target.call(this, str_param, str_param_2, str_param_3);
  

  
}

/**
 * @override
 * @inheritDoc
 */
tma.page.About.prototype.on_scroll_to_no_target = function() {
  tma.page.About.superClass_.on_scroll_to_no_target.call(this);

  
}



goog.exportSymbol('tma.page.About', tma.page.About);