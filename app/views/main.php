<?php require_once(APP_ROOT . '/views/includes/header.php'); ?>
<?php require_once(APP_ROOT . '/views/includes/navbar.php'); ?>

<div class="container-fluid">
     <div class="row">

      <?php Message::display(); ?> 

     <?php require_once($view); ?>
     
     </div>
</div>


<?
     // Include header, footer, or other includes using APP_ROOT
     require_once(APP_ROOT . '/views/includes/footer.php');
?>