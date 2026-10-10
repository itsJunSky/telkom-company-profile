<?php
require_once 'config/database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $conn->prepare("SELECT judul, isi, tanggal_publish FROM berita WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$news = $result->fetch_assoc();

if (!$news) {
    $pageTitle = 'Berita Tidak Ditemukan';
    require 'includes/header.php';
    echo '<div class="container section"><h1>Berita tidak ditemukan.</h1><p><a href="news.php">Kembali ke Berita</a></p></div>';
    require 'includes/footer.php';
    exit;
}

$pageTitle = htmlspecialchars($news['judul']) . ' - Telkom University';
require 'includes/header.php';
?>
<section class="section">
    <div class="container article-body">
        <p class="meta"><?= date('d M Y', strtotime($news['tanggal_publish'])) ?></p>
        <h1><?= htmlspecialchars($news['judul']) ?></h1>
        <hr style="border: 0; border-top: 1px solid var(--line); margin: 20px 0;">
        <div style="font-size: 1.1rem; line-height: 1.8;">
            <?= nl2br(htmlspecialchars($news['isi'])) ?>
        </div>
        <div style="margin-top: 40px;">
            <a class="btn btn-outline" href="news.php">&larr; Kembali ke Daftar Berita</a>
        </div>
    </div>
</section>
<?php require 'includes/footer.php'; ?>