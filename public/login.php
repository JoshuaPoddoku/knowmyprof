<?php
/**
 * Created by PhpStorm.
 * User: voldemort
 * Date: 4/10/18
 * Time: 9:58 AM
 */
if (isset($_POST['submit'])) {
    try {
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);
        $roll = $_POST['roll'];
$roll = mysqli_real_escape_string($connection, $roll);
$password = $_POST['password'];
$password = mysqli_real_escape_string($connection, $password);


        $sql = "SELECT id FROM users WHERE id='" . $id . "' AND password='" . $password . "'";

        

        $statement = $connection->prepare($sql);
        $statement->bindParam(':roll', $roll, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
        echo $result;
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php include "templates/header.php"; ?>
<?php //if(isset($_POST['submit'])){
//    echo $result;
//}
//?>
<form action="login.php" method="post">
    <input name="roll" type="text" placeholder="ID">
    <input type="password" placeholder="Password" name="pass">
    <input type="submit">
</form>
<?php include "templates/footer.php"; ?>

