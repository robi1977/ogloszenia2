<?php
class AdsController extends Controller{

    protected function index(){
        $model = new Ad();
        $this->returnView('index', $model->Index());
    }

    protected function getName()
    {
        return 'ads';
    }

    public function create(){
        if(!isset($_SESSION['is_logged_in'])){
            header("Location: ".ROOT_URL.'ads');
        }

        $model = new Ad();
        if($model->add()){
            Messages::setMsg('Ogłoszenie dodane', 'success');
            $this->redirect('ads');
        } else {
            Messages::setMsg('Nie dodano ogłoszenia', 'error');
            $this->redirect('ads','add');
        }
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location: '.ROOT_URL.'ads');
        }

        $this->returnView('add', true);
    }
}