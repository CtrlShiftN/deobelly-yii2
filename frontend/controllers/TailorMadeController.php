<?php

namespace frontend\controllers;

use frontend\models\Post;
use frontend\models\TailorMadeOrderForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

        }
        return $this->render('top', [
            'model' => $model,
        ]);
    }

}
