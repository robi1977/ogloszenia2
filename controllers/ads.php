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
}