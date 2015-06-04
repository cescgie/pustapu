<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="refresh" content="<?php echo Session::get('refresh-time')?>;URL='<?php echo $_SERVER['PHP_SELF']?>'">
   <title><?= $data['title'] . ' - ' . SITETITLE ?></title>
   <link rel="stylesheet" href="<?= URL::STYLES('bootstrap.min') ?>">
   <link rel="stylesheet" href="<?= URL::STYLES('style') ?>">
</head>
<body>
   <div class="container">
      <br>