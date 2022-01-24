<?php

function get_percent($amount, $total)
{
	return empty($total) ? 0 : ($amount * 100) / $total;
}

function get_percent_of($percent, $amount)
{
	return ($amount * $percent) / 100;
}
