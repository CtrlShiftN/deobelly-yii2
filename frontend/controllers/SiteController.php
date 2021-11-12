<?php

namespace frontend\controllers;

use common\components\mail\MailServer;
use common\components\SystemConstant;
use frontend\models\Post;
use frontend\models\Product;
use frontend\models\ProductType;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\SiteCasual;
use frontend\models\SiteContact;
use frontend\models\SiteIndex;
use frontend\models\SiteLuxury;
use frontend\models\SiteOurStories;
use frontend\models\Slider;
use frontend\models\TermsAndServices;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'blank';
        $type = array_values(ProductType::getCasualProductType());
        $slider = Slider::getSliderFromSite('index');
        $siteContent = SiteIndex::find()->where(['status' => SystemConstant::STATUS_ACTIVE])->asArray()->all();
        return $this->render('index3', [
            'type' => $type,
            'slider' => $slider,
            'siteContent' => ArrayHelper::index($siteContent, null, 'section')
        ]);
    }

    public function actionIndexDe()
    {
        $type = array_values(ProductType::getCasualProductType());
        $slider = Slider::getSliderFromSite('index');
        $siteContent = SiteIndex::find()->where(['status' => SystemConstant::STATUS_ACTIVE])->asArray()->all();
        return $this->render('index', [
            'type' => $type,
            'slider' => $slider,
            'siteContent' => ArrayHelper::index($siteContent, null, 'section')
        ]);
    }

    /**
     * Displays luxury homepage.
     *
     * @return mixed
     */
    public function actionLuxury()
    {
        $featuredProduct = Product::getFeaturedProduct();
        $newProduct = Product::getLatestProduct();
        $latestNews = Post::getLatestPosts(3);
        $slider = Slider::getSliderFromSite('luxury');
        $siteContent = SiteLuxury::find()->where(['status' => SystemConstant::STATUS_ACTIVE])->asArray()->all();
        return $this->render('luxury', [
            'slider' => $slider,
            'featuredProducts' => $featuredProduct,
            'newProducts' => $newProduct,
            'latestNews' => $latestNews,
            'siteContent' => ArrayHelper::index($siteContent, 'id')
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionCasual()
    {
        $type = array_values(ProductType::getCasualProductType());
        $slider = Slider::getSliderFromSite('casual');
        $siteContent = SiteCasual::find()->where(['status' => SystemConstant::STATUS_ACTIVE])->asArray()->all();
        return $this->render('casual', [
            'type' => $type,
            'slider' => $slider,
            'siteContent' => ArrayHelper::index($siteContent, null, 'section')
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'blank';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $url = !empty($_REQUEST['ref']) ? $_REQUEST['ref'] : '/';
            return $this->redirect($url);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $url = !empty($_REQUEST['ref']) ? $_REQUEST['ref'] : '/';
        if ($url != '/frontend/web/cart/index' || $url != '/frontend/web/cart') {
            return $this->redirect($url);
        } else {
            return $this->redirect('/');
        }
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $content = SiteContact::getContactContent();
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveContactData()) {
                Yii::$app->session->setFlash('contactSuccess', 'Thank you for your feedback. We will reply to you soon.');
            } else {
                Yii::$app->session->setFlash('contactError', 'Unable to submit a response. Please try again.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
            'content' => $content,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = 'blank';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('signupSuccess', 'Thank you for registration!');
            return $this->actionLogin();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'blank';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('requestSuccess', Yii::t('app', 'Check your email.'));
                return $this->refresh();
            }

            Yii::$app->session->setFlash('requestError', Yii::t('app', 'Sorry, we are unable to reset the password for the email address provided.'));
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout = 'blank';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('resetSuccess', Yii::t('app', 'New password saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Your email has been confirmed!'));
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, we are unable to verify your account with provided token.'));
        return $this->refresh();
    }


    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Check your email for further instructions.'));
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', Yii::t('app', 'Sorry, we are unable to resend verification email for the provided email address.'));
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * @return string
     */
    public function actionTerms()
    {
        $getTerms = TermsAndServices::getTermsAndServices();
        return $this->render('terms', [
            'terms' => $getTerms,
        ]);
    }

    /**
     * @return string
     */
    public function actionOurStories()
    {
        $slider = Slider::getSliderFromSite('our-stories');
        $stories = ArrayHelper::index(SiteOurStories::getAllStories(), 'section');
        return $this->render('ourStories', [
            'slider' => $slider,
            'stories' => $stories
        ]);
    }
}
