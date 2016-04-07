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
                            <li><a href="<?php echo $special; ?>"><?php echo $text_special; ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2><?php echo $text_account; ?></h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
                        </ul>
                        <h5></h5>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Địa chỉ: 36 ngõ 22 Phạm Thận Duật, Mai Dịch Hà nội</h2>
                        <div class="map">
                            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:250px;width:315px;"><div id="gmap_canvas" style="height:250px;width:315px;"><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">themecircle.net</a></div></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(21.042578261527296,105.77769716983642),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(21.042578261527296, 105.77769716983642)});infowindow = new google.maps.InfoWindow({content:"<b>Loa Trung Qu&#7889;c</b><br/>36 ng&otilde; 22 Ph&#7841;m Th&#7853;n Du&#7853;t<br/> ha noi" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
</div>
</body></html>