<?php


class Output implements IOutput
{
    private $data = [];

    public function setData(array $data)
    {
        $this->data = $data;
    }


	/**
	 * @return string
	 */
	public function getJson()
    {
        $out = [];

        if (count($this->data))
        {

            foreach ($this->data as $id => $data)
            {
                $out[] = [
                    $id =>
                    [
                        'name' => $data['name'],
                        'price' => $data['price'],
                        'rating' => $data['rating']
                    ]
                ];
            }
        }

        return json_encode($out);
    }

}
