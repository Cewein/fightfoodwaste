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

<br />
<table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
        <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: identifiant in C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php on line <i>96</i></th></tr>
        <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
        <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
        <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0070</td><td bgcolor='#eeeeec' align='right'>378616</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>0</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.1258</td><td bgcolor='#eeeeec' align='right'>415440</td><td bgcolor='#eeeeec'>set_role( ???, ??? )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>38</td></tr>
    </table>
​