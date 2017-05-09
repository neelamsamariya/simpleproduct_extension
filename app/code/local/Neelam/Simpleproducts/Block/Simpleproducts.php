<?php

class Neelam_Simpleproducts_Block_Simpleproducts extends Mage_Catalog_Block_Product_List {
  public function listSimpleProducts() {
   
    $arr_products = array();	
    $products = $this->_getProductCollection(); //call model function to load products array	
	$products->addFinalPrice(); //adding final price to product collection
 	$model = Mage::getModel('catalog/product'); //getting product model
    foreach ($products as $product) {
      $prod = $model->load($product->getId());
	  $prod_status = $product->status; 
	  $status = "";
	  //product status 1 for enabled and 2 for disabled so condition to display text
	  if($prod_status == 1)
	  {
	  $status = 'Enabled';
	  }
	  if($prod_status == 2)
	  {
	  $status = 'Disabled';
	  }
	  $products_arr[] = array(
        'id' => $product->getId(),
        'name' => $product->name,
        'sku' => $product->sku,
		'price' => Mage::helper('core')->currency($product->getFinalPrice(),true,false),
		'description' => $prod->getDescription(),
		'status' => $status,
		'weight' => $prod->getWeight(),
		);
    }
 
    return $products_arr;
  }
  
  protected function _getProductCollection() {
    if (is_null($this->_productCollection)) {
        $collection = Mage::getModel('catalog/product')
            ->getCollection('*')
            ->addAttributeToFilter('type_id', array('eq' => 'simple'));
        Mage::getModel('catalog/layer')->prepareProductCollection($collection);
        $this->_productCollection = $collection;
    }
    return parent::_getProductCollection();
}
}
?>