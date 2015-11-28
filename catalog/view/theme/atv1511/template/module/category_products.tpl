<div class="panel-group category-products" id="accordian"><!--category-productsr-->
  <h2>Danh mục</h2>
  <div class="content">
    <?php foreach ($categories as $category) { ?>
      <?php if ($category['category_id'] == $category_id) { ?>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordian" href="<?php echo $category['href']; ?>">
                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                <?php echo $category['name']; ?>
              </a>
            </h4>
          </div>
          <?php if ($category['children']) { ?>
          <div id="sportswear" class="panel-collapse collapse">
            <div class="panel-body">
              <ul>
              <?php foreach ($category['children'] as $child) { ?>
                <?php if ($child['category_id'] == $child_id) { ?>
                  <li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
                <?php } else { ?>
                  <li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
                <?php } ?>
              <?php } ?>
              </ul>
            </div>
          </div>
          <?php } ?>
        </div>

      <?php } else { ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></h4>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
  </div>
</div><!--/category-products-->