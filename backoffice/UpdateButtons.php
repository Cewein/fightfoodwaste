<?php
/**
 * Created by PhpStorm.
 * User: Sandrine
 * Date: 14/04/2019
 * Time: 17:53
 */

function getUpdateButtons($id)
{
    $buttonDelete = "<button class=\"btn fas fa-times\" onclick='deleteUser($id)'></button>";
    $buttonAdmin = "<button class=\"btn far fa-caret-square-up\" onclick='updateAdmin($id)'></button>";
    $buttonUpdate = "<button class=\"btn fas fa-hammer\" onclick='updateUser($id)' data-toggle=\"modal\" data-target=\"#updateModal\"></button>";
    $buttons = $buttonUpdate . " " . $buttonAdmin . " " . $buttonDelete;
    return $buttons;
}

function getRequestButtons($id)
{
    $buttonModal = "<button class=\"btn fas fa-clipboard-list\" type=\"button\"  data-toggle=\"modal\" data-target=\"#addModal\" onclick='displayProducts(". $id .")'></button>";
    $buttons = $buttonModal;
    return $buttons;
}