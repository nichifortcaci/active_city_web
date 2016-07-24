<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "support".
 *
 * @property integer $id
 * @property integer $feed_id
 * @property integer $user_id
 * @property string $created_ad
 */
class Support extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feed_id', 'user_id'], 'integer'],
            [['created_ad'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feed_id' => 'Feed ID',
            'user_id' => 'User ID',
            'created_ad' => 'Created Ad',
        ];
    }

    public static function hasSupport($feed_id)
    {
        return !is_null(Support::find()->where([
            'feed_id' => $feed_id,
            'user_id' => Yii::$app->user->id,
        ])->one());
    }
}
