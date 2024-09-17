<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>

    <style>
        #loading-screen {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: #685383;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #loading-screen img {
            width: 300px;
            height: 350px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body,
        form {
            /* height: 100%; */
            justify-content: center;
            background-color: #BFADD6;
            margin: 0;
            padding: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        img {
            max-width: 100%;
            height: 40%;
            margin-bottom: 35px;
        }

        .fullname,
        .password {
            width: 281px;
            height: 62px;
            padding: 20px;
            font-size: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 15px;
        }


        .kelas {
            width: 281px;
            height: 62px;
            background-color: white;
            padding: 20px;
            font-size: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        #kelas {
            border-radius: 10px;
        }

        .remember {
            font-size: 20px;
            margin-top: 15px;
        }

        .button {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }

        button:hover {
            /* background-color: #9CE6BB; */
            /* Ubah warna latar belakang saat dihover */
            color: white;
            /* Ubah warna teks saat dihover */
            text-decoration: underline;
            /* Tambah garis bawah saat dihover */
            cursor: pointer;
            /* Ganti cursor saat dihover menjadi tangan */
        }

        button {
            width: 281px;
            height: 62px;
            background-color: #9CE6BB;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-family: 'Nerko One';
            font-size: 25px;
            color: black;
        }

        .guru {
            margin-top: 15px;
            margin-right: 45px;
            background-color: #BFADD6;
            color: black;
            font-size: 20px;
        }

        .guru:hover {
            color: white;
            /* Ubah warna teks saat dihover */
            cursor: pointer;
            /* Ganti cursor saat dihover menjadi tangan */
        }

        .guru a {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form action="{{ route ('login-proses') }}" method="post">
        @csrf

        <div id="loading-screen">
            <img src="assets/logo.png">
        </div>

        <audio id="background-audio" autoplay>
            <source src="assets/tanya.mp3" type="audio/mpeg">
        </audio>

        <img src="assets/bertanya.png" width="250px">

        <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" class="fullname" value="{{ old('fullname') }}">
        @error('fullname')
        <small>{{ $message }}</small>
        @enderror

        <input type="text" id="password" name="password" placeholder="Nomor Absen" class="password" value="{{ old('password') }}">
        @error('password')
        <small>{{ $message }}</small>
        @enderror

        <select id="kelas" name="kelas" placeholder="kelas" required class="kelas" value="{{ old('kelas') }}">
            <option value="" disabled selected>Kelas:</option>
            <option value="-">-</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="B3">B3</option>
            @error('kelas')
            <small>{{ $message }}</small>
            @enderror
        </select>

        <div class="remember">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Ingat Saya</label>
        </div>

        <div class="button">
            <button id="button" type="submit" name="login">Ayo Mulai!!</button>
        </div>

        <div class="guru">
            <a class="guru" href="{{ route('kode') }}">Daftar Sebagai Guru</a>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </form>

    <!-- @if ($message = Session::get('failed'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif -->

    <script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                var loadingScreen = document.getElementById("loading-screen");
                loadingScreen.style.display = "none";

                // Memainkan audio setelah loading screen hilang
                var audio = document.getElementById("background-audio");
                audio.play();
            }, 3000);
        });

        // Menambahkan event listener ke tombol "Lanjut!!!" untuk mengarahkan ke halaman berikutnya
        button.addEventListener("click", function() {
            window.location.href = "{{route ('home')}}";
        });
    </script>
</body>

</html>