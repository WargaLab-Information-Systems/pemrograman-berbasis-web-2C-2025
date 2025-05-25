<?php
$articles = [
  ["id" => 1, "title" => "How I studied and didn’t die (barely).", "date" => "2024-05-02"],
  ["id" => 2, "title" => "Workverse: A survival guide.", "date" => "2025-05-10"],
  ["id" => 3, "title" => "Bad habits I kicked (after 900 tries).", "date" => "2025-05-20"]
];
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="img/card.png"/>
  <link rel="stylesheet" href="style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Raleway:wght@400;600;700&family=Quicksand:wght@400;500;700&family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"/>

  <title>Daftar Artikel</title>

</head>
<body style="background-color: #f7b29b;">
  <div class="artic-top">
      <div class="artic-title">
          <h1>Article Served Cold</h1>
      </div>
  </div>

  <div class="artic-main">
    <h1>Click Any for the Tea</h1>
    <div class="article-list">
        <?php foreach ($articles as $article): ?>
        <a href="article.php?id=<?= $article['id'] ?>">
            <?= $article['title'] ?> <br><small>(<?= $article['date'] ?>)</small>
        </a>
        <?php endforeach; ?>
    </div>
  </div>

  <div class="capsule-navbar hidden" id="navbar">
    <a href="index.html">Profil</a>
    <a href="timeline.php">Timeline</a>
  </div>

  <footer class="footer">
      <p>
          &copy; 2025 | 240441100006 | Lovingly designed by Yadya Niha
  </footer>

  <script src="script.js"></script>
</body>
</html>