<?php
$artikel = [
    1 => [
        'judul' => 'Belajar Coding untuk Pemula',
        'tanggal' => '2025-01-01',
        'refleksi' => 'Memulai dengan memahami konsep dasar coding dan mengenal jenis-jenis developer dapat membantu kamu menentukan jalur belajar yang sesuai.',
        'gambar' => 'gambar1.png',
        'kutipan' => [
            'Langkah kecil hari ini adalah awal dari perjalanan besar di dunia pemrograman.',
           
        ],
        'sumber' => 'https://www.dewaweb.com/blog/belajar-coding-untuk-pemula/'
    ],
    2 => [
        'judul' => 'Belajar Pemrograman untuk Pemula',
        'tanggal' => '2025-05-01',
        'refleksi' => 'Belajar bahasa pemrograman bisa menjadi tantangan besar, terutama bagi kita yang tidak tahu harus mulai dari mana',
        'gambar' => 'gambar2.png',
        'kutipan' => [
            'Belajar adalah kunci masa depan.',
            'Setiap kesulitan membawa pelajaran.',
            'Tekun adalah jalan menuju sukses.'
        ],
        'sumber' => 'https://nawadata.com/blog/belajar-pemrograman-untuk-pemula-panduan-mudah-memahami-coding/'
    ],
    3 => [
        'judul' => 'refleksi diri hari ini atau esok',
        'tanggal' => '2021-01-21',
        'refleksi' => 'renungan kata bijak yang dapat membantu kamu menemukan kekuatan dalam dirimu sendiri, meskipun saat ini kamu sedang merasa lelah atau terpuruk.',
        'gambar' => 'gambar3.png',
        'kutipan' => [
            'Hidup selalu penuh dengan pasang surut.',
            'Setiap kesulitan membawa pelajaran.',
            'bagaimana aku bereaksi terhadap pergumulan hidup.'
        ],
        'sumber' => 'https://www.kompasiana.com/pecandusastra-netrahyahimsa5585/61e9ecc006310e558a51de22/refleksi-diri-bersama-astrid-dalam-hari-ini-atau-esok' 
    ],
];

function getKutipan($kutipanArray) {
    return $kutipanArray[rand(0, count($kutipanArray) - 1)];
}
?>