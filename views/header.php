<?php
// Start the session
session_start();
?>
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
   	<?php echo 'Session_'.Session::get('username');?>
      <br>
      <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">CF</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#" class="btn btn-default">GA</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">GL</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#" class="btn btn-default">IR</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">KV</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">KW</a>
        </div>
        <div class="btn-group" role="group">
          <a type="button" href="#"  class="btn btn-default">TC</a>
        </div>
      </div>