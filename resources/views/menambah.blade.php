<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Register Murid</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <style>
        body {
            background-color: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form,
        #regguru-form {
            margin: 0;
            padding: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .back {
            align-self: flex-start;
            margin-top: 10px;
            margin-right: 100%;
        }

        .back img {
            width: 42px;
            height: 32px;
        }

        .container {
            width: 90%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 15px;
        }

        img {
            width: 297px;
            height: 287px;
            margin-bottom: 25px;
        }

        .fullname,
        .password {
            width: 82%;
            height: 60px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 20px;
            margin-bottom: 10px;
            margin-left: 30px;
            background-color: #D9D9D9;
            padding-left: 20px;
            box-sizing: border-box;
        }

        .kelas {
            width: 82%;
            height: 60px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 20px;
            margin-bottom: 20px;
            margin-left: 30px;
            padding: 20px;
            background-color: #D9D9D9;
        }

        #kelas {
            border-radius: 10px;
        }

        .button {
            text-align: center;
            width: 100%;
            height: 70px;
            margin-left: 15px;
        }

        button {
            width: 82%;
            height: 70px;
            margin-top: 10px;
            margin-left: 10px;
            background-color: #9CE6BB;
            color: #fff;
            font-family: 'Nerko One', cursive;
            font-size: 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ccc;
            color: black;
            text-decoration: underline;
        }

        .custom-button,
        .custom-button.swal2-cancel {
            background-color: #9CE6BB;
            width: 250px;
            color: #fff;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            cursor: pointer;
        }

        .custom-button:hover,
        .custom-button.swal2-cancel:hover {
            background-color: #ccc;
            color: black;
        }
    </style>
</head>

<body>
    <audio id="audio" autoplay>
        <source src="assets/menambah.mp3" type="audio/mpeg">
    </audio>

    <form id="register" action="{{ route ('menambah-proses') }}" method="POST">
        @method('post')
        @csrf

        <a class="back" href="{{ route('guru') }}">
            <img src="/assets/Back.png" alt="Back">
        </a>

        <div class="container">
            <img src="/assets/tambahdata.jpg">

            <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" class="fullname" value="{{ old('fullname') }}">

            <input type="text" id="password" name="password" placeholder="Nomor Absen" class="password" value="{{ old('password') }}">

            <select id="kelas" name="kelas" placeholder="kelas" required class="kelas" value="{{ old('kelas') }}">
                <option value="" disabled selected>Kelas:</option>
                <option value="B1">B1</option>
                <option value="B2">B2</option>
                <option value="B3">B3</option>
            </select>

            <div class="button">
                <button type="submit">Daftar</button>
            </div>
        </div>

        <script>
            $('#register').on('submit', function(e) {
                e.preventDefault(); // Mencegah form dari pengiriman otomatis

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            title: 'Data Berhasil Ditambahkan!',
                            icon: 'success',
                            confirmButtonText: 'Tambah Data',
                            cancelButtonText: 'Halaman Guru',
                            showCancelButton: true,
                            allowOutsideClick: false,
                            customClass: {
                                confirmButton: 'custom-button',
                                cancelButton: 'custom-button'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('menambah') }}";
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                window.location.href = "{{ route('guru') }}";
                            }
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            title: 'Data Harus Diisi',
                            text: 'Data Tidak Boleh Sama',
                            icon: 'error',
                            confirmButtonText: 'Tutup',
                            customClass: {
                                confirmButton: 'custom-button',
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>