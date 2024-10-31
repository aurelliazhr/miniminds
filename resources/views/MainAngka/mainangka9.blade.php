<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://fonts.googleapis.com/css?family=Lexend" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <title>Tebak Huruf</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lexend', sans-serif;
            background-color: #f5f5f5;
            background-image: url('../assets/background.jpg');
            background-size: cover;
            height: 80vh;
            background-attachment: fixed;
        }

        .Kotak {
            position: relative;
            top: 25px;
            background: white;
            margin: 1rem auto;
            padding: 30px;
            width: 75%;
            height: 460px;
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
            font-size: 18px;
            margin-left: 20px;
        }

        .Pilihan {
            position: relative;
            top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .Pilihan .row {
            display: flex;
            justify-content: center;
            gap: 20px;
            width: 100%;
        }

        .Pilihan img {
            width: 135px;
            height: 160px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .Pilihan img:hover {
            transform: scale(1.1);
        }

        @media (max-width: 800px) {
            body {
                height: 98vh;
            }

            .Kotak {
                top: 60px;
            }

            .Text {
                font-size: 18px;
                margin-right: 50px;
            }
        }
    </style>
</head>

<body>

    <audio id="background-audio" loop>
        <source src="../assets/happy-clappy-ukulele(chosic.com).mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <div class="Kotak">
        <div class="Header">
            <a id="kembaliButton" href="{{ route('menebakAngka8') }}">
                <img src="../assets/angle-left.png" alt="Kembali" />
            </a>

            <div class="Text">
                <p>Yang manakah angka 6?</p> <!-- Question as text -->
            </div>
        </div>

        <div class="Pilihan">
            <div class="row">
                <div class="6">
                    <img src="../assets/angka6.png" alt="Alif" data-correct="true" id="playImage"
                        data-audio="../assets/6.mp3" />
                    <audio src="../assets/6.mp3" id="audioClip"></audio>
                </div>
                <div class="1">
                    <img src="../assets/angka1.png" alt="Alif" data-correct="false" id="playImage1"
                        data-audio="../assets/1.mp3" />
                    <audio src="../assets/1.mp3" id="audioClip1"></audio>
                </div>
            </div>
            <div class="row">
                <div class="9">
                    <img src="../assets/angka9.png" alt="Alif" data-correct="false" id="playImage9"
                        data-audio="../assets/9.mp3" />
                    <audio src="../assets/9.mp3" id="audioClip9"></audio>
                </div>
            </div>
        </div>
    </div>

    <script>
        let wrongAttempts = 0;

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

        // Select the image and audio elements
        const playImage = document.getElementById('playImage');
        const audioClip = document.getElementById('audioClip');

        // Add a click event listener to the image
        playImage.addEventListener('click', () => {
            // Play the audio when the image is clicked
            audioClip.play();
        });

        // Select the image and audio elements
        const playImage1 = document.getElementById('playImage1');
        const audioClip1 = document.getElementById('audioClip1');

        // Add a click event listener to the image
        playImage1.addEventListener('click', () => {
            // Play the audio when the image is clicked
            audioClip1.play();
        });

        // Select the image and audio elements
        const playImage9 = document.getElementById('playImage9');
        const audioClip9 = document.getElementById('audioClip9');

        // Add a click event listener to the image
        playImage9.addEventListener('click', () => {
            // Play the audio when the image is clicked
            audioClip9.play();
        });

        // Fungsi untuk memutar audio soal dan menurunkan volume backsound
        function playAudio(audioSrc) {
            const audio = new Audio(audioSrc);

            // Turunkan volume backsound menjadi 40% (0.4)
            backgroundAudio.volume = 0.4;

            // Putar audio soal
            audio.play();

            // Mengembalikan volume backsound ke 100% setelah audio soal selesai
            audio.addEventListener('ended', () => {
                backgroundAudio.volume = 1.0;
            });
        }

        // Putar audio soal saat halaman dimulai
        window.onload = () => {
            playAudio('../assets/mainangka6.mp3');
        };

        // Event listener untuk tombol kembali
        const kembaliButton = document.getElementById('kembaliButton');
        if (kembaliButton) { // Pastikan elemen ada
            kembaliButton.addEventListener('click', function() {
                history.back();
            });
        }

        // Event listener untuk pilihan gambar
        const pilihanImages = document.querySelectorAll('.Pilihan img');
        pilihanImages.forEach(function(img) {
            img.addEventListener('click', function() {
                const isCorrect = img.getAttribute('data-correct') === 'true';

                // Jika benar, tampilkan sukses dan lanjut ke pertanyaan berikutnya
                if (isCorrect) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Benar!',
                        confirmButtonText: '<a href="{{ route('menebakAngka10') }}" style="color: white; text-decoration: none;">Lanjut</a>'
                    });
                }
                // Jika salah, tambahkan jumlah kesalahan dan tangani feedback
                else {
                    wrongAttempts++;
                    if (wrongAttempts >= 2) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Salah!',
                            text: 'Anda sudah salah 2 kali, mengulang ke halaman awal!',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href =
                            '{{ route('menebakAngka1') }}'; // Redirect ke halaman awal setelah 2 kesalahan
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Salah!',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
