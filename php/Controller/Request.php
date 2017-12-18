<?php 

class Request {
    protected $action;
    protected $page;
    
    public function __construct()
    {
        $this->route();
    }
    public function route()
    {
        if (isset($_GET['action']))
        {
            $this->action = $_GET['action'];
        }
        if (isset($_GET['page']))
        {
            $this->page = $_GET['page'];
        }else
        {
            $this->page = 'accueil';
        }
    }
    public function getParam($param)
    {
        if($param ==='action')
        {
            return $this->action;
            
        }
        else if($param === 'page')
        {
            return $this->page;
        }
        
    }
}
?>