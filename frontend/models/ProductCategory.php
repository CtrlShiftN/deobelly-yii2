<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $code first letter is product type, the rest is code number
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class ProductCategory extends \common\models\ProductCategory
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'code'], 'required'],
            [['status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug', 'code'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['code'], 'unique'],
        ];
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
            'code' => Yii::t('app', 'Code'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getBigCategory()
    {
        return ProductCategory::find()->where(['status' => 1])->andWhere(['like', 'code', '@0'])->asArray()->all();
    }

    /**
     * @param $code
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllCategoriesByCode($code)
    {
        return ProductCategory::find()->where(['status' => 1])->andWhere(['like', 'code', $code])->andWhere(['not',['like', 'code', '@0']])->asArray()->all();
    }

    public static function getBigCategoryName($code) {
        return ProductCategory::find()->select('name')->where(['status' => 1])->andWhere(['code' => $code])->asArray()->one()['name'];
    }
}
