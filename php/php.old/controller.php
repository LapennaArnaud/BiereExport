<?php

class controller
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
	    $this->response->setPageDisplay($this->request->getParam('page'));
	    return $this->response;
	}
	
}



