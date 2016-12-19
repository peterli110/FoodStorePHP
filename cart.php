<?php

/* 
 * Student Info: Name=Xinkai Li, ID=16271
 * Subject: CS526B_HW3_Fall_2016
 * Author: PeterLi
 * Filename: cart.php
 * Date and Time: 2016-11-11 22:10:05
 * Project Name: HW3
 */

function add_food($food_id,$quantity) {
    global $foodlist;
    if ($quantity < 1) return;

    // If book already exists in cart, update quantity
    if (isset($_SESSION['cart'][$food_id])) {
        $quantity += $_SESSION['cart'][$food_id]['qty'];
        update_food($food_id, $quantity);
        return;
    }

    // Add book
    $price = $foodlist[$food_id]['foodPrice'];
    $total = $price * $quantity;
    $food = array(
        'foodname' => $foodlist[$food_id]['foodname'],
        'price' => $price,
        'qty'  => $quantity,
        'total' => $total
    );
    $_SESSION['cart'][$food_id] = $food;
}

// Update an book in the cart
function update_food($food_id, $quantity) {
    global $foodlist;
    $quantity = (int) $quantity;
    if (isset($_SESSION['cart'][$food_id])) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$food_id]);
        } else {
            $_SESSION['cart'][$food_id]['qty'] = $quantity;
            $total = $_SESSION['cart'][$food_id]['price'] *
                     $_SESSION['cart'][$food_id]['qty'];
            $_SESSION['cart'][$food_id]['total'] = $total;
        }
    }
}

// Get cart subtotal
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $food) {
        $subtotal += $food['total'];
    }
    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}
?>
