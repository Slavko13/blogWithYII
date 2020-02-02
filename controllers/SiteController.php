<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\CommentForm;
use Yii;

use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                    ],
                ],
            ];
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


        $query = Article::queryForIndexPagination();
        $temp = Article::createPages(2, $query);
        $pagination = $temp [0];
        $articles = Article::getArticlesForPage($temp [0], $temp [1]);
        


        $populars = Article::takePopular(3);
        $recent = Article::takeRecent(3);
        $categories = Category::takeAll(5);

        return $this->render( 'index',
            [
                'pagination' => $pagination,
                'articles' => $articles,
                'populars' => $populars,
                'recent' => $recent,
                'categories' => $categories
            ]


    );
    }



    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionView($id)
    {



        $article = Article::findOne($id);
        $categoryId= $article->category->id;
        $sameArticles = Article::takeSame($categoryId);
        $populars = Article::takePopular(3);
        $recent = Article::takeRecent(3);
        $categories = Category::takeAll(5);
        $comments = $article->comments;
        $commentForm = new CommentForm();

        $article->viewCounter();


        return $this->render('single', [

        'article' => $article,
            'populars' => $populars,
            'recent' => $recent,
            'categories' => $categories,
            'articleSameCategory' => $sameArticles,
            'comments' => $comments,
            'commentForm' => $commentForm
        ]);
    }


    public function  actionCategory($id) {

        $query = Article::queryForCategoryPagination($id);
        $temp = Article::createPages(2, $query);
        $pagination = $temp [0];
        $articles = Article::getArticlesForPage($temp [0], $temp [1]);

        $populars = Article::takePopular(3);
        $recent = Article::takeRecent(3);
        $categories = Category::takeAll(5);


        return $this->render('category',
            [
                'populars' => $populars,
                'recent' => $recent,
                'categories' => $categories,
                'articlesThisCategory' => $articles,
                'pagination' => $pagination

            ]);

    }
}
