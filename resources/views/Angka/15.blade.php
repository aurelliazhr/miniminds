<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Belajar Anak</title>
    <!-- Memuat Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Memuat file CSS eksternal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            /* background:#db1010; */
            background-image: url('../assets/background.jpg');
            background-size: cover;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            max-width: 400px;
            height: 500px;
            width: 100%;
        }

        .btn-container {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .btn-container a {
            color: white;
            text-decoration: none;
        }

        button {
            position: relative; top: 80px;
            font-size: 18px;
            padding: 10px;
            border: none;
            border-radius: 10px;
            color: #fff;
            background-color: #e64e20;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
        }

        button:active {
            transform: scale(0.95);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        } 

        button:hover {
            background-color: rgb(248, 120, 80);
            transform: scale(1.1);
        }

        .btn-sound {
            background-color: #8bc34a;
            font-size: 18px;
            padding: 10px 20px;
            width: auto;
        } 

        .btn-sound:hover {
            background-color: #689f38;
        }

        .icon {
            font-size: 24px;
        }

        .abjad img {
            margin-top: 45px;
        }

        @media (max-width: 800px) {
            .container {
                width: 85%;
                padding: 15px;
            }

            .btn-container {
                flex-direction: row;
                gap: 20px;
            }

            button {
                width: 70px;
                height: 70px;
                padding: 10px;
                position: relative; 
                top: 75px;
            }
            
            .abjad img {
                width: 300px;
                height: 250px;
            }
        }
        

    </style>
</head>
<body>
    <audio id="background-audio" loop>
        <source src="../assets/backsound.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <div class="container">
        <!-- Huruf Abjad -->
        <div class="abjad">
            <img src="../assets/15.png" alt="" width="300px" height="250px">
        </div>

        <!-- <div class="image-container">
            <img src="/..assets/ayam.gif" alt="Gambar Ayam" onclick="playAudio('/..assets/ayam.mp3')">
        </div> -->

        <!-- Tombol Suara dan Navigasi -->
        <div class="btn-container">
            <button id="backBtn">
                <a class="fa-solid fa-arrow-left" href="{{ route ('angka14')}}"></a>
            </button>
            <button class="fa-solid fa-volume-up" data-letter="A" onclick="playAudio('/..assets/15.mp3')"></button>
            <button id="nextBtn">
                <a class="fa-solid fa-arrow-right" href="{{ route ('angka16')}}"></a>
            </button>
        </div>
    </div>

    <script>
        const backgroundAudio = document.getElementById('background-audio');

        // Cek posisi terakhir dari localStorage
        const lastPosition = localStorage.getItem('audioPosition');
        if (lastPosition !== null) {
            backgroundAudio.currentTime = parseFloat(lastPosition);
        }
        backgroundAudio.play();

        // Simpan posisi audio sebelum meninggalkan halaman
        window.addEventListener('beforeunload', () => {
            localStorage.setItem('audioPosition', backgroundAudio.currentTime);
        });

        function playAudio(audioSrc) {
            const audio = new Audio(audioSrc);
            backgroundAudio.volume = 0.003;  // Kurangi volume backsound
            audio.play();
            audio.onended = () => {
                backgroundAudio.volume = 1.0;  // Kembalikan volume backsound setelah selesai
            };
        }

        // Memainkan file a.mp3 otomatis saat halaman dimuat
        window.onload = () => {
            playAudio('../assets/15.mp3');
        };
    </script>
    
</body>
</html>