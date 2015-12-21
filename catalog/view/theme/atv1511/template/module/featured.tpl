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
                        <p><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></p>
                        <?php if ($product['price']) { ?>
                            <h4>Giá 1:<span class="price"><?php echo $product['price']; ?></span></h4>
                        <?php } ?>
                        <?php if ($product['price']) { ?>
                             <h4>Giá 2:<span <span class="price"><?php echo $product['price']; ?></span></h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div><!--features_items-->