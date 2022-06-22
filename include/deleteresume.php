<?php
require('db.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM resume WHERE id=$id";
  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?resumesetting=true");
  }
}
