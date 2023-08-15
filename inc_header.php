<?php 
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");

// Retrieve course data from the database
$sql = "SELECT * FROM halaman";
$query = mysqli_query($koneksi, $sql);
$courseData = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Get the number of courses
$numberOfCourses = count($courseData);

// Generate a random index for the course link
$randomIndex = rand(1, $numberOfCourses);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeknoKode</title>
    <link rel="stylesheet" href="<?php echo url_dasar()?>/css/style.css">
</head>
<body>
    <nav id="home">
        <div class="wrapper">
            <div class="logo"><a href='<?php echo url_dasar()?>'>TeknoKode</a></div>
            <div class="menu">
                <ul>
                    <li><a href="<?php echo url_dasar()?>#home">Home</a></li>
                    <li><a href="<?php echo url_dasar()?>#courses_<?php echo $randomIndex; ?>">Courses</a></li>
                    <li><a href="<?php echo url_dasar()?>#tutors">Tutors</a></li>
                    <li><a href="<?php echo url_dasar()?>#partners">Partners</a></li>
                    <li><a href="<?php echo url_dasar()?>#contact">Contact</a></li>
                    <li>
                    <?php if(isset($_SESSION['members_nama_lengkap'])){
                        echo "<a href='".url_dasar()."/ganti_profile.php'>".$_SESSION['members_nama_lengkap']."</a> | <a href='".url_dasar()."/logout.php'>Logout</a>";
                    }else{?>
                        <a href="<?php echo url_dasar(); ?>/pendaftaran.php" class="tbl-biru">Sign Up</a>
                    <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="wrapper">
        <!-- Rest of your HTML code -->
