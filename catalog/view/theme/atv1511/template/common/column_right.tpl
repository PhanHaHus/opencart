<?php if ($modules) { ?>
<aside id="column-right" class="col-sm-3 hidden-xs">
    <?php foreach ($modules as $module) { ?>
    <?php echo $module; ?>
    <?php } ?>
</aside>
<?php } ?>
<aside id="column-right" class="col-sm-3 hidden-xs">
    <h2>Sản phẩm bán chạy</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <div class="content">
            <div class="product-special productinfo">
                <!-- Swiper -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($special_products as $special_product) { ?>
                        <div class="swiper-slide">
                            <div class="img-product">
                                <a href="<?php echo $special_product['href']; ?>">
                                    <img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/image/'.$special_product['image']; ?>">
                                    <?php echo $special_product['name']; ?><br>
                                </a>
                                <span class="price"><?php echo $special_product['price']; ?> VND</span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                <script>
                    var swiper = new Swiper('.swiper-container', {
                        pagination: '.swiper-pagination',
                        paginationClickable: true,
                        direction: 'vertical',
                        'slidesPerView': 1,
                        'autoplay': true,
                        'speed': 3000,
                        'height': 150,
                        'effect': "slide",
                        'paginationHide': true,
                        'pagination':false
                    });
                </script>
            </div>
        </div>
        <div class="contact">
            <h2> Lien he</h2>
            <img src="lien-he.jpg">
            <p class="support">Tư vấn sản phẩm</p>
            <p><?php echo $telephone; ?></p>
        </div>
        
</aside>