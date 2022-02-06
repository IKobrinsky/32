<?php
class controller_register extends Controller { 
function action_index() { 
    
$this->view->generate('register_view.php', 'template_view.php'); 
} 
}
?>