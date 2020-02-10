<?php
/**
 * AbuseFilterBypass
 *
 * Allows privileged users to bypass AbuseFilter checks
 *
 * @author Nelson Monterroso <nelson@wikia-inc.com>
 * @author Jack Phoenix -- modernization etc. on 31 July 2019
 */

class AbuseFilterBypass {
	/**
	 * Determine if a user should be allowed to skip filter checks
	 *
	 * @param AbuseFilterVariableHolder $vars The variables for the current action
	 * @param Title $title The title where the action being filtered was performed
	 * @param User $user The user who performed the action being filtered
	 * @param array &$skipReasons Array of reasons why the action should be skipped
	 * @return bool
	 */
	public static function onBypassCheck( $vars, $title, User $user, &$skipReasons ) {
		$skipFilters = $user->isAllowed( 'abusefilter-bypass' );
		$skipReasons[] = "user has 'abusefilter-bypass' user right";
		return !$skipFilters; // since we check that these hooks return false
	}
}
