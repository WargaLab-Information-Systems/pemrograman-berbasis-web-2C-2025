<?php
$artikel = [
    1 => [
        'judul' => 'Index Tutorial Belajar Bahasa Pemrograman PHP',
        'tanggal' => '2025-05-01',
        'refleksi' => 'Setelah membaca artikel di Duniailkom tentang cara membuat dan mengelola daftar artikel menggunakan PHP, saya menyadari pentingnya memahami struktur dasar dalam pengembangan web dinamis. Artikel ini memberikan panduan yang jelas tentang bagaimana menyusun data artikel dalam array asosiatif, menampilkan daftar artikel secara otomatis, serta menampilkan detail artikel secara dinamis berdasarkan parameter URL. Pendekatan ini sangat membantu bagi pemula yang ingin memahami konsep dasar pemrograman PHP dan pengelolaan konten web secara efisien.',
        'gambar' => 'php.png',
        'kutipan' => [
            'Belajar adalah kunci masa depan.',
            'Setiap kesulitan membawa pelajaran.',
            'Tekun adalah jalan menuju sukses.'
        ],
        'sumber' => 'https://www.duniailkom.com/tutorial-belajar-php-dan-index-artikel-php/'
    ],
    2 => [
        'judul' => 'Cara Membuat Website Secara Profesional, Inilah Beberapa Tahapannya',
        'tanggal' => '2025-05-10',
        'refleksi' => 'Setelah membaca panduan cara membuat website di IDWebhost, saya menyadari betapa pentingnya memahami langkah-langkah teknis sekaligus aspek praktis dalam membangun sebuah situs web. Mulai dari memilih domain, hosting, hingga mengelola konten, semuanya memerlukan perencanaan yang matang agar website bisa berjalan optimal. Panduan ini sangat membantu bagi pemula yang ingin belajar membuat website secara mudah dan terstruktur.',
        'gambar' => 'website.jpg',
        'kutipan' => [
            'Jangan takut mencoba hal baru.',
            'Setiap baris kode adalah langkah maju.',
            'Bangunlah karya, bukan hanya harapan.'
        ],
        'sumber' => 'https://idwebhost.com/cara-membuat-website'
    ]
   
];

function getKutipan($kutipanArray) {
    return $kutipanArray[rand(0, count($kutipanArray) - 1)];
}
?>
