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
    header("Location: ../admin/index.php");
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
    header("Location: ../admin/index.php?homesetting=true");
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


  $query .= "about_desc='$desc' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?aboutsetting=true");
  }
}

if (isset($_POST['add-skill'])) {


  $skillname = $_POST['skill_name'];
  $skilllevel = $_POST['skill_level'];
  $query = "INSERT INTO skills (skill_name,skill_level) VALUES('$skillname','$skilllevel') ";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?aboutsetting=true");
  }
}

if (isset($_POST['add-pi'])) {


  $label = $_POST['label'];
  $value = $_POST['value'];
  $query = "INSERT INTO personal_info (label,value) VALUES('$label','$value') ";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?aboutsetting=true");
  }
}


if (isset($_POST['add-resume'])) {


  $type = $_POST['type'];
  $title = $_POST['title'];
  $org = $_POST['org'];
  $time = $_POST['time'];
  $about = $_POST['about'];

  $query = "INSERT INTO resume (type,title,time,org,about_exp ) VALUES('$type','$title','$time','$org','$about') ";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?resumesetting=true");
  }
}




if (isset($_POST['add-project'])) {


  $type = $_POST['type'];
  $project_name = $_POST['project_name'];
  $project_link = $_POST['project_link'];
  $project_image = time() . $_FILES['project_pic']['name'];

  move_uploaded_file($_FILES['Project_pic']['tmp_name'], "../images/$project_image");


  $query = "INSERT INTO portfolio (project_type,project_pic,project_name,project_link) VALUES('$type','$project_image','$project_name','$project_link') ";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?portfoliosetting=true");
  }
}

if (isset($_POST['update-contact'])) {

  $address = mysqli_real_escape_string($db, $_POST['address']);
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];


  $query = "UPDATE contact SET ";
  $query .= "address='$address',";
  $query .= "email='$email',";
  $query .= "mobile='$mobile' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?contactsetting=true");
  }
}

if (isset($_POST['update-socialmedia'])) {

  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $github = $_POST['github'];
  $linkedin = $_POST['linkedin'];



  $query = "UPDATE social_media SET ";
  $query .= "twitter='$twitter',";
  $query .= "facebook='$facebook',";
  $query .= "instagram='$instagram',";
  $query .= "github='$github',";
  $query .= "linkedin='$linkedin' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?contactsetting=true");
  }
}

if (isset($_POST['update-background'])) {
  $imagename = time() . $_FILES['background']['name'];

  $imgtemp = $_FILES['background']['tmp_name'];

  $upload_files = __DIR__ . "/../images/$imagename";

  $res = move_uploaded_file($imgtemp, $upload_files);


  $query = "UPDATE site_background SET ";
  $query .= "background_img='$imagename' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?changebackground=true");
  }
}

if (isset($_POST['update-seo'])) {


  $title = mysqli_real_escape_string($db, $_POST['page_title']);
  $keyword = mysqli_real_escape_string($db, $_POST['keyword']);
  $desc = mysqli_real_escape_string($db, $_POST['description']);
  $imagename = time() . $_FILES['siteicon']['name'];
  $imgtemp = $_FILES['siteicon']['tmp_name'];

  if ($imgtemp == '') {
    $q = "SELECT * FROM seo WHERE 1";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['siteicon'];
  }
  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE seo SET ";
  $query .= "page_title='$title',";
  $query .= "keywords='$keyword',";
  $query .= "description='$desc',";


  $query .= "siteicon='$imagename' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?seosetting=true");
  }
}

if (isset($_POST['update-account'])) {
  //print_r($_FILES);

  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $imagename = time() . $_FILES['profilepic']['name'];
  $imgtemp = $_FILES['profilepic']['tmp_name'];


  if ($imgtemp == '') {
    $q = "SELECT * FROM admin WHERE 1";
    $r = mysqli_query($db, $q);
    $d = mysqli_fetch_array($r);
    $imagename = $d['admin_profile'];
  }
  move_uploaded_file($imgtemp, "../images/$imagename");

  $query = "UPDATE admin SET";
  $query .= "fullname='$fullname',";
  $query .= "email='$email',";
  $query .= "password='$password',";


  $query .= "admin_profile='$imagename' WHERE id=1";

  $run = mysqli_query($db, $query);
  if ($run) {
    header("Location: ../admin/index.php?accountsetting=true");
  }
}
