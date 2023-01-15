<?php

namespace backend\controllers;

use common\models\FormMaster;
use common\models\FormMasterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * FormMasterController implements the CRUD actions for FormMaster model.
 */
class FormMasterController extends Controller
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
     * Lists all FormMaster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormMasterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormMaster model.
     * @param int $form_id Form ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($form_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($form_id),
        ]);
    }

    /**
     * Creates a new FormMaster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FormMaster();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'form_id' => $model->form_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FormMaster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $form_id Form ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($form_id)
    {
        $model = $this->findModel($form_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'form_id' => $model->form_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FormMaster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $form_id Form ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($form_id)
    {
        $this->findModel($form_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FormMaster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $form_id Form ID
     * @return FormMaster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($form_id)
    {
        if (($model = FormMaster::findOne($form_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}