<?php

namespace backend\models;

use common\components\helpers\StringHelper;
use common\components\SystemConstant;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "color".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $color_code
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Color extends \common\models\Color
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'color_code'], 'string', 'max' => 255],
            [['slug'], 'unique', 'targetClass' => \common\models\Color::class],
            [['name', 'color_code'], 'required'],
            ['name', 'checkDuplicatedSlug']
        ];
    }

    public function checkDuplicatedSlug()
    {
        $color = Color::find()->where(['slug'=>StringHelper::toSlug($this->name)])->asArray()->all();
        if ($color){
            $this->addError('name', Yii::t('app','This name has already been used.'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'color_code' => Yii::t('app', 'Color Code'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllColor()
    {
        return \common\models\Color::find()->where(['status' => SystemConstant::STATUS_ACTIVE])->asArray()->all();
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateColorName($id, $attribute, $value)
    {
        $slug = StringHelper::toSlug($value);
        return \common\models\Color::updateAll([$attribute => $value, 'slug' => $slug, 'updated_at' => date('Y-m-d H:i:s'), 'admin_id' => Yii::$app->user->identity->getId()], ['id' => $id]);
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateColorStatus($id, $attribute, $value)
    {
        return \common\models\Color::updateAll([
            $attribute => $value,
            'updated_at' => date('Y-m-d H:i:s'),
            'admin_id' => Yii::$app->user->identity->getId()
        ], ['id' => $id]);
    }
}
