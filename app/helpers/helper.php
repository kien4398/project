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
    function showCategory($categories,$parent,$text,$children){
        foreach($categories as $category){
            if ($category['parent'] == $parent) {
                if($category['id']==$children){
                    echo "<option selected value=".$category['id'].">".$text.$category['name']."</option>";
                }else{
                    echo "<option value=".$category['id'].">".$text.$category['name']."</option>";
                }
                    $newParent = $category['id'];
                    echo showCategory($categories,$newParent, $text."--",$children);
                }
            }
        }
    }
