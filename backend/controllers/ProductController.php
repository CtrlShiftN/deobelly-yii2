<?php

namespace backend\controllers;

use backend\models\Color;
use backend\models\Product;
use backend\models\ProductAssoc;
use backend\models\ProductCategory;
use backend\models\ProductSearch;
use backend\models\ProductType;
use backend\models\Size;
use backend\models\Trademark;
use common\components\encrypt\CryptHelper;
use common\components\helpers\StringHelper;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if (Yii::$app->request->post('hasEditable')) {
            // which rows has been edited?
            $_id = $_POST['editableKey'];
            $_index = $_POST['editableIndex'];
            // which attribute has been edited?
            $attribute = $_POST['editableAttribute'];
            if ($attribute == 'name') {
                // update to db
                $value = $_POST['Product'][$_index][$attribute];
                $result = Product::updateProductTitle($_id, $attribute, $value);
                // response to gridview
                return json_encode($result);
            } elseif ($attribute == 'status' || $attribute == 'SKU') {
                // update to db
                $value = $_POST['Product'][$_index][$attribute];
                $result = Product::updateProductAttr($_id, $attribute, $value);
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
     * Displays a single Product model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = CryptHelper::decryptString($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $assocModel = new ProductAssoc();
        $arrColor = Color::getAllColor();
        $arrSize = Size::getAllSize();
        $arrTrademark = Trademark::getAllTrademark();
        $arrType = ProductType::getAllTypes();
        $arrCate = ProductCategory::getAllProductCategory();
        $arrProduct = Product::getAllProduct();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->files = UploadedFile::getInstances($model, 'files');
                $imageUrl = Yii::$app->params['common'].'/media';
                $arrImages = [];
                $model->slug = StringHelper::toSlug($model->name);
                $model->selling_price = ($model->sale_price > $model->regular_price) ? $model->regular_price : $model->sale_price;
                $model->related_product = implode(",", $model->relatedProduct);
                $model->image = 'product/' . implode("-", $model->type) . '_' . $model->category . '_' . $model->slug . '.' . $model->file->getExtension();
                $model->admin_id = Yii::$app->user->identity->getId();
                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');
                $model->fake_sold = rand(201, 996);
                $model->file->saveAs($imageUrl . '/' . $model->image);
                if ($model->files) {
                    $count = 1;
                    foreach ($model->files as $key => $file) {
                        $imagePath = 'product/' . implode("-", $model->type) . '_' . $model->category . '_' . $model->slug . '_' . $count . '.' . $file->getExtension();
                        $arrImages[$key] = $imagePath;
                        $file->saveAs($imageUrl . '/' . $imagePath);
                        $count++;
                    }
                }
                $model->images = implode(",", $arrImages);
                $typeStr = implode(",", $model->type);
                $cateStr = $model->category;
                $colorStr = implode(",", $model->color);
                $sizeStr = implode(",", $model->size);
                if ($model->save(false)) {
                    $assocModel->product_id = $model->id;
                    $assocModel->type_id = $typeStr;
                    $assocModel->category_id = $cateStr;
                    $assocModel->color_id = $colorStr;
                    $assocModel->size_id = $sizeStr;
                    $assocModel->admin_id = Yii::$app->user->identity->getId();
                    $assocModel->created_at = date('Y-m-d H:i:s');
                    $assocModel->updated_at = date('Y-m-d H:i:s');
                    if ($assocModel->save(false)) {
                        return $this->redirect(Url::toRoute('product/'));
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'color' => $arrColor,
            'size' => $arrSize,
            'trademark' => $arrTrademark,
            'type' => $arrType,
            'productCate' => $arrCate,
            'products' => $arrProduct
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
