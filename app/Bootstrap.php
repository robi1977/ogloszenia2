<?php
class Bootstrap {
    private $controller;
    private $action;
    private $argument;
    private $request;

    public function __construct($request){
        $this->request = str_replace(ROOT_DOMAIN, "/", $request);
        $this->action = 'index.php';
        $this->argument = '';
        $this->processRequest();
    }

    public function createController(){
        if(is_object($this->controller)){
            $paramets = class_parents($this->controller);
            if(in_array("Controller", $paramets)){
                if(method_exists($this->controller, $this->action)){
                    return $this->controller;
                } else {
                    echo '<h1>Metoda nie istnieje</h1>';
                    foreach ($paramets as $text){
                        echo "- ".$text.'</br>';
                    }
                    echo $this->request;
                    return;
                }
            } else {
                echo '<h1>Klasa nie rozszerza klasy Controller</h1>';
                return;
            }
        } else {
            echo '<h1>Nie udało się utworzyć obiektu</h1>';
            return;
        }
    }

    private function processRequest(){
        //jeżeli $request jest pusty to tworzone jest odwołanie do HomeControlera
        if($this->request == '/'){
            $this->controller = new HomeController($this->action, $this->argument);
            return;
        }

        $uriExploded = explode("?", $this->request);
        if(count($uriExploded)<2){
            $controllerUri = $this->request;
        } else {
            $controllerUri = $uriExploded[0];
            $queryString = $uriExploded[1];
        }

        $components = explode("/", $controllerUri);
        $componentsCount = count($components);

        try{
            $controllerName = ucfirst(strtolower($components[1]));
            $controllerClass = $controllerName."Controller";
            if(!class_exists($controllerClass)) throw new Exception("Nie znaleziono klasy kontrolera");

            switch ($componentsCount){
                case 2:
                    $this->action = 'index';
                break;

                case 3:
                    $this->action = $components[2];
                break;

                case 4:
                    $this->action=$components[2];
                    $this->argument=$components[3];
                break;
                default:
                throw new Exception("Błędny adres URL");
            }

            $this->controller = new $controllerClass($this->action, $this->argument);
        } catch (Exception $e){
            $this->action = 'error';
            $this->argument = $e->getMessage();
            $this->controller = new HomeController($this->action, $this->argument);
        }
    }
}