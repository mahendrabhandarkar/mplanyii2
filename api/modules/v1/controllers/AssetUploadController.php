<?php

namespace api\modules\v1\controllers;

use common\models\AssetUpload;
use common\models\AssetUploadSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\filters\auth\HttpBearerAuth;
use api\modules\v1\models\ApiResponse;

/**
 * AssetUploadController implements the CRUD actions for AssetUpload model.
 */
class AssetUploadController extends Controller
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
     * Lists all AssetUpload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssetUploadSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($dataProvider->totalCount > 0)
            return (new ApiResponse)->success($dataProvider->getModels(), ApiResponse::SUCCESSFUL, 'Search result', $dataProvider);
        return (new ApiResponse)->error(null, ApiResponse::NO_CONTENT, 'No result');
    }

    /**
     * Displays a single AssetUpload model.
     * @param int $layout_id Layout ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($layout_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($layout_id),
        ]);
    }

    /**
     * Creates a new AssetUpload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssetUpload();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'layout_id' => $model->layout_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssetUpload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $layout_id Layout ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($layout_id)
    {
        $model = $this->findModel($layout_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'layout_id' => $model->layout_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssetUpload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $layout_id Layout ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($layout_id)
    {
        $this->findModel($layout_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssetUpload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $layout_id Layout ID
     * @return AssetUpload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($layout_id)
    {
        if (($model = AssetUpload::findOne($layout_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}