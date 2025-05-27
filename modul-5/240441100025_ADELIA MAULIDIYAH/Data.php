<?php
$artikel = [
    1 => [
        'judul' => 'Belajar Dasar HTML ',
        'tanggal' => '2025-05-01',
        'refleksi' => 'Sebagai seorang yang tengah menempuh pendidikan di Sekolah Menengah Kejuruan terutama di jurusan Rekayasa Perangkat Lunak, tentu pasti tidak asing dengan istilah HTML. Sebenarnya istilah ini tentunya tidak hanya sering di dengan oleh mereka yang  menggeluti bidang ini saja, orang awam pun pasti sudah sering mendengar istilah HTML tersebut.Disini saya akan mencoba sharing tentang HTML, apa itu HTML, cara penulisan HTML, Tag HTML, dan keuntungan menggunakan HTML.',
        'gambar' => 'html.png',
        'kutipan' => [
            'Belajar adalah kunci masa depan.',
            'Setiap kesulitan membawa pelajaran.',
            'Tekun adalah jalan menuju sukses.'
        ],
        'sumber' => 'https://www.gamelab.id/news/213-belajar-mengenal-dasar-html'
    ],
    2 => [
        'judul' => 'Cara Membuat Website Dari Nol',
        'tanggal' => '2025-05-10',
        'refleksi' => 'Di era digital marketing seperti sekarang, website memang jadi salah satu alat paling penting untuk menunjukkan kehadiran Anda atau bisnis Anda secara online. Terlebih, jika Anda berbisnis barang atau jasa, website sangatlah dibutuhkan. Contoh sederhana, Anda bisa membuat website toko online untuk berjualan produk Anda dan menjadi etalase produk Anda. Bagi yang bergerak di bidang jasa atau layanan, Anda juga bisa menampilkan portofolio atau karya pribadi.',
        'gambar' => 'website.jpg',
        'kutipan' => [
            'Jangan takut mencoba hal baru.',
            'Setiap baris kode adalah langkah maju.',
            'Bangunlah karya, bukan hanya harapan.'
        ],
        'sumber' => 'https://berdu.id/blog/cara-buat-website-dari-nol-tanpa-coding-untuk-pemula'
    ]
];

function getKutipan($kutipanArray) {
    return $kutipanArray[rand(0, count($kutipanArray) - 1)];
}
?>