<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Content;
use app\models\FollowForm;
use app\models\Email;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\models\Work;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Content::findOne(1);
        $model->updateCounters(['index_hits' => 1]);
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(Url::to('admin/index'));

        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return Yii::$app->response->redirect(Url::to('admin/index'));
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionFollow($email)
    {
        if ($email == null){return $this->redirect(['site/error']);}
        $model = Email::find()->where(['email' => $email])->one();
        if($model == null){return $this->redirect(['site/error']);}
        return $this->render('follow', [
            'model' => $model,
        ]);

    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $сontact = Content::findOne(1);
        $сontact->updateCounters(['contact_hits' => 1]);
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
            'сontact' => $сontact,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $model = Content::findOne(1);
        $model->updateCounters(['about_hits' => 1]);
        return $this->render('about', [
            'model' => $model,
        ]);
    }
    public function actionRemont()
    {
        $remont = Content::findOne(1);
        $remont->updateCounters(['remont_hits' => 1]);
        $dataProvider = new ActiveDataProvider([
            'query' => Work::find()->orderBy('date DESC'),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('remont', ['listDataProvider' => $dataProvider]);
    }

       public function actionAdmin()
    {

        return $this->render('admin');
    }

    public function actionStep1()
    {
        $model = Content::findOne(1);
        $model->updateCounters(['step1_hits' => 1]);
        return $this->render('step1', [
            'model' => $model,
        ]);
    }
    public function actionStep2()
    {
        $model = Content::findOne(1);
        $model->updateCounters(['step2_hits' => 1]);
        return $this->render('step2', [
            'model' => $model,
        ]);
    }
    public function actionStep3()
    {
        $model = Content::findOne(1);
        $model->updateCounters(['step3_hits' => 1]);
        return $this->render('step3', [
            'model' => $model,
        ]);
    }
    public function actionStep4()
    {
        $model = Content::findOne(1);
        $model->updateCounters(['step4_hits' => 1]);
        return $this->render('step4', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdate($id)
    {
        $this->checkRules();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
            if($model->fileImage){
                $current_image = $model->img;
                $dirname = __DIR__.'/../web/images/';
                $dir = __DIR__.'/../'.$current_image;
                if(file_exists($dir))
                {
                    //удаляем файл
                    unlink($dir);
                    $model->img = '';
                }
                $d = '/web/images/';
                $model->img = $d.$model->fileImage->baseName . '.' . $model->fileImage->extension;
                if(!$model->save()){throw new NotFoundHttpException('The file does not create.');}
                $model->fileImage->saveAs($dirname . '/' . $model->fileImage->baseName . '.' . $model->fileImage->extension);
                return $this->redirect(['update', 'id' => $model->id]);
            }
            else {
                if(!$model->save()){throw new NotFoundHttpException('The page does not saved.');}
                return $this->redirect(['update', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,

        ]);
    }
    public function actionCreate()
    {
        $this->checkRules();
        $model = new Posts();

        if ($model->load(Yii::$app->request->post())) {
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');
            if($model->fileImage){
                $dirname = __DIR__.'/../web/images/';
                $d = '/web/images/';
                $model->img = $d.$model->fileImage->baseName . '.' . $model->fileImage->extension;
                if(!$model->save()){throw new NotFoundHttpException('The page does not saved.');}
                $model->fileImage->saveAs($dirname . '/' . $model->fileImage->baseName . '.' . $model->fileImage->extension);
                return $this->redirect(['update', 'id' => $model->id]);
            }
            else{throw new NotFoundHttpException('The file does not create.');}
        }
        else{

            return $this->render('create', [
                'model' => $model,

            ]);

        }
    }
    public function actionView_posts()
    {
        $this->checkRules();
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view_posts', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreate_mail()
    {
        $this->checkRules();
        return $this->render('create_mail');
    }
    public function actionView_mails()
    {
        $this->checkRules();
        return $this->render('view_mails');
    }
    public function actionCreate_category()
    {
        $this->checkRules();
        return $this->render('create_category');
    }
    public function actionView_category()
    {
        $this->checkRules();
        return $this->render('view_category');
    }
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->img;
        $dir = __DIR__.'/../'.$current_image;
        if(file_exists($dir))
        {
            //удаляем файл
            unlink($dir);
        }
        $this->findModel($id)->delete();
        return $this->redirect(['admin']);
    }
}
