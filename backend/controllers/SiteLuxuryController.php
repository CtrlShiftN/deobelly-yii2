<?php

namespace backend\controllers;

use backend\models\SiteLuxury;
use backend\models\SiteLuxurySearch;
use common\components\encrypt\CryptHelper;
use common\components\helpers\StringHelper;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SiteLuxuryController implements the CRUD actions for SiteLuxury model.
 */
class SiteLuxuryController extends Controller
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
                    ]
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
        return true;
    }

    /**
     * Lists all SiteLuxury models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiteLuxurySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            //which rows has been edited?
            $_id = $_POST['editableKey'];
            $_index = $_POST['editableIndex'];
            //which attribute has been edited?
            $attribute = $_POST['editableAttribute'];
            //update to db
            $value = $_POST['SiteLuxury'][$_index][$attribute];
            $result = SiteLuxury::updateAttr($_id, $attribute, $value);
            return json_encode($result);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SiteLuxury model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/site-luxury'))) {
                    mkdir(Yii::getAlias('@common/media/site-luxury'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $slug = trim(StringHelper::toSlug(trim($model->title)));
                $fileName = 'site-luxury/' . $slug . '.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->image = $fileName;
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
        ]);
    }

    /**
     * Creates a new SiteLuxury model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteLuxury();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
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
     * Updates an existing SiteLuxury model.
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
     * Deletes an existing SiteLuxury model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $id = CryptHelper::decryptString($id);
//        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SiteLuxury model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SiteLuxury the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteLuxury::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
