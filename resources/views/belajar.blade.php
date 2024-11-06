<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <title>Belajar</title>
    <style>
        * {
            background-color: #C9C0D5;
        }

        body {
            margin: 0;
            padding: 0;
        }

        nav {
            position: fixed;
            /* Ini membuat navbar tetap di posisi atas */
            top: 0;
            /* Posisi di bagian atas halaman */
            width: 100%;
            height: 100px;
            /* Tentukan tinggi navbar, sesuaikan sesuai kebutuhan */
            background-color: white;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            /* Pastikan navbar ada di depan elemen lainnya */
        }


        nav img {
            max-width: 60%;
            max-height: 60%;
            background-color: white;
            margin-top: 5px;
            margin-right: 30%;

        }

        .back {
            background-color: white;
            height: 100%;
        }

        .back img {
            width: 65%;
            height: 45%;
            margin: 20px 10px;
        }

        .container {
            margin: 0 10;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .huruf,
        .angka,
        .hijaiyah {
            width: 95%;
            height: 300px;
            border-radius: 10px;
            margin-bottom: 10px;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .huruf {
            margin-top: 110px;
        }

        .text1,
        .text2,
        .text3 {
            background-color: white;
        }

        .text1 img,
        .text2 img,
        .text3 img {
            background-color: white;
            margin-top: 30px;

        }

        @media (min-width: 1024px) {

            nav img {
                margin-right: 45%;
            }

            .back img {
                width: 100%;
                height: 100%;
                margin: 20px 20px;
            }

            .huruf,
            .angka,
            .hijaiyah {
                width: 98%;
                height: 245px;
                display: flex;
                flex-direction: row;

            }

            .huruf img,
            .angka img,
            .hijaiyah img {
                margin-right: 250px;
            }
        }
    </style>
</head>

<body>
    <audio id="audio" autoplay>
        <source src="assets/belajar.mp3" type="audio/mpeg">
    </audio>

    <audio src="/assets/backsound.mp3" autoplay loop></audio>

    <nav>
        <div class="back" onclick="back()">
            <img src="assets/Back.png">
        </div>
        <img src="assets/belajar.png" alt="">
    </nav>

    <div class="container">
        <div class="huruf" onclick="huruf()" data-audio="../assets/huruf.mp3">
            <img src="assets/huruf.jpg" width="229px" height="156px">
            <div class="text1">
                <img src="assets/huruf.png">
            </div>
        </div>

        <div class="angka" onclick="angka()" data-audio="../assets/angka.mp3">
            <img src="assets/angka.jpg" width="292px" height="150px">
            <div class="text2">
                <img src="assets/angka.png">
            </div>
        </div>

        <div class="hijaiyah" onclick="hijaiyah()" data-audio="../assets/hijaiyah.mp3">
            <img src="assets/hijaiyah1.jpg" width="280px" height="180px">
            <div class="text3">
                <img src="assets/hijaiyah.png">
            </div>
        </div>
    </div>

    <script>
        function back() {
            window.location.href = "{{ route('home') }}"
        }

        function huruf() {
            var audioSrc = document.querySelector('.huruf').getAttribute('data-audio');

            // Create a new audio object
            var audio = new Audio(audioSrc);

            audio.play();

            // When the audio finishes, redirect to the next page
            audio.onended = function() {
                window.location.href = "{{ route('huruf') }}";
            };
        }

        function angka() {
            var audioSrc = document.querySelector('.angka').getAttribute('data-audio');

            // Create a new audio object
            var audio = new Audio(audioSrc);

            audio.play();

            // When the audio finishes, redirect to the next page
            audio.onended = function() {
                window.location.href = "{{ route('angka1') }}";
            };
        }

        function hijaiyah() {
            var audioSrc = document.querySelector('.hijaiyah').getAttribute('data-audio');

            // Create a new audio object
            var audio = new Audio(audioSrc);

            audio.play();

            // When the audio finishes, redirect to the next page
            audio.onended = function() {
                window.location.href = "{{ route('hijaiyah_1') }}";
            };
        }
    </script>
</body>

</html>
