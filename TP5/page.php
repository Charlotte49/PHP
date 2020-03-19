<?php
session_start();
echo $_SESSION['nom']."<br>".date("d/m/Y G:i",$_SESSION['date'])."<br>".$_SESSION["site"];