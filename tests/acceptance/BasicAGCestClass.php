<?php
/**
 * @package    AG
 * @copyright  Copyright (C) 2020 Astrid Günther. <https://www.astrid-guenther.de>
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

class BasicAGCestClass
{
	public function _before(\AcceptanceTester $I)
	{
	}

	public function _after(\AcceptanceTester $I)
	{
		//$I->checkForPhpNoticesOrWarnings();
		//$I->checkForJsErrors();
	}

	public function _failed(AcceptanceTester $I)
	{
		$I->pause();
	}
}
