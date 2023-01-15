<?php

namespace backend\controllers;

use common\models\ProductTypeMaster;
use common\models\ProductTypeMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProductTypeMasterController implements the CRUD actions for ProductTypeMaster model.
 */
class ProductTypeMasterController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ProductTypeMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductTypeMasterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductTypeMaster model.
     * @param int $product_type_id Product Type ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_type_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_type_id),
        ]);
    }

    /**
     * Creates a new ProductTypeMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductTypeMaster();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'product_type_id' => $model->product_type_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductTypeMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $product_type_id Product Type ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_type_id)
    {
        $model = $this->findModel($product_type_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_type_id' => $model->product_type_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductTypeMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $product_type_id Product Type ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_type_id)
    {
        $this->findModel($product_type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductTypeMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $product_type_id Product Type ID
     * @return ProductTypeMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_type_id)
    {
        if (($model = ProductTypeMaster::findOne($product_type_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}