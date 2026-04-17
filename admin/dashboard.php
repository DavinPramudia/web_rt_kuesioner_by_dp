<?php include './includes/auth.php'; ?>
<?php include '../koneksi.php'; ?>
<?php include './includes/admin_header.php'; ?>

<main class="admin-main">
    <div class="admin-content">
        <h2 class="admin-title">Selamat datang, <?= $_SESSION['username']; ?>!</h2>
        <p class="admin-text">Gunakan menu untuk mengelola kuesioner.</p>
    </div>
</main>

<?php include './includes/admin_footer.php'; ?>