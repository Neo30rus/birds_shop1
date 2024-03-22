<?php
/** @var $product */
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
                                            <a class="lightbox-image" data-fancybox="gallery" href="/shop/image?dir=products&id=<?=$product->id?>">
                                                <img src="/shop/image?dir=products&id=<?=$product->id?>" width="570" height="675" alt="Image-HasTech">
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
                                <h3 class="main-title"><?=$product->title?></h3>
                                <div class="prices">
                                    <span class="price"><?=$product->price?></span>
                                </div>
                                <hr>
                                <p><?=$product->description?></p>
                                <div class="product-single-meta">
                                    <ul>
                                        <li><span>Тип:</span><?=$product->type->title?></li>
                                    </ul>
                                </div>
                                <div class="product-quick-action">
                                    <a href="/shop/add-to-cart?product_id=<?=$product->id?>">
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
                                    </ul>
                                    <div class="tab-content product-tab-content" id="ReviewTabContent">
                                        <div class="tab-pane fade show active" id="type" role="tabpanel" aria-labelledby="type-tab">
                                            <div class="product-information">
                                                <h3><?=$product->type->title?></h3>
                                                <p><?=$product->type->description?></p>
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
