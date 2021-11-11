<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "site_luxury".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string|null $link
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $note
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class SiteLuxury extends \common\models\SiteLuxury
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_luxury';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required'],
            [['status', 'admin_id'], 'integer'],
            [['note'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'image', 'link'], 'string', 'max' => 255],
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'on' => 'create'],
            ['file', 'required', 'on' => 'create'],
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
            'image' => Yii::t('app', 'Image'),
            'link' => Yii::t('app', 'Link'),
            'status' => Yii::t('app', 'Status'),
            'note' => Yii::t('app', 'Note'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'file' => Yii::t('app', 'File')
        ];
    }

    /**
     * @param $id
     * @param $attribute
     * @param $value
     * @return int
     */
    public static function updateAttr($id, $attribute, $value)
    {
        return \common\models\SiteLuxury::updateAll([
            $attribute => $value,
            'updated_at' => date('Y-m-d H:i:s'),
            'admin_id' => Yii::$app->user->identity->getId()
        ], ['id' => $id]);
    }
}
