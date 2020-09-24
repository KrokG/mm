/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
  'jquery',
], function ($) {
  'use strict';


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

    $('.product').hide();
    $(`.id-sub-category-${idCat}`).show();

  });

  let oldSubCategoryId = null; 
  $('.subCategory').hover((e) => {
    let subCategoryId = $(e.target).attr('cat_id')
    if(subCategoryId != oldSubCategoryId){
      $('.product').hide();
      $(`.id-sub-category-${subCategoryId}`).show();
      oldSubCategory = subCategoryId;
    }
  });

  $(document).mouseup(function (e){ // событие клика по веб-документу
		let block = $(".lnt-dropdown-mega-menu"); // тут указываем ID элемента
		if (!block.is(e.target) // если клик был не по нашему блоку
		    && block.has(e.target).length === 0) { // и не по его дочерним элементам
      block.hide(); // скрываем его
      if(btnToggle != null)btnToggle.removeClass("dropdown-toggle-active");
		}
	});

  
});