<?php

function formatTime($t)
{
  $m = $t % 60;
  $h = floor(($t % 3600) / 60);

  return "$h h $m min";
}
