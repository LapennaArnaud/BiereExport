<?php
class api
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
        require_once 'rest.php';
		return $this->response;
	}
}