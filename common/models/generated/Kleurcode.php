<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "kleurcode".
 *
 * @property int $id
 * @property string|null $kleur
 * @property int|null $useridint
 * @property int $created_by_userid
 * @property string|null $created_at
 * @property int $updated_by_userid
 * @property string|null $updated_at
 *
 * @property User $useridint0
 */
class Kleurcode extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kleurcode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['useridint', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['kleur'], 'string', 'max' => 45],
            [['useridint'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['useridint' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kleur' => 'Kleur',
            'useridint' => 'Useridint',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Useridint0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUseridint0()
    {
        return $this->hasOne(User::class, ['id' => 'useridint']);
    }
}
