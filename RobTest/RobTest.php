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

    /* ### APPLICANT INSTRUCTIONS ### */
    /*
     * Using the code and examples provided create a form that asks for Basic information such as firstname, lastname
     * school attended, average gpa, and hobbies. 
     * Hobbies should be a text area. 
     * Average GPA should be a select ranging from 0.00 to 4.50
     *
     * DO NOT USE BASIC HTML FORMS, this is a test for comprehension of Object Oriented PHP and although code can altered
     * and enhanced, the basic principles must be kept intact. Unless you impress us, using basic Forms and HTML will affect
     * your consideration.
     * 
     * Above each function and class should be an empty comment. Fill these in with basic php documention.
     * e.g like below
     *
     * @author Robert Rico
     * @version 1.0
     * @copyright Copyright (c) 2015, Robert Rico
     * @see  For help go to http://manual.phpdoc.org/HTMLSmartyConverter/HandS/phpDocumentor/tutorial_phpDocumentor.howto.pkg.html 
     *
     * Reply to the provided email with the source code you created as attachments.
     * Files that must be present:
     *  -RobTest.php
     *  -RobPost.php
     *  -Screenshot of RobTest.php
     *  -Screenshot of RobPost.php
     *
     * For extra Credit use the provided twitter bootstrap stylesheets and throw in some jquery or javascript.
     * For even more extra credit style the RobPost.php page to the best of your abilities.
     * Styling does not affect your chances directly, but if you possess the skills to create an aesthetically pleasing
     * application, do so.
     */

    /**/
    class Form {

        /**/
        public function drawForm($method=null,$action = null,$insides = null){
            return '<form method="'.$method.'" action="'.$action.'">'.$insides.'</form>';
        }

        /**/
        public function drawSelect($name=null,$options=null,$classes = null){
            $select = '<select name="'.$name.'" class="'.$classes.'">';
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
        $inputs = '';

        $options = array(
            array('value'=>'volvo','displayname'=>'Volvo'),
            array('value'=>'ford','displayname'=>'Ford'),
            array('value'=>'dodge','displayname'=>'Dodge'),
            array('value'=>'saab','displayname'=>'Saab'),
            array('value'=>'fiat','displayname'=>'Fiat')
        );
        $options = $form->drawOptions($options); 

        $label = $form->drawLabel('car','Car Makes',null);
        $select = $form->drawSelect('car',$options,'form-control');

        $inputs .= $form->drawDiv('form-group',$label.$select);
        $inputs .= $form->drawSubmit('Go','btn btn-primary');

        $carform = $form->drawForm('POST','RobPost.php',$inputs);
        $offsetform = $form->drawDiv('col-md-4 col-md-offset-4',$carform);

        /* Final Form Draw */
        echo $form->drawDiv('row',$offsetform);
    ?>

</body>
</html>
