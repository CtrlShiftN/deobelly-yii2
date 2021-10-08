<?php

namespace backend\controllers;

use backend\models\ProductType;
use backend\models\ProductTypeSearch;
use common\components\helpers\StringHelper;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductTypeController implements the CRUD actions for ProductType model.
 */
class ProductTypeController extends Controller
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
     * Lists all ProductType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            // which rows has been edited?
            $_id = $_POST['editableKey'];
            $_index = $_POST['editableIndex'];
            // which attribute has been edited?
            $attribute = $_POST['editableAttribute'];
            // update to db
            $value = $_POST['ProductType'][$_index][$attribute];
            $result = ProductType::updateProductType($_id, $attribute, $value);
            // response to gridview
            return json_encode($result);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new ProductType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->slug = trim(StringHelper::toSlug(trim($model->name)));
                // TODO Change server save files to common/media
                $fileName = $model->slug . '.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $fileName);
                if ($isUploadedFile) {
                    $model->image = '/uploads/' . $fileName;
                    $model->admin_id = Yii::$app->user->identity->getId();
                    $model->created_at = date('Y-m-d H:i:s');
                    $model->updated_at = date('Y-m-d H:i:s');
                    if ($model->save(false)) {
                        return $this->redirect(Url::toRoute('product-type/'));
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductType model.
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
     * Deletes an existing ProductType model.
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
     * Finds the ProductType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ProductType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
