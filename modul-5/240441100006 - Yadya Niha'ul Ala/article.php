<!-- article.php -->
<?php
$articles = [
  1 => [
    "title" => "How I studied and didn’t die (barely).",
    "date" => "2024-05-02",
    "paragraph" => "Di era digital kayak sekarang tuh ya, godaan buat buka HP bentar tapi jadi sejam tuh real banget. Buka WhatsApp lah, ngecek doi lagi online nggak, scroll medsos, tiba-tiba buka galeri liat meme, tau-tau udah gak belajar. Padahal tugas numpuk, kuis mepet, dan kita udah mepet dinding. Aku pernah banget ngalamin masa-masa ini, sampe akhirnya mutusin buat mulai nerapin cara-cara yang agak waras biar bisa tetep belajar tanpa tewas. Salah satunya ya pake teknik pomodoro itu—belajar 25 menit, istirahat 5 menit, ulang lagi. Trik lainnya? Kenali jam belajar kita sendiri. Ada yang produktif subuh, ada yang malam kayak vampir (aku banget). Dan, paling penting: jauhkan HP dari jangkauan! Atau ya, at least aktifin mode 'Do Not Disturb' biar notifikasi nggak nyerempet-nyerempet ke hati.",
    "image" => "img/study.jpg",
    "source" => "https://www.verywellmind.com/how-to-become-a-more-effective-learner-2795162"
  ],
  2 => [
    "title" => "Workverse: A survival guide.",
    "date" => "2025-05-10",
    "paragraph" => "Katanya dunia kerja itu tempat kamu tumbuh jadi dewasa. Tapi kadang, malah tempat kamu sadar hidup tuh nggak semanis waktu nonton drama Korea. Nyari kerja aja kadang rasanya kayak ikut The Hunger Games. Diterima? Alhamdulillah. Tapi pas udah kerja, eh malah ngerasa kayak zombie ngelakuin rutinitas yang nggak disuka. Udah gitu, kalau kamu nggak cinta sama apa yang kamu kerjain, capeknya tuh double. kamu kerja iya, tapi hati kamu gak di situ. Makanya, kalau bisa, cari yang bener-bener bikin kamu semangat bangun pagi. Tapi ya, kita tau gak semua orang seberuntung itu. Jadi, belajar nerima dan adaptasi itu wajib.",
    "image" => "img/work.jpeg",
    "source" => ""
  ],
  3 => [
    "title" => "Bad habits I kicked (after 900 tries).",
    "date" => "2025-05-20",
    "paragraph" => "Masuk ke dunia kerja tuh rasanya kayak dilempar ke realita keras yang dulu nggak pernah kita bayangin. Kebiasaan-kebiasaan dari masa kuliah—kayak suka nunda kerjaan, malas cari solusi sendiri, atau nggak berani speak up—itu semua bisa jadi bumerang. Dulu waktu kuliah, masih bisa bilang, “nanti aja deh, masih ada waktu,” atau nunggu temen yang gerak duluan. Tapi di dunia kerja, semua dituntut untuk bisa gerak cepat, punya inisiatif, dan tahu gimana cara komunikasiin ide dengan jelas. Awalnya memang berat, tapi perubahan kecil dimulai dari kesadaran sendiri. Bukan buat nyenengin orang lain, tapi biar kita nggak terus-terusan kejebak di siklus yang itu-itu aja.",
    "image" => "img/habit.jpg",
    "source" => ""
  ]
];

$quotes = [
  "Your timeline deserves a better plot twist.",
  "So here’s the tea—you gotta fix it, no one else will.",
  "You’re doing better than you think.",
  "Stop treating procrastination like a personality trait.",
  "Bad habits are like toxic exes: comforting, familiar, and holding you back.",
  "Welcome to adulthood. You get tired for free.",
  "We grew up thinking work was purpose. Turns out it’s just survival",
  "Don’t romanticize the grind—optimize it.",
  "Even if the kiss scene doesn’t come ‘til the last chapter, you still have to read every page."
  // "Even though those books wouldn't make kiss scene happens until the last chapter, you still have to read them.",
];

$id = $_GET['id'] ?? 1;
$article = $articles[$id];
$quote = $quotes[rand(0, count($quotes) - 1)];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="img/card.png"/>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Raleway:wght@400;600;700&family=Quicksand:wght@400;500;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"/>
  <title><?= $article['title'] ?></title>
</head>
<body style="background-color: #FFFFE8;">
  <div class="capsule-navbar hidden" id="navbar">
    <a href="blog.php">Kembali ke Blog</a>
  </div>

  <div class="article-container">
    <h1><?= $article['title'] ?></h1>
    <span class="date"><?= $article['date'] ?></span>

    <div class="content-row">
      <div class="image-container">
        <img src="<?= $article['image'] ?>" alt="Ilustrasi">
      </div>
      <div class="text-container">
        <div class="quote">“<?= $quote ?>”</div>
        <div class="paragraph"><?= $article['paragraph'] ?></div>
        <?php if ($article['source']): ?>
          <p class="source">Referensi: <a href="<?= $article['source'] ?>" target="_blank"><?= $article['source'] ?></a></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>