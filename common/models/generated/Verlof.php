<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "verlof".
 *
 * @property int $id
 * @property int|null $verlofwie
 * @property string|null $verlofstart
 * @property string|null $verlofeind
 * @property int|null $verlofgoedkeuring_userid
 * @property int|null $verlofgoedkeuring
 * @property string|null $verlofextrainfo
 * @property string|null $verlofextrainforeply
 * @property int $created_by_userid
 * @property string|null $created_at
 * @property int $updated_by_userid
 * @property string|null $updated_at
 *
 * @property User $createdByUser
 * @property User $updatedByUser
 * @property User $verlofgoedkeuringUser
 */
class Verlof extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verlof';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['verlofwie', 'verlofgoedkeuring_userid', 'verlofgoedkeuring', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['verlofstart', 'verlofeind', 'created_at', 'updated_at'], 'safe'],
            [['verlofextrainfo', 'verlofextrainforeply'], 'string'],
            [['created_by_userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_userid' => 'id']],
            [['verlofgoedkeuring_userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['verlofgoedkeuring_userid' => 'id']],
            [['updated_by_userid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by_userid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'verlofwie' => 'Verlofwie',
            'verlofstart' => 'Verlofstart',
            'verlofeind' => 'Verlofeind',
            'verlofgoedkeuring_userid' => 'Verlofgoedkeuring Userid',
            'verlofgoedkeuring' => 'Verlofgoedkeuring',
            'verlofextrainfo' => 'Verlofextrainfo',
            'verlofextrainforeply' => 'Verlofextrainforeply',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
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
     * Gets query for [[UpdatedByUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedByUser()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by_userid']);
    }

    /**
     * Gets query for [[VerlofgoedkeuringUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVerlofgoedkeuringUser()
    {
        return $this->hasOne(User::class, ['id' => 'verlofgoedkeuring_userid']);
    }
}
