<div class="container">
    <div class="row">
      	<?php 
          	$main_image_path = base_url()."ProductImages/".$main_image;
            $main_image1_path = base_url()."ProductImages/".$main_image1;
            $main_image2_path = base_url()."ProductImages/".$main_image2;
            $main_image3_path = base_url()."ProductImages/".$main_image3;
      	?>
    <div class="col-sm-5 main-image">
        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
                <div class="active item" data-slide-number="0">
                    <img src="<?php echo $main_image_path ?>">
                </div>
                <div class="item" data-slide-number="1">
                    <img src="<?php echo $main_image1_path ?>">
                </div>
                <div class="item" data-slide-number="2">
                    <img src="<?php echo $main_image2_path ?>">
                </div>
                <div class="item" data-slide-number="3">
                    <img src="<?php echo $main_image3_path ?>">
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <i class="fa fa-chevron-left"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <i class="fa fa-chevron-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-info">
            <div class="inner">
                <div class="item-name"><?php echo $product_name;?></div>          
                <h4 class="item-id">Product ID: <?php echo $product_id;?></h4>
                <?php 
                    $currency = Modules::run('Site_settings/get_currency');
                    $product_price = number_format($product_price, 2);
                ?>
                <div class="item-price">                                 
                    <div class="price-now"><?php echo $currency.$product_price;?></div>          
                </div>
                <div class="item-strapline"><?php echo $product_short_description; ?></div>
                <?php echo form_open('Cart/add_to_cart/'.$product_id, ['class'=>'cart-form','id'=>'add-cart-form']); ?>                	
                    <?php echo Modules::run('Product_colours/_display_dropdown', $product_id); ?>
                    <?php echo Modules::run('Product_sizes/_display_dropdown', $product_id);
                          echo validation_errors();
                    ?>
                    <div class="button add-to-cart">
                        <?php echo form_submit('mysubmit', 'Add to Cart',['class'=>'btn']); ?>
                    </div>
                <?php echo form_close(); ?>
                <div class="popup-box" style="display:none;">
                    <div id="popup-wrapper">
                      <p>Added to Cart</p>
                    </div> 
                </div>

                <div class="scroller" id="slider-thumbs">
                    <ul class="no-bullets clearfix">
                        <li class="col-sm-3 col-xs-6">
                            <a class="thumbnail" data-target="#myCarousel" data-slide-to="0"><img src="<?php echo $main_image_path ?>"></a>
                        </li>
                        <li class="col-sm-3 col-xs-6">
                            <a class="thumbnail" data-target="#myCarousel" data-slide-to="1"><img src="<?php echo $main_image1_path ?>"></a>
                        </li>
                        <li class="col-sm-3 col-xs-6">
                            <a class="thumbnail" data-target="#myCarousel" data-slide-to="2"><img src="<?php echo $main_image2_path ?>"></a>
                        </li>
                        <li class="col-sm-3 col-xs-6">
                            <a class="thumbnail" data-target="#myCarousel" data-slide-to="3"><img src="<?php echo $main_image3_path ?>"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-wrap" id="extras">
    <div class="container">      
        <div class="tabs">
            <span class="tab active">Description</span>
        </div>
        <span class="item-main-desc"><?php echo $product_description; ?></span>
    </div>
</div>