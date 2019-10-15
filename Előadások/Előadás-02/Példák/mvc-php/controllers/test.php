<?php

class Test_Controller
{
	public $baseName = 'test';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$testModel = new Test_Model;  //az oszt�lyhoz tartoz� modell
		if(isset($vars['data']))
		{
			//modellb�l lek�rdezz�k a k�rt adatot
			$reqData = $testModel->get_data($vars['data']); 
			//bet�ltj�k a n�zetet
			$view = new View_Loader($this->baseName.'_main');
			//�tadjuk a lek�rdezett adatokat a n�zetnek
			$view->assign('title', $reqData['title']);
			$view->assign('content', $reqData['content']);
		}
		else
		{ echo "No data to show"; }
	}
}

?>