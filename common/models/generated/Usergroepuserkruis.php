<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "usergroepuserkruis".
 *
 * @property int $idusergroepuserkruis
 * @property int $usergroepuseruserid
 * @property int $usergroepusergroepid
 * @property int|null $created_by_userid
 * @property string|null $created_at
 * @property int|null $updated_by_userid
 * @property string|null $updated_at
 *
 * @property Usergroep $usergroepusergroep
 * @property User $usergroepuseruser
 */
class Usergroepuserkruis extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usergroepuserkruis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usergroepuseruserid', 'usergroepusergroepid'], 'required'],
            [['usergroepuseruserid', 'usergroepusergroepid', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['usergroepusergroepid'], 'exist', 'skipOnError' => true, 'targetClass' => Usergroep::class, 'targetAttribute' => ['usergroepusergroepid' => 'idusergroep']],
            [['usergroepuseruserid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['usergroepuseruserid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusergroepuserkruis' => 'Idusergroepuserkruis',
            'usergroepuseruserid' => 'Usergroepuseruserid',
            'usergroepusergroepid' => 'Usergroepusergroepid',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Usergroepusergroep]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsergroepusergroep()
    {
        return $this->hasOne(Usergroep::class, ['idusergroep' => 'usergroepusergroepid']);
    }

    /**
     * Gets query for [[Usergroepuseruser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsergroepuseruser()
    {
        return $this->hasOne(User::class, ['id' => 'usergroepuseruserid']);
    }
}
