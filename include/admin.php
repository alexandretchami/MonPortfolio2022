<?php
require('../include/db.php');
if (isset($_POST['update-section'])) {


  $home = $_POST['home'] ?? 0;
  $about = $_POST['about'] ?? 0;
  $portfolio = $_POST['portfolio'] ?? 0;
  $resume = $_POST['resume'] ?? 0;
  $contact = $_POST['contact'] ?? 0;

  $query = "UPDATE section_control SET ";
  $query .= "home_section='$home',";
  $query .= "about_section='$about',";
  $query .= "resume_section='$resume',";
  $query .= "portfolio_section='$portfolio',";
  $query .= "contact_section='$contact' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href = '../admin/index.php';</script>";
  }
}

// To update the form

if (isset($_POST['update-home'])) {


  $title = mysqli_real_escape_string($db, $_POST['title']);
  $subtitle = mysqli_real_escape_string($db, $_POST['subtitle']);
  $showicons = $_POST['showicons'] ?? 0;


  $query = "UPDATE home SET ";
  $query .= "title='$title',";
  $query .= "subtitle='$subtitle',";
  $query .= "showicons='$showicons' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href = '../admin/index.php?homesetting=true';</script>";
  }
}

if (isset($_POST['update-about'])) {

  $title = mysqli_real_escape_string($db, $_POST['about_title']);
  $subtitle = mysqli_real_escape_string($db, $_POST['about_subtitle']);
  $desc = mysqli_real_escape_string($db, $_POST['about_desc']);
  $imagename = time() . $_FILES['profile']['name'];
  $imgtemp = $_FILES['profile']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM about WHERE 1";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['profile_pic'];
  }
  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE about SET ";
  $query .= "about_title='$title',";
  $query .= "about_subtitle='$subtitle',";
  $query .= "profile_pic='$imagename',";

  echo $query;

  $query .= "about_desc='$desc' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    echo "<script>window.location.href = '../admin/index.php?aboutsetting=true';</script>";
  }
}
