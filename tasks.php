<?php
$servername = "localhost";
$username = "soumya.rathi2021@vitstudent.ac.in";
$password = "soumyA@27";
$dbname = "todolist";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $task = $_POST["task"];
  $sql = "INSERT INTO tasks (task) VALUES ('$task')";
  $conn->query($sql);
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $sql = "SELECT * FROM tasks";
  $result = $conn->query($sql);

  $tasks = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $tasks[] = $row;
    }
  }

  echo json_encode($tasks);
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
  $id = $_GET["id"];
  $sql = "DELETE FROM tasks WHERE id = $id";
  $conn->query($sql);
}

$conn->close();
?>
