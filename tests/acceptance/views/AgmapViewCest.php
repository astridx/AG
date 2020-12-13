<?php
/**
 * @package    AG
 * @copyright  Copyright (C) 2020 Astrid Günther. <https://www.astrid-guenther.de>
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

use Step\Acceptance\Ag;

class AgmapViewCest extends \BasicAGCestClass
{
	public function canOpenJoomla(Ag $I)
	{
		$I->wantToTest('that joomla is installed correcly and I can open the frond end.');

		$I->amOnUrl('http://web-test/joomla');

		$I->see('Home');
	}
	public function canInstallAgmapExtensions(Ag $I)
	{
		$I->wantToTest('that I can intall all agmap extensions.');

		$I->amOnUrl('http://web-test/joomla/administrator');


		$I->see('Joomla Administrator Login');

//		$I->doAdministratorLogin();
		//$I->see('Home Dashboard');


	}
}
