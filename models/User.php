<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'name' => 'Name',
        ];
    }

    public static function exists($id)
    {
        return !is_null(self::findOne($id));
    }

    public static function signIn($data)
    {
        if (!self::exists($data['id'])) {

        } else {
            Yii::$app->user->login(self::findOne($data['id']));
        }
    }

    public static function signUp($data)
    {
        $user = new self();
        $user->user_id = $data['id'];
        $user->name = $data['name'];
        if (!$user->save())
            die(var_dump($user->getErrors()));
        self::signIn($data);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    public function getId()
    {
        return $this->user_id;
    }

    public function getPhoto($type = 'square')
    {
        // small, normal, album, large, square
        return "//graph.facebook.com/" . $this->getId() . "/picture?type=" . $type;
    }

    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
}
