<?php

namespace frontend\controllers;

use common\components\SystemConstant;
use frontend\models\Showroom;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ShowroomController extends \yii\web\Controller
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

    public function actionIndex()
    {
        $getQueryAllPost = Showroom::getAllShowroom();
        $pages = new Pagination(['totalCount' => $getQueryAllPost->count(), 'defaultPageSize' => SystemConstant::SHOWROOM_PER_PAGE]);
        $showrooms = $getQueryAllPost->offset($pages->offset)
            ->limit(SystemConstant::SHOWROOM_PER_PAGE)
            ->all();
        return $this->render('index', [
            'showrooms' => $showrooms,
            'pages' => $pages
        ]);
    }

}
