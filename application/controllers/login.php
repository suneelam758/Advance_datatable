<?php

/**
 * Login Controller
 * Controls the login processes
 */

class Login extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    function __construct()
    {
        parent::__construct();
		
    }

    /**
     * Index, default action (shows the login form), when you do login/index
     */
    function index()
    {
        // show the view
        $this->view->render('login/index');
    }
    function data()
    {
            $this->view->render('login/data');
    }
    function data1()
    {
            $this->view->render('login/datta');
    }


    /**
     * The logout action, login/logout
     */
    function emplist(){
        
     
            $login_model = $this->loadModel('Login');
            $data=$login_model->read(); 
        //    print_r($data) ;
            echo json_encode($data);
        
    }

function damta(){
    
    $login_model = $this->loadModel('Login');
    $data=$login_model->readd(); 
   
    echo json_encode($data);


}

function dammta(){
    
    $login_model = $this->loadModel('Login');
    $data=$login_model->readdd(); 
   
    echo json_encode($data);


}

    function sele(){
        $uid = $_POST['id'];

            $login_model = $this->loadModel('Login');
            $data=$login_model->locate($uid); 
           
            echo json_encode($data);
        
    }
    function ss1(){
        $login_model = $this->loadModel('Login');
        $data=$login_model->ss1m(); 
       
        echo json_encode($data);

    }
    function ss2(){
        $login_model = $this->loadModel('Login');
        $data=$login_model->ss2m(); 
       
        echo json_encode($data);

    }
    function ss3(){
        $login_model = $this->loadModel('Login');
        $data=$login_model->ss3m(); 
       
        echo json_encode($data);

    }
   function upd(){
        $id = $_POST['id'];
        $s1 = $_POST['s1'];
        $s2 = $_POST['s2'];
        $login_model = $this->loadModel('Login');
        $d=$login_model->upstatus($id,$s1,$s2);
        echo json_encode($d);
         
   }
   function bupd(){
       
        $login_model = $this->loadModel('Login');
        $d=$login_model->upstatus1();
        return $d;
        // echo json_encode($d);
         
   }
  
  
   //  ################################################search######################################### 
//    function search(){
//     $id = $_POST['id'];
//         $s1 = $_POST['s1'];
//         $s2 = $_POST['s2'];
    
//     $login_model = $this->loadModel('Login');
//     $data=$login_model->searching($id,$s1,$s2); 
   
//     echo json_encode($data);


// }
//  ################################################search#########################################
}
