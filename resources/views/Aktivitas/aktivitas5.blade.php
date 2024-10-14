<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css?family=Lexend" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <title>Tebak Warna</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend', sans-serif;
            background-color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* background:#db1010; */
            background-image: url('/assets/background.jpg');
            background-size: cover;
        }

        .Kotak {
            position: relative;
            top: 15px;
            background: white;
            margin: 1rem auto;
            padding: 10px;
            width: 85%;
            max-width: 340px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .Header {
            display: flex;
            align-items: center;
            padding: 5px;
            gap: 15px;
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
            text-align: center;
            font-family: "Lexend", sans-serif;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .Objek {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .Objek img {
            max-width: 65%;
            height: auto;
            border-radius: 10px;
        }

        .Pilihan {
            display: flex;
            gap: 10px;
            text-align: center;
            justify-items: center;
            align-items: center;
        }

        .Pilihan .option {
            flex: 1;
            padding: 15px 45px;
            /* border: none; */
            border-radius: 10px;
            font-family: "Lemon", sans-serif;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50%;
        }


        .option[data-color="blue"] {
            background-color: rgba(238, 231, 53, 1);
            color: black;
        }

        .option[data-color="red"] {
            background-color: rgba(53, 238, 161, 1);
            color: black;
        }

        .option:hover {
            opacity: 0.8;
        }

        .Next a:hover {
            background-color: rgb(41, 106, 183);
            /* Warna saat di-hover */
        }

        img {
            width: 250px;
        }


        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

    <audio id="background-audio" loop>
        <source src="/assets/backsound.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <div class="Kotak">
        <div class="Text">
            <img src="assets/menggambar.jpg" alt="">
            <p>Ajak orang tua untuk menggambar bersama!</p>
        </div>

        <div class="Pilihan">
            <button class="option" data-color="red">
                <a href="{{ route ('aktivitas4')}}">Kembali</a>
            </button>
            <button class="option" data-color="blue">
                <a href="{{ route ('aktivitas6')}}">Lanjut</a>
            </button>
            
        </div>
    </div>

    <script>
     const backgroundAudio = document.getElementById('background-audio');

// Cek posisi terakhir dari LocalStorage
const lastPosition = localStorage.getItem('audioPosition');
if (lastPosition !== null) {
    backgroundAudio.currentTime = parseFloat(lastPosition);
}
backgroundAudio.volume = 1.0;
backgroundAudio.play();

// Simpan posisi audio sebelum meninggalkan halaman
window.addEventListener('beforeunload', () => {
    localStorage.setItem('audioPosition', backgroundAudio.currentTime);
});

// Fungsi untuk memutar audio lain dan mengurangi volume backsound sementara
function playAudio(audioSrc) {
    const audio = new Audio(audioSrc);
    backgroundAudio.volume = 0.003;  // Kurangi volume backsound saat audio lain diputar
    audio.play();

    // Kembalikan volume backsound setelah audio lain selesai diputar
    audio.onended = () => {
        backgroundAudio.volume = 0.1;  // Kembalikan volume backsound
    };
}

// Putar audio soal saat halaman dimulai
window.onload = () => {
    playAudio('../assets/soal1.mp3');
};
    </script>
</body>
</html>
