<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftaran</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #444; padding-bottom: 10px; }
        .header h2 { margin: 0; text-transform: uppercase; color: #1e293b; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th { background-color: #f1f5f9; color: #475569; padding: 10px; text-align: left; border: 1px solid #e2e8f0; text-transform: uppercase; font-size: 10px; }
        table td { padding: 8px; border: 1px solid #e2e8f0; font-size: 11px; }
        .status { font-weight: bold; text-transform: uppercase; font-size: 9px; }
        .approved { color: #166534; }
        .pending { color: #854d0e; }
        .rejected { color: #991b1b; }
        .footer { margin-top: 30px; text-align: right; font-style: italic; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Pendaftaran Siswa</h2>
        <p>Dicetak pada: {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Tipe</th>
                <th>Gender</th>
                <th>Tahun Ajaran</th>
                <th>Orang Tua/Wali</th>
                <th>WhatsApp</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $index => $reg)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $reg->student_name }}</td>
                <td>{{ ucfirst($reg->registration_type) }}</td>
                <td>{{ $reg->student_gender == 'male' ? 'L' : 'P' }}</td>
                <td>{{ $reg->school_year }}</td>
                <td>{{ $reg->parent_name ?? '-' }}</td>
                <td>{{ $reg->parent_phone }}</td>
                <td class="status {{ $reg->status }}">
                    {{ $reg->status }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Sistem Pendaftaran Siswa Baru - {{ date('Y') }}
    </div>
</body>
</html>