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
	    $data = [];


	    $f = file_get_contents('vstup.txt');
	    $ids = explode(chr(13).chr(10),$f);

	    foreach ($ids as $id)
        {
            if ($id)
            {
                $data[$id]['name'] = $this->grabber->getName($id);
                $data[$id]['price'] = $this->grabber->getPrice($id);
                $data[$id]['rating'] = $this->grabber->getRating($id);
            }
        }

	    $this->output->setData($data);

        return $this->output->getJson();
	}
}
