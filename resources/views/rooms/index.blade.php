<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrasi Rumah Sakit</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f48fb126; /* Warna background pink */
            color: #fff; /* Warna teks putih */
            position: relative;
        }

        .cover {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f48fb11e; /* Warna background pink */
            width: 100%;
            padding: 20px;
            text-align: center;
            position: relative;
            z-index: 2; /* Layer di atas */
        }

        .cover h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px #ffffff33; /* Efek bayangan teks */
        }

        .cover button {
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #fff; /* Warna background tombol putih */
            color: #a78ff464; /* Warna teks tombol pink */
            text-shadow: none; /* Hapus efek bayangan teks */
            border: 2px solid #948ff444; /* Garis pinggir tombol pink */
            transition: all 0.3s ease; /* Transisi animasi */
            z-index: 1; /* Layer di atas elemen lain */
        }

        .cover button:hover {
            background-color: #62ccf08f; /* Warna background tombol hover */
            color: #fff; /* Warna teks tombol hover putih */
        }

        .hospital {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff; /* Warna background putih */
            width: 100%;
            padding: 20px;
            text-align: center;
            color: #8fc2f4; /* Warna teks pink */
            z-index: 0; /* Layer di bawah elemen lain */
            position: relative;
            margin-top: -20px; /* Sesuaikan dengan tinggi header cover */
            padding-top: 20px; /* Ganti dengan tinggi header cover */
        }

        .header {
            background-color: #8fadf4; /* Warna background pink */
            color: #fff; /* Warna teks putih */
            width: 100%;
            padding: 20px;
            font-size: 24px; /* Ukuran font header */
            margin-bottom: 20px; /* Margin bawah */
            position: sticky;
            top: 0;
            z-index: 1; /* Layer di atas elemen lain */
        }

        .content-wrapper {
            display: flex;
            justify-content: space-between; /* Menyusun ke samping */
            width: 100%;
            max-width: 1200px; /* Maksimum lebar konten */
            margin: 0 auto; /* Pusatkan di tengah */
            position: relative;
            z-index: 1; /* Layer di atas elemen lain */
        }

        .patients-container {
            width: 100%; /* Lebar panel manajemen kamar */
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Kolom berjajar, minimal 300px */
            gap: 20px;
            overflow-y: auto;
            background-color: #FCE4EC; /* Warna background pink muda */
            border: 2px solid #8fb6f47c; /* Garis pinggir pink */
            border-radius: 10px; /* Sudut bulat */
            padding: 20px;
            position: relative;
            z-index: 1; /* Layer di atas elemen lain */
        }

        .patient {
            padding: 15px;
            border-radius: 8px; /* Sudut bulat */
            background-color: #fff; /* Warna background putih */
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan */
        }

        .patient-content {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .patient h2 {
            font-size: 20px; /* Ukuran font yang lebih besar */
            margin: 0;
            color: #8fdcf45c; /* Warna teks pink */
            font-weight: bold;
        }

        .patient p {
            font-size: 16px; /* Ukuran font yang lebih besar */
            color: #333;
            line-height: 1.6;
            margin: 5px 0;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .edit-patient,
        .delete-patient {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #F48FB1; /* Warna background pink */
            color: #fff; /* Warna teks putih */
            font-size: 14px;
        }

        .edit-patient:hover,
        .delete-patient:hover {
            background-color: #EC407A; /* Warna background hover pink tua */
        }

        .add-save-container {
            margin-top: 20px;
            width: 100%; /* Lebar 100% */
            display: flex;
            justify-content: flex-start; /* Penyesuaian posisi ke kiri */
            align-items: flex-start; /* Penyesuaian posisi ke atas */
            flex-direction: column;
            gap: 20px;
            padding: 20px;
            position: relative;
            z-index: 1; /* Layer di atas elemen lain */
        }

        .add-patient-form {
            width: 100%; /* Lebar 100% */
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Penyesuaian posisi ke kiri */
            gap: 10px;
        }

        .add-patient-form input,
        .add-patient-form select {
            width: calc(100% - 40px); /* Lebar input dikurangi margin */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #F48FB1; /* Garis pinggir pink */
            border-radius: 5px;
            font-size: 16px;
        }

        .add-patient-form button {
            width: 120px; /* Lebar tombol */
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #F48FB1; /* Warna background pink */
            color: #fff; /* Warna teks putih */
            font-size: 16px;
            align-self: flex-end; /* Penyesuaian posisi ke kanan */
        }

        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <div class="cover" id="cover">
        <h1>Rumah Sakit</h1>
        <button id="open-hospital">Manajemen Kamar</button>
    </div>

    <div class="hospital" id="hospital">
        <div class="header">
            <h1>Manajemen Kamar - Rumah Sakit</h1>
            <div id="room-count">Jumlah Kamar:</div>
            <div id="room-levels"></div>
        </div>
        <div class="content-wrapper">
            <div class="patients-container" id="patients-container">
                <!-- Informasi pasien akan ditambahkan melalui script JavaScript -->
            </div>
        </div>
        <div class="add-save-container">
            <div class="add-patient-form">
                <input type="text" id="patient_name" placeholder="Nama Pasien" required>
                <input type="date" id="date_admitted" required>
                <input type="date" id="date_discharged" required>
                <select id="severity" required>
                    <option value="">Pilih Jenis Penyakit</option>
                    <option value="Dalam">Dalam</option>
                    <option value="Luar">Luar</option>
                    <option value="Berat">Berat</option>
                </select>
                <input type="number" id="age" placeholder="Umur" required>
                <select id="level" required>
                    <option value="">Pilih Level Kamar</option>
                    <option value="1">Level 1</option>
                    <option value="2">Level 2</option>
                    <option value="3">Level 3</option>
                    <option value="VIP">VIP</option>
                    <option value="VVIP">VVIP</option>
                </select>
                <button id="add-patient">Tambah Pasien</button>
            </div>
        </div>
    </div>

    <script>
        // Array untuk menyimpan data pasien
        let patientsData = JSON.parse(localStorage.getItem('patientsData')) || [];
        let roomCount = JSON.parse(localStorage.getItem('roomCount')) || { '1': 20, '2': 20, '3': 20, 'VIP': 20, 'VVIP': 20 }; // Inisialisasi jumlah kamar

        // Fungsi untuk menambahkan pasien baru
        function addPatient() {
            const patientName = document.getElementById('patient_name').value;
            const dateAdmitted = document.getElementById('date_admitted').value;
            const dateDischarged = document.getElementById('date_discharged').value;
            const severity = document.getElementById('severity').value;
            const age = document.getElementById('age').value;
            const level = document.getElementById('level').value;

            if (!patientName || !dateAdmitted || !dateDischarged || !severity || !age || !level) {
                alert('Mohon lengkapi semua kolom!');
                return;
            }

            if (roomCount[level] <= 0) {
                alert('Tidak ada kamar tersedia di level ini.');
                return;
            }

            // Generate random gender
            const genders = ['Laki-laki', 'Perempuan'];
            const randomGender = genders[Math.floor(Math.random() * genders.length)];

            // Data pasien baru
            const newPatient = {
                name: patientName,
                dateAdmitted: dateAdmitted,
                dateDischarged: dateDischarged,
                gender: randomGender,
                age: age,
                level: level,
                severity: severity
            };

            // Tambahkan data pasien ke array
            patientsData.push(newPatient);

            // Update jumlah kamar
            roomCount[level]--;
            updateRoomCount();

            // Simpan data ke localStorage
            localStorage.setItem('patientsData', JSON.stringify(patientsData));
            localStorage.setItem('roomCount', JSON.stringify(roomCount));

            // Tampilkan data pasien di halaman manajemen kamar
            displayPatients();
        }

        // Fungsi untuk menampilkan data pasien di halaman manajemen kamar
        function displayPatients() {
            const patientsContainer = document.getElementById('patients-container');
            patientsContainer.innerHTML = ''; // Kosongkan kontainer

            // Iterasi melalui array data pasien dan tampilkan di HTML
            patientsData.forEach((patient, index) => {
                const patientHTML = `
                    <div class="patient">
                        <div class="patient-content">
                            <h2>${patient.name}</h2>
                            <p><strong>Tanggal Masuk:</strong> ${patient.dateAdmitted}</p>
                            <p><strong>Tanggal Keluar:</strong> ${patient.dateDischarged}</p>
                            <p><strong>Jenis Kelamin:</strong> ${patient.gender}</p>
                            <p><strong>Umur:</strong> ${patient.age}</p>
                            <p><strong>Level Kamar:</strong> ${patient.level}</p>
                            <p><strong>Jenis Penyakit:</strong> ${patient.severity}</p>
                        </div>
                        <div class="actions">
                            <button class="edit-patient">Edit</button>
                            <button class="delete-patient" onclick="deletePatient(${index})">Hapus</button>
                        </div>
                    </div>
                `;
                patientsContainer.innerHTML += patientHTML;
            });
        }

        // Fungsi untuk menghapus pasien dari data
        function deletePatient(index) {
            const patientLevel = patientsData[index].level;

            patientsData.splice(index, 1); // Hapus pasien dari array
            roomCount[patientLevel]++; // Tambahkan jumlah kamar
            updateRoomCount();

            // Simpan data terbaru ke localStorage
            localStorage.setItem('patientsData', JSON.stringify(patientsData));
            localStorage.setItem('roomCount', JSON.stringify(roomCount));

            displayPatients(); // Tampilkan kembali data terbaru
        }

        // Fungsi untuk mengupdate jumlah kamar di halaman
        function updateRoomCount() {
            document.getElementById('room-count').innerText = `Jumlah Kamar: ${Object.values(roomCount).reduce((a, b) => a + b, 0)}`;
            document.getElementById('room-levels').innerHTML = `
                <p>Level 1: ${roomCount['1']} kamar tersedia</p>
                <p>Level 2: ${roomCount['2']} kamar tersedia</p>
                <p>Level 3: ${roomCount['3']} kamar tersedia</p>
                <p>VIP: ${roomCount['VIP']} kamar tersedia</p>
                <p>VVIP: ${roomCount['VVIP']} kamar tersedia</p>
            `;
        }

        // Event listener untuk tombol "Tambah Pasien"
        document.getElementById('add-patient').addEventListener('click', addPatient);

        // Event listener untuk tombol "Manajemen Kamar"
        document.getElementById('open-hospital').addEventListener('click', function() {
            document.getElementById('cover').style.display = 'none';
            document.getElementById('hospital').style.display = 'flex';
            displayPatients(); // Tampilkan data pasien saat masuk ke halaman manajemen kamar
            updateRoomCount(); // Tampilkan jumlah kamar saat masuk ke halaman manajemen kamar
        });

        // Tampilkan data pasien dan jumlah kamar saat halaman pertama kali dimuat
        window.onload = function() {
            displayPatients();
            updateRoomCount();
        }
    </script>
</body>
</html>
