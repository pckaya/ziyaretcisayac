<?php

namespace api\ziyaretcisayac\v1\controllers;


use yii\rest\Controller;

class DefaultController extends Controller
{
    public function actionIndex(){
        return ['status' => 1, 'action' => 'index','controller' => 'default'];
    }

}