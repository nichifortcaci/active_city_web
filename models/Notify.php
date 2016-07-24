<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_feed_user".
 *
 * @property integer $user_id
 * @property integer $feed_id
 * @property integer $id
 */
class Notify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_feed_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'feed_id'], 'required'],
            [['user_id', 'feed_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'feed_id' => 'Feed ID',
            'id' => 'ID',
        ];
    }
}
