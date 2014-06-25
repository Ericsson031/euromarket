<?php

class Order extends OrderCore
{
    public function getProducts($products = false, $selectedProducts = false, $selectedQty = false)
	{
		if (!$products)
			$products = $this->getProductsDetail();

		$customized_datas = Product::getAllCustomizedDatas($this->id_cart);

		$resultArray = array();
		foreach ($products as $row)
		{
                        $row['product_reference']=$row['product_ean13'];
			// Change qty if selected
			if ($selectedQty)
			{
                                
                        
				$row['product_quantity'] = 0;
				foreach ($selectedProducts as $key => $id_product)
					if ($row['id_order_detail'] == $id_product)
						$row['product_quantity'] = (int)($selectedQty[$key]);
				if (!$row['product_quantity'])
					continue;
			}
                        

			$this->setProductImageInformations($row);
			$this->setProductCurrentStock($row);

			// Backward compatibility 1.4 -> 1.5
			$this->setProductPrices($row);

			$this->setProductCustomizedDatas($row, $customized_datas);

			// Add information for virtual product
			if ($row['download_hash'] && !empty($row['download_hash']))
			{
				$row['filename'] = ProductDownload::getFilenameFromIdProduct((int)$row['product_id']);
				// Get the display filename
				$row['display_filename'] = ProductDownload::getFilenameFromFilename($row['filename']);
			}
			
			$row['id_address_delivery'] = $this->id_address_delivery;
			
			/* Stock product */
			$resultArray[(int)$row['id_order_detail']] = $row;
		}

		if ($customized_datas)
			Product::addCustomizationPrice($resultArray, $customized_datas);

		return $resultArray;
	}
}

