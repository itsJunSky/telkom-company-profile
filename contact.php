<?php
require_once 'config/database.php';

$pageTitle = 'Kontak - Telkom University';
$status = $_GET['status'] ?? '';

require 'includes/header.php';
?>

<section class="section">
    <div class="container" style="max-width: 600px;">
        <div class="section-heading">
            <span class="eyebrow">Hubungi Kami</span>
            <h1>Kirim Pesan</h1>
            <p class="lead">Isi formulir di bawah ini untuk mengirimkan pesan atau pertanyaan.</p>
        </div>

        <?php if ($status === 'success'): ?>
            <div style="padding: 12px 16px; margin-bottom: 20px; border-radius: 6px; background: #d4edda; color: #155724;">
                Pesan Anda berhasil dikirim!
            </div>
        <?php elseif ($status === 'empty'): ?>
            <div style="padding: 12px 16px; margin-bottom: 20px; border-radius: 6px; background: #f8d7da; color: #721c24;">
                Semua kolom wajib diisi!
            </div>
        <?php elseif ($status === 'invalid_email'): ?>
            <div style="padding: 12px 16px; margin-bottom: 20px; border-radius: 6px; background: #f8d7da; color: #721c24;">
                Format email tidak valid!
            </div>
        <?php elseif ($status === 'error'): ?>
            <div style="padding: 12px 16px; margin-bottom: 20px; border-radius: 6px; background: #f8d7da; color: #721c24;">
                Gagal mengirim pesan. Silakan coba lagi.
            </div>
        <?php endif; ?>

        <form action="contact_process.php" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
            <div>
                <label for="nama" style="display: block; margin-bottom: 6px; font-weight: 600;">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" style="width: 100%; padding: 10px; border: 1px solid var(--line); border-radius: 6px;" required>
            </div>
            <div>
                <label for="email" style="display: block; margin-bottom: 6px; font-weight: 600;">Email</label>
                <input type="email" id="email" name="email" style="width: 100%; padding: 10px; border: 1px solid var(--line); border-radius: 6px;" required>
            </div>
            <div>
                <label for="pesan" style="display: block; margin-bottom: 6px; font-weight: 600;">Pesan</label>
                <textarea id="pesan" name="pesan" rows="5" style="width: 100%; padding: 10px; border: 1px solid var(--line); border-radius: 6px;" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="padding: 12px; font-weight: 600; cursor: pointer;">Kirim Pesan</button>
        </form>
    </div>
</section>

<?php require 'includes/footer.php'; ?>