<?php
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
?>

<ul>
<?php foreach ($list as $i => &$item)
{
	$itemParams = $item->getParams();
	$class      = '';

	if ($item->id == $active_id)
	{
		$class .= ' current';
	}

	echo '<li class="' . $class . '">';

	require ModuleHelper::getLayoutPath('mod_menu', 'default_url');

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul>';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
?></ul>
