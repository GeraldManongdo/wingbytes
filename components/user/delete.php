<?php
require("../../backend/server.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Delete the product
    $sql = "DELETE FROM account WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../../admin/userList.php");
    } else {
        header("Location: manage.php");
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the manage page if the request method is not POST
    header("Location: manage.php");
}
?>