<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "bestelling".
 *
 * @property int $id
 * @property string|null $besteltekst
 * @property int|null $bestelstatus
 * @property string|null $bestelinvoegdate
 * @property string|null $bestelbesteldate
 * @property string|null $bestelafleverdate
 * @property int|null $besteluser
 * @property int|null $herstellingid
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Herstelling $herstelling
 * @property User $updatedByUser
 */
class Bestelling extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bestelling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['besteltekst'], 'string'],
            [['bestelstatus', 'besteluser', 'herstellingid', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['bestelinvoegdate', 'bestelbesteldate', 'bestelafleverdate', 'created_at', 'updated_at'], 'safe'],
            [['herstellingid'], 'exist', 'skipOnError' => true, 'targetClass' => Herstelling::class, 'targetAttribute' => ['herstellingid' => 'id']],
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
            'besteltekst' => 'Besteltekst',
            'bestelstatus' => 'Bestelstatus',
            'bestelinvoegdate' => 'Bestelinvoegdate',
            'bestelbesteldate' => 'Bestelbesteldate',
            'bestelafleverdate' => 'Bestelafleverdate',
            'besteluser' => 'Besteluser',
            'herstellingid' => 'Herstellingid',
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
     * Gets query for [[Herstelling]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHerstelling()
    {
        return $this->hasOne(Herstelling::class, ['id' => 'herstellingid']);
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
