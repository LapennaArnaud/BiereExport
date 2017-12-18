<?php

class ActionController{

    public static function process(Request $request, Response $response){

        if (!file_exists($path = 'php/' . $request->getParam('page') .'.php')){
            throw new ControleurIntrouvableException ('contrôleur introuvable');
        }
        require_once($path);
        $class = $request->getParam('page');
        $controller = new $class($request, $response);
        return $controller->launch();
    }
}

?>