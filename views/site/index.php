<?php

/* @var $this yii\web\View */

use app\models\Article;

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ( $articles as $article): ?>
                <article class="post">
                    <div class="post-thumb">
                        <a href=<?= Url::toRoute(['/site/view', 'id'=> $article->id]); ?>><img src= <?=$article->ViewImage(); ?>  alt=""></a>

                        <a href=<?= Url::toRoute(['/site/view', 'id'=> $article->id]);?> class="post-thumb-overlay text-center">
                            <div class="text-uppercase text-center">View Post</div>
                        </a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="#"> <?=$article->category->title; ?></a></h6>

                            <h1 class="entry-title"><a href=<?= Url::toRoute(['/site/view', 'id'=> $article->id]); ?>><?=$article->title; ?></a></h1>


                        </header>
                        <div class="entry-content">
                            <p>
                                <?= $article->content; ?>
                            </p>

                            <div class="btn-continue-reading text-center text-uppercase">
                                <a href= <?= Url::toRoute(['/site/view', 'id'=> $article->id]); ?>  class="more-link">Continue Reading</a>
                            </div>
                        </div>
                        <div class="social-share">
                            <span class="social-share-title pull-left text-capitalize">By <a href="#"><?=$article->author->name; ?></a> <?=$article->date; ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li> <?= (int) $article->viewed;  ?>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>



                <?php


                // display pagination
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
            <?= $this->render('/partials/sideBar', [
                'populars' => $populars,
                'recent' => $recent,
                'categories' => $categories

]); ?>
        </div>
    </div>
</div>
