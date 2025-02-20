<?php
/**
 * @package   awf
 * @copyright Copyright (c)2014-2022 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU GPL version 3 or later
 */

namespace Awf\Mvc\DataModel\Filter;


class Date extends Text
{
	/**
	 * Returns the default search method for this field.
	 *
	 * @return  string
	 */
	public function getDefaultSearchMethod()
	{
		return 'exact';
	}

	/**
	 * Perform a between limits match. When $include is true
	 * the condition tested is:
	 * $from <= VALUE <= $to
	 * When $include is false the condition tested is:
	 * $from < VALUE < $to
	 *
	 * @param   mixed    $from     The lowest value to compare to
	 * @param   mixed    $to       The higherst value to compare to
	 * @param   boolean  $include  Should we include the boundaries in the search?
	 *
	 * @return  string  The SQL where clause for this search
	 */
	public function between($from, $to, $include = true)
	{
		if ($this->isEmpty($from) || $this->isEmpty($to))
		{
			return '';
		}

		$extra = '';

		if ($include)
		{
			$extra = '=';
		}

		$sql = '((' . $this->getFieldName() . ' >' . $extra . ' ' . $this->db->q($from) . ') AND ';
		$sql .= '(' . $this->getFieldName() . ' <' . $extra . ' ' . $this->db->q($to) . '))';

		return $sql;
	}

	/**
	 * Perform an outside limits match. When $include is true
	 * the condition tested is:
	 * (VALUE <= $from) || (VALUE >= $to)
	 * When $include is false the condition tested is:
	 * (VALUE < $from) || (VALUE > $to)
	 *
	 * @param   mixed    $from     The lowest value of the excluded range
	 * @param   mixed    $to       The higherst value of the excluded range
	 * @param   boolean  $include  Should we include the boundaries in the search?
	 *
	 * @return  string  The SQL where clause for this search
	 */
	public function outside($from, $to, $include = false)
	{
		if ($this->isEmpty($from) || $this->isEmpty($to))
		{
			return '';
		}

		$extra = '';

		if ($include)
		{
			$extra = '=';
		}

		$sql = '((' . $this->getFieldName() . ' <' . $extra . ' ' . $this->db->q($from) . ') AND ';
		$sql .= '(' . $this->getFieldName() . ' >' . $extra . ' ' . $this->db->q($to) . '))';

		return $sql;
	}

	/**
	 * Interval date search
	 *
	 * @param   string               $value     The value to search
	 * @param   string|array|object  $interval  The interval. Can be (+1 MONTH or array('value' => 1, 'unit' => 'MONTH', 'sign' => '+'))
	 * @param   boolean              $include   If the borders should be included
	 *
	 * @return  string  the sql string
	 */
	public function interval($value, $interval, $include = true)
	{
		if ($this->isEmpty($value) || $this->isEmpty($interval))
		{
			return '';
		}

		$interval = $this->getInterval($interval);

		// Sanity check on $interval array
		if(!isset($interval['sign']) || !isset($interval['value']) || !isset($interval['unit']))
		{
			return '';
		}

		if ($interval['sign'] == '+')
		{
			$function = 'DATE_ADD';
		}
		else
		{
			$function = 'DATE_SUB';
		}

		$extra = '';

		if ($include)
		{
			$extra = '=';
		}

		$sql = '(' . $this->getFieldName() . ' >' . $extra . ' ' . $function;
		$sql .= '(' . $this->getFieldName() . ', INTERVAL ' . $interval['value'] . ' ' . $interval['unit'] . '))';

		return $sql;
	}

	/**
	 * Parses an interval –which may be given as a string, array or object– into
	 * a standardised hash array that can then be used bu the interval() method.
	 *
	 * @param   string|array|object  $interval  The interval expression to parse
	 *
	 * @return  array  The parsed, hash array form of the interval
	 */
	protected function getInterval($interval)
	{
		if (is_string($interval))
		{
			if (strlen($interval) > 2)
			{
				$interval = explode(" ", $interval);
				$sign = ($interval[0] == '-') ? '-' : '+';
				$value = (int) substr($interval[0], 1);

				$interval = array(
					'unit' => $interval[1],
					'value' => $value,
					'sign' => $sign
				);
			}
			else
			{
				$interval = array(
					'unit' => 'MONTH',
					'value' => 1,
					'sign' => '+'
				);
			}
		}
		else
		{
			$interval = (array) $interval;
		}

		return $interval;
	}

}
