<?php

class Test_Model
{
	private $data = array
	('new' => array('title' => 'New Website', 'content' => 'Welcome to the site!'),
	 'mvc' => array('title' => 'PHP MVC Framework', 'content' => 'works good'));
	
	public function get_data($title)
	{
		$retData = $this->data[$title];
		return $retData;
	}
}

?>