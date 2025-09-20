<!DOCTYPE html>
<html>
<head>
    <title>Pemilihan Ketua OSIS</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            margin: 0;
            padding: 30px;
        }

        /* Header dengan judul tengah dan logout kanan */
        .header {
            position: relative;
            margin-bottom: 30px;
            text-align: center;
        }

        .header h1 {
            color: #fff;
            margin: 0;
            font-size: 36px;
        }

        .logout-form {
            position: absolute;
            top: 0;
            right: 0;
        }

        .logout-form button {
            background: #dc3545;
            padding: 8px 18px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
        }

        .logout-form button:hover {
            background: #bd2130;
        }

        /* Container Kandidat */
        .candidates-container {
            display: flex;
            justify-content: center;   /* rata tengah */
            align-items: stretch;      /* semua sejajar atas */
            gap: 20px;
            flex-wrap: wrap;           /* responsif */
            padding-bottom: 20px;
        }

        .candidate-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            width: 270px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .candidate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .candidate-card img {
            width: 100%;
            height: 300px;
            border-radius: 10px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .candidate-card h2 {
            margin: 10px 0 5px;
            color: #007bff;
            font-size: 22px;
        }

        .candidate-card p {
            margin: 5px 0;
            font-size: 14px;
            text-align: left;
            width: 100%;
        }

        .candidate-card ul {
            padding-left: 20px;
            text-align: left;
            font-size: 14px;
        }

        /* Tombol Pilih */
        label {
            margin-top: auto;  /* dorong ke bawah */
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            background: #f1f1f1;
            transition: background 0.3s ease;
        }

        label:hover {
            background: #e0e0e0;
        }

        input[type="radio"] {
            transform: scale(1.3);
        }

        button {
            background: #28a745;
            border: none;
            padding: 12px 40px;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #218838;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 16px;
        }

        .message.success {
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            color: #721c24;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h1>Pilih Kandidat Ketua OSIS</h1>
        {{-- Tombol Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    {{-- Alert Message --}}
    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="message error">{{ session('error') }}</div>
    @endif

    {{-- Form Voting --}}
    <form action="{{ route('vote.store') }}" method="POST">
        @csrf

        <div class="candidates-container">

            {{-- Kandidat 1 --}}
            <div class="candidate-card">
                <img src="{{ asset('storage/img/kandidat1.jpg') }}" alt="Kandidat 1">
                <h2>Dimas Prakoso</h2>
                <p><strong>Visi:</strong> Membentuk OSIS yang berintegritas, berprestasi, dan peduli pada setiap siswa.</p>
                <p><strong>Misi:</strong></p>
                <ul>
                    <li>Meningkatkan kegiatan akademik dan non-akademik siswa.</li>
                    <li>Menjadi wadah aspirasi dan solusi nyata bagi siswa.</li>
                    <li>Membangun budaya disiplin dan kerja sama di sekolah.</li>
                </ul>
                <label><input type="radio" name="candidate_id" value="1"> Pilih</label>
            </div>

            {{-- Kandidat 2 --}}
            <div class="candidate-card">
                <img src="{{ asset('storage/img/kandidat2.jpg') }}" alt="Kandidat 2">
                <h2>Arya Saputra</h2>
                <p><strong>Visi:</strong> Menjadikan OSIS sebagai teladan kepemimpinan yang jujur, adil, dan visioner.</p>
                <p><strong>Misi:</strong></p>
                <ul>
                    <li>Mendorong siswa aktif dalam kegiatan sosial dan sekolah.</li>
                    <li>Meningkatkan solidaritas antar siswa melalui program kolaboratif.</li>
                    <li>Membangun sistem komunikasi efektif antara OSIS, guru, dan siswa.</li>
                </ul>
                <label><input type="radio" name="candidate_id" value="2"> Pilih</label>
            </div>

            {{-- Kandidat 3 --}}
            <div class="candidate-card">
                <img src="{{ asset('storage/img/kandidat3.jpg') }}" alt="Kandidat 3">
                <h2>Rizky Ananda</h2>
                <p><strong>Visi:</strong> Membawa OSIS menjadi organisasi yang inovatif, transparan, dan berpihak kepada siswa.</p>
                <p><strong>Misi:</strong></p>
                <ul>
                    <li>Mengadakan forum rutin untuk menampung ide dan kritik siswa.</li>
                    <li>Mengoptimalkan kegiatan positif yang mendukung bakat dan minat.</li>
                    <li>Menjalankan setiap program OSIS dengan transparansi dan tanggung jawab.</li>
                </ul>
                <label><input type="radio" name="candidate_id" value="3"> Pilih</label>
            </div>

        </div>

        <div style="text-align: center; margin-top: 20px;">
            <button type="submit">Vote</button>
        </div>
    </form>
</body>
</html>
