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
		$I->wantToTest('that joomla is installed correcly and I can open the front end.');

		$I->amOnUrl('http://web-test/joomla4');

		$I->see('Home');
	}

	public function canInstallAgmapExtensions(Ag $I)
	{
		$I->wantToTest('that I can intall all agmap extensions.');

		$I->amOnUrl('http://web-test/joomla4/administrator');


		$I->see('Joomla Administrator Login');

		$I->fillField(['name' => 'username'], 'admin');
		$I->fillField(['name' => 'passwd'], 'admin');
		$I->click('#form-login button[type=submit]');

		$I->see('Home Dashboard');

		$I->click('System');

		$I->waitForText('Extensions', 10);
		$I->click('Extensions');

		$I->wait(10);

		//$I->click('Install from Folder');
		//$I->click('Upload Package File');
		$I->click('Install from URL');
		
		//$I->scrollTo(['name' => 'install_directory'], 20, 50);
		//$I->scrollTo(['id' => 'select-file-button'], 20, 50);
		$I->scrollTo(['id' => 'installbutton_url'], 20, 50);


		$I->wait(5);
		//$I->fillField(['name' => 'install_directory'], '/home/astrid/git/DPDocker/DPDocker/build/dist/AG_DP_DEPLOY_VERSION.zip');
		$I->fillField(['name' => 'install_url'], 'http://web-test/joomla4/AG_1_0.zip');
		$I->wait(5);
		$I->click(['id' => 'installbutton_url']);
		$I->wait(30);
		$I->waitForText('PKG_AG_XML_DESCRIPTION', 1);
		//Installation of the package was successful.


	}
}
