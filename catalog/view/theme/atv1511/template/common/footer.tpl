<footer id="footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <?php if ($informations) { ?>
                    <div class="single-widget">
                        <h2><?php echo $text_information; ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php foreach ($informations as $information) { ?>
                            <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2><?php echo $text_service; ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
                            <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
                            <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2><?php echo $text_extra; ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
                            <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
                            <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li>
                            <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2><?php echo $text_account; ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
                            <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
                            <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
                            <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
                        </ul>
                        <h5></h5>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About shop</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Email của bạn" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Nhận thông tin mới nhất <br />từ chúng tôi...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <?php echo $powered; ?>
                <p class="pull-right">Designed by <span><a target="" href="#">hapt</a></span></p>
            </div>
        </div>
    </div>
</footer>
</body></html>