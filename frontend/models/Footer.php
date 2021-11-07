<?php

namespace frontend\models;

use common\components\SystemConstant;
use Yii;

/**
 * This is the model class for table "footer".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $link
 * @property int $parent_id
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Footer extends \common\models\Footer
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'footer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'link', 'parent_id'], 'required'],
            [['parent_id', 'status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'link'], 'string', 'max' => 255],
            [['slug'], 'unique'],
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
            'link' => Yii::t('app', 'Link'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function getHeaderTitleFooter()
    {
        return Footer::find()->where(['status' => SystemConstant::STATUS_ACTIVE, 'parent_id' => 0])->asArray()->all();
    }

    public static function getFooterByParentId($id)
    {
        return Footer::find()->where(['status' => SystemConstant::STATUS_ACTIVE, 'parent_id' => $id])->asArray()->all();
    }
}
