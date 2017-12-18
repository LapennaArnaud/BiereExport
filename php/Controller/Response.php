<?php 

class Response{
    protected $pageDisplay;
    protected $id;
    protected $data;
    protected $smarty;
    
    function __construct()
    {    
        // SMARTY
    	$this->smarty = new Smarty ();
    	
    	$this->smarty->template_dir = 'templates/';
    	$this->smarty->compile_dir = 'templates_c/';
    	$this->smarty->config_dir = 'configs/';
    	$this->smarty->cache_dir = 'cache/';
    }    
    
    public function display()
    {
        if(isset($this->data))
        {
            //print_r($this->data);;
            $this->smarty->assign($this->data);
        }
        $this->smarty->display("$this->pageDisplay.tpl");
    }
    
    public function setPageDisplay($pageDisplay)
    {
        $this->pageDisplay=$pageDisplay;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    public function setData($data)
    {
        $this->data=$data;
    }
    
}