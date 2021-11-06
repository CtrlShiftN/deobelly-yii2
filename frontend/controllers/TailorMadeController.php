<?php

namespace frontend\controllers;

use common\components\helpers\StringHelper;
use frontend\models\Post;
use frontend\models\TailorMadeOrderForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

class TailorMadeController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @param \yii\base\Action $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        $this->layout = 'main';
        if (!parent::beforeAction($action)) {
            return false;
        }
        return true; // or false to not run the action
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $latestNews = Post::getLatestPosts(3);
        return $this->render('index', [
            'latestNews' => $latestNews,
        ]);
    }

    public function actionTop()
    {
        $model = new TailorMadeOrderForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/tailor-made'))) {
                    mkdir(Yii::getAlias('@common/media/tailor-made'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'tailor-made/' . date('YmdHis') . '_' . StringHelper::toSlug($model->customer_name) . '_top-measurements.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->body_image = $fileName;
                }
            }
            $model->type = 0;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->user_id = (Yii::$app->user->isGuest) ? null : Yii::$app->user->identity->getId();
            if ($model->save(false)) {
                return $this->redirect(Url::toRoute('tailor-made/'));
            }
        }
        return $this->render('top', [
            'model' => $model,
        ]);
    }

    public function actionPants()
    {
        $model = new TailorMadeOrderForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/tailor-made'))) {
                    mkdir(Yii::getAlias('@common/media/tailor-made'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'tailor-made/' . date('YmdHis') . '_' . StringHelper::toSlug($model->customer_name) . '_pants-measurements.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->body_image = $fileName;
                }
            }
            $model->type = 1;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->user_id = (Yii::$app->user->isGuest) ? null : Yii::$app->user->identity->getId();
            if ($model->save(false)) {
                return $this->redirect(Url::toRoute('tailor-made/'));
            }
        }
        return $this->render('pants', [
            'model' => $model,
        ]);
    }

    public function actionSet()
    {
        $model = new TailorMadeOrderForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                if (!file_exists(Yii::getAlias('@common/media/tailor-made'))) {
                    mkdir(Yii::getAlias('@common/media/tailor-made'), 0777);
                }
                $imageUrl = Yii::getAlias('@common/media');
                $fileName = 'tailor-made/' . date('YmdHis') . '_' . StringHelper::toSlug($model->customer_name) . '_set-measurements.' . $model->file->getExtension();
                $isUploadedFile = $model->file->saveAs($imageUrl . '/' . $fileName);
                if ($isUploadedFile) {
                    $model->body_image = $fileName;
                }
            }
            $model->type = 2;
            $model->created_at = date('Y-m-d H:i:s');
            $model->updated_at = date('Y-m-d H:i:s');
            $model->user_id = (Yii::$app->user->isGuest) ? null : Yii::$app->user->identity->getId();
            if ($model->save(false)) {
                return $this->redirect(Url::toRoute('tailor-made/'));
            }
        }
        return $this->render('set', [
            'model' => $model,
        ]);
    }

}
