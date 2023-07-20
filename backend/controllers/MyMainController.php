<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MyMainController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $Myauth = Yii::$app->authManager;
        $cookies = Yii::$app->request->cookies;
        $allow_everyone = false;
        $allow_all_authenthicated_users = true;

        // if (!Yii::$app->user->isGuest && Yii::$app->user->can('permissionName')) {
        //     // user is logged in and has the permission
        // }
        // echo "<hr>hier -->";
        // echo Yii::$app->user->isGuest ;
        // VarDumper::dump( Yii::$app->user->getIdentity(),10,true);
        // echo "<hr> hier 2-->";
        // echo "<hr>";
      // die();

       // \yii\helpers\VarDumper::dump(Yii::$app->user,10,true);
 
        return parent::beforeAction($action);
    }


    public function init() {
        parent::init();
    }

}
