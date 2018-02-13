<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>
<?php
session_start();
if(session_destroy())
{
header("Location: login.php");
}
 
?>
