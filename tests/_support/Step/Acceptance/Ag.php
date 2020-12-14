<?php
/**
 * @package    Ag
class Ag extends \AcceptanceTester
{
 * @copyright  Copyright (C) 2020 Digital Peak GmbH. <https://www.digital-peak.com>
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */

namespace Step\Acceptance;

class Ag extends \AcceptanceTester
{
	private $user = null;

	public function _inject(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Creates a booking in the database and returns the booking data
	 * as array including the id of the new booking.
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	public function createAgmap($data = null)
	{
	}
}
