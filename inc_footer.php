</div>

<div id="contact">
    <div class="wrapper">
        <div class="footer">
            <?php
            $sql = "SELECT * FROM info";
            $query = mysqli_query($koneksi, $sql);
            $infoData = mysqli_fetch_all($query, MYSQLI_ASSOC);
            
            foreach ($infoData as $info) {
            ?>
                <div class="footer-section">
                    <h3><?php echo $info['judul']; ?></h3>
                    <?php echo $info['isi']; ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="wrapper">
        &copy; <?php echo date('Y'); ?>. <b>TeknoKode</b> All Rights Reserved.
    </div>
</div>

    
</body>
</html>