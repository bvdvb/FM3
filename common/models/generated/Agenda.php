<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "agenda".
 *
 * @property int $id
 * @property string $agendaeventdatefrom
 * @property string $agendaeventdateto
 * @property string|null $agendaopm
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property Agendauserkruis[] $agendauserkruis
 * @property User $createdByUser
 * @property User $updatedByUser
 */
class Agenda extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agenda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agendaeventdatefrom', 'agendaeventdateto'], 'required'],
            [['agendaeventdatefrom', 'agendaeventdateto', 'created_at', 'updated_at'], 'safe'],
            [['created_by_userid', 'updated_by_userid'], 'integer'],
            [['agendaopm'], 'string', 'max' => 500],
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
            'agendaeventdatefrom' => 'Agendaeventdatefrom',
            'agendaeventdateto' => 'Agendaeventdateto',
            'agendaopm' => 'Agendaopm',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Agendauserkruis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgendauserkruis()
    {
        return $this->hasMany(Agendauserkruis::class, ['agendaid' => 'id']);
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
}
