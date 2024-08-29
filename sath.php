<?php

if(isset($_POST['login']))
{
    $user=$_POST['use'];
    echo "<h1>Welcome $user</h1>";
}
