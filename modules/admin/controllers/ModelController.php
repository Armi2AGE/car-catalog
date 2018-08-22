<?php

namespace app\modules\admin\controllers;

use app\models\Brand;
use app\modules\admin\forms\CarModelForm;
use yii\web\UploadedFile;
use Yii;
use app\models\Model;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModelController implements the CRUD actions for Model model.
 */
class ModelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
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
     * Creates a new Model model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($brand_id)
    {
        //For hidden input parent Brand Id
        $brand = Brand::findOne($brand_id);

        $carModelForm= new CarModelForm();

        if ($carModelForm->load(Yii::$app->request->post()) && $carModelForm->validate()) {
            if ($carModelForm->imageFile = UploadedFile::getInstance($carModelForm, 'imageFile')) {
                $carModelForm->upload();
            }
            $carModelForm->save();
            return $this->redirect(['/admin/brand/view', 'id' => $brand_id]);
        }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        return $this->render('create', [
            'carModelForm' => $carModelForm,
            'brand' => $brand
        ]);
    }

    /**
     * Updates an existing Model model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $carModelForm = new CarModelForm();
        $brand = $this->findModel($id)->brand;
        $carModelForm->id = $id;

        if ($carModelForm->load(Yii::$app->request->post()) && $carModelForm->validate()) {
            if ($carModelForm->imageFile = UploadedFile::getInstance($carModelForm, 'imageFile')) {
                $carModelForm->upload();
            }
            $carModelForm->save();
            return $this->redirect(['/admin/model/view', 'id' => $id]);
        }

        // Данные для формы
        $model = $this->findModel($id);

        $carModelForm->name = $model->name;
        $carModelForm->description = $model->description;

        return $this->render('update', [
            'carModelForm' => $carModelForm,
            'brand' => $brand
        ]);
    }

    /**
     * Deletes an existing Model model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $model->delete();

        // Just for correct return
        $brand_id = $model->brand->id;

        return $this->redirect(['/admin/brand/view', 'id' => $brand_id]);
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
