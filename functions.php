<?php

function auth()
{
  if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
    header('Location: /error');
  }
}
