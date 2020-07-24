<?php

namespace Build\BuildATM\Account;

class RegisterAcess{

    private $register = [];

    public function __call($name, $args)
    {
        $method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		switch ($method)
		{

			case "get":
				return (isset($this->register[$fieldName])) ? $this->register[$fieldName] : NULL;
			break;

			case "set":
				$this->register[$fieldName] = $args[0];
            break;

        }

    }


    public function setData($data = array())
{
    foreach ($data as $key => $value) {
        $this->{"set".$key}($value);
    }
}

public function getValue()
{
    return $this->register;
}


}



?>