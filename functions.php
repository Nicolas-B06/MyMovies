<?php

function check()
{
  if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
    http_response_code(403);
  }
}