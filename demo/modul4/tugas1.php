<?php
function generator($n = 43)
{
  for ($i = 1; $i <= $n; $i++) {
    $output = '';

    if ($i % 3 == 0) {
      $output .= 'Hello';
    }

    if ($i % 5 == 0) {
      $output .= 'World';
    }

    echo $output ?: $i;
    echo PHP_EOL;
  }
}

generator();
