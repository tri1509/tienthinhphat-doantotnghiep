<div class="max-width">
  <div class="show-header-bottom-item-menu">
    <div class="header-bottom-item-menu-left">
      <div class="row">
        <?php
          $show_brand = $brand->show_brand();
          if($show_brand){
              while($result = $show_brand->fetch_assoc()){
        ?>
        <div class="col-4">
          <h4 class="menu-left-brand">
            <a href="san-pham-theo-thuong-hieu/<?php echo $result['brand_id'] ?>.html">
              <?php echo $result['brand_name'] ?>
            </a>
          </h4>
          <ul class="menu-left-list">
            <?php
              $id_lv2 = $result['brand_id'];
              $show_brand_lv2 = $brand->show_brand_lv2($id_lv2);
              if($show_brand_lv2){
                  while($result_lv2 = $show_brand_lv2->fetch_assoc()){
            ?>
            <li>
              <a
                href="san-pham-theo-thuong-hieu/<?php echo $result_lv2['brand_id'] ?>/<?php echo $result_lv2['brand_id_lv2'] ?>.html">
                <?php echo $result_lv2['brand_name_lv2']?>
              </a>
            </li>
            <?php } } ?>
          </ul>
        </div>
        <?php } } ?>
      </div>
      <div class="clear20"></div>
    </div>
    <div class="header-bottom-item-menu-right">
      <div class="grid">
        <div class="grid-item">
          <img src="./img/hera.png" alt="" />
        </div>
        <div class="grid-item">
          <img src="./img/sala.png" alt="" />
        </div>
        <div class="grid-item">
          <img src="./img/giabao.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</div>