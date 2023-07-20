<?php

namespace common\models;

use Yii;
use \yii\db\Expression;

class MyBaseModel extends \yii\db\ActiveRecord {

    public $old_record;

    public function beforeSave($insert) {
        Yii::debug('start beforesave', __METHOD__);
        if (parent::beforeSave($insert)) {
            if ($insert) {
                Yii::debug('start beforesave insert', __METHOD__);
                //set creator and creationdate
                if ($this->hasAttribute('created_by_userid')) {
                    $this->created_by_userid = Yii::$app->user->getId();
                }
                if ($this->hasAttribute('create_at')) {
                    $this->create_at = new Expression("current_timestamp", array());
                }
                if ($this->hasAttribute('created_at')) {
                    $this->created_at = new Expression("current_timestamp", array());
                }

                if ($this->hasAttribute('updated_by_userid')) {
                    $this->updated_by_userid = Yii::$app->user->getId();
                }
                if ($this->hasAttribute('update_at')) {
                    $this->update_at = new Expression("current_timestamp", array());
                }
                if ($this->hasAttribute('updated_at')) {
                    $this->updated_at = new Expression("current_timestamp", array());
                }
            } else {
                //set updater and updatedate
                Yii::debug('start beforesave update', __METHOD__);
                if ($this->hasAttribute('updated_by_userid')) {
                    $this->updated_by_userid = Yii::$app->user->getId();
                }
                if ($this->hasAttribute('update_at')) {
                    $this->update_at = new Expression("current_timestamp", array());
                }
                if ($this->hasAttribute('updated_at')) {
                    $this->updated_at = new Expression("current_timestamp", array());
                }
            }


            return true;
        } else {
            return false;
        }
    }

    public function getCreator() {
        if ($this->hasAttribute('created_by_userid')) {
            return $this->hasOne(User::class, ['id' => 'created_by_userid'])->from(["creator" => User::tableName()]);
        }
        return null;
    }

    public function getModifier() {
        if ($this->hasAttribute('updated_by_userid')) {
            return $this->hasOne(User::class, ['id' => 'updated_by_userid'])->from(["modifier" => User::tableName()]);
        }
        return null;
    }













    public function getCreationdate() {
        if ($this->hasAttribute('created_at')) {
            return Yii::$app->formatter->asDate($this->created_at, 'php:d/m/Y H:i:s');
        }
        return null;
    }

    public function getModificationdate() {
        if ($this->hasAttribute('updated_at')) {
            return Yii::$app->formatter->asDate($this->updated_at, 'php:d/m/Y H:i:s');
        }
        return null;
    }

    public static function insertlog($prm_korte_omschrijving = '', $prmalerttype = '', $prmrelatedkeys = '') {

//        \yii\helpers\VarDumper::dump(MyBaseModel::getallparams(), 10, true);
        
        /*
        
        prmalerttypes
         * 0 debug lijn
         * 1 loglijn bij bestelling van componenten.
         * 2 loglijn herstelbeschriving toevoegen.
         * 3 Herstelling betaald
         * 
        prmrelatedkeys
         * getparams: () postparams: (), extraparams:(herstelid:17061, user:1245)
         * herstelid
         * user
        
        */
        $tmpgeschobj = new \common\models\log();
        $tmpgeschobj->geschkortomschrijving = $prm_korte_omschrijving;
        $tmpgeschobj->geschwhatend = basename(Yii::getAlias('@app'));
        $tmpgeschobj->geschcontroller = Yii::$app->controller->id;
        $tmpgeschobj->geschaction = Yii::$app->controller->action->id;
        $tmpgeschobj->geschalerttype = $prmalerttype;
        $tmpgeschobj->geschparams = MyBaseModel::getallparams();
        $tmpgeschobj->geschrelatedkeys = $prmrelatedkeys.";";

        $tmpgeschobj->updated_by_userid = Yii::$app->user->identity->id;
        $tmpgeschobj->created_by_userid = Yii::$app->user->identity->id;
        $tmpgeschobj->validate();
        $tmpgeschobj->save();
    }
    
        public static function getallparams() {
        $flattened = Yii::$app->request->getQueryParams();

        array_walk($flattened, function (&$value, $key) {
            $value = "{$key}:{$value}";
        });
        $mygetp = implode(', ', $flattened);
        
        $flattened = Yii::$app->request->getBodyParams();

        array_walk($flattened, function (&$value, $key) {
            $value = "{$key}:{$value}";
        });
        $mypostp = implode(', ', $flattened);
       
        return "getparams: (".$mygetp.") postparams: (".$mypostp .")";//."cliparams: ".$myclip;
    }

}
