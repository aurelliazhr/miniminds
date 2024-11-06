<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Guru</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #D8C5F2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .apaya {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        img {
            height: 100px;
            width: 80px;
            margin-right: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            height: 50px;
            padding: 10px;
            margin-bottom: 20px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #D9D9D9;
        }

        button {
            width: 100%;
            height: 60px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #9CE6BB;
            color: black;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Poppins';
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            /* background-color: #ccc; */
            text-decoration: underline;
            cursor: pointer;
            color: white;
        }

        .custom-button-logout,
        .custom-button-cancel {
            background-color: #9CE6BB;
            font-family: 'Poppins';
            color: black
        }

    </style>
</head>

<body>
    <audio id="audio" autoplay>
        <source src="assets/kode.mp3" type="audio/mpeg">
    </audio>

    <div class="container">
        <div class="apaya">
            <img src="assets/kode.jpg">
            <h2>Masukkan Kode <br> Unik Guru</h2>
        </div>
        <input type="text" id="kodeUnik" placeholder="***">
        <button onclick="verifikasiKode()">Verifikasi</button>
    </div>

    <script>
        function verifikasiKode() {
            const kode = document.getElementById('kodeUnik').value;

            if (kode === "135") {
                Swal.fire({
                    title: 'Berhasil!',
                    icon: 'success',
                    confirmButtonText: 'Halaman Selanjutnya',
                    allowOutsideClick: false,
                    customClass: {
                        confirmButton: 'custom-button-logout'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('regguru') }}";
                    }
                });
            } else {
                Swal.fire({
                    title: 'Kode Salah',
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonText: 'Coba Lagi',
                    cancelButtonText: 'Kembali',
                    allowOutsideClick: false,
                    customClass: {
                    confirmButton: 'custom-button-logout',
                    cancelButton: 'custom-button-cancel'
                }
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload(); 
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        window.location.href = "{{ route('login') }}";
                    }
                });
            }
        }
    </script>

</body>

</html>