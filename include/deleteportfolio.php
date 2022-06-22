<?php
require('db.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM portfolio WHERE id=$id";
  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?portfoliosetting=true");
  }
}
