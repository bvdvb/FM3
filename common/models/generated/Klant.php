<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "klant".
 *
 * @property int $klantid
 * @property string|null $klantnaam
 * @property string|null $straat
 * @property string|null $nr
 * @property int|null $gemeenid
 * @property string|null $email
 * @property string|null $tel
 * @property string|null $klantopmerkingen
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Gemeente $gemeen
 * @property Herstelling[] $herstellings
 * @property Reservetoestel[] $reservetoestels
 * @property User $updatedByUser
 */
class Klant extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'klant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gemeenid', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['created_by_userid', 'created_at', 'updated_by_userid', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['klantnaam', 'straat', 'nr', 'email', 'tel'], 'string', 'max' => 100],
            [['klantopmerkingen'], 'string', 'max' => 255],
            [['gemeenid'], 'exist', 'skipOnError' => true, 'targetClass' => Gemeente::class, 'targetAttribute' => ['gemeenid' => 'id']],
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
            'klantid' => 'Klantid',
            'klantnaam' => 'Klantnaam',
            'straat' => 'Straat',
            'nr' => 'Nr',
            'gemeenid' => 'Gemeenid',
            'email' => 'Email',
            'tel' => 'Tel',
            'klantopmerkingen' => 'Klantopmerkingen',
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
     * Gets query for [[Gemeen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGemeen()
    {
        return $this->hasOne(Gemeente::class, ['id' => 'gemeenid']);
    }

    /**
     * Gets query for [[Herstellings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHerstellings()
    {
        return $this->hasMany(Herstelling::class, ['klantid' => 'klantid']);
    }

    /**
     * Gets query for [[Reservetoestels]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservetoestels()
    {
        return $this->hasMany(Reservetoestel::class, ['reserveuitleenaan' => 'klantid']);
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
