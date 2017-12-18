<?php
class utils
{
	protected $request;
	protected $response;
	
	function __construct($request, $response)
	{
	    $this->request = $request;
	    $this->response = $response;
	}
	public function launch()
	{
	    if($this->request->getParam('action')=="contact")
		{
	        $this->response->setPageDisplay("contact");
		}elseif($this->request->getParam('action')=="info")
		{
		    $this->response->setPageDisplay("info");
		}elseif($this->request->getParam('action')=="test")
		{
			$this->test();
		    $this->response->setPageDisplay("test");
		}
		return $this->response;
	}
	
	
	public function test()
	{
		$panier = [];
		$panier[0] = 2;
		$panier[1] = 4;
		$panier[sizeof($panier)+1] = 5;
		print_r($panier);
	}
}