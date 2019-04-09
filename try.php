<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 07/04/2019
 * Time: 22:10
 */

require_once __DIR__."/includes.php";

print_r(getUserIdByMail("sandrine.patin@free.fr"));

print_r(getRoleId('particulier'));

$idUser=getUserIdByMail("lelapin@mangeur.fr");
$idRole=getRoleId('particulier');
setRoleUser($idUser['identifiant'],$idRole['identifiant']);

echo "<br>";
$list=[20,21];
print_r(getUsersByIdList($list));



?>



<font size='1'><table class='xdebug-error xe-uncaught-exception' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
        <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Fatal error: Uncaught TypeError: Return value of DatabaseManager::internalExec() must be an instance of PDOStatement, null returned in C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\database.php on line <i>40</i></th></tr>
        <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> TypeError: Return value of DatabaseManager::internalExec() must be an instance of PDOStatement, null returned in C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\database.php on line <i>40</i></th></tr>
        <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
        <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
        <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0009</td><td bgcolor='#eeeeec' align='right'>377568</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>0</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.1033</td><td bgcolor='#eeeeec' align='right'>401560</td><td bgcolor='#eeeeec'>set_particulier(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>32</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.1197</td><td bgcolor='#eeeeec' align='right'>415088</td><td bgcolor='#eeeeec'>DatabaseManager->exec(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\request\db_set_user.php' bgcolor='#eeeeec'>...\db_set_user.php<b>:</b>17</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.1198</td><td bgcolor='#eeeeec' align='right'>415088</td><td bgcolor='#eeeeec'>DatabaseManager->internalExec(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\database.php' bgcolor='#eeeeec'>...\database.php<b>:</b>45</td></tr>
    </table></font>


​