<!DOCTYPE html>
<html>
 <head>
 <title> Memory </title>
 <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>

<?php 

session_start();

if (!isset($_SESSION["tab"])){
    $_SESSION["tab"] = ['&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp','&nbsp'];
    $_SESSION["count"] = 0;
    $_SESSION["empty"] = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
    $_SESSION["cards"] = ["$","&","@","$","€","#","§","@","%","£","#","&","£","€","§","%"];
    shuffle($_SESSION["cards"]);
}

if(isset($_GET['restart'])){
    session_destroy();
    header('Location:index.php');
    $_SESSION["count"] = 0;
    $_SESSION["pressed"]=["a","b"];
    $_SESSION["key"] = ["",""];
    $win = false;
    $_SESSION["cards"] = ["$","&","@","$","€","#","§","@","%","£","#","&","£","€","§","%"];
    shuffle($_SESSION["cards"]);
}

if(isset($_GET)){
    if($_SESSION["tab"][key($_GET)-1]=='&nbsp'){
        $_SESSION["tab"][key($_GET)-1] = $_SESSION["cards"][key($_GET)-1] ;
        $_SESSION["pressed"][] = $_SESSION["tab"][key($_GET)-1];
        $_SESSION["key"][] = key($_GET)-1;
        header('Location:index.php');
        $_SESSION["count"] ++;
        }
}

if ($_SESSION["pressed"][0]==$_SESSION["pressed"][1] && $_SESSION["pressed"] != NULL){
   $win = true;
}

if ($_SESSION["count"] >2 && $win == false){
    $_SESSION["tab"][$_SESSION["key"][0]] = '&nbsp';
    $_SESSION["tab"][$_SESSION["key"][1]] = '&nbsp';
    $_SESSION["count"] = 1;
    $_SESSION["pressed"]=NULL;
    $_SESSION["key"] = NULL;
    $_SESSION["pressed"][] = $_SESSION["tab"][key($_GET)-1];
    $_SESSION["key"][] = key($_GET)-1;
    header('Location:index.php');
}
elseif($_SESSION["count"] >2 && $win == true){
    $_SESSION["count"] = 1;
    $_SESSION["pressed"]=NULL;
    $_SESSION["key"] = NULL;
    $_SESSION["pressed"][] = $_SESSION["tab"][key($_GET)-1];
    $_SESSION["key"][] = key($_GET)-1;
    header('Location:index.php');
}

if($_SESSION["count"]>2){
    $_SESSION["key"] = ["",""];
    $_SESSION["count"] = 0;
    header('Location:index.php');}
?>

<div class="game">
<div class="container"> 
<div class="newgame">
    <form method="GET">
        <input type='submit' value='START' name='restart'>  </input>
    </form>
</div>
<div class="game">

<form method = "get">
    <table>
        <tr>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][0]?> name='1'> <?php echo $_SESSION["tab"][0]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][1]?> name='2'> <?php echo $_SESSION["tab"][1]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][2]?> name='3'> <?php echo $_SESSION["tab"][2]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][3]?> name='4'> <?php echo $_SESSION["tab"][3]?> </button> </td>
            </tr>
        <tr>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][4]?> name='5'><?php echo $_SESSION["tab"][4]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][5]?> name='6'><?php echo $_SESSION["tab"][5]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][6]?> name='7'><?php echo $_SESSION["tab"][6]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][7]?> name='8'><?php echo $_SESSION["tab"][7]?> </button> </td>
            </tr>
        <tr>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][8]?> name='9'><?php echo $_SESSION["tab"][8]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][9]?> name='10'><?php echo $_SESSION["tab"][9]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][10]?> name='11'><?php echo $_SESSION["tab"][10]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][11]?> name='12'><?php echo $_SESSION["tab"][11]?> </button>     </td>
            </tr>
        <tr>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][12]?> name='13'><?php echo $_SESSION["tab"][12]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][13]?> name='14'><?php echo $_SESSION["tab"][13]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][14]?> name='15'><?php echo $_SESSION["tab"][14]?> </button> </td>
            <td> <button type='submit' value=<?php echo $_SESSION["tab"][15]?> name='16'><?php echo $_SESSION["tab"][15]?> </button> </td>
            </tr>
    </table>
</form>
</div>
</div>
</div>
</body>
</html>
