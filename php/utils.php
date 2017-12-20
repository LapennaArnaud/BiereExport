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
		}
		return $this->response;
	}
}