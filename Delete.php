<?php
if (isset($_GET['delete_id'])) {
    include('ConnectDB.php');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $deleteId = $_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM Obiecte WHERE ID = ?");
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
        header("Location: BDSoldatelul.php");
    } else {
        echo "Eroare la ștergerea obiectului: " . $conn->error;
    }

    $stmt->close();

    $conn->close();
}

exit;
?>
