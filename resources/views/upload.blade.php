<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto Profil</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gsrtatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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
            width: 200px;
            height: 200px;
            margin-bottom: 25px;
            margin-left: 25px;
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
            color: rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .fullname,
        .password,
        .kelas,
        .custom-image {
            width: 82%;
            height: 60px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 20px;
            font-family: 'Poppins';
            margin-bottom: 10px;
            margin-left: 30px;
            background-color: #D9D9D9;
            padding-left: 20px;
            box-sizing: border-box;
        }

        .custom-image {
            background-color: #D9D9D9;
        }

        /* .kelas {
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
        } */

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
            font-family: 'Poppins';
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
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
            color: black;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form id="edit" action="{{ route ('upload-proses', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <a class="back" href="{{ route('home') }}">
            <img src="/assets/Back.png" alt="Back">
        </a>

        <div class="container">
        <img src="{{ asset('storage/foto-user/' . auth()->user()->image) }}" width="100px" height="100px"
        class="profil">

            <div class="image">
                <input type="file" name="image" class="image" value="{{ $data->image }}" id="image-input">
                <label for="image-input" class="custom-image">Upload Foto Profil</label>
            </div>
            @error('image')
            <small>{{ $message }}</small>
            @enderror

            <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" class="fullname" value="{{ $data->fullname }}" readonly>
            @error('fullname')
            <small>{{ $message }}</small>
            @enderror

            <input type="text" id="kelas" name="kelas" placeholder="Kelas" class="kelas" value="{{ $data->kelas }}" readonly>
            @error('kelas')
            <small>{{ $message }}</small>
            @enderror

            <div class="button">
                <button type="submit">Simpan</button>
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
                title: 'Sukses!',
                text: '{{ Session::get('success') }}',
                confirmButtonText: 'OK',
                customClass: {
                                confirmButton: 'custom-button'
                            }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/home'; // Redirect to the desired route
                }
            });
        </script>
        @endif

</body>

</html>