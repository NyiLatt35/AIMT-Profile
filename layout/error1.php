<?php
if(isset($error)){
    echo "<ul>";
    foreach ($error as $err){
        echo "<li class='text-danger'>".$err."</li>";
    }
    echo "<ul>";
}