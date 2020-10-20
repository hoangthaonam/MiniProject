<?php
    class News extends Database{
        function getNews(){
            $data = [];
            $sql = "SELECT * FROM news";
            $result = $this->do_sql($sql);
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return json_encode($data);
        }
        function addNews($title,$author,$edit_user,$edit_time){
            $sql = "INSERT INTO news(title,author,edit_user,edit_time) 
                    VALUES('{$title}','{$author}','{$edit_user}','{$edit_time}')";
            $this->do_sql($sql);
        }
        function editNews($id,$title,$author,$edit_user,$edit_time){
            $sql = "UPDATE news SET title = '{$title}', author = '{$author}', 
            edit_user = '{$edit_user}', edit_time = '{$edit_time}'  WHERE id = {$id}";
            $this->do_sql($sql);
        }
        function deleteNews($id){
            $sql = "DELETE FROM news WHERE id = '{$id}'";
            $this->do_sql($sql);
        }
    }
?>