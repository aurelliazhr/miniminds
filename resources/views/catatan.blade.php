<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Murid</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/notifikasi.js"></script>
    <style>
        body {
            background-color: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
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
            margin-left: 10px;
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
            width: 250px;
            height: 200px;
            margin-bottom: 25px;
        }

        .image {
            position: relative;
            margin-bottom: 15px;
            margin-top: 25;
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
        .kelas {
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

        .catatan {
            width: 71%;
            height: 100px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 20px;
            margin-bottom: 20px;
            margin-left: 30px;
            padding: 20px;
            background-color: #D9D9D9;
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
    <form id="catatan" action="{{ route ('update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <a class="back" href="{{ route('data') }}">
            <img src="/assets/Back.png" alt="Back">
        </a>

        <div class="container">
            <!-- <img src="/assets/catatan.jpg"> -->

            <img src="{{ asset('storage/foto-user/' . $data->image) }}" width="100px" height="100px"
                class="profil">

            <div class="image">
                <input type="file" name="image" class="image" value="{{ $data->image }}" id="image-input">
                <label for="image-input" class="custom-image">Upload Foto Profil</label>
            </div>
            <small>Upload foto baru jika ingin menggantinya</small>
            @error('image')
            <br>
            <small>{{ $message }}</small>
            @enderror

            <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" class="fullname" value="{{ $data->fullname }}">
            @error('fullname')
            <small>{{ $message }}</small>
            @enderror

            <input type="text" id="password" name="password" placeholder="Nomor Absen" class="password">
            <small>Ketik nomor baru jika ingin menggantinya</small>
            @error('password')
            <small>{{ $message }}</small>
            @enderror

            <input type="text" id="kelas" name="kelas" placeholder="Kelas" class="kelas" value="{{ $data->kelas }}">
            @error('kelas')
            <small>{{ $message }}</small>
            @enderror

            <textarea id="catatan" name="catatan" placeholder="Catatan" class="catatan" value="{{ $data->catatan }}"></textarea>

            <div class="button">
                <button type="submit">Tambahkan</button>
            </div>
        </div>
    </form>
    <script>
        // $('#catatan').on('submit', function(e) {
        //     e.preventDefault(); // Mencegah form dari pengiriman otomatis

        //     $.ajax({
        //         type: 'POST',
        //         url: $(this).attr('action'),
        //         data: $(this).serialize(),
        //         success: function(response) {
        //             Swal.fire({
        //                 title: 'Catatan Berhasil Ditambahkan!',
        //                 icon: 'success',
        //                 confirmButtonText: 'Kembali',
        //                 allowOutsideClick: false,
        //                 customClass: {
        //                     confirmButton: 'custom-button'
        //                 }
        //             }).then((result) => {
        //                 if (result.isConfirmed) {
        //                     window.location.href = "{{ route('data') }}";
        //                 }
        //             });
        //         },
        //         error: function(xhr) {
        //             // Menampilkan notifikasi error jika ada kesalahan dari server
        //             let errors = xhr.responseJSON.errors;
        //             Swal.fire({
        //                 title: 'Catatan Harus Diisi',
        //                 icon: 'error',
        //                 confirmButtonText: 'Tutup',
        //                 customClass: {
        //                     confirmButton: 'custom-button'
        //                 }
        //             });
        //         }
        //     });
        // });
    </script>
</body>

</html>