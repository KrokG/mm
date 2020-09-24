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
    $('.lnt-dropdown-mega-menu').show();
    if(btnToggle != null)btnToggle.removeClass("dropdown-toggle-active");
    btnToggle = $(this);
    btnToggle.addClass("dropdown-toggle-active");

    $(`.subCategory`).hide();
    let idCat = btnToggle.attr('id_cat')
    console.log(idCat);
    $(`.subCategory[parent_cat_id=${idCat}]`).show();

  });

  $('.subCategory').hover(() => {
    console.log(this);
  });

  $(document).click(()=>{
    console.log($(this));
  });

  
});