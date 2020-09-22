/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
  'jquery',
], function ($) {
  'use strict';

  let showElement = null;
  let btnToggle = null;
  $('.dropdown-toggle').click(function(e) {
    let id = this.getAttribute('id_cat');
    if(showElement != null){ 
      showElement.hide(0);
      btnToggle.removeClass("dropdown-toggle-active");
    }  
    showElement = $(`.lnt-dropdown-mega-menu[id_cat_block='${id}']`);
    showElement.show(0);
    btnToggle = $(this);
    btnToggle.addClass("dropdown-toggle-active");


  });
});