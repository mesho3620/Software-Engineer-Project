<?php

require_once(__ROOT__ . "view/View.php");
class ViewMovies extends View{
	public function output(){
		$str = "";
		$str.="<a href='profile.php'>Back to Profile </a>";
		$str.="<table>";
		$str.="<tr><th>Name</th><th>Year</th></tr>";
		foreach($this->model->getMovies() as $Movie){
			$str.="<tr>";
			$str.="<td>".$Movie->getName() ."  </td> ";
			$str.="<td>" . $Movie->getYear() ."</td> ";
			$str.="<td><a href='Movies.php?action=delete&id=".$Movie->getID()." '>  Delete". "</td> ";
			$str.="</tr>";
		}
		$str.="</table>";
		return $str;
	}
	function addForm(){
		$str='<form action="Movies.php?action=add" method="post">
		<div><input type="text" name="name" placeholder="Enter name"/>
		<input type="text" name="year" placeholder="Enter year"/>
		<input type="submit" value="add movie" /></div>
		</form>';
		return $str;
	}
}
?>