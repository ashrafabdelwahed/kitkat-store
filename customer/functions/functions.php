<?php

$dns        = 'mysql:host=kitkat.test;dbname=kitkat_store';
$user       = 'root';
$pass       = '';
$options    = array (
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    $con = new PDO($dns, $user, $pass, $options);
} catch (PDOException $e) {
    echo 'failed To connect ' . $e->getMessage();
}   


// Start Function getCats

    function getProCat() {

        global $con;

        $get_cats = "SELECT * FROM product_categories";
        $stmt = $con->query($get_cats);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);

        foreach($result as $cats) {

            $cat_id = $cats->p_cat_id;
            $cat_title = $cats->p_cat_title;

            echo "
                    <li> <a href='../shop.php?p_cat=$cat_id'> $cat_title </a> </li>
                ";
        }

    }

// End Function getCats




?>


