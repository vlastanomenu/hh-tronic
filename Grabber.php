<?php


class Grabber implements \IGrabber
{
	/**
	 * @param string $productId
	 * @return float
	 */
	public function getPrice($productId)
    {
        $html = file_get_contents("https://www.czc.cz/{$productId}/hledat");

        preg_match('/<span class="price-vatin">(.*)Kč<\/span>/',$html,$price);

        if (is_array($price) && count($price))
        {
            return floatval(str_replace([  chr(194),chr(160),' ','&nbsp;' ],'',$price[1]));
        }
        else
        {
            return 0.0;
        }
    }
}
?>