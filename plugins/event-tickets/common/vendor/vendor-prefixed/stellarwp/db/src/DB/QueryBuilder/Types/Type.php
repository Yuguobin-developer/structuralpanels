<?php
/**
 * @license GPL-2.0
 *
 * Modified by the-events-calendar on 14-July-2023 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace TEC\Common\StellarWP\DB\QueryBuilder\Types;

use ReflectionClass;

/**
 * @since 1.0.0
 */
abstract class Type {
	/**
	 * Get Defined Types
	 *
	 * @return array
	 */
	public static function getTypes() {
		return ( new ReflectionClass( static::class ) )->getConstants();
	}
}
