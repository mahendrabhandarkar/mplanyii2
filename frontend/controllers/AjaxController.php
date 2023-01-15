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
 * AjaxController implements the CRUD actions for Users model.
 */
class AjaxController extends Controller
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

	public function actionUserMyProfile()
	{
		$id = Yii::$app->user->identity->id;
        $model = Users::findOne($id);
        return $this->renderPartial('user-my-profile', [
            'model' => $model,
        ]);
	}

    public function actionUserMyFamily()
	{
		$id = Yii::$app->user->identity->id;
        $model = Users::findOne($id);
        return $this->renderPartial('user-my-family', [
            'model' => $model,
        ]);
	}

    public function actionUserMyPhoto()
	{
		$id = Yii::$app->user->identity->id;
        $model = Users::findOne($id);
        return $this->renderPartial('user-my-photo', [
            'model' => $model,
        ]);
	}

    public function actionUserContactMe()
	{
		$id = Yii::$app->user->identity->id;
        $model = Users::findOne($id);
        return $this->renderPartial('user-contact-me', [
            'model' => $model,
        ]);
	}

    public function actionUpdateprofilemenu()
	{
		$id = Yii::$app->user->identity->id;
        $model = Users::findOne($id);
        return $this->renderPartial('updateprofilemenu', [
            'model' => $model,
        ]);
	}
}
