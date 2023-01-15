<?php

namespace frontend\controllers;

use common\models\Users;
use common\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use frontend\models\ContactForm;
use common\models\UserProfiles;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param int $id
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

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
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
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
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
	
	public function actionBasicinfo()
	{
		$id = Yii::$app->user->identity->id;
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('basicinfo', [
            'model' => $model,
        ]);
	}

	public function actionBasicinfopartial()
	{
		$id = Yii::$app->user->identity->id;
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->renderPartial('basicinfo', [
            'model' => $model,
        ]);
	}
	
	public function actionUpdateProfile()
	{
		$id = Yii::$app->user->identity->id;
        $user = Users::findOne($id);
        $profile = UserProfiles::find()->where(['user_id' => $id])->one();
        if(!isset($profile) && empty($profile))
        {
            $profile = new UserProfiles;
            $profile->user_id = $id;
        }
        
        if (!isset($user, $profile)) {
            throw new NotFoundHttpException("The user was not found.");
        }
        
        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
				Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                return $this->redirect(['users/update-profile', 'id' => $id]);
            }else{
				Yii::$app->session->setFlash('error', $user->errors." ".$profile->errors);
			}
        }else{
			$user->scenario = 'update';
			$profile->scenario = 'update';
		}
        
        return $this->render('update-profile', [
            'user' => $user,
            'profile' => $profile,
        ]);
	}
	
	public function actionAccountSetting()
	{
		$id = Yii::$app->user->identity->id;
        $user = Users::findOne($id);
        $profile = UserProfiles::find()->where(['user_id' => $id])->one();
        if(!isset($profile) && empty($profile))
        {
            $profile = new UserProfiles;
            $profile->user_id = $id;
        }
        
        if (!isset($user, $profile)) {
            throw new NotFoundHttpException("The user was not found.");
        }
        
        if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post())) {
            $isValid = $user->validate();
            $isValid = $profile->validate() && $isValid;
            if ($isValid) {
                $user->save(false);
                $profile->save(false);
				Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                return $this->redirect(['users/account-setting', 'id' => $id]);
            }else{
                $errorstr = implode(":",array_map("implode",$user->errors));
                $errorstr .= "  ";
                $errorstr .= implode(":",array_map("implode",$profile->errors));
				Yii::$app->session->setFlash('error', $errorstr);
			}
        }else{
			$user->scenario = 'update';
			$profile->scenario = 'update';
		}

        return $this->render('account-setting', [
            'user' => $user,
            'profile' => $profile,
        ]);
	}

    public function actionUpdateProfileBackground()
    {
        return $this->renderAjax('update-profile-background');
    }

    public function actionUpdateProfileBasicinfo()
    {
        $id = Yii::$app->user->identity->id;
        $user = Users::findOne($id);

        if ($user->load(Yii::$app->request->post())) {
            $user->created_at=Yii::$app->formatter->asTimestamp(date('d-m-Y'));
            $user->updated_at=Yii::$app->formatter->asTimestamp(date('d-m-Y'));
            $isValid = $user->validate();
            if ($isValid) {
                $user->save(false);
				Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                return $this->redirect(['users/update-profile', 'type' => 'basicinfo']);
            }else{
                $errorstr = implode(":",array_map("implode",$user->errors));
                $errorstr .= "  ";
				Yii::$app->session->setFlash('error', $errorstr);
			}
        }else{
			$user->scenario = 'update';
            return $this->renderAjax('update-profile-basicinfo', ['model' => $user]);
		}
    }

    public function actionUpdateProfileEducareer()
    {
        return $this->renderAjax('update-profile-educareer');
    }

    public function actionUpdateProfileFamily()
    {
        return $this->renderAjax('update-profile-family');
    }

    public function actionUpdateProfileHobbies()
    {
        return $this->renderAjax('update-profile-hobbies');
    }

    public function actionUpdateProfileImage()
    {
        return $this->renderAjax('update-profile-image');
    }
}
