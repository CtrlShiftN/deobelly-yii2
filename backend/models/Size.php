<?php

namespace backend\models;

use common\components\helpers\StringHelper;
use common\components\SystemConstant;
use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Size extends \common\models\Size
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            ['name', 'checkDuplicatedSlug']
        ];
    }

    public function checkDuplicatedSlug()
    {
        $color = Size::find()->where(['slug' => StringHelper::toSlug($this->name)])->asArray()->all();
        if ($color) {
            $this->addError('name', Yii::t('app', 'This name has already been used.'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function getAllSize()
    {
        return \common\models\Size::find()->where(['status' => SystemConstant::STATUS_ACTIVE])->asArray()->all();
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateSizeName($id, $attribute, $value)
    {
        $slug = StringHelper::toSlug($value);
        return \common\models\Size::updateAll([$attribute => $value, 'slug' => $slug, 'updated_at' => date('Y-m-d H:i:s'), 'admin_id' => Yii::$app->user->identity->getId()], ['id' => $id]);
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateSizeStatus($id, $attribute, $value)
    {
        return \common\models\Size::updateAll([
            $attribute => $value,
            'updated_at' => date('Y-m-d H:i:s'),
            'admin_id' => Yii::$app->user->identity->getId()
        ], ['id' => $id]);
    }
}
