<?php


class Output implements IOutput
{
    private $price = [];

    public function setData(array $price)
    {
        $this->price = $price;

    }


	/**
	 * @return string
	 */
	public function getJson()
    {
        $out = [];

        if (count($this->price))
        {

            foreach ($this->price as $id => $price)
            {
                $out[] = [
                    $id =>
                    [
                        'price' => $price
                    ]
                ];
            }
        }

        return json_encode($out);
    }

}
