<!DOCTYPE html>
<html>
<head>
    <title>
        PHP ROB TEST
    </title>
    <?php /* Styles */ ?>
    <?php /* Why do you think I used a php comment here? Inspect the Source on the page and find this comment for a hint... */ ?>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
    error_reporting(-1);
    ini_set('display_errors', 'On');

    /**/
    class Form {

        /**/
        public function drawForm($action = null,$insides = null){
            return '<form action="'.$action.'">'.$insides.'</form>';
        }

        /**/
        public function drawSelect($id=null,$options=null,$classes = null){
            $select = '<select id="'.$id.'" class="'.$classes.'">';
            foreach($options as $option){
                $select .= $option;
            }
            $select .='</select>';
            return $select;
        }

        /*
         * $options = array(
         *      0 => array('value'=>'val','displayname'=>'FriendlyName'),
         *      1 => array('value'=>'val','displayname'=>'FriendlyName')
         * )
         */
        public function drawOptions($options){
            $complete = array();
            foreach($options as $option){
                $complete[] = '<option value="'.$option['value'].'">'.$option['displayname'].'</options>';
            }
            return $complete;
        }

        /* How can the following function be condensed to one line? */
        public function drawSubmit($text = null,$classes=null,$id=null){
            if($text == null){
                $text = 'Submit';
            }

            return '<button id="'.$id.'"class="'.$classes.'"type="submit">'.$text.'</button>';
        }

        public function drawDiv($classes=null,$insides=null){
            return '<div class="'.$classes.'">'.$insides.'</div>';
        }

        public function drawLabel($for=null,$label=null,$classes=null){
            return '<label for="'.$for.'" class="'.$classes.'">'.$label.'</label>';
        }

    }?>

    <?php 
        $form = new Form(); 
        $final = '';

        $options = array(
            array('value'=>'volvo','displayname'=>'Volvo'),
            array('value'=>'ford','displayname'=>'Ford'),
            array('value'=>'dodge','displayname'=>'Dodge'),
            array('value'=>'saab','displayname'=>'Saab'),
            array('value'=>'fiat','displayname'=>'Fiat')
        );
        $options = $form->drawOptions($options); 

        $label = $form->drawLabel('cars','Car Makes',null);
        $select = $form->drawSelect('cars',$options,'form-control');

        $final .= $form->drawDiv('form-group',$label.$select);
        $final .= $form->drawSubmit('Go','btn btn-primary');

        $carform = $form->drawForm($final);
        $offsetform = $form->drawDiv('col-md-4 col-md-offset-4',$carform);

        /* Final Form Draw */
        echo $form->drawDiv('row',$offsetform);
    ?>

</body>
</html>
