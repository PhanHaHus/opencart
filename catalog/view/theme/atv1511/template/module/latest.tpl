<div class="features_items"><!--features_items-->
    <h2 class="title text-center"><?php echo $heading_title; ?></h2>
    <div class="row">
    <?php foreach ($products as $product) { ?>
      <div class="product-layout col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="product-image-wrapper">
              <div class="single-products">
                  <div class="productinfo text-center">
                      <a href="<?php echo $product['href']; ?>">
                          <img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive preview" />
                      </a>
                      <h2><?php echo $product['price']; ?></h2>
                      <p><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></p>
                  </div>
              </div>
              <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li>
                        <h2><?php echo $product['price']; ?></h2>
                    </li>
                    <li>
                        <h2><?php echo $product['price']; ?></h2>
                    </li>
                  </ul>
              </div>
          </div>
      </div>
      <?php } ?>
    </div>
</div><!--features_items-->