<?php

abstract class FrontController {
    
    public static function dispatch() {
        $request = new Request();
        $response = new Response();
        ActionController::process($request, $response)->display();
    }
}
