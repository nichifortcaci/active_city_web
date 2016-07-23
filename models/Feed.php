<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feeds".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $media
 * @property string $location
 * @property integer $category_id
 * @property string $start_datetime
 * @property string $end_datetime
 */
class Feed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'category_id', 'start_datetime'], 'required'],
            [['category_id'], 'integer'],
            [['start_datetime', 'end_datetime'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['content', 'location'], 'string', 'max' => 150],
            [['media'], 'string', 'max' => 350],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'media' => 'Media',
            'location' => 'Location',
            'category_id' => 'Category ID',
            'start_datetime' => 'Start Datetime',
            'end_datetime' => 'End Datetime',
        ];
    }
}
