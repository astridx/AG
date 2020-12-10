<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_agmaps
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace AgmapNamespace\Component\Agmaps\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Categories\CategoryNode;
use Joomla\CMS\Language\Multilanguage;

/**
 * Agmaps Component Route Helper
 *
 * @static
 * @package     Joomla.Site
 * @subpackage  com_agmaps
 * @since       __DEPLOY_VERSION__
 */
abstract class RouteHelper
{
	/**
	 * Get the URL route for a agmaps from a agmap ID, agmaps category ID and language
	 *
	 * @param   integer  $id        The id of the agmaps
	 * @param   integer  $catid     The id of the agmaps's category
	 * @param   mixed    $language  The id of the language being used.
	 *
	 * @return  string  The link to the agmaps
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public static function getAgmapsRoute($id, $catid, $language = 0)
	{
		// Create the link
		$link = 'index.php?option=com_agmaps&view=agmaps&id=' . $id;

		if ($catid > 1)
		{
			$link .= '&catid=' . $catid;
		}

		if ($language && $language !== '*' && Multilanguage::isEnabled())
		{
			$link .= '&lang=' . $language;
		}

		return $link;
	}

	/**
	 * Get the URL route for a agmap from a agmap ID, agmaps category ID and language
	 *
	 * @param   integer  $id        The id of the agmaps
	 * @param   integer  $catid     The id of the agmaps's category
	 * @param   mixed    $language  The id of the language being used.
	 *
	 * @return  string  The link to the agmaps
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public static function getAgmapRoute($id, $catid, $language = 0)
	{
		// Create the link
		$link = 'index.php?option=com_agmaps&view=agmap&id=' . $id;

		if ($catid > 1)
		{
			$link .= '&catid=' . $catid;
		}

		if ($language && $language !== '*' && Multilanguage::isEnabled())
		{
			$link .= '&lang=' . $language;
		}

		return $link;
	}

	/**
	 * Get the URL route for a agmaps category from a agmaps category ID and language
	 *
	 * @param   mixed  $catid     The id of the agmaps's category either an integer id or an instance of CategoryNode
	 * @param   mixed  $language  The id of the language being used.
	 *
	 * @return  string  The link to the agmaps
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public static function getCategoryRoute($catid, $language = 0)
	{
		if ($catid instanceof CategoryNode)
		{
			$id = $catid->id;
		}
		else
		{
			$id = (int) $catid;
		}

		if ($id < 1)
		{
			$link = '';
		}
		else
		{
			// Create the link
			$link = 'index.php?option=com_agmaps&view=category&id=' . $id;

			if ($language && $language !== '*' && Multilanguage::isEnabled())
			{
				$link .= '&lang=' . $language;
			}
		}

		return $link;
	}
}
