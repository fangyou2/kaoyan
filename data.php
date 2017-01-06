<?php

include "article.php";

class data {
    //链接数据库
    var $servername = "localhost";
    var $username = "root";
    var $password = "root";
    var $dbname = "kaoyan";
    var $conn;
    function __construct() {
       $this->conn=new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    function getParent(){
        $r=array();
        $sql = "select distinct a.parent FROM article a";
        $result=$this->conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $a=new article();
            $a->parent=$row["parent"];
            array_push($r,$a);
        }
        echo json_encode($r);
    }
    function getByParent($parent){
        $r=array();
        $sql = "select * from article where parent='".$parent."'";
        $result=$this->conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $a=new article();
            $a->id=$row["id"];
            $a->title=$row["title"];
            array_push($r,$a);
        }
        echo json_encode($r);
    }
    function getById($id){
        $r=array();
        $sql = "select * from article where id=".$id;
        $result=$this->conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $a=new article();
            $a->id=$row["id"];
            $a->title=$row["title"];
            $a->content=$row["content"];
            echo json_encode($a);
        }
    }
    function delete($id){
        $sql = "delete from article where id=".$id;
        $this->conn->query($sql);
    }
    function add($article){
        // 预处理及绑定
        $stmt = $this->conn->prepare("insert into article(title,content,parent) values(?,?,?)");
        $stmt->bind_param("sss", $title, $content, $parent);
        // 设置参数并执行
        $title = $article->title;
        $content = $article->content;
        $parent = $article->parent;
        $stmt->execute();
    }
    function update($article){
        // 预处理及绑定
        $stmt = $this->conn->prepare("update article set title=?,content=?,parent=? where id=?");
        $stmt->bind_param("sssi", $title, $content, $parent,$id);
        // 设置参数并执行
        $id=$article->id;
        $title = $article->title;
        $content = $article->content;
        $parent = $article->parent;
        $stmt->execute();
    }
    function change($id1,$id2){
        // 预处理及绑定
        $stmt = $this->conn->prepare("update article set id=? where id=?");
        $stmt->bind_param("ii", $i1, $i2);
        // 设置参数并执行
        $i1=999999;
        $i2=$id1;
        $stmt->execute();
        $i1=$id1;
        $i2=$id2;
        $stmt->execute();
        $i1=$id2;
        $i2=999999;
        $stmt->execute();
    }
}
?>
