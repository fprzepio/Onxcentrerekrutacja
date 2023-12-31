<?php
class Pipeline
{
  public static function make(...$functions)
  {
    return function ($arg) use ($functions) {
      foreach ($functions as $function) {
        $arg = $function($arg);
      }
      return $arg;
    };
  }
}	

$pipeline = Pipeline::make(
function ($var) { return $var * 3; },
function ($var) { return $var + 1; },
function ($var) { return $var / 2; }
);

$result = $pipeline(3);
echo $result;
?>
