<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "site_index".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $label
 * @property string|null $image
 * @property string|null $content
 * @property string|null $link
 * @property string|null $type image, image link or text, text link, see more link, mix(image, text, link)
 * @property string $section
 * @property int|null $status 0 for inactive, 1 for active
 * @property string|null $note
 * @property int|null $admin_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class SiteIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_index';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'note'], 'string'],
            [['section'], 'required'],
            [['status', 'admin_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'label', 'image', 'link', 'type', 'section'], 'string', 'max' => 255],
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
            'label' => Yii::t('app', 'Label'),
            'image' => Yii::t('app', 'Image'),
            'content' => Yii::t('app', 'Content'),
            'link' => Yii::t('app', 'Link'),
            'type' => Yii::t('app', 'Type'),
            'section' => Yii::t('app', 'Section'),
            'status' => Yii::t('app', 'Status'),
            'note' => Yii::t('app', 'Note'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
