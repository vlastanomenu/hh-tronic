<?php


interface IOutput
{

    public function setData(array $price);


	/**
	 * @return string
	 */
	public function getJson();

}
