<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "reservetoestel".
 *
 * @property int $id
 * @property int|null $reservetoestelmerk
 * @property int $reservetoesteltype
 * @property string|null $reservetoestelnummer
 * @property string|null $reservetoestelomschrijving
 * @property int|null $reserveuitleenaan
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Herstelling[] $herstellings
 * @property Merk $reservetoestelmerk0
 * @property Toestel $reservetoesteltype0
 * @property Klant $reserveuitleenaan0
 * @property User $updatedByUser
 */
class Reservetoestel extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservetoestel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reservetoestelmerk', 'reservetoesteltype', 'reserveuitleenaan', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['reservetoesteltype'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['reservetoestelnummer'], 'string', 'max' => 45],
            [['reservetoestelomschrijving'], 'string', 'max' => 500],
            [['reservetoestelmerk'], 'exist', 'skipOnError' => true, 'targetClass' => Merk::class, 'targetAttribute' => ['reservetoestelmerk' => 'id']],
            [['reservetoesteltype'], 'exist', 'skipOnError' => true, 'targetClass' => Toestel::class, 'targetAttribute' => ['reservetoesteltype' => 'id']],
            [['reserveuitleenaan'], 'exist', 'skipOnError' => true, 'targetClass' => Klant::class, 'targetAttribute' => ['reserveuitleenaan' => 'klantid']],
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
            'reservetoestelmerk' => 'Reservetoestelmerk',
            'reservetoesteltype' => 'Reservetoesteltype',
            'reservetoestelnummer' => 'Reservetoestelnummer',
            'reservetoestelomschrijving' => 'Reservetoestelomschrijving',
            'reserveuitleenaan' => 'Reserveuitleenaan',
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
     * Gets query for [[Herstellings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHerstellings()
    {
        return $this->hasMany(Herstelling::class, ['reservetoestid' => 'id']);
    }

    /**
     * Gets query for [[Reservetoestelmerk0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservetoestelmerk0()
    {
        return $this->hasOne(Merk::class, ['id' => 'reservetoestelmerk']);
    }

    /**
     * Gets query for [[Reservetoesteltype0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservetoesteltype0()
    {
        return $this->hasOne(Toestel::class, ['id' => 'reservetoesteltype']);
    }

    /**
     * Gets query for [[Reserveuitleenaan0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReserveuitleenaan0()
    {
        return $this->hasOne(Klant::class, ['klantid' => 'reserveuitleenaan']);
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
