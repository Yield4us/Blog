<?php

/**
 * Description of ctrlIndex
 *
 * @author Нурсултан
 */

class ctrlIndex extends ctrl {
    function index() {
        if (!$this->user) {
            $this->posts = $this->db->query("SELECT * FROM post ORDER BY ctime DESC")->all();
        }else {
            $user = $this->db->query("SELECT * FROM admin WHERE cookie = ?", $_COOKIE['key'])->assoc();
            $this->posts = $this->db->query("SELECT * FROM post WHERE author_id = ? ORDER BY ctime DESC", $user['id'])->all();
        }
        $this->out('posts.php');
    }

    function login() {
        if (!empty($_POST)) {
            $user = $this->db->query("SELECT * FROM admin WHERE email = ? AND pass = ?", $_POST['mail'], md5($_POST['pass']))->assoc();
            if ($user) {
                $key = md5(microtime() . rand(0, 10000));
                setcookie('uid', $user['id'], time() + 86400 * 30, '/');
                setcookie('key', $key, time() + 86400 * 30, '/');
                $this->db->query("UPDATE admin SET cookie = ? WHERE id = ?", $key, $user['id']);
                header("Location:".config::$ROOTPATH);
            } else {
                $this->error = "Invalid email or passowrd";
            }
        }
        $this->out('login.php');
    }

    function logout() {
        if (!$this->user) {
            return header("Location:".config::$ROOTPATH);
        }
        setcookie('uid', '', 0, '/');
        setcookie('key', '', 0, '/');
        header("Location:".config::$ROOTPATH);
    }
    
    function add() {
        if (!$this->user) {
            return header("Location: /Blog/");
        }

        if (!empty($_POST)) {
            $this->db->query("INSERT INTO post(title, post,ctime) VALUES(?,?,?)", htmlspecialchars($_POST['title']), $_POST['post'], time());
            header("Location:".config::$ROOTPATH);
        }

        $this->out('add.php');
    }

    function del($id) {
        if (!$this->user) {
            return header("Location:".config::$ROOTPATH);
        }

        $this->db->query("DELETE FROM post WHERE id = ?", $id);
        header("Location:".config::$ROOTPATH);
    }

    function edit($id) {
        if (!$this->user) {
            return header("Location:".config::$ROOTPATH);
        }

        if (!empty($_POST)) {
            $this->db->query("UPDATE post SET title = ?, post = ? WHERE id = ?", htmlspecialchars($_POST['title']), $_POST['post'],$id);
            return header("Location:".config::$ROOTPATH);
        }

        $this->post = $this->db->query("SELECT * FROM post WHERE id = ?", $id)->assoc();

        $this->out("add.php");
    }
    
    function post($id){
        
        $this->post = $this->db->query("SELECT * FROM post WHERE id = ?", $id)->assoc();
        $this->comments = $this->db->query("SELECT * FROM comment WHERE postId = ? ORDER BY id DESC", $id)->all();
        
        $this->out('post.php');
    }
    
    function addComment($postId){
        $this->db->query("INSERT INTO comment(author,text,postId) VALUES(?,?,?)",  htmlspecialchars($_POST['name']),htmlspecialchars($_POST['text']),$postId);
        setcookie('name', $_POST['name'], time() + 86400 * 30, '/');
        header("Location:".config::$ROOTPATH."?post/".intval($postId));
    }
    
    function delComment($id, $postId){
        if (!$this->user) {
            return header("Location:".config::$ROOTPATH);
        }
        
        $this->db->query("DELETE FROM comment WHERE id = ?", $id);
        
        header("Location:".config::$ROOTPATH."?post/".intval($postId));
    }
    
    function signup(){
        if (!empty($_POST)) {
            $this->db->query("INSERT INTO admin(email,pass) VALUES(?,?)",  htmlspecialchars($_POST['mail']),md5($_POST['pass']));
            $this->login();
            header("Location:".config::$ROOTPATH);
        }
        $this->out('signup.php');
    }

}
