<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meta".
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property string|null $created
 * @property string|null $updated
 */
class Meta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['key', 'value'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
