<?php
namespace Qdigital\Theme\Block;
use Magento\Framework\App\ObjectManager;
use Magento\Catalog\Model\ResourceModel\Category as CategoryResource;
use Magento\Catalog\Model\ProductCategoryList;
class Categories extends \Magento\Framework\View\Element\Template
{
	/**
	 * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
	 */
	protected $_productCollectionFactory;

	public function __construct(
			\Magento\Backend\Block\Template\Context $context,
			\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
	)
	{    
			$this->_productCollectionFactory = $productCollectionFactory;
			parent::__construct($context);
	}

	public function getCategories($level)
	{
		$objectManager = ObjectManager::getInstance();
		/** @var CategoryResource\CollectionFactory $categoryFactory */
		$categoryFactory = $objectManager->get(CategoryResource\CollectionFactory::class);
		$categories = $categoryFactory->create()
						->addAttributeToSelect('name')
						->addAttributeToFilter('level', $level);
		return $categories;
	}

	public function getProducts()
	{
			$subCategory = $this->getCategories(3);
			$ids = array();
			foreach($subCategory as $category){
				array_push($ids, $category->getId());
			}
			$collection = $this->_productCollectionFactory->create();
			$collection->addAttributeToSelect('*');
			$collection->addCategoriesFilter(['in' => $ids]);
			return $collection;
	}
	
}