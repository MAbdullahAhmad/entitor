<!DOCTYPE html>

<html lang="en">
  <head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Entitor<?=isset($subtitle)?" | $subtitle":""?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/lib/bootstrap/bootstrap.min.css">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="assets/lib/toastr/toastr.min.css">
    <!-- Required Custom CSS -->
    <link rel="stylesheet" href="assets/css/vars.css">
    <link rel="stylesheet" href="assets/css/scrollbar.css">
    <?php
      // Custom CSS Files
      if(isset($CSS_FILES)) foreach($CSS_FILES as $css){
        ?>
          <link rel="stylesheet" href="<?=$css?>">
        <?php
      }
    ?>
  </head>
  <body>
    <?php
      if(isset($LAYOUT_COMPONENT))
      include "components/$LAYOUT_COMPONENT";
    ?>

    <!-- JQuery -->
    <script src="assets/lib/jquery/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/lib/bootstrap/bootstrap.min.js"></script>
    <!-- Toastr JS -->
    <script src="assets/lib/toastr/toastr.min.js"></script>
    <?php
      // Custom JS Files
      if(isset($JS_FILES)) foreach($JS_FILES as $js){
        ?>
          <script src="<?=$js?>"></script>
        <?php
      }
    ?>
    <?php
      // PHP Toasts
      if(isset($toasts) && (count($toasts) > 0)){
        ?>
          <script>
            <?php
              foreach($toasts as $toast){
                ?>
                  toastr.<?=$toast['type']?>('<?=$toast['message']?>');
                <?php
              }
            ?>
          </script>
        <?php
      }
    ?>
  </body>
</html>