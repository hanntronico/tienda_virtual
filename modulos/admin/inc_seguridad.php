<?php 
session_start(); 
    if (!isset($_SESSION["s_cod"]))
    {
        header("location: ../../");
        exit;
    }
    if (!isset($_SESSION["s_tipo"]))
    {
        header("location: ../../");
        exit;
    }
?>