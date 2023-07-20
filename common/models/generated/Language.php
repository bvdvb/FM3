<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "language".
 *
 * @property string $language_id
 * @property string $language
 * @property string $country
 * @property string $name
 * @property string $name_ascii
 * @property int $status
 */
class Language extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language_id', 'language', 'country', 'name', 'name_ascii', 'status'], 'required'],
            [['status'], 'integer'],
            [['language_id'], 'string', 'max' => 5],
            [['language', 'country'], 'string', 'max' => 3],
            [['name', 'name_ascii'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'language_id' => 'Language ID',
            'language' => 'Language',
            'country' => 'Country',
            'name' => 'Name',
            'name_ascii' => 'Name Ascii',
            'status' => 'Status',
        ];
    }
}
