<?php

namespace frontend\models;

use common\components\SystemConstant;
use Yii;

/**
 * This is the model class for table "site_our_stories".
 *
 * @property int $id
 * @property string|null $content
 * @property string $image
 * @property string $section
 * @property int $admin_id
 * @property int|null $status 0 for inactive 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class SiteOurStories extends \common\models\SiteOurStories
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_our_stories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'section'], 'string'],
            [['image', 'section', 'admin_id'], 'required'],
            [['admin_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content' => Yii::t('app', 'Content'),
            'image' => Yii::t('app', 'Image'),
            'section' => Yii::t('app', 'Section'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllStories()
    {
        return SiteOurStories::find()->where(['status' => SystemConstant::STATUS_ACTIVE])->asArray()->all();
    }
}
