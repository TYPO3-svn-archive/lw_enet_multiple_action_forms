<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Helge Funk <helge.funk@e-net.info>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 * @package LwEnetMultipleActionForms
 * @subpackage Comparison|Constraint
 *
 */
class Tx_LwEnetMultipleActionForms_Comparison_Constraint_ConjunctionConstraint extends Tx_LwEnetMultipleActionForms_Comparison_Constraint_AbstractCompositeConstraint {

	/**
	 * Checks if the given value is valid according to the validators of the conjunction.
	 *
	 * If at least one error occurred, the result is FALSE.
	 *
	 * @param mixed $value The value that should be validated
	 * @return boolean
	 */
	public function isComplied($value) {
		$result = FALSE;
		/** @var $constraint Tx_LwEnetMultipleActionForms_Comparison_Constraint_ConstraintInterface */
		foreach ($this->constraints as $constraint) {
			if ($constraint->isComplied($value) === TRUE) {
				$this->errors = array_merge($this->errors, $constraint->getErrors());
				$result = TRUE;
			}
		}
		return $result;
	}
}

?>