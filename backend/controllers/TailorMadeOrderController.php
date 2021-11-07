<?php

namespace backend\controllers;

use backend\models\TailorMadeOrder;
use backend\models\TailorMadeOrderSearch;
use backend\models\User;
use common\components\encrypt\CryptHelper;
use common\components\helpers\StringHelper;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TailorMadeOrderController implements the CRUD actions for TailorMadeOrder model.
 */
class TailorMadeOrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ]
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST', 'GET'],
                    ],
                ],
            ]
        );
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->layout = 'adminlte3';
        if (!parent::beforeAction($action)) {
            return false;
        }
        return true; // or false to not run the action
    }

    /**
     * Lists all TailorMadeOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TailorMadeOrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $arrUser = User::getAllUser();
        $arrType = \common\models\TailorMadeOrder::getOrderType();
        if (Yii::$app->request->post('hasEditable')) {
            // which rows has been edited?
            $_id = $_POST['editableKey'];
            $_index = $_POST['editableIndex'];
            // which attribute has been edited?
            $attribute = $_POST['editableAttribute'];
            $value = $_POST['TailorMadeOrder'][$_index][$attribute];
            $result = TailorMadeOrder::updateAttribute($_id, $attribute, $value);
            // response to gridview
            return json_encode($result);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'users' => ArrayHelper::map($arrUser, 'id', 'name'),
            'types' => $arrType
        ]);
    }

    /**
     * Displays a single TailorMadeOrder model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->findModel($id);
        $arrCustomer = User::getAllUser();
        $arrType = \common\models\TailorMadeOrder::getOrderType();
        $post = Yii::$app->request->post();
        // process ajax delete
        if (Yii::$app->request->isAjax && isset($post['kvdelete'])) {
            echo Json::encode([
                'success' => true,
                'messages' => [
                    'kv-detail-info' => Yii::t('app', 'Delete successfully!')
                ]
            ]);
            return;
        }
        // return messages on update of record
        if ($model->load($post)) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $slug = trim(StringHelper::toSlug(trim($model->customer_name)));
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/tailor-made'))) {
                    mkdir(Yii::getAlias('@common/media/tailor-made'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'tailor-made/' . date('YmdHis') . '_' . $slug . trim($model->customer_email) . '.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->body_image = $fileName;
                }
            }
            $model->admin_id = Yii::$app->user->identity->getId();
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->save(false)) {
                Yii::$app->session->setFlash('kv-detail-success', 'Cập nhật thành công!');
            } else {
                Yii::$app->session->setFlash('kv-detail-warning', 'Không thể cập nhật!');
            }
        }
        return $this->render('view', [
            'model' => $model,
            'users' => ArrayHelper::map($arrCustomer, 'id', 'name'),
            'types' => $arrType
        ]);
    }

    /**
     * Creates a new TailorMadeOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TailorMadeOrder();
        $model->scenario = 'create';
        $arrType = TailorMadeOrder::getOrderType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $slug = trim(StringHelper::toSlug(trim($model->customer_name)));
                if ($model->file) {
                    if (!file_exists(Yii::getAlias('@common/media/tailor-made'))) {
                        mkdir(Yii::getAlias('@common/media/tailor-made'), 0777);
                    }
                    $imageUrl = Yii::getAlias('@common/media');
                    $fileName = 'tailor-made/' . date('YmdHis') . '_' . $slug . trim($model->customer_email) . '.' . $model->file->getExtension();
                    $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                    if ($isUploadedFile) {
                        $model->body_image = $fileName;
                    }
                }
                $model->admin_id = Yii::$app->user->identity->getId();
                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');
                if ($model->save(false)) {
                    return $this->redirect(Url::toRoute('tailor-made-order/'));
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'arrTypes' => $arrType
        ]);
    }

    /**
     * Updates an existing TailorMadeOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->findModel($id);
        $arrTypes = TailorMadeOrder::getOrderType();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $slug = trim(StringHelper::toSlug(trim($model->customer_name)));
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/tailor-made'))) {
                    mkdir(Yii::getAlias('@common/media/tailor-made'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'tailor-made/' . date('YmdHis') . '_' . $slug . trim($model->customer_email) . '.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->body_image = $fileName;
                }
            }
            $model->admin_id = Yii::$app->user->identity->getId();
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->save(false)) {
                return $this->redirect(Url::toRoute('tailor-made-order/'));
            }
        }

        return $this->render('update', [
            'model' => $model,
            'arrTypes' => $arrTypes
        ]);
    }

    /**
     * Deletes an existing TailorMadeOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $id = CryptHelper::decryptString($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TailorMadeOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TailorMadeOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TailorMadeOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
