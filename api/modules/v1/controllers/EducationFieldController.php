<?php

namespace api\modules\v1\controllers;

use common\models\EducationField;
use common\models\EducationFieldSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\filters\auth\HttpBearerAuth;
use api\modules\v1\models\ApiResponse;

/**
 * EducationFieldController implements the CRUD actions for EducationField model.
 */
class EducationFieldController extends Controller
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
     * Lists all EducationField models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EducationFieldSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($dataProvider->totalCount > 0)
            return (new ApiResponse)->success($dataProvider->getModels(), ApiResponse::SUCCESSFUL, 'Search result', $dataProvider);
        return (new ApiResponse)->error(null, ApiResponse::NO_CONTENT, 'No result');
    }

    /**
     * Displays a single EducationField model.
     * @param int $id ID
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
     * Creates a new EducationField model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EducationField();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EducationField model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EducationField model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EducationField model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return EducationField the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EducationField::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
