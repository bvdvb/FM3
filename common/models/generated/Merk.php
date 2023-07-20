<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "merk".
 *
 * @property int $id
 * @property string|null $merknaam
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Kruistypemerktoestel[] $kruistypemerktoestels
 * @property Reservetoestel[] $reservetoestels
 * @property User $updatedByUser
 */
class Merk extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by_userid', 'updated_by_userid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['merknaam'], 'string', 'max' => 100],
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
            'id' => 'ID',
            'merknaam' => 'Merknaam',
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
     * Gets query for [[Kruistypemerktoestels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKruistypemerktoestels()
    {
        return $this->hasMany(Kruistypemerktoestel::class, ['kruismerkid' => 'id']);
    }

    /**
     * Gets query for [[Reservetoestels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservetoestels()
    {
        return $this->hasMany(Reservetoestel::class, ['reservetoestelmerk' => 'id']);
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
