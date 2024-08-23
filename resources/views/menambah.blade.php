<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Murid</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #FFFFFF;
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
            width: 297px;
            height: 287px;
            margin-bottom: 25px;
        }

        .fullname {
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

        #role {
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
            background-color: #BFADD6;
            width: 100%;
            color: #fff;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            cursor: pointer;
        }

        .custom-button:hover,
        .custom-button.swal2-cancel:hover {
            background-color: #7bc89c;
            color: black;
        }

    </style>
</head>

<body>
    <a class="back" href="{{ route('guru') }}">
        <img src="/assets/Back.png" alt="Back">
    </a>

    <div class="container">
        <img src="/assets/tambahdata.jpg">

        <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap" class="fullname">

        <select id="role" name="kelas" placeholder="kelas" required class="kelas">
            <option value="" disabled selected>Kelas:</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="B3">B3</option>
        </select>

        <div class="button">
            <button type="submit" onclick="tampilkanPesan()">Daftar</button>
        </div>
    </div>

    <script>
        function tampilkanPesan() {
            Swal.fire({
                title: 'Data Berhasil Ditambahkan!',
                icon: 'success',
                confirmButtonText: 'Tambah Data',
                cancelButtonText: 'Halaman Home',
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
                    window.location.href = "{{ route('home') }}";
                }
            });
        }
    </script>
</body>

</html>