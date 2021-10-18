<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "geo_location".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $parent
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class GeoLocation extends \common\models\GeoLocation
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'geo_location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'parent'], 'required'],
            [['parent', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'parent' => Yii::t('app', 'Parent'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
