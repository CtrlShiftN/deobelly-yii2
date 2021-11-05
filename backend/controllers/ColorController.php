<?php

namespace backend\controllers;

use backend\models\Color;
use backend\models\ColorSearch;
use common\components\encrypt\CryptHelper;
use common\components\helpers\StringHelper;
use common\components\SystemConstant;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ColorController implements the CRUD actions for Color model.
 */
class ColorController extends Controller
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
     * Lists all Color models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ColorSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            // which rows has been edited?
            $_id = $_POST['editableKey'];
            $_index = $_POST['editableIndex'];
            // which attribute has been edited?
            $attribute = $_POST['editableAttribute'];
            if ($attribute == 'name') {
                // update to db
                $value = $_POST['Color'][$_index][$attribute];
                $result = Color::updateColorName($_id, $attribute, $value);
                // response to gridview
                return json_encode($result);
            } elseif ($attribute == 'status') {
                // update to db
                $value = $_POST['Color'][$_index][$attribute];
                $result = Color::updateColorStatus($_id, $attribute, $value);
                // response to gridview
                return json_encode($result);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Color model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->findModel($id);
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
            $model->slug = trim(StringHelper::toSlug(trim($model->name)));
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/color'))) {
                    mkdir(Yii::getAlias('@common/media/color'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'color/' . $model->slug . '.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->image = $fileName;
                }
            }
            $model->admin_id = Yii::$app->user->identity->getId();
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->save(false)) {
                Yii::$app->session->setFlash('kv-detail-success', 'Color updated!');
            } else {
                Yii::$app->session->setFlash('kv-detail-warning', $model->status);
            }
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Color model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Color();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->slug = trim(StringHelper::toSlug(trim($model->name)));
                if ($model->file) {
                    if (!file_exists(Yii::getAlias('@common/media/color'))) {
                        mkdir(Yii::getAlias('@common/media/color'), 0777);
                    }
                    $imageUrl = Yii::getAlias('@common/media');
                    $fileName = 'color/' . $model->slug . '.' . $model->file->getExtension();
                    $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                    if ($isUploadedFile) {
                        $model->image = $fileName;
                    }
                }
                $model->created_at = date('Y-m-d H:m:s');
                $model->updated_at = date('Y-m-d H:m:s');
                $model->status = SystemConstant::STATUS_ACTIVE;
                $model->admin_id = \Yii::$app->user->identity->getId();
                if ($model->save(false)) {
                    return $this->redirect(Url::toRoute('color/'));
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Color model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->slug = trim(StringHelper::toSlug(trim($model->name)));
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/color'))) {
                    mkdir(Yii::getAlias('@common/media/color'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'color/' . $model->slug . '.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->image = $fileName;
                }
            }
            $model->admin_id = Yii::$app->user->identity->getId();
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->save(false)) {
                return $this->redirect(Url::toRoute('color/'));
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Color model.
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
     * Finds the Color model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Color the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Color::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
