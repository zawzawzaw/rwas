goog.provide('tma.page.about.Contact');

goog.require('goog.events.Event');
goog.require('goog.events.EventTarget');

goog.require('manic.ui.Dropdown');

goog.require('manic.page.Section');

/**
 * The CLASSNAME constructor
 * @param {object} options The object extendable like jquery plugins
 * @param {element} element The jQuery element connected to class
 * @constructor
 * @extends {manic.page.Section}
 */
tma.page.about.Contact = function(options, element) {

  manic.page.Section.call(this, options, element);
  this.options = $.extend(this.options, tma.page.about.Contact.DEFAULT, options);
  

  this.contact_split_copy = null;

  /**
   * @type {manic.ui.Dropdown}
   */
  this.subject_dropdown = null;



  if (this.element.find('#page-about-contact-subject-txt').length != 0) {

    this.subject_dropdown = this.element.find('#page-about-contact-subject-manic-dropdown').data('manic.ui.Dropdown');


    




    // this.subject_dropdown

  }
  
  
  
  

  
  // this.dropdown
  
  this.create_contact_copy();


  // console.log('tma.page.about.Contact: init');
};
goog.inherits(tma.page.about.Contact, manic.page.Section);


/**
 * like jQuery options
 * @const {object}
 */
tma.page.about.Contact.DEFAULT = {
};




//    ___ _   _ ___ _____
//   |_ _| \ | |_ _|_   _|
//    | ||  \| || |  | |
//    | || |\  || |  | |
//   |___|_| \_|___| |_|
//

tma.page.about.Contact.prototype.create_contact_copy = function(){
  this.contact_split_copy = new SplitText('#page-about-contact-detail-title h3', {'type':'chars', 'charsClass':'chars'});
};

/**
 * @param {string} str_param
 */
tma.page.about.Contact.prototype.set_subject = function(str_param) {
  switch(str_param) {
    case 'incentive':
      this.subject_dropdown.set_value('Incentive Meetings');
      break;

    case 'automotive':
      this.subject_dropdown.set_value('Automobile Launches');
      break;

    case 'gala':
      this.subject_dropdown.set_value('Gala Dinner Awards Gala');
      break;

    case '':
    default:
      this.subject_dropdown.set_value('');
      break;
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
tma.page.about.Contact.prototype.update_section_layout = function(){

};

//       _    _   _ ___ __  __    _  _____ ___ ___  _   _
//      / \  | \ | |_ _|  \/  |  / \|_   _|_ _/ _ \| \ | |
//     / _ \ |  \| || || |\/| | / _ \ | |  | | | | |  \| |
//    / ___ \| |\  || || |  | |/ ___ \| |  | | |_| | |\  |
//   /_/   \_\_| \_|___|_|  |_/_/   \_\_| |___\___/|_| \_|
//


/**
 * @override
 * @inheritDoc
 */
tma.page.about.Contact.prototype.animate_in_internal = function() {

  if (manic.IS_MOBILE == false){
    TweenMax.staggerFromTo(this.contact_split_copy.chars, 
      0.8, 
      {y:36}, 
      {y:0, ease: Sine.easeInOut, delay: 0.2}, 
      0.06);
    TweenMax.staggerFromTo(this.contact_split_copy.chars, 
      0.8, 
      {autoAlpha:0}, 
      {autoAlpha:1, ease: Sine.easeOut}, 
      0.06);


    // $('#page-about-contact-form-container').addClass('animated-version');
    TweenMax.delayedCall(0.3, $('#page-about-contact-form-container').addClass, ['animated-version'], $('#page-about-contact-form-container'));

    TweenMax.delayedCall(0.5, $('#page-about-contact-seperator').addClass, ['animated-version'], $('#page-about-contact-seperator'));


    TweenMax.delayedCall(1.2, $('#page-about-contact-detail-container').addClass, ['animated-version'], $('#page-about-contact-detail-container'));
  }
  

};



//    _______     _______ _   _ _____ ____
//   | ____\ \   / / ____| \ | |_   _/ ___|
//   |  _|  \ \ / /|  _| |  \| | | | \___ \
//   | |___  \ V / | |___| |\  | | |  ___) |
//   |_____|  \_/  |_____|_| \_| |_| |____/
//

