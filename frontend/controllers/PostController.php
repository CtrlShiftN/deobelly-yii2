<?php

namespace frontend\controllers;

use common\components\helpers\ParamHelper;
use common\components\SystemConstant;
use frontend\models\Post;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class PostController extends \yii\web\Controller
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
                        'roles' => ['?','@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
        $postTag = ParamHelper::getParamValue('post_tag');
        $postCategory = ParamHelper::getParamValue('post_category');

        $getQueryAllPost = Post::getAllPosts($postTag,$postCategory);
        $pages = new Pagination(['totalCount' => $getQueryAllPost->count(), 'defaultPageSize' => SystemConstant::POST_PER_PAGE]);
        $posts = $getQueryAllPost->offset($pages->offset)
            ->limit( SystemConstant::POST_PER_PAGE)
            ->all();


        $outstandingPosts = Post::getOutstandingPosts();
        return $this->render('index', [
            'posts' => $posts,
            'pages' => $pages,
            'outstandingPosts' => $outstandingPosts,
        ]);
    }

}
