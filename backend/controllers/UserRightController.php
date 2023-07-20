<?php

namespace backend\controllers;

use Yii;
use yii\web\HttpException;

class UserRightController extends MyMainController {

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionTest1() {
        $searchModel = new \common\models\KlantSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        return $this->render('test1', [
                    'model' => $searchModel,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTest2() {
        if (\Yii::$app->user->can('admin')) {
            echo 'allowed';
            // put code here
        } else {

            throw new HttpException(403);
        }
        return $this->render('test2');
    }

    public function actionTest3() {
        return $this->render('test3');
    }

    public function actionAjxGetRestrictions() {
        $arrrestrictions = [];
        $itemchilds = \common\models\AuthItemChild::find()->all();
        foreach ($itemchilds as $key => $value) {
            $arrrestrictions[] = urlencode($value['child']) . "_" . urlencode($value['parent']);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $arrrestrictions;
    }

    public function actionAjxChangeRestrictions() {
        $postparams = $this->request->bodyParams;
        $id = explode('_', $postparams['id']);
        $checked = $postparams['checked'];
        $mparent = urldecode($id[1]);
        $mchild = urldecode($id[0]);
        $auth = Yii::$app->authManager;


        if ($checked == "true") {
            // toevoegen
            $createPost = $auth->getPermission($mchild);
            if (!$createPost) {
                $createPost = $auth->createPermission($mchild);
                //$createPost->description = 'Create a post';
                $auth->add($createPost);
            }
            $author = $auth->getRole($mparent);
            if (!$author) {

                $author = $auth->createRole($mparent);
                $auth->add($author);
            }

            if (!$auth->hasChild($author, $createPost)) {
                $auth->addChild($author, $createPost);
            }
        } else {
            //verwijderen
            $createPost = $auth->getPermission($mchild);
            $author = $auth->getRole($mparent);
            \yii\helpers\VarDumper::dump($auth->hasChild($author, $createPost),10,true);
            
            if ($auth->hasChild($author, $createPost)) {
                $auth->removeChild($author, $createPost);
            }
            
            
        }
    }

}
