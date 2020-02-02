
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php use yii\helpers\Url;
                use yii\widgets\LinkPager;

                foreach ($articlesThisCategory as $article) : ?>
                <article class="post post-list">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-thumb">
                                <a href=<?= Url::toRoute(['/site/view', 'id'=> $article->id]); ?> ><img src= <?=$article->ViewImage(); ?> alt="" class="pull-left"></a>

                                <a href= <?=Url::toRoute(['/site/view', 'id'=>$article->id]) ?>  class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-content">
                                <header class="entry-header text-uppercase">
                                    <h6><a href="#"> <?= $article->category->title ?></a></h6>

                                    <h1 class="entry-title"><a href=<?=Url::toRoute(['/site/view', 'id'=>$article->id]) ?> ><?=$article->title ?></a></h1>
                                </header>
                                <div class="entry-content">
                                    <p> <?=$article->content ?>
                                    </p>
                                </div>
                                <div class="social-share">
                                    <span class="social-share-title pull-left text-capitalize">By Rubel <?= $article->date ?></span>

                                </div>
                            </div>
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