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

jimport('joomla.filesystem.folder');
jimport('joomla.filesystem.file');

class plgJshoppingproductsCurrentCatProductsInstallerScript
{
	/**
	 * Move default layouts to /layouts/plugins/jshoppingproducts/currentcatproducts
	 *
	 * @param  string $type      Type of PostFlight action. Possible values are:
	 *                           - * install
	 *                           - * update
	 *                           - * discover_install
	 * @param         $parent    Parent object calling object.
	 *
	 * @return bool
	 *
	 * @since    1.0.0
	 */
	public function postflight($type, $parent)
	{
		$plugin = JPATH_PLUGINS . '/jshoppingproducts/currentcatproducts/layouts';

		$layouts = JPATH_ROOT . '/layouts/plugins/jshoppingproducts/currentcatproducts';

		// Check folders
		if (!JFolder::exists(JPATH_ROOT . '/layouts/plugins'))
		{
			JFolder::create(JPATH_ROOT . '/layouts/plugins');
		}

		if (!JFolder::exists(JPATH_ROOT . '/layouts/plugins/jshoppingproducts'))
		{
			JFolder::create(JPATH_ROOT . '/layouts/plugins/jshoppingproducts');
		}


		// Move layouts
		JFolder::move($plugin, $layouts);

		return true;
	}

	/**
	 * Delete default layouts /layouts/plugins/jshoppingproducts/currentcatproducts
	 *
	 * @param   JAdapterInstance $adapter The object responsible for running this script
	 *
	 * @since 1.0.0
	 */
	public function uninstall($adapter)
	{
		$folder = JPATH_ROOT . '/layouts/plugins/jshoppingproducts/currentcatproducts';
		if (JFolder::exists($folder))
		{
			JFolder::delete($folder);
		}
	}

}