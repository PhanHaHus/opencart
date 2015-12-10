<?php if ($modules) { ?>
<aside id="column-right" class="col-sm-3 hidden-xs">
    <?php foreach ($modules as $module) { ?>
    <?php echo $module; ?>
    <?php } ?>
</aside>
<?php } ?>
<aside id="column-right" class="col-sm-3 hidden-xs">
    <h2>Sản phẩm đặc biệt</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <div class="content">
            <div class="product-special productinfo">
                <?php foreach ($special_products as $special_product) { ?>
                    <div class="img-product">
                        <a href="<?php echo $special_product['href']; ?>">
                            <img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/opencart/image/'.$special_product['image']; ?>">
                            <?php echo $special_product['name']; ?><br>
                        </a>
                        <span class="price"><?php echo $special_product['price']; ?> VND</span>
                    </div>
                <?php } ?>
            </div>
        </div>
</aside>