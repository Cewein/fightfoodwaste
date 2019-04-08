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


?>

<font size='1'><table class='xdebug-error xe-uncaught-exception' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
        <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Fatal error: Uncaught TypeError: Return value of DatabaseManager::findOne() must be of the type array, boolean returned in C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\database.php on line <i>62</i></th></tr>
        <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> TypeError: Return value of DatabaseManager::findOne() must be of the type array, boolean returned in C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\database.php on line <i>62</i></th></tr>
        <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
        <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
        <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0045</td><td bgcolor='#eeeeec' align='right'>372552</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>0</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.4276</td><td bgcolor='#eeeeec' align='right'>404680</td><td bgcolor='#eeeeec'>set_role(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>26</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.4279</td><td bgcolor='#eeeeec' align='right'>405008</td><td bgcolor='#eeeeec'>getRoleId(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>73</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.4279</td><td bgcolor='#eeeeec' align='right'>405344</td><td bgcolor='#eeeeec'>DatabaseManager->findOne(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\request\dbRoles.php' bgcolor='#eeeeec'>...\dbRoles.php<b>:</b>20</td></tr>
    </table></font>



lelapin@mangeur.fr'particulier'<br />
<font size='1'><table class='xdebug-error xe-uncaught-exception' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
        <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Fatal error: Uncaught TypeError: Return value of DatabaseManager::findOne() must be of the type array, boolean returned in C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\database.php on line <i>62</i></th></tr>
        <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> TypeError: Return value of DatabaseManager::findOne() must be of the type array, boolean returned in C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\database.php on line <i>62</i></th></tr>
        <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
        <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
        <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0042</td><td bgcolor='#eeeeec' align='right'>372760</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>0</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.2414</td><td bgcolor='#eeeeec' align='right'>404888</td><td bgcolor='#eeeeec'>set_role(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>26</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.2414</td><td bgcolor='#eeeeec' align='right'>404928</td><td bgcolor='#eeeeec'>getUserIdByMail(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\inscription\inscription.php' bgcolor='#eeeeec'>...\inscription.php<b>:</b>72</td></tr>
        <tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.2414</td><td bgcolor='#eeeeec' align='right'>405280</td><td bgcolor='#eeeeec'>DatabaseManager->findOne(  )</td><td title='C:\xampp\htdocs\fightfoodwaste\fightfoodwaste\database\request\dbGetUser.php' bgcolor='#eeeeec'>...\dbGetUser.php<b>:</b>15</td></tr>
    </table></font>