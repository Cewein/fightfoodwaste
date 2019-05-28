<?php

/**
 * Created by SublimeText.
 * User: Rebecca
 * Date: 08/04/2019
 * Time: 00:57
 */

  session_start();
  session_unset();
  session_destroy();

  header('Location: index.php');
