<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .image {
            position: relative;
            margin-bottom: 15px;
        }

        .image input[type="file"] {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .custom-image {
            position: relative;
            background-color: #D9D9D9;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .fullname,
        .password,
        .custom-image {
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

        .custom-image {
            background-color: #D9D9D9;
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
            border: none;
            border-radius: 10px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ccc;
            color: black;
            text-decoration: underline;
        }

        .custom-button {
            background-color: #9CE6BB;
            width: 250px;
            color: #fff;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #ccc;
            color: black;
        }
    </style>
</head>

<body>

    <audio id="audio" autoplay>
        <source src="assets/isidata.mp3" type="audio/mpeg">
    </audio>

    <form id="regguru-form" action="{{ route ('regguru-proses') }}" method="POST" enctype="multipart/form-data">
        @method('post')
        @csrf

        <a class="back" href="{{ route('login') }}">
            <img src="/assets/Back.png" alt="Back">
        </a>

        <div class="container">
            <img src="/assets/Guru.jpg" alt="Guru">

            <div class="image">
                <input type="file" name="image" class="image" value="{{ old('image') }}" id="image-input">
                <label for="image-input" class="custom-image">Upload Foto Profil</label>
            </div>
            @error('image')
            <small>{{ $message }}</small>
            @enderror


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
            </select>
            @error('kelas')
            <small>{{ $message }}</small>
            @enderror

            <div class="button">
                <button type="submit">Daftar</button>
            </div>
        </div>

        <!-- @if ($message = Session::get('success'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (Session::has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data Anda Berhasil Ditambahkan!',
                text: '{{ Session::get('success') }}',
                confirmButtonText: 'OK',
                customClass: {
                                confirmButton: 'custom-button'
                            }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/'; // Redirect to the desired route
                }
            });
        </script>
        @endif

</body>

</html>