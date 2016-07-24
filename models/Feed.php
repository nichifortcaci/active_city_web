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
 * @property string $user_id
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

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->user_id = Yii::$app->user->id;
            }
        } else {
            return false;
        }
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

    public function displayDate()
    {
        $f = \Yii::$app->formatter;
        return 'From ' . $f->asDatetime($this->start_datetime, 'long') . ' <br>To ' . $f->asDatetime($this->end_datetime, 'long');
    }

    public function getSrc()
    {
        if (empty($this->media) || is_null($this->media)) {
            return $this->getMapImg();
        } else {
            $data = (array)json_decode($this->media);
            return $data['path'];
        }
    }

    public function getMapImg()
    {
        $gps = (array)json_decode($this->location);
        return strtr('https://maps.googleapis.com/maps/api/staticmap?maptype=terrain&center={{lat}},{{long}}&size=1200x500&zoom=18&markers=color:0xFF9800%7Clabel:%7C47.022907,28.835415&key=AIzaSyBLrIRLPaIZFiQs7pJN6nN6iBZO9G4t41Q', [
            '{{long}}' => $gps['longitude'],
            '{{lat}}' => $gps['latitude'],
        ]);
    }
}
