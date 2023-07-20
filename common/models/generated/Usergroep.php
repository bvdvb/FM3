<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "usergroep".
 *
 * @property int $idusergroep
 * @property string $usergroepnaam
 * @property int|null $usergroepvolgorde
 * @property int|null $created_by_userid
 * @property string|null $created_at
 * @property int|null $updated_by_userid
 * @property string|null $updated_at
 *
 * @property Usergroepuserkruis[] $usergroepuserkruis
 */
class Usergroep extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usergroep';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usergroepnaam'], 'required'],
            [['usergroepvolgorde', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['usergroepnaam'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusergroep' => 'Idusergroep',
            'usergroepnaam' => 'Usergroepnaam',
            'usergroepvolgorde' => 'Usergroepvolgorde',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Usergroepuserkruis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsergroepuserkruis()
    {
        return $this->hasMany(Usergroepuserkruis::class, ['usergroepusergroepid' => 'idusergroep']);
    }
}
