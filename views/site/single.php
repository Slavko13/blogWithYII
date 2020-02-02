<?php

use yii\helpers\Url;

?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <img src= "<?= $article->ViewImage(); ?>" alt="">
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6><a href="#"> <?= $article->category->title ?></a></h6>

                            <h1 class="entry-title"><?= $article->title ?></h1>


                        </header>
                        <div class="entry-content">
                            <p>
                            <?= $article->content ?>
                            </p>
                        </div>
                        <div class="decoration">
                            <a href="#" class="btn btn-default">Decoration</a>
                            <a href="#" class="btn btn-default">Decoration</a>
                        </div>

                        <div class="social-share">
							<span
                                class="social-share-title pull-left text-capitalize">By <?=$article->author->name ?> <?=$article->date ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <div class="top-comment"><!--top comment-->
                    <img src="public/images/comment.jpg" class="pull-left img-circle" alt="">
                    <h4>Rubel Miah</h4>

                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                        invidunt ut labore et dolore magna aliquyam erat.</p>
                </div><!--top comment end-->
                <div class="row"><!--blog next previous-->
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="#">
                                <img src="public/images/blog-next.jpg" alt="">

                                <div class="overlay">

                                    <div class="promo-text">
                                        <p><i class=" pull-left fa fa-angle-left"></i></p>
                                        <h5>Rubel is doing Cherry theme</h5>
                                    </div>
                                </div>


                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-blog-box">
                            <a href="#">
                                <img src="public/images/blog-next.jpg" alt="">

                                <div class="overlay">
                                    <div class="promo-text">
                                        <p><i class=" pull-right fa fa-angle-right"></i></p>
                                        <h5>Rubel is doing Cherry theme</h5>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!--blog next previous end-->
                <div class="related-post-carousel"><!--related post carousel-->
                    <div class="related-heading">
                        <h4>You might also like</h4>
                    </div>
                    <div class="items">

                        <?php foreach ($articleSameCategory as $item_sameCategory):?>
                        <div class="single-item">
                            <a href=<?= Url::toRoute(['view', 'id' => $item_sameCategory->id]) ?> >
                                <img src=<?=$item_sameCategory->ViewImage() ?> alt="">

                                <p><?= $item_sameCategory->title; ?></p>
                            </a>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div><!--related post carousel-->
                <div class="bottom-comment"><!--bottom comment-->

                    <h4><?=$article->getComments()->count() ;?> Comments</h4>
                    <?php if(!empty($comments)) ?>
                        <?php foreach ($comments as $comment): ?>
                    <div class="comment-info" style="border-bottom: 2px solid silver;  margin-top: 30px; padding-bottom: 30px;" >

                    <div class="comment-img" ">
                        <img class="img-circle" style = "width: 100px;"  src=<?= $comment->user->viewPhoto(); ?> alt="">
                    </div>

                    <div class="comment-text">
                        <a href="#" class="replay btn pull-right"> Replay</a>
                        <h5><?=$comment->user->name ?></h5>

                        <p class="comment-date">
                            December, 02, 2015 at 5:57 PM
                        </p>


                        <p class="para"><?=$comment->text; ?></p>
                    </div>
                    </div>
                    <?php endforeach; ?>



                </div>
                <!-- end bottom comment-->


                <div class="leave-comment"><!--leave comment-->
                    <h4>Leave a reply</h4>


                    <form class="form-horizontal contact-form" role="form" method="post" action="#">
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="subject" name="subject"
                                       placeholder="Website url">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
										<textarea class="form-control" rows="6" name="message"
                                                  placeholder="Write Massage"></textarea>
                            </div>
                        </div>
                        <a href="#" class="btn send-btn">Post Comment</a>
                    </form>
                </div><!--end leave comment-->
            </div>
            <?= $this->render('/partials/sideBar', [
                'populars' => $populars,
                'recent' => $recent,
                'categories' => $categories

            ]); ?>
        </div>
    </div>
</div>
<!-- end main content-->