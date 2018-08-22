<?php

namespace app\controllers;

use Yii;
use app\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ModelController implements the CRUD actions for Model model.
 */
class ModelController extends Controller
{

    /**
     * Return all Model models.
     * @return mixed
     */
    public function actionIndex()
    {
        // if (Yii::$app->request->isAjax) {
        //     Yii::$app->response->format = Response::FORMAT_JSON;
        //
        //     $request = Yii::$app->request;
        //
        //     $id = $request->post('brandId');
        //
        //     $models = Model::find()->where(['brand_id' => $id])->all();
        //
        //     $response = array(
        //         'models' => $models,
        //         'success' => true,
        //     );
        //
        //     return $response;
        // }

        if (Yii::$app->request->isAjax) {
            $request = Yii::$app->request;

            $id = $request->post('brandId');

            $models = Model::find()->where(['brand_id' => $id])->all();

            return $this->renderAjax('index', compact('models'));
        }
    }

    /**
     * Displays a single Model model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    /**
     * Finds the Model model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Model the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Model::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
