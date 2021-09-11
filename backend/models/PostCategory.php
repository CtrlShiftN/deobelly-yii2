<?php

namespace backend\models;

use common\components\helpers\StringHelper;
use Yii;

/**
 * This is the model class for table "post_category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class PostCategory extends \common\models\PostCategory
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            ['title', 'checkDuplicateSlug']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @param $attribute
     * @param $params
     * @param $validator
     */
    public function checkDuplicateSlug($attribute, $params, $validator)
    {
        if (\common\models\PostCategory::findOne(['slug' => StringHelper::toSlug($this->title)])) {
            $this->addError($attribute, 'Danh mục đã tồn tại.');
        }
    }


    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updatePostCategoryTitle($id, $attribute, $value)
    {
        $slug = StringHelper::toSlug($value);
        return \common\models\PostCategory::updateAll([$attribute => $value, 'slug' => $slug, 'updated_at' => date('Y-m-d H:i:s')], ['id' => $id]);
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updatePostCategoryStatus($id, $attribute, $value){
        return \common\models\PostCategory::updateAll([$attribute => $value, 'updated_at' => date('Y-m-d H:i:s')], ['id' => $id]);
    }
}
