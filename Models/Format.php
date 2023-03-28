<?php
class Format
{
  function __construct()
  {

  }

  function sumDay($start, $end)
  {
    $first_date = strtotime($start);
    $second_date = strtotime($end);
    $datediff = abs($first_date - $second_date);
    $countday = floor($datediff / (60 * 60 * 24));
    if ($countday > 1) {
      return $countday . " days";
    } else {
      return $countday . " day";
    }
  }

  function CountDay($start, $end)
  {
    $first_date = strtotime($start);
    $second_date = strtotime($end);
    $datediff = abs($first_date - $second_date);
    $countday = floor($datediff / (60 * 60 * 24));
    return $countday;
  }

  function Currency($number)
  {
    return "$" . number_format($number, 2, ".", ",");
  }

  function DateFormat($Date)
  {
    return date("d-m-Y", strtotime($Date));
  }

  function DateTimeFormat($Date)
  {
    $time = strtotime($Date);
    return date("d-m-Y h:i:s", $time);
  }
}
?>