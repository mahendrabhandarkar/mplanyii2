<?php

namespace api\modules\v1\controllers;

use common\models\ProductTypeConfiguration;
use common\models\ProductTypeConfigurationSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\filters\auth\HttpBearerAuth;
use api\modules\v1\models\ApiResponse;

/**
 * ProductTypeConfigurationController implements the CRUD actions for ProductTypeConfiguration model.
 */
class ProductTypeConfigurationController extends Controller
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
     * Lists all ProductTypeConfiguration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductTypeConfigurationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($dataProvider->totalCount > 0)
            return (new ApiResponse)->success($dataProvider->getModels(), ApiResponse::SUCCESSFUL, 'Search result', $dataProvider);
        return (new ApiResponse)->error(null, ApiResponse::NO_CONTENT, 'No result');
    }

    /**
     * Displays a single ProductTypeConfiguration model.
     * @param int $product_type_configuration_id Product Type Configuration ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_type_configuration_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_type_configuration_id),
        ]);
    }

    /**
     * Creates a new ProductTypeConfiguration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductTypeConfiguration();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'product_type_configuration_id' => $model->product_type_configuration_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductTypeConfiguration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $product_type_configuration_id Product Type Configuration ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_type_configuration_id)
    {
        $model = $this->findModel($product_type_configuration_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_type_configuration_id' => $model->product_type_configuration_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductTypeConfiguration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $product_type_configuration_id Product Type Configuration ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_type_configuration_id)
    {
        $this->findModel($product_type_configuration_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductTypeConfiguration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $product_type_configuration_id Product Type Configuration ID
     * @return ProductTypeConfiguration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_type_configuration_id)
    {
        if (($model = ProductTypeConfiguration::findOne($product_type_configuration_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}