<?php

/* 
 * Student Info: Name=Xinkai Li, ID=16271
 * Subject: CS526B_HW3_Fall_2016
 * Author: PeterLi
 * Filename: cart_view.php
 * Date and Time: 2016-11-11 22:10:37
 * Project Name: HW3
 */
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>My Restaurant</title>
    </head>
    <body>

        <header>
            <h1>My Restaurant</h1>
        </header>
        <section id="main">

            <h1>My Cart</h1>
            <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
                <p>There is nothing in your cart.</p>
            <?php else: ?>
                <form action="." method="post">
                    <input type="hidden" name="action" value="update"/>
                    <table>
                        <tr id="cart_header">
                            <th>Food</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>

                        <?php
                        foreach ($_SESSION['cart'] as $food_id => $food) :
                            $price = number_format($food['price'], 2);
                            $total = number_format($food['total'], 2);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $food['foodname']; ?>
                                </td>
                                <td>
                                    $<?php echo $price; ?>
                                </td>
                                <td>
                                    <input type="text"
                                           name="newqty[<?php echo $food_id; ?>]"
                                           value="<?php echo $food['qty']; ?>"/>
                                </td>
                                <td>
                                    $<?php echo $total; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"><b>Subtotal</b></td>
                            <td>$<?php echo get_subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="submit" value="Update Cart"/>
                            </td>
                        </tr>
                    </table>
                    <p>Click "Update Cart" to update quantities in your
                        cart. Enter a quantity of 0 to remove a food.
                    </p>
                </form>
            <?php endif; ?>
            <p><a href=".?action=empty_cart">Empty Cart</a></p>
            <p><a href=".?action=add_food">Add Food</a></p>
        </section>
    </body>
</html>

