<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rekap Hasil Voting</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * { box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            margin: 0;
            padding: 40px 20px;
            min-height: 100vh;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #fff;
            margin-bottom: 40px;
            font-weight: 600;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        .container {
            background: #fff;
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        ul.result-list { list-style: none; padding: 0; margin: 0; }
        ul.result-list li {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px 25px;
            box-shadow: 0 6px 12px rgba(37, 117, 252, 0.1);
            transition: box-shadow 0.3s ease;
        }
        ul.result-list li:hover { box-shadow: 0 8px 18px rgba(37, 117, 252, 0.25); }
        ul.result-list li strong.candidate-name {
            font-size: 1.3rem;
            color: #2575fc;
            display: block;
            margin-bottom: 8px;
        }
        .total-votes {
            font-weight: 600;
            margin-bottom: 12px;
            color: #444;
        }
        .toggle-button {
            background: #2575fc;
            border: none;
            padding: 10px 18px;
            color: #fff;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            user-select: none;
            font-size: 0.95rem;
        }
        .toggle-button:hover { background: #1a54c6; }
        .voter-list {
            margin-top: 15px;
            display: none;
            max-height: 250px;
            overflow-y: auto;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
        .voter-list ul {
            list-style: disc inside;
            padding-left: 15px;
            margin: 0;
        }
        .voter-list li {
            font-size: 0.9rem;
            color: #555;
            padding: 6px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .voter-list li:last-child { border-bottom: none; }
        form.logout-form {
            margin-top: 30px;
            text-align: center;
        }
        form.logout-form button {
            background-color: #e53e3e;
            border: none;
            padding: 12px 28px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
        }
        form.logout-form button:hover { background-color: #9b2c2c; }

        @media (max-width: 640px) {
            body { padding: 20px 15px; }
            .container { padding: 25px 20px; }
            ul.result-list li { padding: 18px 20px; }
            .toggle-button { width: 100%; padding: 12px 0; }
        }
    </style>
</head>
<body>

<h1>Rekap Hasil Voting</h1>

<div class="container">
    <ul class="result-list">
        @foreach($results as $r)
            <li>
                <strong class="candidate-name">{{ $r->candidate->name }}</strong>
                <div class="total-votes">Total Suara: <span class="vote-number">******</span></div>

                <button class="toggle-button" 
                        onclick="showVoters('voters-{{ $r->candidate_id }}', '{{ $r->candidate->password }}')">
                    Lihat Pemilih
                </button>

                <div id="voters-{{ $r->candidate_id }}" class="voter-list">
                    <ul>
                        @foreach(\App\Models\Vote::where('candidate_id', $r->candidate_id)->with('user')->get() as $voter)
                            <li>{{ $voter->user->nama }} (Kelas: {{ $voter->user->kelas }} {{ $voter->user->jurusan }})</li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

<script>
    function showVoters(id, candidatePassword) {
        const pass = prompt("Masukkan password admin untuk melihat pemilih dan jumlah suara:");
        if(pass === candidatePassword){
            const el = document.getElementById(id);
            if(el.style.display === "none" || el.style.display === ""){
                el.style.display = "block";
            } else {
                el.style.display = "none";
            }

            // tampilkan jumlah suara hanya untuk kandidat ini
            const parentLi = el.closest('li');
            const span = parentLi.querySelector('.vote-number');
            span.textContent = el.querySelector('ul').children.length;
        } else {
            alert("Password salah! Akses ditolak.");
        }
    }
</script>

</body>
</html>
