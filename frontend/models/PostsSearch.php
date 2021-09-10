<?php

namespace frontend\models;

use common\models\Posts;

/**
 * This is the model class for table "posts".
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
class PostsSearch extends Posts
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['admin_id', 'blog_category_id', 'status'], 'integer'],
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
            'avatar' => 'Avatar',
            'thumbnail' => 'Thumbnail',
            'title' => 'Title',
            'content' => 'Content',
            'admin_id' => 'Admin ID',
            'tag_id' => 'Tag ID',
            'blog_category_id' => 'Blog Category ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPostsIntro()
    {
        return Posts::find()->where(['status' => 1])->orderBy('updated_at DESC')->limit(4)->asArray()->all();
    }
}
