<?php
/**
 * Description of base
 *
 * @author Нурсултан
 */
class ctrl {
    
    public function __construct() {
        $this->db = new db();
        if (!empty($_COOKIE['uid']) && !empty($_COOKIE['key'])){
            $this->user = $this->db->query("SELECT * FROM admin WHERE id = ? AND cookie = ?",$_COOKIE['uid'],$_COOKIE['key']);
        } else {
            $this->user = false;
        }
    }
    
    public function out($tplname,$nested = false) {
        if (!$nested){
            $this->tpl = $tplname;
            include "tpl/main.php";
        } else
            include "tpl/".$tplname;
    }
}

class app {
    public function __construct($path) {
        
        $this->route = explode("/",$path);
        try {
            $this->run();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }

    }
    
    public function run(){
        $url = array_shift($this->route);
        
        if (!preg_match('#^[a-zA-Z0-9.,-]*$#', $url)) throw new Exception ('Invalid path');
        $ctrlName = 'ctrl'.  ucfirst($url);
        if (file_exists('app/'.$ctrlName.'.php')){
            $this->runController($ctrlName);            
        }else {
            $url = array_unshift($this->route,$url);
            try {
                $this->runController('ctrlIndex');  
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }

            
        }
    }
    
    private function runController($ctrlName){
        
        include "app/".$ctrlName.'.php';
        $ctrl = new $ctrlName();

        if (empty($this->route)|| empty($this->route[0])) {
            $method = 'index';
        } else {
            $method = array_shift($this->route);
        }
        if (method_exists($ctrl, $method)){
            if (empty($this->route)){
            $ctrl->$method();
            } else {
                call_user_func_array (array($ctrl,$method), $this->route);
            }
        }else {
            throw new Exception('Error 404');
        } 
    }
}

