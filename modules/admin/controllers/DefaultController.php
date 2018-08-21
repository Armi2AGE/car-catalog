<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Brand;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $brands = Brand::find()->all();

        return $this->render('index', compact('brands'));
    }
}
