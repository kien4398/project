<?php
if(!function_exists('fullname')){
    function fullname(){
        
    }
}
if(!function_exists('showUser')){
    function showUser($users,$child){
        foreach($users as $user){
            if($user['id'] == $child){
                echo "<option selected value=".$user['id'].">".$user['firstName']."</option>";
            }else{
                echo "<option value=".$user['id'].">".$user['firstName']."</option>";
            }
    }

    }
}
if(!function_exists('showCategory')){
    function showCategory($categories,$child){
        foreach($categories as $category){
            if($category['id']==$child){
                echo "<option selected value=".$category['id'].">".$category['name']."</option>";
            }else{
                echo "<option value=".$category['id'].">".$category['name']."</option>";
            }
        }
    }
}