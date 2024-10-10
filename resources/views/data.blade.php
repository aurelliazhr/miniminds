<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Murid</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/notifikasi.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            background-color: #D9D9D9;
        }

        nav {
            background-color: white;
            width: 100%;
            height: 80px;
            display: flex;
            flex-direction: row;
        }

        nav a {
            background-color: white;
        }

        nav a img {
            background-color: white;
            margin-left: 15px;
            margin-top: 25px;
            width: 42px;
            height: 32px;
        }

        .logo {
            background-color: white;
            flex-grow: 1;
            display: flex;
            justify-content: center;
        }

        .logo img {
            width: 70%;
            height: 80%;
            background-color: white;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #D9D9D9;
            font-size: 25px;
        }

        .isi {
            font-size: 25px;
        }

        .button {
            background: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .custom-button-logout,
        .custom-button-cancel {
            width: 250px;
            color: white;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            cursor: pointer;
            background-color: #9CE6BB;
        }

        .custom-button-logout:hover,
        .custom-button-cancel:hover {
            text-decoration: underline;
            color: black;
        }

        .swal2-actions {
            background-color: #fff;
        }

        .custom-swal-title {
            color: black;
            background-color: white;
        }

        .custom-swal-text {
            color: black;
            background-color: white;
        }

        @media (max-width: 800px) {
            nav img {
                margin-top: 15px;
                width: 50px;
                height: 40px;
            }

            .logo img {
                width: 100%;
            }

        }
    </style>
</head>

<body>
    <nav>
        <a class="back" href="{{ route('melihat') }}">
            <img src="/assets/Back.png" alt="Back">
        </a>

        <div class="logo">
            <img src="assets/miniminds.png">
        </div>
    </nav>

    <table>
        <tr>
            <th>Nama Murid</th>
            <th>Foto</th>
            <th>Sticker</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>

        @foreach ($data as $d)
        <tr class="isi">
            <td>{{ $d->fullname }}</td>
            <td>
                <img src="{{ asset('storage/foto-user/' . $d->image) }}" width="120px" height="120px" class="profil">
            </td>
            <td>
                @foreach($stikers as $stiker)
                <img src="data:image/jpeg;base64,{{ base64_encode($stiker->stiker) }}" alt="Stiker {{ $stiker->kategori }}" width="80px">
                @endforeach
            </td>
            <td>
                <a href="{{ route ('catatan', ['id' => $d->id]) }}">
                    <img src="assets/tambah.png">
                </a>
            </td>
            <td>
                <form id="delete-form-{{ $d->id }}" action="{{ route('delete', $d->id) }}" method="POST" style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
                <button class="button" onclick="confirmDelete({{ $d->id }})">
                    <img src="assets/delete.png" width="40px">
                </button>
            </td>            
        </tr>
        @endforeach
    </table>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin ingin menghapus data ini?',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                customClass: {
                    title: 'custom-swal-title',
                    confirmButton: 'custom-button-logout',
                    cancelButton: 'custom-button-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika user mengonfirmasi penghapusan
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Data Berhasil Dihapus!',
                confirmButtonText: 'OK',
                customClass: {
                    title: 'custom-swal-title',
                    text: 'custom-swal-text',
                    confirmButton: 'custom-button-logout'
                            }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/data'; // Redirect to the desired route
                }
            });
        </script>
        @endif
</body>

</html>