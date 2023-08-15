<?php include_once("inc_header.php") ?>

<?php
// Retrieve course data from the database
$sql = "SELECT * FROM halaman";
$query = mysqli_query($koneksi, $sql);
$courseData = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>

<?php foreach ($courseData as $index => $course): ?>
    <section id="courses_<?php echo $index + 1 ?>">
        <?php if ($index % 2 == 0): ?>
            <img src="<?php echo ambil_gambar($course['id']) ?>" />
        <?php endif; ?>
        <div class="kolom">
            <p class="deskripsi"><?php echo ambil_kutipan($course['id']) ?></p>
            <h2><?php echo ambil_judul($course['id']) ?></h2>
            <?php echo maximum_kata(ambil_isi($course['id']), 30) ?>
            <p><a href="<?php echo buat_link_halaman($course['id']) ?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
        </div>
        <?php if ($index % 2 == 1): ?>
            <img src="<?php echo ambil_gambar($course['id']) ?>" />
        <?php endif; ?>
    </section>
<?php endforeach; ?>


<!-- untuk tutors -->
<section id="tutors">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Tutors</p>
            <h2>Tutors</h2>
            <p>Kolaborasi dengan praktisi ahli untuk mencetak talenta digital berkualitas.</p>
        </div>

        <div class="tutor-list">
            <?php
            $sql1       = "select * from tutors order by id asc";
            $q1         = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
            ?>
                <div class="kartu-tutor">
                    <a href="<?php echo buat_link_tutors($r1['id']) ?>">
                        <img src="<?php echo url_dasar() . "/gambar/" . tutors_foto($r1['id']) ?>" />
                        <p><?php echo $r1['nama'] ?></p>
                    </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</section>

<!-- untuk partners -->
<section id="partners">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Partners</p>
            <h2>Partners</h2>
            <p>Kami juga telah dipercaya untuk bermitra dengan beberapa Perguruan Tinggi ternama di Indonesia.</p>
        </div>

        <div class="partner-list">
            <?php
            $sql1   = "select * from partners order by id asc";
            $q1     = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_assoc($q1)) {
            ?>
                <div class="kartu-partner">
                    <a href="<?php echo buat_link_partners($r1['id'])?>">
                    <img src="<?php echo url_dasar()."/gambar/".partners_foto($r1['id'])?>"/>
                    </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</section>
<?php include_once("inc_footer.php") ?>