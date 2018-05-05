<?php
/**
 * @package    Current category products Plugin
 * @version    1.0.0
 * @author     Artem Pavluk - www.art-pavluk.com
 * @copyright  Copyright (c) 2010 - 2018 Private master Pavluk. All rights reserved.
 * @license    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @link       https://art-pavluk.com
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
?>
<div class="jshop_list_product products_current_category">
	<div class="related_header"><?php echo Text::_('PLG_JSHOPPINGPRODUCTS_CURRENTCATPRODUCTS_TITLE');?></div>
	<?php foreach ($displayData as $key => $product): ?>
		<?php if ($key % 3 == 0) echo '<div class="row-fluid">'; ?>
		<div class="sblock3">
			<div class="block_product">
				<div class="product productitem_<?php echo $product->product_id?>">
					<div class="name">
						<a href="<?php echo $product->product_link?>">
							<?php echo $product->name?>
						</a>
						<?php if (!empty($product->product_ean)):?>
							<span class="jshop_code_prod">(<?php echo _JSHOP_EAN?>: <span><?php echo $product->product_ean;?></span>)</span>
						<?php endif;?>
					</div>
					<div class="image">
						<?php if ($product->image):?>
							<div class="image_block">
								<?php echo $product->_tmp_var_image_block;?>
								<?php if ($product->label_id):?>
									<div class="product_label">
										<?php if ($product->_label_image):?>
											<img src="<?php echo $product->_label_image?>" alt="<?php echo htmlspecialchars($product->_label_name)?>" />
										<?php else:?>
											<span class="label_name"><?php echo $product->_label_name;?></span>
										<?php endif;?>
									</div>
								<?php endif;?>
								<a href="<?php echo $product->product_link?>">
									<img class="jshop_img" src="<?php echo $product->image?>" alt="<?php echo htmlspecialchars($product->name);?>" title="<?php echo htmlspecialchars($product->name);?>"  />
								</a>
							</div>
						<?php endif;?>
						<?php echo $product->_tmp_var_bottom_foto;?>
					</div>
					<div class = "oiproduct">
						<?php if ($product->product_quantity <=0):?>
							<div class="not_available"><?php echo _JSHOP_PRODUCT_NOT_AVAILABLE;?></div>
						<?php endif;?>

						<?php if ($product->product_old_price > 0):?>
							<div class="old_price">
								<?php if ($product->product_old_price) echo _JSHOP_OLD_PRICE.": ";?>
								<span><?php echo formatprice($product->product_old_price)?><?php echo $product->_tmp_var_old_price_ext?></span>
							</div>
						<?php endif;?>

						<?php echo $product->_tmp_var_bottom_old_price;?>

						<?php if ($product->product_price_default > 0):?>
							<div class="default_price">
								<?php echo _JSHOP_DEFAULT_PRICE.": ";?>
								<span><?php echo formatprice($product->product_price_default)?></span>
							</div>
						<?php endif;?>

						<?php if ($product->_display_price):?>
							<div class = "jshop_price">
								<?php if ($product->show_price_from) echo _JSHOP_FROM." ";?>
								<span><?php echo formatprice($product->product_price);?><?php echo $product->_tmp_var_price_ext;?></span>
							</div>
						<?php endif;?>
						<?php echo $product->_tmp_var_bottom_price;?>
						<?php if ($product->basic_price_info['price_show']):?>
							<div class="base_price">
								<?php echo _JSHOP_BASIC_PRICE?>:
								<?php if ($product->show_price_from) echo _JSHOP_FROM;?>
								<span><?php echo formatprice($product->basic_price_info['basic_price'])?> / <?php echo $product->basic_price_info['name'];?></span>
							</div>
						<?php endif;?>
						<?php if ($product->manufacturer->name):?>
							<div class="manufacturer_name">
								<?php echo _JSHOP_MANUFACTURER;?>:
								<span><?php echo $product->manufacturer->name?></span>
							</div>
						<?php endif;?>
						<?php if ($product->manufacturer_code):?>
							<div class="manufacturer_code">
								<?php echo _JSHOP_MANUFACTURER_CODE?>:
								<span><?php echo $product->manufacturer_code?></span>
							</div>
						<?php endif;?>
						<?php if ($product->product_weight > 0):?>
							<div class="productweight">
								<?php echo _JSHOP_WEIGHT?>:
								<span><?php echo formatweight($product->product_weight)?></span>
							</div>
						<?php endif;?>

						<?php if ($product->delivery_time != ''):?>
							<div class="deliverytime">
								<?php echo _JSHOP_DELIVERY_TIME?>:
								<span><?php echo $product->delivery_time?></span>
							</div>
						<?php endif;?>

						<?php if (is_array($product->extra_field)):?>
							<div class="extra_fields">
								<?php foreach($product->extra_field as $extra_field):?>
									<div>
										<span class="label-name"><?php echo $extra_field['name'];?>:</span>
										<span class="data"><?php echo $extra_field['value'];?></span>
									</div>
								<?php endforeach;?>
							</div>
						<?php endif;?>

						<?php if ($product->vendor):?>
							<div class="vendorinfo">
								<?php echo _JSHOP_VENDOR?>:
								<a href="<?php echo $product->vendor->products?>"><?php echo $product->vendor->shop_name?></a>
							</div>
						<?php endif;?>
						<div class="description">
							<?php echo $product->short_description?>
						</div>

						<?php echo $product->_tmp_var_top_buttons;?>

						<div class="buttons">
							<?php if ($product->buy_link):?>
								<a class="btn btn-success button_buy" href="<?php echo $product->buy_link?>">
									<?php echo _JSHOP_BUY?>
								</a>
							<?php endif;?>

							<a class="btn button_detail" href="<?php echo $product->product_link?>">
								<?php echo _JSHOP_DETAIL?>
							</a>

							<?php echo $product->_tmp_var_buttons;?>
						</div>
						<?php echo $product->_tmp_var_bottom_buttons;?>
					</div>

				</div>
			</div>
		</div>
		<?php if ($key % 3 == 2) echo '</div>'; ?>
	<?php endforeach; ?>
</div>
