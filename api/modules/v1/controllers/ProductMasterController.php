<?php

namespace api\modules\v1\controllers;

use common\models\ProductMaster;
use common\models\ProductMasterSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\filters\auth\HttpBearerAuth;
use api\modules\v1\models\ApiResponse;

/**
 * ProductMasterController implements the CRUD actions for ProductMaster model.
 */
class ProductMasterController extends Controller
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
						'index'  => ['GET'],
						'view'   => ['GET'],
						'create' => ['GET', 'POST'],
						'update' => ['GET', 'PUT', 'POST'],
						'delete' => ['POST', 'DELETE'],
					],
				],
            ]
        );
    }

    /**
     * Lists all ProductMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductMasterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($dataProvider->totalCount > 0)
            return (new ApiResponse)->success($dataProvider->getModels(), ApiResponse::SUCCESSFUL, 'Search result', $dataProvider);
        return (new ApiResponse)->error(null, ApiResponse::NO_CONTENT, 'No result');
    }

    /**
     * Displays a single ProductMaster model.
     * @param int $product_id Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_id),
        ]);
    }

    /**
     * Creates a new ProductMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductMaster();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'product_id' => $model->product_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $product_id Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_id)
    {
        $model = $this->findModel($product_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_id' => $model->product_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $product_id Product ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_id)
    {
        $this->findModel($product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $product_id Product ID
     * @return ProductMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id)
    {
        if (($model = ProductMaster::findOne($product_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}