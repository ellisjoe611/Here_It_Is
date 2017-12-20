<?php
 include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/connect/connect.php';
 include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/common/session.php';
     include_once $_SERVER['DOCUMENT_ROOT'].'/myservice/log/memberLog.php';
 
if (isset($_POST["content_id"])) {
    $query = "
INSERT INTO product_like (product, member) VALUES(:p_id, :myMemberID)
";

    $statement = $connect -> prepare($query);
    $statement -> execute(array(':p_id' => $_POST["p_id"], ':myMemberID' => $_SESSION["myMemberID"]));

    $result = $statement -> fetchAll();
    if (isset($result)) {
        echo 'true';
    }
}
?>
