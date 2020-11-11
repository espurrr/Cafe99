<?php
class Food_Controller extends JB_Controller{

    public function index(){
        
    }
    public function menu(){
        $this->view('food-menu');
    }
    public function test(){
        $this->view('cashier/sidebar_cashier');
    }
    
    

}
?>