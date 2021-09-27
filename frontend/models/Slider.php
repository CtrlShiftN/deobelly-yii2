<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $link
 * @property string $site where are these slides placed?
 * @property string|null $slide_label
 * @property string|null $slide_text
 * @property int|null $admin_id
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Slider extends \common\models\Slider
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link', 'site'], 'required'],
            [['admin_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['link', 'site', 'slide_label', 'slide_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'link' => Yii::t('app', 'Link'),
            'site' => Yii::t('app', 'Site'),
            'slide_label' => Yii::t('app', 'Slide Label'),
            'slide_text' => Yii::t('app', 'Slide Text'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @param $siteName
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getSliderFromSite($siteName)
    {
        return Slider::find()->where(['status' => 1, 'site' => $siteName])->orderBy('created_at DESC')->asArray()->all();
    }
}
