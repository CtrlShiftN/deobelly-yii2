<?php

namespace frontend\models;

use common\components\encrypt\CryptHelper;
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
    public static function getAllPosts($postTag = null, $postCategory = null)
    {
        $query = (new Query())->select(
            [
                'p.*',
                'pc.title as pc-title',
                'pc.id as pc-id',
                'u.name',
            ]
        )->from('post as p')
            ->innerJoin('post_category as pc', 'p.post_category_id = pc.id')
            ->innerJoin('user as u', 'u.id = p.admin_id')
            ->where(['p.status' => 1]);
        if (!empty($postTag)) {
            $query->andWhere(['like', 'p.tag_id', CryptHelper::decryptString($postTag)]);
        }
        if (!empty($postCategory)) {
            $query->andWhere(['p.post_category_id' => CryptHelper::decryptString($postCategory)]);
        }
        $query->orderBy('updated_at DESC');
        return $query;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getLatestPosts()
    {
        return Post::find()->where(['status' => 1])->orderBy('updated_at DESC')->limit(5)->asArray()->all();
    }
}
