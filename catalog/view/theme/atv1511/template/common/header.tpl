<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />

<!-- atv1511 -->
<link href="catalog/view/theme/atv1511/stylesheet/prettyPhoto.css" rel="stylesheet">
<link href="catalog/view/theme/atv1511/stylesheet/price-range.css" rel="stylesheet">
<link href="catalog/view/theme/atv1511/stylesheet/animate.css" rel="stylesheet">
<link href="catalog/view/theme/atv1511/stylesheet/responsive.css" rel="stylesheet">
<link href="catalog/view/theme/atv1511/stylesheet/main.css" rel="stylesheet">
<script src="catalog/view/theme/atv1511/js/html5shiv.js"></script>
<!-- <script src="catalog/view/theme/atv1511/js/respond.min.js"></script> -->
<!-- <link href="catalog/view/theme/atv1511/stylesheet/stylesheet.css" rel="stylesheet"> -->
<!-- <link href="catalog/view/theme/atv1511/stylesheet/atv1511.css" rel="stylesheet"> -->


<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
<script src="catalog/view/javascript/common.js" type="text/javascript"></script>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php foreach ($analytics as $analytic) { ?>
<?php echo $analytic; ?>
<?php } ?>
</head>
<body class="<?php echo $class; ?>">


  <header id="header">
      <div class="header_top">
          <div class="container">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="contactinfo">
                          <ul class="nav nav-pills">
                              <li><a href="#"><i class="fa fa-phone"></i><?php echo $telephone; ?></a></li>
                              <li><a href="#"><i class="fa fa-envelope"></i>abc@gmail.com</a></li>
                              <li><?php echo $language; ?></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="social-icons pull-right">
                          <ul class="nav navbar-nav">
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="header-middle">
          <div class="container">
              <div class="row">
                  <div class="col-sm-4">
                      <div class="logo pull-left">
                          <?php if ($logo) { ?>
                            <a href="<?php echo $home; ?>"><img id="logo" src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" /></a>
                            <?php } else { ?>
                            <h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1>
                            <?php } ?>
                      </div>
                  </div>
                  <div class="col-sm-8">
                      <div class="shop-menu pull-right">
                        <div class="shop-menu-top pull-right">
                          <div class="search_box">
                            <?php echo $search; ?>
                          </div>
                          <div class="cart_box">
                            <?php echo $cart; ?>
                          </div>
                        </div>
                      
                          <ul class="nav navbar-nav pull-right">
                              <li><a href="<?php echo $wishlist; ?>" id="wishlist-total" title="<?php echo $text_wishlist; ?>"><i class="fa fa-heart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_wishlist; ?></span></a></li>
                              <li><a href="<?php echo $checkout; ?>" title="<?php echo $text_checkout; ?>"><i class="fa fa-crosshairs"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_checkout; ?></span></a></li>
                              <li><a href="<?php echo $shopping_cart; ?>" title="<?php echo $text_shopping_cart; ?>"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_shopping_cart; ?></span></a></li>
                              <li class="dropdown"><a href="<?php echo $account; ?>" title="<?php echo $text_account; ?>" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $text_account; ?></span> <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                  <?php if ($logged) { ?>
                                  <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
                                  <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
                                  <li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
                                  <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
                                  <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
                                  <?php } else { ?>
                                  <li><a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
                                  <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a></li>
                                  <?php } ?>
                                </ul>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="header-bottom">
          <div class="container">
              <div class="row">
                  <div class="col-sm-9">
                  <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="<?php echo $home; ?>" class="active">Trang chủ</a></li>
                                    <li class="dropdown"><a href="#">Cửa Hàng<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="shop.html">Sản Phẩm</a></li>
                                            <li><a href="checkout.html">Checkout</a></li> 
                                            <li><a href="cart.html">Cart</a></li> 
                                            <li><a href="login.html">Login</a></li> 
                                        </ul>
                                    </li> 
                                    <li><a href="<?php echo $contact; ?>">Liên Hệ</a></li>
                                </ul>
                            </div>
                  </div>
                  <div class="col-sm-3">
                      
                  </div>
              </div>
          </div>
      </div>
  </header>
<!-- Default -->

