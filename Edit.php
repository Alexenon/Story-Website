<?php
if (isset($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];

    $servername = "localhost";
    $username = "root";
    $password = "qwe123";
    $dbname = "FairytaleDatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM Obiecte WHERE ID = ?");
    $stmt->bind_param("i", $editId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #ffdb4d;
            text-align: center;
        }

        h2 {
            color: #ff6b6b;
        }

        form {
            background-color: #ffffff;
            border: 2px solid #ff6b6b;
            border-radius: 10px;
            padding: 20px;
            max-width: 450px;
            margin: 0 auto;
        }

        label {
            color: #ff6b6b;
            display: block;
            margin-top: 10px;
            font-size: 18px;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: 2px solid #ff6b6b;
            border-radius: 5px;
            font-size: 16px;
            color: #ff6b6b;
        }

        input[type="submit"] {
            background-color: #ff6b6b;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #ff4040;
        }
        </style>
        </head>
        <body>
            <h2>Editare Obiect</h2>
            <form method="post">
                <label for="id">ID Obiect:</label>
                <input type="text" name="id" value="<?php echo $row['ID']; ?>" required>
                <br>
                <label for="NumeObiect">Nume Obiect:</label>
                <input type="text" name="NumeObiect" value="<?php echo $row['NumeObiect']; ?>" required>
                <br>
                <label for="Descriere">Descriere:</label>
                <input type="text" name="Descriere" value="<?php echo $row['Descriere']; ?>" required>
                <br>
                <label for="Stare">Stare:</label>
                <input type="text" name="Stare" value="<?php echo $row['Stare']; ?>" required>
                <br>
                <input type="submit" value="Salvează Editarea">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Record not found for editing.";
    }

    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $NumeObiect = $_POST["NumeObiect"];
    $Descriere = $_POST["Descriere"];
    $Stare = $_POST["Stare"];

    $servername = "localhost";
    $username = "root";
    $password = "qwe123";
    $dbname = "FairytaleDatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE Obiecte SET NumeObiect = ?, Descriere = ?, Stare = ? WHERE ID = ?");
    $stmt->bind_param("sssi", $NumeObiect, $Descriere, $Stare, $id);

    if ($stmt->execute()) {
        header("Location: BDSoldatelul.php");
        exit;
    } else {
        echo "Eroare la actualizarea obiectului: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
