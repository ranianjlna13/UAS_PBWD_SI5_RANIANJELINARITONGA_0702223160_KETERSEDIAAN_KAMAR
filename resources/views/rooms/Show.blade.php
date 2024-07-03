<!DOCTYPE html>
<html>
<head>
    <title>Detail Kamar</title>
</head>
<body>
    <h1>Detail Kamar {{ $room->room_number }}</h1>
    <p>Level: {{ $room->level->name }}</p>
    <h2>Pasien yang Pernah Menempati:</h2>
    <ul>
        @foreach($room->roomOccupancies as $occupancy)
            <li>
                Nama: {{ $occupancy->patient->name }}<br>
                Tanggal Masuk: {{ $occupancy->check_in_date }}<br>
                Tanggal Keluar: {{ $occupancy->check_out_date ?? 'Masih Menempati' }}
            </li>
        @endforeach
    </ul>
    <a href="{{ url('/rooms') }}">Kembali ke Daftar Kamar</a>
</body>
</html>