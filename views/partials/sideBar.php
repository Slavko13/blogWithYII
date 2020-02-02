<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>

            <?php use yii\helpers\Url;

            foreach ($populars as $popular): ?>
                <div class="popular-post">


                    <a href=<?= Url::toRoute(['/site/view', 'id'=> $popular->id]); ?> class="popular-img"><img src=<?= $popular->ViewImage() ;?> alt="">

                        <div class="p-overlay"></div>
                    </a>

                    <div class="p-content">
                        <a href=<?= Url::toRoute(['/site/view', 'id'=> $popular->id]); ?> class="text-uppercase"><?= $popular->title; ?></a>
                        <span class="p-date"><?=$popular->date ?></span>

                    </div>
                </div>
            <?php endforeach; ?>
        </aside>
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            <?php foreach ($recent as $recent_item): ?>
                <div class="thumb-latest-posts">


                    <div class="media">
                        <div class="media-left">
                            <a href=<?= Url::toRoute(['/site/view', 'id'=> $recent_item->id]); ?> class="popular-img"><img src= <?=$recent_item->ViewImage(); ?> alt="">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href=<?= Url::toRoute(['/site/view', 'id'=> $popular->id]); ?> class="text-uppercase"><?= $recent_item->title; ?></a>
                            <span class="p-date"><?= $recent_item->date;?> </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </aside>
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>

                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href= <?= Url::toRoute(['/site/category', 'id'=> $category->id]); ?> ><?= $category->title ?></a>
                        <span class="post-count pull-right"> <?= $category->getArticles()->count(); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>
    </div>
</div>
