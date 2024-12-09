<!-- hasil.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hasil Akhir</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend', sans-serif;
            background-color: #f5f5f5;
            background-image: url('../assets/background.jpg');
            background-size: cover;
            height: 100vh;
        }
        .kotak{
            position: relative;
            top: 15px;
            background: white;
            margin: 1rem auto;
            padding: 30px;
            width: 75%;
            height: 475px;
            max-width: 340px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .Header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
        }

        #kembaliButton {
            cursor: pointer;
            text-decoration: none;
        }

        #kembaliButton img {
            width: 20px;
            height: auto;
        }
        .Text {
            font-size: 30px;
            margin-top: 100px;
            font-weight: bold;
            text-align: center;
            color: green;
        }
        h2{
            text-align: center;
            font-size: 100px;
            font-weight: bold;
            color: green;
        }
        .score{
            display: flex;
            margin-left: 120px;
        }
        #starImage{
            width: 260px;
            height: auto;
            margin-left: 40px;
        }
        .tombol button{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 100px;
            width: 140px;
            height: 50px;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 10px;
            color: white;
            background-color: red;
        }
    </style>
</head>
<body>

<form class="kotak">
  <div class="header">
     <a id="kembaliButton" href="{{ route('home') }}">
      <img src="../assets/angle-left.png" alt="Kembali" />
     </a>
  </div>
  <div class="Text">
    <h1>Hasil Akhir</h1>
  </div>
  <div id="scoreDisplay" class="score">
      <h2 style="font-size: 100px;">Skor Akhir: 0</h2>
  </div>
  <img id="starImage" src="" alt="bintang">
  <div class="tombol">
     <button onclick="resetScore()">Reset score</button>
  </div>
</form>

<script src="js/hijaiyah.js"></script>
<script>
    // Tampilkan skor akhir
    document.addEventListener("DOMContentLoaded", function() {
        let finalScore = parseInt(localStorage.getItem('score')) || 0;
        document.getElementById('scoreDisplay').textContent = `Skor Akhir: ${finalScore}`;
    });
</script>

</body>
</html>
