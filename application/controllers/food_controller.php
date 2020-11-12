<?php
class Food_Controller extends JB_Controller{

    public function index(){
        $this->view('food-item'); 
    }
 //   public function menu(){
   //     $this->view('food-menu');
    //}
   
    public function menu($cat="",$subcat="",$id=""){
        if(empty($cat) AND empty($subcat) AND empty($id)){
            $this->view('food-menu');
        }else if(!empty($cat) AND empty($subcat) AND empty($id)){
            $this->view('food-menu/$cat');
        }else if(!empty($cat) AND !empty($subcat) AND empty($id)){
            $this->view('food-menu/$cat/$subcat');
        }else if(!empty($cat) AND !empty($subcat) AND !empty($id)){
            $this->view('food-menu/$cat/$subcat/$id');
        }
        
    }
    
}
?>