<?php

namespace backend\models;

use common\components\SystemConstant;
use Yii;

/**
 * This is the model class for table "tracking_status".
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property int|null $status 0 for inactive, 1 for active
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TrackingStatus extends \common\models\TrackingStatus
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tracking_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'status' => Yii::t('app', 'Status'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllStatus(){
        return \common\models\TrackingStatus::find()->where(['status'=>SystemConstant::STATUS_ACTIVE])->asArray()->all();
    }
}
