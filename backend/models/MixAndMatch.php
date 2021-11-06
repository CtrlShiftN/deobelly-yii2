<?php

namespace backend\models;

use common\components\helpers\StringHelper;
use Yii;

/**
 * This is the model class for table "mix_and_match".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $mixed_product_id
 * @property string $content
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class MixAndMatch extends \common\models\MixAndMatch
{
    public $file;
    public $mixProduct;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mix_and_match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'image', 'mixed_product_id', 'content'], 'required'],
            [['content'], 'string'],
            [['status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'image', 'mixed_product_id'], 'string', 'max' => 255],
            [['title'], 'unique'],
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'on' => 'create'],
            ['file', 'required', 'on' => 'create'],
            ['mixProduct', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'image' => Yii::t('app', 'Image'),
            'mixed_product_id' => Yii::t('app', 'Mixed Product'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'mixProduct' => Yii::t('app', 'Related Products'),
        ];
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateTitle($id, $attribute, $value)
    {
        $slug = StringHelper::toSlug($value);
        return \common\models\Product::updateAll([$attribute => $value, 'slug' => $slug, 'updated_at' => date('Y-m-d H:i:s'), 'admin_id' => Yii::$app->user->identity->getId()], ['id' => $id]);
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateAttr($id, $attribute, $value)
    {
        return \common\models\Product::updateAll([$attribute => $value, 'updated_at' => date('Y-m-d H:i:s'), 'admin_id' => Yii::$app->user->identity->getId()], ['id' => $id]);
    }

}
