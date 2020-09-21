<?php
namespace Qdigital\Theme\Block;
// use Magento\Framework\App\ObjectManager;
// use Magento\Catalog\Model\ResourceModel\Category as CategoryResource;
class Categories extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function getCategories()
	{

		// $objectManager = ObjectManager::getInstance();

		// /** @var CategoryResource\CollectionFactory $categoryFactory */
		// $categoryFactory = $objectManager->get(CategoryResource\CollectionFactory::class);

		// $categories = $categoryFactory->create()
		// 				->addAttributeToSelect('name')
		// 				->addAttributeToFilter('include_in_menu', ['eq' => '1'])
		// 				->addAttributeToFilter('level', ['gt' => 1]);


		// //$categories = array("GAMING PC", "DESCTOP");
		// $result = [];
		// foreach ($categories as $category) {
		// 	$result[$category->getId()] = $category->getName();
		// }
		
		// return $result;
	}
}