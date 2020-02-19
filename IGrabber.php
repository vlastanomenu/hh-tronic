<?php

interface IGrabber
{

    /**
     * @param string $productId
     * @return string
     */
    public function getName($productId);

	/**
	 * @param string $productId
	 * @return float
	 */
	public function getPrice($productId);

}
