<?php include './includes/auth.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include './includes/admin_header.php'; ?>

<main>
    <div class="admin_content">
        <h2>Selamat datang, <?= $_SESSION['username']; ?>!</h2>
        <p>Gunakan menu untuk mengelola kuesioner.</p>
    </div>
</main>

<?php include './includes/admin_footer.php'; ?>