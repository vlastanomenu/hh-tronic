<?php


interface IOutput
{

    public function setData(array $data);


	/**
	 * @return string
	 */
	public function getJson();

}
