<?php

namespace frontend\models;

use common\components\SystemConstant;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "mix_and_match".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $mixed_product_id
 * @property string $content
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class MixAndMatch extends \common\models\MixAndMatch
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mix_and_match';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'image', 'mixed_product_id', 'content'], 'required'],
            [['content'], 'string'],
            [['status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'image', 'mixed_product_id'], 'string', 'max' => 255],
            [['title'], 'unique'],
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
            'image' => Yii::t('app', 'Image'),
            'mixed_product_id' => Yii::t('app', 'Mixed Product ID'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllCollections(){
        return \common\models\MixAndMatch::find()
            ->where(['status'=>SystemConstant::STATUS_ACTIVE])
            ->orderBy('updated_at DESC, created_at DESC')
            ->asArray()->all();
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public static function getCollectionByID($id){
        return \common\models\MixAndMatch::find()->where([
            'id' => $id,
            'status' => SystemConstant::STATUS_ACTIVE
        ])->asArray()->one();
    }

    /**
     * @param $elementIDCSV
     * @return array
     */
    public static function getAllCollectionElements($elementIDCSV){
        $arrProduct = \common\models\Product::find()->where([
            'id' => explode(',',$elementIDCSV),
            'status'=>SystemConstant::STATUS_ACTIVE
        ])->asArray()->all();
        return ArrayHelper::index($arrProduct, 'id');
    }

    public static function getOtherMix($id) {
        return \common\models\MixAndMatch::find()
            ->where(['status'=>SystemConstant::STATUS_ACTIVE])
            ->andWhere(['not',['id' => $id]])
            ->orderBy('updated_at DESC, created_at DESC')
            ->asArray()->all();
    }
}
