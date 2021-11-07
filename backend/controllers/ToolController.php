<?php

namespace backend\controllers;

use backend\models\Slider;
use backend\models\SliderSearch;
use common\components\encrypt\CryptHelper;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ToolController extends \yii\web\Controller
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
                        'delete-slider' => ['POST', 'GET'],
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
     * @return string
     */
    public function actionSlider()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $arrSiteIndex = $this->getSliderSiteIndex();
        if (Yii::$app->request->post('hasEditable')) {
            // which rows has been edited?
            $_id = $_POST['editableKey'];
            $_index = $_POST['editableIndex'];
            // which attribute has been edited?
            $attribute = $_POST['editableAttribute'];
            // update to db
            $value = $_POST['Slider'][$_index][$attribute];
            $result = Slider::updateSlider($_id, $attribute, $value);
            // response to gridview
            return json_encode($result);
        }
        return $this->render('slider', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'siteIndex' => $arrSiteIndex,
        ]);
    }

    public function actionViewSlider($id)
    {
        $id = CryptHelper::decryptString($id);
        $model = $this->actionFindSlider($id);
        $arrSiteIndex = $this->getSliderSiteIndex();
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
            if ($model->file) {
                $fileName = 'slider/' . date('YmdHis') . '.' . $model->file->getExtension();
                if (!file_exists(Yii::getAlias('@common/media/slider'))) {
                    mkdir(Yii::getAlias('@common/media/slider'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->link = $fileName;
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
        return $this->render('view_slider', [
            'model' => $model,
            'siteIndex' => $arrSiteIndex
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteSlider($id)
    {
        $id = CryptHelper::decryptString($id);
        $this->actionFindSlider($id)->delete();

        return $this->redirect(['slider']);
    }

    public function actionCreateSlide()
    {
        $model = new Slider();
        $model->scenario = 'create';
        $arrSiteIndex = $this->getSliderSiteIndex();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file) {
                    $fileName = 'slider/' . date('YmdHis') . '.' . $model->file->getExtension();
                    if (!file_exists(Yii::getAlias('@common/media/slider'))) {
                        mkdir(Yii::getAlias('@common/media/slider'), 0777);
                    }
                    $imageUrl = Yii::getAlias('@common/media');
                    $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                    if ($isUploadedFile) {
                        $model->link = $fileName;
                    }
                }
                $model->admin_id = Yii::$app->user->identity->getId();
                $model->created_at = date('Y-m-d H:i:s');
                $model->updated_at = date('Y-m-d H:i:s');
                if ($model->save(false)) {
                    return $this->redirect(Url::toRoute('tool/slider'));
                }
            }
        }
        return $this->render('create_slide', [
            'model' => $model,
            'siteIndex' => $arrSiteIndex
        ]);
    }

    private function getSliderSiteIndex()
    {
        return ['index' => Yii::t('app', 'Homepage'), 'our-stories' => Yii::t('app', 'Introduction')];
    }

    /**
     * @param $id
     * @return Slider|null
     * @throws NotFoundHttpException
     */
    public function actionFindSlider($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
