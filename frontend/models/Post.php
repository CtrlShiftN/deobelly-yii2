<?php

namespace frontend\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $avatar
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property int|null $admin_id
 * @property string|null $tag_id
 * @property int $post_category_id
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Post extends \yii\db\ActiveRecord
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
            [['avatar', 'title', 'slug', 'content', 'post_category_id'], 'required'],
            [['content'], 'string'],
            [['admin_id', 'post_category_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['avatar', 'title', 'slug', 'tag_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'avatar' => Yii::t('app', 'Avatar'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'content' => Yii::t('app', 'Content'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'tag_id' => Yii::t('app', 'Tag ID'),
            'post_category_id' => Yii::t('app', 'Post Category ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return Query
     */
    public static function getAllPosts($postCategory = null, $postTag = null)
    {
        $query = (new Query())->select(['p.title', 'p.content','p.avatar','p.id','p.updated_at','p.admin_id','pc.title as pc-title'])->from('post as p')
            ->innerJoin('post_category as pc', 'p.post_category_id = pc.id')
            ->where(['p.status' => 1])
            ->orderBy('updated_at DESC');
        if (!empty($postCategory)) {
            $query->andWhere(['p.post_category_id'=>$postCategory]);
        }
        if (!empty($postTag)) {
            $query->andWhere(['p.tag_id'=>$postTag]);
        }
        return $query;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getPostIntro()
    {
        return Post::find()->where(['status' => 1])->orderBy('updated_at DESC')->limit(4)->asArray()->all();
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getOutstandingPosts()
    {
        return Post::find()->where(['status' => 1])->orderBy('updated_at DESC')->limit(5)->asArray()->all();
    }
}
