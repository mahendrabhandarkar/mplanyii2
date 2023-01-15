<?php

namespace frontend\controllers;

use common\models\PartnerBackground;
use common\models\PartnerBasic;
use common\models\PartnerBasicSearch;
use common\models\PartnerEdu;
use common\models\PartnerLifestyle;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\data\ActiveDataProvider;
use frontend\models\ContactForm;

/**
 * PartnerController implements the CRUD actions for PartnerBasic model.
 */
class PartnerController extends Controller
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
     * Lists all PartnerBasic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PartnerBasicSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PartnerBasic model.
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
     * Creates a new PartnerBasic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PartnerBasic();

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
     * Updates an existing PartnerBasic model.
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
     * Deletes an existing PartnerBasic model.
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
     * Finds the PartnerBasic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PartnerBasic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PartnerBasic::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
	
	public function actionBasicinfo()
	{
		$id = Yii::$app->user->identity->id;
        $user = PartnerBasic::find()->where(['user_id' => $id])->one();
        $profile = PartnerEdu::find()->where(['user_id' => $id])->one();
        if(!isset($profile) && empty($profile))
        {
            $profile = new PartnerEdu;
            $profile->user_id = $id;
        }

        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
				Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                return $this->redirect(['partner/basicinfo', 'id' => $id]);
            }else{
				Yii::$app->session->setFlash('error', $user->errors." ".$profile->errors);
			}
        }else{
			$user->scenario = 'update';
			$profile->scenario = 'update';
		}

        return $this->render('basicinfo', [
            'user' => $user,
            'profile' => $profile,
        ]);
	}

	public function actionEducation()
	{
		$id = Yii::$app->user->identity->id;
        $user = PartnerEdu::find()->where(['user_id' => $id])->one();
        $profile = PartnerLifestyle::find()->where(['user_id' => $id])->one();
        if(!isset($profile) && empty($profile))
        {
            $profile = new PartnerEdu;
            $profile->user_id = $id;
        }
        
        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
				Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                return $this->redirect(['partner/education', 'id' => $id]);
            }else{
				Yii::$app->session->setFlash('error', $user->errors." ".$profile->errors);
			}
        }else{
			$user->scenario = 'update';
			$profile->scenario = 'update';
		}

        return $this->render('education', [
            'model' => $user,
            'profile' => $profile,
        ]);
	}
	
	public function actionBackground()
	{
		$id = Yii::$app->user->identity->id;
        $model = PartnerBackground::find()->where(['user_id' => $id])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save(true)) {
            //    $model->sendEmail(Yii::$app->params['adminEmail']);
                Yii::$app->session->setFlash('success', 'Thank you for submitting partner background.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error submitting partner background.');
            }

            return $this->refresh();
        }

        return $this->render('background', [
            'model' => $model,
        ]);
	}

	public function actionMatches()
	{
		$id = Yii::$app->user->identity->id;
        $searchModel = PartnerBasic::find()->alias('pb')->where(['pb.user_id' => $id]);
        $model = new PartnerBasicSearch;
        // add conditions that should always apply here
        $searchModel->joinWith(['partnerEdu']);
        $searchModel->joinWith(['partnerLifestyle']);
        $searchModel->joinWith(['partnerBackground']);

        $dataProvider = new ActiveDataProvider([
            'query' => $searchModel,
        ]);

        $model->load(Yii::$app->request->bodyParams);
/*
        // grid filtering conditions
        $searchModel->andFilterWhere([
            'product_id' => $this->product_id,
            'product_region' => $this->product_region,
            'product_created' => $this->product_created,
            'product_lastchecked' => $this->product_lastchecked,
            'sdsref_id' => $this->sdsref_id,

        ]);

        $searchModel->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like','product_id', $this->product_id])
            ->orFilterWhere(['like', 'product_catalog', $this->code])
            ->andFilterWhere(['=', 'product_aka', $this->product_aka])
            ->orFilterWhere(['like', 'internal_code' , $this->code]);
*/
        return $this->render('matches', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $model,
        ]);
	}

	public function actionDesiredPartner()
	{
		$id = Yii::$app->user->identity->id;
        $searchModel = PartnerBasic::find()->alias('pb');
        $model = new PartnerBasicSearch;
        // add conditions that should always apply here
        $searchModel->joinWith(['partnerEdu']);
        $searchModel->joinWith(['partnerLifestyle']);
        $searchModel->joinWith(['partnerBackground']);

        $dataProvider = new ActiveDataProvider([
            'query' => $searchModel,
        ]);

        $model->load(Yii::$app->request->bodyParams);
/*
        // grid filtering conditions
        $searchModel->andFilterWhere([
            'product_id' => $this->product_id,
            'product_region' => $this->product_region,
            'product_created' => $this->product_created,
            'product_lastchecked' => $this->product_lastchecked,
            'sdsref_id' => $this->sdsref_id,

        ]);

        $searchModel->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like','product_id', $this->product_id])
            ->orFilterWhere(['like', 'product_catalog', $this->code])
            ->andFilterWhere(['=', 'product_aka', $this->product_aka])
            ->orFilterWhere(['like', 'internal_code' , $this->code]);
*/
        return $this->render('desired-partner', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $model,
        ]);
	}
}
