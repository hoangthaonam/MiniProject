<?php  
	class Home extends Controller{
		public function load(){
			if(isset($_SESSION["username"])){
				$news = $this->models("News");
				$list_news = $news->getNews();
				$this->views("layout",["page"=>"Home","list_news"=>$list_news]);
			}else{
				echo '<script type = "text/javascript">
                    alert("Login first");window.location = "http://localhost/Intern/MiniProject/Login"
                    </script>';
			}
		}
		public function addNews(){
			if(isset($_POST["create"])){
				$title = $_POST["title"];
				$author = $_POST["author"];
				$edit_time = date("Y-m-d H:i:s");
				$edit_user = $_SESSION["username"];
				$news = $this->models("News");
				$news->addNews($title,$author,$edit_user,$edit_time);
				header('Location: http://localhost/Intern/MiniProject/Home');
			}
		}
		public function editNews($id){
			if(isset($_POST["update"])){
				$title = $_POST["title"];
				$author = $_POST["author"];
				$news = $this->models("News");
				$edit_user = $_SESSION["username"];
				$edit_time = date("Y-m-d H:i:s");
				$edit_time;
				$news->editNews($id,$title,$author,$edit_user,$edit_time);
				header('Location: http://localhost/Intern/MiniProject/Home');
			}
		}
		public function deleteNews($id){
			$news = $this->models("News");
			$news->deleteNews($id);
			header('Location: http://localhost/Intern/MiniProject/Home');
		}
	}
?>