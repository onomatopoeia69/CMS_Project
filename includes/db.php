<?php


            define("HOST", "localhost"); // valid constant name
            define("USER", "root"); // valid constant name
            define("PASS", ""); // valid constant name
            define("NAME", "cms"); // valid constant name


    // $db= array('host'=>'localhost', 'user' =>'root', 'pass'=>'', 'name'=>'cms');


    // foreach($db as $key=> $value){


    //     define(strtoupper($key), $value);


    // }



   $conn = mysqli_connect(HOST,USER,PASS,NAME);




