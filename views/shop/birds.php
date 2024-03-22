<?php
/** @var $birds */
?>
<?php if (Yii::$app->user->can('admin')): ?>
<a href="/shop/create-bird">Добавить новую птицу</a>
<?php endif;?>
<section class="product-area">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    <?php foreach ($birds as $bird): ?>
                                    <div class="col-sm-6 col-xl-4">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item">
                                            <div class="product-thumb">
                                                <a href="/shop/bird?id=<?=$bird->id?>">
                                                    <img src="/shop/image?dir=birds&id=<?=$bird->id?>" width="270" height="320" alt="Image-HasTech">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h4 class="title"><a href="/shop/bird?id=<?=$bird->id?>"><?=$bird->title?></a></h4>
                                                <div class="prices">
                                                    <span class="price"><?=$bird->price?> руб.</span>
                                                </div>
                                            </div>
                                            <div class="product-action">
                                                <div class="product-action-links">
                                                    <a href="/shop/add-to-cart?bird_id=<?=$bird->id?>">
                                                    <button type="button" class="btn-product-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <i class="pe-7s-shopbag"></i>
                                                    </button>
                                                    </a>
                                                    <a href="/shop/bird?id=<?=$bird->id?>">
                                                    <button type="button" class="btn-product-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="pe-7s-look"></i>
                                                    </button>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>