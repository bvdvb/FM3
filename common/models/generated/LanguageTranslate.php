<?php

namespace common\models\generated;

use common\models\MyBaseModel;
use Yii;

/**
 * This is the model class for table "language_translate".
 *
 * @property int $id
 * @property string $language
 * @property string|null $translation
 */
class LanguageTranslate extends MyBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language_translate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'language'], 'required'],
            [['id'], 'integer'],
            [['translation'], 'string'],
            [['language'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language' => 'Language',
            'translation' => 'Translation',
        ];
    }
}
