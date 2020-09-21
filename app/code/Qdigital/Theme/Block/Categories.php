<?php
namespace Qdigital\Theme\Block;
class Categories extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function getCategories()
	{
		return __('<h1>Hello test World<h1>');
	}
}