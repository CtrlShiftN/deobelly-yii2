<?php

namespace backend\models;

use common\components\helpers\StringHelper;
use common\components\SystemConstant;
use Yii;
use yii\helpers\ArrayHelper;

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
            ['title', 'checkDuplicatedSlug'],
            [['slug'], 'unique'],
        ];
    }

    public function checkDuplicatedSlug()
    {
        $footer = Footer::find()->where(['slug' => StringHelper::toSlug($this->title)])->asArray()->all();
        if ($footer) {
            $this->addError('title', Yii::t('app', 'This title has already been used.'));
        }
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

    public static function getTitleFooter()
    {
        $titleFooter = \common\models\Footer::find()->where(['status' => SystemConstant::STATUS_ACTIVE,'parent_id' => 0])->asArray()->all();
        $arrTitleFooter = ArrayHelper::map($titleFooter, 'id', 'title');
        $arrTitleFooter[0] = Yii::t('app','No');
        ksort($arrTitleFooter);
        return $arrTitleFooter;
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateFooter($id, $attribute, $value)
    {
        return \common\models\Footer::updateAll([
            $attribute => $value,
            'updated_at' => date('Y-m-d H:i:s'),
            'admin_id' => Yii::$app->user->identity->getId()
        ], ['id' => $id]);
    }

}
