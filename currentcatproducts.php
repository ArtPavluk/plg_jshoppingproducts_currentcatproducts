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

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Table\Table;
use Joomla\CMS\Layout\LayoutHelper;
use Joomla\CMS\Factory;

class plgJshoppingproductsCurrentCatProducts extends CMSPlugin
{
	/**
	 * Name of the layout being used to render the currentcatproducts
	 *
	 * @var    string
	 *
	 * @since  1.0.0
	 */
	protected $layout = 'plugins.jshoppingproducts.currentcatproducts.default';

	/**
	 * Add  guarantee value
	 *
	 * @param $product
	 * @param $view
	 * @param $product_images
	 * @param $product_videos
	 * @param $product_demofiles
	 *
	 * @return void
	 * @since   1.0.0
	 */
	public function onBeforeDisplayProduct(&$product, &$view, &$product_images, &$product_videos, &$product_demofiles)
	{
		$limit      = ($this->params->get('limit', 0)) ? $this->params->get('limit', 1) + 1 : 0;
		$categories = array();
		foreach ($product->product_categories as $category)
		{
			$categories[] = $category->category_id;
		}
		$categories  = array_unique($categories);
		$table       = Table::getInstance('product', 'jshop');
		$products    = $table->getAllProducts(array('categorys' => $categories), '', '', '', $limit);
		$catproducts = array();

		$i = 1;
		if (count($products) > 2)
		{
			foreach ($products as $item)
			{
				// Add product to Array
				if ($item->product_id !== $product->product_id)
				{
					$catproducts[] = $item;
				}
				$i++;

				// Stop foreach limit
				if ($limit)
				{
					if ($i == $this->params->get('limit', 1)) break;
				}
			}

			$product->set('catproducts', $catproducts);

			// Render layout products
			if ($this->params->get('auto_display', 1) && !empty($catproducts))
			{
				$language = Factory::getLanguage();
				$language->load('plg_jshoppingproducts_currentcatproducts', JPATH_ADMINISTRATOR);
				$position = $this->params->get('position_display', '_tmp_product_html_end');
				$view->$position .= LayoutHelper::render($this->layout, $catproducts);
			}

		}
	}
}