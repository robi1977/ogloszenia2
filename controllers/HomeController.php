<?php 
class HomeController extends Controller{
    
    protected function getName(){
        return 'home';
    }

    protected function index(){
        //$model = new Home();
        $this->returnView('index');
    }
}