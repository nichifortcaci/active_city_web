<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $created_at
 * @property integer $id
 * @property integer $user_id
 * @property string $comment
 * @property integer $feed_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'feed_id'], 'integer'],
            [['comment'], 'string', 'max' => 250],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'feed_id' => 'Feed ID',
        ];
    }
}
