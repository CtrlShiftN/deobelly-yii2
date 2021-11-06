<?php

namespace backend\controllers;

use backend\models\MixAndMatch;
use backend\models\MixAndMatchSearch;
use backend\models\Product;
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
 * MixAndMatchController implements the CRUD actions for MixAndMatch model.
 */
class MixAndMatchController extends Controller
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
     * Lists all MixAndMatch models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MixAndMatchSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            // which rows has been edited?
            $_id = $_POST['editableKey'];
            $_index = $_POST['editableIndex'];
            // which attribute has been edited?
            $attribute = $_POST['editableAttribute'];
            $value = $_POST['MixAndMatch'][$_index][$attribute];
            if ($attribute == 'title') {
                $result = MixAndMatch::updateTitle($_id, $attribute, $value);
                return json_encode($result);
            } elseif ($attribute == 'status') {
                $result = MixAndMatch::updateAttr($_id, $attribute, $value);
                return json_encode($result);
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MixAndMatch model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->findModel($id);
        $arrProduct = Product::getAllProduct();
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
            $model->slug = trim(StringHelper::toSlug(trim($model->title)));
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/mix-and-match'))) {
                    mkdir(Yii::getAlias('@common/media/mix-and-match'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'mix-and-match/' . $model->slug . '.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->image = $fileName;
                }
            }
            if (!empty($model->mixProduct)) {
                $model->mixed_product_id = implode(",", $model->mixProduct);
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
            'products' => ArrayHelper::map($arrProduct, 'id', 'name'),
        ]);
    }

    /**
     * Creates a new MixAndMatch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MixAndMatch();
        $model->scenario = 'create';
        $arrProduct = Product::getAllProduct();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->slug = trim(StringHelper::toSlug(trim($model->title)));
                if ($model->file) {
                    if (!file_exists(Yii::getAlias('@common/media/mix-and-match'))) {
                        mkdir(Yii::getAlias('@common/media/mix-and-match'), 0777);
                    }
                    $imageUrl = Yii::getAlias('@common/media');
                    $fileName = 'mix-and-match/' . $model->slug . '.' . $model->file->getExtension();
                    $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                    if ($isUploadedFile) {
                        $model->image = $fileName;
                    }
                }
                if (!empty($model->mixProduct)) {
                    $model->mixed_product_id = implode(",", $model->mixProduct);
                }
                $model->admin_id = Yii::$app->user->identity->getId();
                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');
                if ($model->save(false)) {
                    return $this->redirect(Url::toRoute('mix-and-match/'));
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'products' => ArrayHelper::map($arrProduct, 'id', 'name'),
        ]);
    }

    /**
     * Updates an existing MixAndMatch model.
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
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MixAndMatch model.
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
     * Finds the MixAndMatch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MixAndMatch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MixAndMatch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
