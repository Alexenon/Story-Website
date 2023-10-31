<!DOCTYPE html>
<html>
<head>
    <title>Adaugare Obiect</title>
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
    <h2>Adaugare Obiect</h2>
    <form method="post">
        <label for="id">ID Obiect:</label>
        <input type="text" name="id" required>
        <br>
        <label for="NumeObiect">Nume Obiect:</label>
        <input type="text" name="NumeObiect" required>
        <br>
        <label for="Descriere">Descriere:</label>
        <input type="text" name="Descriere" required>
        <br>
        <label for="Stare">Stare:</label>
        <input type="text" name="Stare" required>
        <br>
        <input type="submit" value="Adauga Obiect">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $NumeObiect = $_POST["NumeObiect"];
        $Descriere = $_POST["Descriere"];
        $Stare = $_POST["Stare"];

        include('ConnectDB.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->prepare("INSERT INTO Obiecte (ID, NumeObiect, Descriere, Stare) VALUES (?, ?, ?, ?)");
        $query->bind_param("isss", $id, $NumeObiect, $Descriere, $Stare);

        if ($query->execute()) {
            header("Location: Database.php");
        } else {
            echo "Eroare la adaugarea obiectului: " . $conn->error;
        }

        $query->close();
        $conn->close();
    }
    ?>
</body>
</html>
