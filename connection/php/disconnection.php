<?php
  session_start();
  session_unset();
  session_destroy();

  header('Location: index.php');
  exit;

/**
 * Created by SublimeText.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 00:57
 */