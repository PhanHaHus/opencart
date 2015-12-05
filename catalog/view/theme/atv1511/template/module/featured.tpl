<div class="features_items"><!--features_items-->
    <h2 class="title text-center"><?php echo $heading_title; ?></h2>
    <div class="row">
        <?php foreach ($products as $product) { ?>
        <div class="product-layout col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="<?php echo $product['href']; ?>">
                            <img src="<?php echo $product['thumb']; ?>" image-src="<?php echo $product['image-src']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive preview" />
                        </a>
                        <?php if ($product['price']) { ?>
                        <h2><?php echo $product['price']; ?></h2>
                        <?php } ?>
                        <p><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></p>
                        <button type="button"  class="btn btn-default add-to-cart" onclick="cart.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $button_cart; ?></span></button>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><button data-toggle="tooltip" title="" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-plus-square"></i><?php echo $button_wishlist; ?></button></li>
                        <li><button data-toggle="tooltip" title="" onclick="compare.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-plus-square"></i><?php echo $button_compare; ?></button></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div><!--features_items-->