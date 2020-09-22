<?php
namespace Qdigital\Theme\Block;
use Magento\Framework\App\ObjectManager;
use Magento\Catalog\Model\ResourceModel\Category as CategoryResource;
class Categories extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function getCategories()
	{

		$objectManager = ObjectManager::getInstance();

		/** @var CategoryResource\CollectionFactory $categoryFactory */
		$categoryFactory = $objectManager->get(CategoryResource\CollectionFactory::class);

		$categories = $categoryFactory->create()
						->addAttributeToSelect('name')
						->addAttributeToFilter('level', 2);

		$result = [[]];
		foreach ($categories as $category) {
			$result[$category->getId()][0] = $category->getName();

			$subCategories = $categoryFactory->create()
						->addAttributeToSelect('name')
						->addAttributeToFilter('parent_id', $category->getId());
			$index = 1;
			foreach($subCategories as $subCategory){
				$result[$category->getId()][$index] = $subCategory->getName();
				$index++;
			}
		}
		
		return $result;
	}

	public function getSubCategories(){
		$objectManager = ObjectManager::getInstance();

		/** @var CategoryResource\CollectionFactory $categoryFactory */
		$categoryFactory = $objectManager->get(CategoryResource\CollectionFactory::class);

		$categories = $categoryFactory->create()
						->addAttributeToSelect('name')
						->addAttributeToFilter('level', 3);


		//$categories = array("GAMING PC", "DESCTOP");
		$result = [];
		foreach ($categories as $category) {
			$result[$category->getId()] = $category->getName();
		}
		
		return $result;
	}
}