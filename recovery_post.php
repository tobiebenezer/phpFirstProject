<?php 
$conn = mysqli_connect('localhost','root','Awodumil@3','clientDB');
if(!$conn){
    echo 'Connection error: '.mysqli_connect_error();


}else{
    echo var_dump($conn);
}