<?php
/**
 * Created by PhpStorm.
 * User: hobroker
 * Date: 7/23/16
 * Time: 5:17 PM
 */

namespace app\widgets;


use yii\base\Widget;

class ButtonGroup extends Widget
{
    public $links;

    public function run()
    {
        parent::run();
        return $this->render('buttonGroup', [
            'data' => $this->links,
        ]);
    }
}