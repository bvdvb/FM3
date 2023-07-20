<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "log".
 *
 * @property int $idgesch
 * @property string|null $geschwhatend from what side of the application Backend/frontend
 * @property string|null $geschcontroller
 * @property string|null $geschaction
 * @property string|null $geschkortomschrijving
 * @property int|null $geschalerttype 0--> error 1-> succes 
 * @property string|null $geschextratekst
 * @property string|null $geschparams
 * @property string|null $geschrelatedkeys
 * @property int|null $created_by_userid
 * @property string|null $created_at
 * @property int|null $updated_by_userid
 * @property string|null $updated_at
 * @property int|null $geschiedenisherstelid
 *
 * @property User $createdByUser
 * @property Herstelling $geschiedenisherstel
 * @property User $updatedByUser
 */
class Log extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['geschalerttype', 'created_by_userid', 'updated_by_userid', 'geschiedenisherstelid'], 'integer'],
            [['geschparams'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['geschwhatend', 'geschcontroller', 'geschaction'], 'string', 'max' => 45],
            [['geschkortomschrijving', 'geschextratekst'], 'string', 'max' => 255],
            [['geschrelatedkeys'], 'string', 'max' => 500],
            [['geschiedenisherstelid'], 'exist', 'skipOnError' => true, 'targetClass' => Herstelling::class, 'targetAttribute' => ['geschiedenisherstelid' => 'id']],
            [['created_by_userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_userid' => 'id']],
            [['updated_by_userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by_userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgesch' => 'Idgesch',
            'geschwhatend' => 'Geschwhatend',
            'geschcontroller' => 'Geschcontroller',
            'geschaction' => 'Geschaction',
            'geschkortomschrijving' => 'Geschkortomschrijving',
            'geschalerttype' => 'Geschalerttype',
            'geschextratekst' => 'Geschextratekst',
            'geschparams' => 'Geschparams',
            'geschrelatedkeys' => 'Geschrelatedkeys',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
            'geschiedenisherstelid' => 'Geschiedenisherstelid',
        ];
    }

    /**
     * Gets query for [[CreatedByUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedByUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_by_userid']);
    }

    /**
     * Gets query for [[Geschiedenisherstel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGeschiedenisherstel()
    {
        return $this->hasOne(Herstelling::class, ['id' => 'geschiedenisherstelid']);
    }

    /**
     * Gets query for [[UpdatedByUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedByUser()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by_userid']);
    }
}
