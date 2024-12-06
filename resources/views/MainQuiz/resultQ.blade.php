<!-- hasil.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hasil Akhir</title>
</head>
<body>

<h1>Hasil Akhir</h1>
<div id="scoreDisplay">Skor Akhir: 0</div>
<img id="starImage" src="" alt="bintang">
<button onclick="resetScore()">Mulai Ulang</button>

<script src="js/quiz.js"></script>
<script>
    // Tampilkan skor akhir
    document.addEventListener("DOMContentLoaded", function() {
        let finalScore = parseInt(localStorage.getItem('score')) || 0;
        document.getElementById('scoreDisplay').textContent = `Skor Akhir: ${finalScore}`;
    });
</script>

</body>
</html>
