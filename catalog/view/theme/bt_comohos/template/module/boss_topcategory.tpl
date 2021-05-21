<?php if(!empty($categories)){ ?>
<div class="container">
<div class="row">
<div class="col-xs-12">
  <div class="popular-cate">
	<div class="box-heading">
		<h1><?php echo $heading_title; ?></h1>
	</div>
	<div class="row">
	  <?php if(!$show_slider) { ?>
		<?php foreach ($categories as $category) { ?>
		<div class="box-content col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="cate-image"><a title="<?php echo $category['title']; ?>" href="<?php echo $category['href']; ?>"><img alt="<?php echo $category['title']; ?>" src="<?php echo $category['image']; ?>" /></a></div>
			<div class="cate-name"><h3><?php echo $category['title']; ?></h3></div>
			<div class="sub_cat">
				<?php foreach ($category['children_data'] as $children) { ?>
					<div class="sub_item">
						<a title="<?php echo $children['name']; ?>" href="<?php echo $children['href']; ?>"><?php echo $children['name']; ?></a>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	  <?php }else { ?>
		<section class="box-content">
		  <div id="boss_categories<?php echo $module; ?>" class="carousel-content">
		  <?php foreach ($categories as $category) { ?>
			<div>
			  <div class="cate-image">
				<a title="<?php echo $category['title']; ?>" href="<?php echo $category['href']; ?>"><img alt="<?php echo $category['title']; ?>" src="<?php echo $category['image']; ?>" /><span class="cate-name not-animated" data-animate="zoom-in" data-delay="200"><?php echo $category['title']; ?></span></a>
			    <div class="count-product not-animated" data-animate="zoom-in" data-delay="200">
			  	  <span><?php echo $category['count'];?> <?php echo $entry_product;?></span>
				</div>
			  </div>
			  
			</div>
		  <?php } ?>
		  </div>
		  <a id="bt_topcate_next_<?php echo $module; ?>" class="prev nav_thumb" href="javascript:void(0)" title="prev"><i class="fa fa-angle-left"></i></a>
		  <a id="bt_topcate_prev_<?php echo $module; ?>" class="next nav_thumb" href="javascript:void(0)" title="next"><i class="fa fa-angle-right"></i></a>
		</section>
	  <?php } ?>
	</div>
  </div>
</div>
</div></div>
<?php if($show_slider){ ?>
<script type="text/javascript"><!--
$(window).load(function(){
	
	image_width = <?php echo $image_width; ?>;
	per_row = <?php echo $per_row; ?>;
	
	
    $('#boss_categories<?php echo $module; ?>').carouFredSel({
        auto: false,
        responsive: true,
        width: '100%',
		height: 'variable',
        prev: '#bt_topcate_next_<?php echo $module; ?>',
        next: '#bt_topcate_prev_<?php echo $module; ?>',
        swipe: {
        onTouch : true
        },
        items: {
            width: image_width,
            height: 'variable',
            visible: {
				min: 1,
				max: per_row,
            }
        },
        scroll: {
            direction : 'left',    //  The direction of the transition.
            duration  : 1000,   //  The duration of the transition.
			items: 1
        }
    });
});
//--></script>
<?php } ?>
<?php } ?>
