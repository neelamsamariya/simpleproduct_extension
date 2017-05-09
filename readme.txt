This module displays list of simple product in a html table format. It can be called from cms page or template file or via frontend router

To add in any template .phtml file
<?php 
echo $this->getLayout()
          ->createBlock('simpleproducts/simpleproducts')
          ->setTemplate('simpleproducts/simpleproducts.phtml')
          ->toHtml();
?>

To add in any CMS page layout xml section:

<reference name="content">
  <block type="simpleproducts/simpleproducts" name="simpleproducts" template="simpleproducts/simpleproducts.phtml" />
</reference>

To call via frontend router
yoursiteurl/simpleproducts