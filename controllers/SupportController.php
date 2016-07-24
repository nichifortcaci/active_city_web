<?php

namespace app\controllers;

use app\models\Support;
use Yii;
use yii\web\Controller;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class SupportController extends Controller
{
    public function actionCreate()
    {
        $r = Yii::$app->request;
        if (!$r->isPost || Yii::$app->user->isGuest)
            return false;
        $model = new Support();
        $model->user_id = Yii::$app->user->id;
        $model->feed_id = $r->post('feed_id');
        return $model->save();
    }
}
