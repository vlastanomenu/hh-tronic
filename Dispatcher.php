<?php

class Dispatcher
{

	/**
	 * @var IGrabber
	 */
	private $grabber;
	/**
	 * @var IOutput
	 */
	private $output;

	/**
	 * @param IGrabber $grabber
	 * @param IOutput $output
	 */
	public function __construct(IGrabber $grabber, IOutput $output)
	{
		$this->grabber = $grabber;
		$this->output = $output;
	}

	/**
	 * @return string JSON
	 */
	public function run()
	{
	    $price = [];

	    $f = file_get_contents('vstup.txt');
	    $ids = explode(chr(13).chr(10),$f);

	    foreach ($ids as $id)
        {
            if ($id)
            {
                $price[$id] = $this->grabber->getPrice($id);
            }
        }

	    $this->output->setData($price);

        return $this->output->getJson();
	}
}
