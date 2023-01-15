<?php

namespace api\modules\v1\controllers;

use common\models\ApiConfiguration;
use common\models\ApiConfigurationSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\filters\auth\HttpBearerAuth;
use api\modules\v1\models\ApiResponse;

/**
 * ApiConfigurationController implements the CRUD actions for ApiConfiguration model.
 */
class ApiConfigurationController extends Controller
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
						'getConfig'   => ['GET'],
						'create' => ['GET', 'POST'],
						'update' => ['GET', 'PUT', 'POST'],
						'delete' => ['POST', 'DELETE'],
					],
				],
            ]
        );
    }

    /**
     * Lists all ApiConfiguration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApiConfigurationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($dataProvider->totalCount > 0)
            return (new ApiResponse)->success($dataProvider->getModels(), ApiResponse::SUCCESSFUL, 'Search result', $dataProvider);
        return (new ApiResponse)->error(null, ApiResponse::NO_CONTENT, 'No result');
    }

    /**
     * Displays a single ApiConfiguration model.
     * @param int $api_configuration_id Api Configuration ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($api_configuration_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($api_configuration_id),
        ]);
    }

    /**
     * Creates a new ApiConfiguration model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ApiConfiguration();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'api_configuration_id' => $model->api_configuration_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ApiConfiguration model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $api_configuration_id Api Configuration ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($api_configuration_id)
    {
        $model = $this->findModel($api_configuration_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'api_configuration_id' => $model->api_configuration_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ApiConfiguration model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $api_configuration_id Api Configuration ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($api_configuration_id)
    {
        $this->findModel($api_configuration_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ApiConfiguration model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $api_configuration_id Api Configuration ID
     * @return ApiConfiguration the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($api_configuration_id)
    {
        if (($model = ApiConfiguration::findOne($api_configuration_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}