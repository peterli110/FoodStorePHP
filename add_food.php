<?php
/* 
 * Student Info: Name=Xinkai Li, ID=16271
 * Subject: CS526B_HW3_Fall_2016
 * Author: PeterLi
 * Filename: domain.php
 * Date and Time: 2016-11-11 22:08:39
 * Project Name: HW3
 */
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>My Restaurant</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h1>Order Foods</h1>
        <div id="sidebar">
            <h2>Categories</h2>
            <?php foreach ($categories as $category) : ?>
                <ul>
                    <li>
                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
        <div id="main">
            
            <h2><?php echo $categoryName; ?></h2>
            <table>
                <tr>
                    <th>Food Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Add</th>
                </tr>
                <?php foreach ($foods as $food) : ?>
                <form action="index.php" method="post">
                    <tr>
                        <td><?php echo $food['foodName']; ?></td>
                        <td><img src='<?php echo $food['imagePath'] ?>' height=100 width=130 /></td>
                        <td><?php echo $food['foodPrice']; ?></td>
                        <td>
                            <select name="foodqty">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </option>
                                <?php endfor; ?>
                            </select><br />
                        </td>
                        <td>
                                <input type="hidden" name="food_id" 
                                       value="<?php echo $food['foodID']; ?>" />
                                <input type="hidden" name="category_id" 
                                       value="<?php echo $food['categoryID']; ?>" />
                                <input type="submit" name='action' value="Add to cart" />
                            </form>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>

