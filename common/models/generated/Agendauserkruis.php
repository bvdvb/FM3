<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "agendauserkruis".
 *
 * @property int $id
 * @property int $agendaid
 * @property int $agendauserid
 * @property int|null $herstelid
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property Agenda $agenda
 * @property User $agendauser
 * @property User $createdByUser
 * @property Herstelling $herstel
 * @property User $updatedByUser
 */
class Agendauserkruis extends MyBaseModel 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agendauserkruis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agendaid', 'agendauserid'], 'required'],
            [['agendaid', 'agendauserid', 'herstelid', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['herstelid'], 'exist', 'skipOnError' => true, 'targetClass' => Herstelling::class, 'targetAttribute' => ['herstelid' => 'id']],
            [['agendaid'], 'exist', 'skipOnError' => true, 'targetClass' => Agenda::class, 'targetAttribute' => ['agendaid' => 'id']],
            [['agendauserid'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['agendauserid' => 'id']],
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
            'agendaid' => 'Agendaid',
            'agendauserid' => 'Agendauserid',
            'herstelid' => 'Herstelid',
            'created_by_userid' => 'Created By Userid',
            'created_at' => 'Created At',
            'updated_by_userid' => 'Updated By Userid',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Agenda]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgenda()
    {
        return $this->hasOne(Agenda::class, ['id' => 'agendaid']);
    }

    /**
     * Gets query for [[Agendauser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgendauser()
    {
        return $this->hasOne(User::class, ['id' => 'agendauserid']);
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
     * Gets query for [[Herstel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHerstel()
    {
        return $this->hasOne(Herstelling::class, ['id' => 'herstelid']);
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
