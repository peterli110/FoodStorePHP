<!DOCTYPE html>
<?php
/* 
 * Student Info: Name=Xinkai Li, ID=16271
 * Subject: CS526B_HW3_Fall_2016
 * Author: PeterLi
 * Filename: index.php
 * Date and Time: 2016-11-11 22:06:22
 * Project Name: HW3
 */
require 'db_connect.php';

$category_id = 1;

if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}


$query = "SELECT categoryName FROM categories WHERE categoryID = '$category_id'";
$category = $db->query($query);
$category  = $category->fetch();
$categoryName = $category['categoryName'];
$query = "SELECT * FROM categories ORDER BY categoryID";
$categories = $db->query($query);
$query = "SELECT * FROM foods WHERE categoryID = $category_id ORDER BY foodID";
$foods = $db->query($query);
$duration = 60 * 60 * 24 * 7;    

session_set_cookie_params($duration, '/');
session_start();


if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$foodlist = array();
$foodlist['1'] = array('foodname' => 'Bread', 'foodPrice' => '1.00');
$foodlist['2'] = array('foodname' => 'Cookie', 'foodPrice' => '2.00');
$foodlist['3'] = array('foodname' => 'Noodle', 'foodPrice' => '5.00');
$foodlist['4'] = array('foodname' => 'Rice', 'foodPrice' => '4.00');
$foodlist['5'] = array('foodname' => 'Chicken', 'foodPrice' => '8.00');
$foodlist['6'] = array('foodname' => 'Beef', 'foodPrice' => '9.00');
$foodlist['7'] = array('foodname' => 'Coke', 'foodPrice' => '1.00');
$foodlist['8'] = array('foodname' => 'DietCoke', 'foodPrice' => '1.00');

require_once('cart.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'add_food';
    }
}

// Add or update cart as needed
if ($action == 'Add to cart') {
    $food_id = filter_input(INPUT_POST, 'food_id');
    $foodqty = filter_input(INPUT_POST, 'foodqty');
    add_food($food_id, $foodqty);
    include('cart_view.php');
} else if ($action == 'update') {
    $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                     FILTER_REQUIRE_ARRAY);
    foreach ($new_qty_list as $food_id => $qty) {
        if ($_SESSION['cart'][$food_id]['qty'] != $qty) {
            update_food($food_id, $qty);
        }
    }
    include('cart_view.php');
}else if ($action == 'add_food') {
    include('add_food.php');
} else if ($action == 'empty_cart') {
    unset($_SESSION['cart']);
    include('cart_view.php');
}
?>

