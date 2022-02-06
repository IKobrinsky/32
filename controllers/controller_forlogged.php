<?php
class controller_forlogged extends Controller { 
function action_index() { 
    
$this->view->generate('forlogged_view.php', 'template_view.php'); 
} 
}
?>