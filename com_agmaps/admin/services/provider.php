<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_agmaps
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Categories\CategoryFactoryInterface;
use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\CategoryFactory;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\HTML\Registry;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use AgmapNamespace\Component\Agmaps\Administrator\Extension\AgmapsComponent;
use AgmapNamespace\Component\Agmaps\Administrator\Helper\AssociationsHelper;
use Joomla\CMS\Association\AssociationExtensionInterface;
use Joomla\CMS\Component\Router\RouterFactoryInterface;
use Joomla\CMS\Extension\Service\Provider\RouterFactory;

/**
 * The agmaps service provider.
 * https://github.com/joomla/joomla-cms/pull/20217
 *
 * @since  __BUMP_VERSION__
 */
return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   __BUMP_VERSION__
	 */
	public function register(Container $container)
	{
		$container->set(AssociationExtensionInterface::class, new AssociationsHelper);

		$container->registerServiceProvider(new CategoryFactory('\\AgmapNamespace\\Component\\Agmaps'));
		$container->registerServiceProvider(new MVCFactory('\\AgmapNamespace\\Component\\Agmaps'));
		$container->registerServiceProvider(new ComponentDispatcherFactory('\\AgmapNamespace\\Component\\Agmaps'));
		$container->registerServiceProvider(new RouterFactory('\\AgmapNamespace\\Component\\Agmaps'));

		$container->set(
			ComponentInterface::class,
			function (Container $container)
			{
				$component = new AgmapsComponent($container->get(ComponentDispatcherFactoryInterface::class));

				$component->setRegistry($container->get(Registry::class));
				$component->setMVCFactory($container->get(MVCFactoryInterface::class));
				$component->setCategoryFactory($container->get(CategoryFactoryInterface::class));
				$component->setAssociationExtension($container->get(AssociationExtensionInterface::class));
				$component->setRouterFactory($container->get(RouterFactoryInterface::class));

				return $component;
			}
		);
	}
};
