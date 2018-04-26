<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = false;
    public $defaultRoute = 'index';
    public function init(){
        $this->enableCsrfValidation = false;
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
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

   public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captchatest' => [
                'class' => 'yii\captcha\CaptchaAction',
                    'maxLength' => 3,
                    'minLength' => 3,
            ],
        ];
    }

public function actionNobody(){
            $model = new Check();
            if ($model->load(Yii::$app->request->post()) && $model->validate()){
                return $this->refresh();
            }
            return $this->render('login',[
                'model'=>$model,
            ]);
        }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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

     public function admin_login(){
       return $this->render('admin_login');
    }



    public function actionAdmin()
    {
        $user = Yii::$app->request->post();
        $name = $user['name'];
        $pwd = $user['pwd'];
        $connection  = Yii::$app->db;
        $sql = "select * from admin where admin_name = '$name' and admin_pwd = '$pwd'";
        $command = $connection->createCommand($sql);
        $res = $command->queryAll();
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
