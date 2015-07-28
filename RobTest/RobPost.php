<!DOCTYPE html>
<html>
<head>
    <title>
        PHP ROB POST
    </title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        error_reporting(-1);
        ini_set('display_errors', 'On');
    ?>
    <?php class Display {
        public function prettyPost(){
            foreach($_POST as $key => $post){
                echo '<h3><b>'.ucfirst($key).':</b> '.ucfirst($post).'</h3>';
            }
        }
        }
    ?>
    <?php $display = new Display(); ?>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php $display->prettyPost(); ?>
        </div>
    </div>

</body>
</html>
