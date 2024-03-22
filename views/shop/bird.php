<?php
/** @var $bird */
?>

<section class="product-area product-single-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-single-item">
                    <div class="row">
                        <div class="col-lg-6">
                            <!--== Start Product Thumbnail Area ==-->
                            <div class="product-single-thumb">
                                <div class="swiper single-product-thumb single-product-thumb-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a class="lightbox-image" data-fancybox="gallery" href="/shop/image?dir=birds&id=<?=$bird->id?>">
                                                <img src="/shop/image?dir=birds&id=<?=$bird->id?>" width="570" height="675" alt="Image-HasTech">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--== End Product Thumbnail Area ==-->
                        </div>
                        <div class="col-lg-6">
                            <!--== Start Product Info Area ==-->
                            <div class="product-single-info">
                                <h3 class="main-title"><?=$bird->title?></h3>
                                <div class="prices">
                                    <span class="price"><?=$bird->price?></span>
                                </div>
                                <hr>
                                <p><?=$bird->description?></p>
                                <div class="product-single-meta">
                                    <ul>
                                        <li><span>Тип:</span><?=$bird->type->title?></li>
                                        <li><span>Вид:</span><?=$bird->family->title?></li>
                                        <li><span>Цвет:</span><?=$bird->color->title?></li>
                                    </ul>
                                </div>
                                <div class="product-quick-action">
                                    <a href="/shop/add-to-cart?bird_id=<?=$bird->id?>">
                                    <button type="button" class="btn-product-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                        В корзину
                                    </button>
                                    </a>
                                </div>
                                <div class="product-review-tabs-content">
                                    <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
                                        <li role="presentation">
                                            <a class="active" id="type-tab" data-bs-toggle="pill" href="#type" role="tab" aria-controls="type" aria-selected="true">Тип</a>
                                        </li>
                                        <li role="presentation">
                                            <a id="family-tab" data-bs-toggle="pill" href="#family" role="tab" aria-controls="family" aria-selected="false">Вид</a>
                                        </li>
                                        <li role="presentation">
                                            <a id="color-tab" data-bs-toggle="pill" href="#color" role="tab" aria-controls="color" aria-selected="false">Цвет</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content product-tab-content" id="ReviewTabContent">
                                        <div class="tab-pane fade show active" id="type" role="tabpanel" aria-labelledby="type-tab">
                                            <div class="product-information">
                                                <h3><?=$bird->type->title?></h3>
                                                <p><?=$bird->type->description?></p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                                            <div class="product-description">
                                                <h3><?=$bird->family->title?></h3>
                                                <p><?=$bird->family->description?></p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="color" role="tabpanel" aria-labelledby="color-tab">
                                            <div class="product-description">
                                                <h3><?=$bird->color->title?></h3>
                                                <p><?=$bird->color->description?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--== End Product Info Area ==-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
