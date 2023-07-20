<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "kruistypemerktoestel".
 *
 * @property int $id
 * @property int $kruistypeid
 * @property int $kruismerkid
 * @property int $kruisttoestelid
 * @property int $created_by_userid
 * @property string $created_at
 * @property int $updated_by_userid
 * @property string $updated_at
 *
 * @property User $createdByUser
 * @property Herstelling[] $herstellings
 * @property Merk $kruismerk
 * @property Toestel $kruisttoestel
 * @property Type $kruistype
 * @property User $updatedByUser
 */
class Kruistypemerktoestel extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kruistypemerktoestel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kruistypeid', 'kruismerkid', 'kruisttoestelid'], 'required'],
            [['kruistypeid', 'kruismerkid', 'kruisttoestelid', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['kruismerkid'], 'exist', 'skipOnError' => true, 'targetClass' => Merk::class, 'targetAttribute' => ['kruismerkid' => 'id']],
            [['kruisttoestelid'], 'exist', 'skipOnError' => true, 'targetClass' => Toestel::class, 'targetAttribute' => ['kruisttoestelid' => 'id']],
            [['kruistypeid'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['kruistypeid' => 'id']],
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
            'kruistypeid' => 'Kruistypeid',
            'kruismerkid' => 'Kruismerkid',
            'kruisttoestelid' => 'Kruisttoestelid',
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
        return $this->hasMany(Herstelling::class, ['typeid' => 'id']);
    }

    /**
     * Gets query for [[Kruismerk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKruismerk()
    {
        return $this->hasOne(Merk::class, ['id' => 'kruismerkid']);
    }

    /**
     * Gets query for [[Kruisttoestel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKruisttoestel()
    {
        return $this->hasOne(Toestel::class, ['id' => 'kruisttoestelid']);
    }

    /**
     * Gets query for [[Kruistype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKruistype()
    {
        return $this->hasOne(Type::class, ['id' => 'kruistypeid']);
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
