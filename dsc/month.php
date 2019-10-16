<?php



    if (isset($_GET['jan'])) {
       
      $_SESSION['month'] = $_GET['jan'];
      $month = $_GET['jan'];


    }else if (isset($_GET['feb'])) {
      $_SESSION['month'] = $_GET['feb'];
      $month = $_GET['feb'];


    }elseif (isset($_GET['mar'])) {
      $_SESSION['month'] = $_GET['mar'];
      $month = $_GET['mar'];


    }elseif (isset($_GET['april'])) {
      $_SESSION['month'] = $_GET['april'];
      $month = $_GET['april'];


    }elseif (isset($_GET['may'])) {
      $_SESSION['month'] = $_GET['may'];
      $month = $_GET['may'];


    }elseif (isset($_GET['jun'])) {
      $_SESSION['month'] = $_GET['jun'];
      $month = $_GET['jun'];


    }elseif (isset($_GET['july'])) {
      $_SESSION['month'] = $_GET['july'];
      $month = $_GET['july'];


    }elseif (isset($_GET['aug'])) {
      $_SESSION['month'] = $_GET['aug'];
      $month = $_GET['aug'];


    }elseif (isset($_GET['sep'])) {
      $_SESSION['month'] = $_GET['sep'];
      $month = $_GET['sep'];


    }elseif (isset($_GET['oct'])) {
      $_SESSION['month'] = $_GET['oct'];
      $month = $_GET['oct'];


    }elseif (isset($_GET['nov'])) {
      $_SESSION['month'] = $_GET['nov'];
      $month = $_GET['nov'];


    }elseif (isset($_GET['dec'])) {
      $_SESSION['month'] = $_GET['dec'];
      $month = $_GET['dec'];
    }



?>