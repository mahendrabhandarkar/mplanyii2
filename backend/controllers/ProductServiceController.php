<?php

namespace backend\controllers;

use common\models\ProductService;
use common\models\ProductServiceSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\base\Model;
use common\models\ProductConfiguration;
use common\models\ProductMaster;
use yii\base\Exception;
/**
 * ProductServiceController implements the CRUD actions for ProductService model.
 */
class ProductServiceController extends Controller
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
     * Lists all ProductService models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductServiceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductService model.
     * @param int $product_service_id Product Service ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_service_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($product_service_id),
        ]);
    }

    /**
     * Creates a new ProductService model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate_O()
    {
        $model = new ProductService();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'product_service_id' => $model->product_service_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductService model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $product_service_id Product Service ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate_O($product_service_id)
    {
        $model = $this->findModel($product_service_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_service_id' => $model->product_service_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductService model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $product_service_id Product Service ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete_O($product_service_id)
    {
        $this->findModel($product_service_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductService model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $product_service_id Product Service ID
     * @return ProductService the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_service_id)
    {
        if (($model = ProductService::findOne($product_service_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionDesign_O($product_service_id)
    {
        $model = $this->findModel($product_service_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'product_service_id' => $model->product_service_id]);
        }

        return $this->render('design', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Person model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate_N()
    {
        $modelPerson = new ProductService;
        $modelsHouse = [new ProductConfiguration()];
        $modelsRoom = [[new ProductMaster()]];

        if ($modelPerson->load(Yii::$app->request->post())) {

        //    $modelsHouse = Model::createMultiple(ProductConfiguration::classname());
            Model::loadMultiple([$modelsHouse, $modelPerson,$modelsRoom ], Yii::$app->request->post());

            // validate person and houses models
            $valid = $modelPerson->validate();
            $valid = Model::validateMultiple([$modelsHouse, $modelPerson,$modelsRoom ]) && $valid;

            if (isset($_POST['Room'][0][0])) {
                foreach ($_POST['Room'] as $indexHouse => $rooms) {
                    foreach ($rooms as $indexRoom => $room) {
                        $data['Room'] = $room;
                        $modelRoom = new ProductMaster;
                        $modelRoom->load($data);
                        $modelsRoom[$indexHouse][$indexRoom] = $modelRoom;
                        $valid = $modelRoom->validate();
                    }
                }
            }

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPerson->save(false)) {
                        foreach ($modelsHouse as $indexHouse => $modelHouse) {

                            if ($flag === false) {
                                break;
                            }

                            $modelHouse->person_id = $modelPerson->id;

                            if (!($flag = $modelHouse->save(false))) {
                                break;
                            }

                            if (isset($modelsRoom[$indexHouse]) && is_array($modelsRoom[$indexHouse])) {
                                foreach ($modelsRoom[$indexHouse] as $indexRoom => $modelRoom) {
                                    $modelRoom->product_id = $modelHouse->product_id;
                                    if (!($flag = $modelRoom->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelPerson->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'model' => $modelPerson,
            'modelsHouse' => (empty($modelsHouse)) ? [new ProductConfiguration] : $modelsHouse,
            'modelsRoom' => (empty($modelsRoom)) ? [[new ProductMaster]] : $modelsRoom,
        ]);
    }

    /**
     * Updates an existing Person model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate_N($product_service_id)
    {
        $modelPerson = $this->findModel($product_service_id);
        $modelsHouse = $modelPerson->houses;
        $modelsRoom = [];
        $oldRooms = [];

        if (!empty($modelsHouse)) {
            foreach ($modelsHouse as $indexHouse => $modelHouse) {
                $rooms = $modelHouse->rooms;
                $modelsRoom[$indexHouse] = $rooms;
                $oldRooms = ArrayHelper::merge(ArrayHelper::index($rooms, 'id'), $oldRooms);
            }
        }

        if ($modelPerson->load(Yii::$app->request->post())) {

            // reset
            $modelsRoom = [];

            $oldHouseIDs = ArrayHelper::map($modelsHouse, 'id', 'id');
        //    $modelsHouse = Model::createMultiple(House::classname(), $modelsHouse);
            Model::loadMultiple([$modelsHouse, $modelPerson,$modelsRoom ], Yii::$app->request->post());
            $deletedHouseIDs = array_diff($oldHouseIDs, array_filter(ArrayHelper::map($modelsHouse, 'id', 'id')));

            // validate person and houses models
            $valid = $modelPerson->validate();
            $valid = Model::validateMultiple([$modelsHouse, $modelPerson,$modelsRoom ]) && $valid;

            $roomsIDs = [];
            if (isset($_POST['Room'][0][0])) {
                foreach ($_POST['Room'] as $indexHouse => $rooms) {
                    $roomsIDs = ArrayHelper::merge($roomsIDs, array_filter(ArrayHelper::getColumn($rooms, 'id')));
                    foreach ($rooms as $indexRoom => $room) {
                        $data['Room'] = $room;
                        $modelRoom = (isset($room['id']) && isset($oldRooms[$room['id']])) ? $oldRooms[$room['id']] : new ProductMaster;
                        $modelRoom->load($data);
                        $modelsRoom[$indexHouse][$indexRoom] = $modelRoom;
                        $valid = $modelRoom->validate();
                    }
                }
            }

            $oldRoomsIDs = ArrayHelper::getColumn($oldRooms, 'id');
            $deletedRoomsIDs = array_diff($oldRoomsIDs, $roomsIDs);

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPerson->save(false)) {

                        if (! empty($deletedRoomsIDs)) {
                            ProductMaster::deleteAll(['id' => $deletedRoomsIDs]);
                        }

                        if (! empty($deletedHouseIDs)) {
                            ProductConfiguration::deleteAll(['id' => $deletedHouseIDs]);
                        }

                        foreach ($modelsHouse as $indexHouse => $modelHouse) {

                            if ($flag === false) {
                                break;
                            }

                            $modelHouse->person_id = $modelPerson->id;

                            if (!($flag = $modelHouse->save(false))) {
                                break;
                            }

                            if (isset($modelsRoom[$indexHouse]) && is_array($modelsRoom[$indexHouse])) {
                                foreach ($modelsRoom[$indexHouse] as $indexRoom => $modelRoom) {
                                    $modelRoom->house_id = $modelHouse->id;
                                    if (!($flag = $modelRoom->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelPerson->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelPerson' => $modelPerson,
            'modelsHouse' => (empty($modelsHouse)) ? [new ProductConfiguration] : $modelsHouse,
            'modelsRoom' => (empty($modelsRoom)) ? [[new ProductMaster]] : $modelsRoom
        ]);
    }

    /**
     * Deletes an existing Person model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete_N($id)
    {
        $model = $this->findModel($id);
        $name = $model->first_name;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    }

     /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelCustomer = new ProductService();
        $modelsAddress = [new ProductConfiguration()];
        $settings = [];

        if ($modelCustomer->load(Yii::$app->request->post())) {
            // $count = count($this->request->post($productConfiguration->tableName()));
            // for ($i = 0; $i < $count; $i++) {
            //     $settings[$i] = new Setting();
            // }
        //    $modelsAddress = Model::createMultiple(Address::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());

            // validate all models
            $valid = $modelCustomer->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $modelCustomer->save(false)) {
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->product_service_id = $modelCustomer->product_service_id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'product_service_id' => $modelCustomer->product_service_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        $settings[] = new ProductConfiguration();
        return $this->render('create', [
            'model' => $modelCustomer,
            'modelsAddress' => (empty($settings)) ? [new ProductConfiguration()] : $settings
        ]);
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($product_service_id)
    {
        $modelCustomer = $this->findModel($product_service_id);
        $modelsAddress = $modelCustomer->productConfigurations;

        if ($modelCustomer->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsAddress, 'product_service_id', 'product_service_id');
        //    $modelsAddress = Model::createMultiple(Address::classname(), $modelsAddress);
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAddress, 'product_service_id', 'product_service_id')));

            // validate all models
            $valid = $modelCustomer->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelCustomer->save(false)) {
                        if (!empty($deletedIDs)) {
                            ProductConfiguration::deleteAll(['product_service_id' => $deletedIDs]);
                        }
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->product_service_id = $modelCustomer->product_service_id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'product_service_id' => $modelCustomer->product_service_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $modelCustomer,
            'modelsAddress' => (empty($modelsAddress)) ? [new ProductConfiguration()] : $modelsAddress
        ]);
    }

    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($product_service_id)
    {
        $model = $this->findModel($product_service_id);
        $name = $model->service_name;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Service  <strong>"' . $name . '"</strong> deleted successfully.');
        }

        return $this->redirect(['index']);
    }

    public function actionDesign($product_service_id)
    {
        $model = $this->findModel($product_service_id);
        $modelsAddress = $model->productConfigurations;
        return $this->render('design', [
            'model' => $this->findModel($product_service_id),
            'modelProductConfig' => (empty($modelsAddress)) ? [new ProductConfiguration()] : $modelsAddress
        ]);
    }
}