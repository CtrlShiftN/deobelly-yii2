<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $avatar
 * @property string|null $thumbnail
 * @property string|null $title
 * @property string|null $content
 * @property int|null $admin_id
 * @property string|null $tag_id
 * @property int|null $blog_category_id
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Post extends \common\models\Post
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['admin_id', 'post_category_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['avatar', 'thumbnail', 'title', 'tag_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'avatar' => Yii::t('app', 'Avatar'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'tag_id' => Yii::t('app', 'Post Tags'),
            'post_category_id' => Yii::t('app', 'Post Categories'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function updatePost($id, $attribute, $value)
    {
        return \common\models\Post::updateAll([$attribute => $value, 'updated_at' => date('Y-m-d H:i:s')], ['id' => $id]);
    }
}
