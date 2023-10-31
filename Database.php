<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff6b6b;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        nav {
            background-color: #ffd166;
            text-align: center;
            padding: 10px 0;
        }

        nav a {
            color: #2d4059;
            text-decoration: none;
            margin: 0 10px;
            font-size: 18px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s;
            text-align: center;
        }

        table td {
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin: 0;
            padding: 0;
            color: #2d4059;
        }

        h2 {
            font-size: 24px;
            margin-top: 0;
            color: #ff6b6b;
        }

        h4 {
            font-size: 16px;
            margin: 10px 0;
            color: #2d4059;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            position: relative;
            top: -1750px;
            margin-left: -160px;
        }

        .image-h4 {
            margin-left: 320px;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        button {
            background-color: #2d4059;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        button.edit {
            background-color: #ffd166;
        }

        button.delete {
            background-color: #ff6b6b;
        }

        button:hover {
            background-color: #ff9a8b;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Povestea Scufita Rosie - Obiecte</h1>
    </header>
    <nav>
        <a href="pasul7.html">Acasa</a>
        <a href="imagini.html">Imagini</a>
        <a href="AdaugaObiecte.php">Adauga obiect</a>
        <a href="https://ro.wikipedia.org/wiki/Hans_Christian_Andersen" target="_blank">Autor</a>
        <a href="https://ro.wikipedia.org/wiki/Sold%C4%83%C8%9Belul_de_plumb" target="_blank">Wikipedia</a>
        <a href="https://www.povesti-pentru-copii.com/hans-christian-andersen.html" target="_blank">Mai multe povesti</a>
    </nav>

    <table>
        <tr>
            <?php
            include('ConnectDB.php');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM Obiecte");

            echo "<tr>";
            $fields = $result->fetch_fields();
            foreach ($fields as $field) {
                echo "<th>" . $field->name . "</th>";
            }
            echo "<th>Acțiuni</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $col) {
                    echo "<td>" . $col . "</td>";
                }
                echo '<td><a href="Edit.php?edit_id=' . $row['ID'] . ' "><button class="edit">Editare</button> <a href="Delete.php?delete_id=' . $row['ID'] . '"><button class="delete">Ștergere</button></a></td>'; // Adăugăm butoane pentru editare și ștergere
                echo "</tr>";
            }

            echo "</table";

            $conn->close();
            ?>
        </tr>
    </table>
</body>
</html>
