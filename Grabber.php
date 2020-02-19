<?php


class Grabber implements \IGrabber
{
    private $htmlDom = [];


	/**
	 * @param string $productId
	 * @return float
	 */
	public function getPrice($productId)
    {
        /** @var DOMDocument $dom */
        $dom = $this->getHtmlDom($productId);
        $finder = new DOMXPath($dom);
        $price = $finder->query("//*[contains(@class, 'price-vatin')]");

        if ($price->length)
        {
            return floatval(str_replace([  chr(194),chr(160),' ','Kč' ],'',$price->item($price->length - 1)->textContent));
        }
        else
        {
            return 0.0;
        }
    }

    /**
     * @param string $productId
     * @return string
     */
    public function getName($productId)
    {
        /** @var DOMDocument $dom */
        $dom = $this->getHtmlDom($productId);

        $h5 = $dom->getElementsByTagName('h5');

        if (is_object($h5) && $h5->length)
        {
            return trim($h5->item(0)->textContent);
        }
        else
        {
            return null;
        }
    }

    /**
     * @param string $productId
     * @return integer
     */
    public function getRating($productId)
    {
        $rating_num = [];

        /** @var DOMDocument $dom */
        $dom = $this->getHtmlDom($productId);
        $finder = new DOMXPath($dom);
        $rating = $finder->query("//div/span[contains(@class, 'rating')]");

        if ($rating->length)
        {
            $rating_value = $rating->item(0)->attributes->getNamedItem('title')->nodeValue;

            preg_match(
                '/(\d)\w+/',
                $rating_value,
                $rating_num
            );
        }
        if (count($rating_num))
        {
            return intval($rating_num[0]);
        }
        else
        {
            return null;
        }
    }

    private function getHtmlDom($productId)
    {
        if (!isset($this->htmlDom[$productId]))
        {
            $dom = new DOMDocument();
            $dom->loadHTMLFile("https://www.czc.cz/{$productId}/hledat");

            $this->htmlDom[$productId] = $dom;
        }

        return $this->htmlDom[$productId];
    }
}
?>