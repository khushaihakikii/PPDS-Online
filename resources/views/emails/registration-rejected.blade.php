<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PPDS Online Ditolak</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #ef4444; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
        .content { background-color: #f9f9f9; padding: 20px; border-radius: 0 0 5px 5px; }
        .rejection-reason { background-color: #fef2f2; border: 1px solid #fecaca; border-radius: 5px; padding: 15px; margin: 20px 0; }
        .button { display: inline-block; background-color: #3b82f6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Informasi Status Pendaftaran</h1>
            <h2>Pendaftaran PPDS Online Anda Ditolak</h2>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $registration->full_name }}</strong>,</p>

            <p>Kami mohon maaf untuk menginformasikan bahwa pendaftaran PPDS Online Anda <strong>ditolak</strong> setelah melalui proses review oleh tim admin.</p>

            <div class="rejection-reason">
                <h3 style="margin-top: 0; color: #dc2626;">Alasan Penolakan:</h3>
                <p style="margin-bottom: 0;">{{ $registration->admin_notes ?: 'Tidak ada alasan spesifik yang diberikan.' }}</p>
            </div>

            <div style="background-color: white; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #ef4444;">
                <h3 style="margin-top: 0; color: #ef4444;">Detail Pendaftaran:</h3>
                <p><strong>Nama Lengkap:</strong> {{ $registration->full_name }}</p>
                <p><strong>Email:</strong> {{ $registration->email }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $registration->phone }}</p>
                <p><strong>Institusi:</strong> {{ $registration->institution }}</p>
                <p><strong>Program Studi:</strong> {{ $registration->study_program }}</p>
                <p><strong>Tanggal Pendaftaran:</strong> {{ $registration->created_at->format('d M Y') }}</p>
                <p><strong>Status:</strong> <span style="color: #ef4444; font-weight: bold;">Ditolak</span></p>
            </div>

            <p>Jangan berkecil hati! Anda masih dapat mendaftar kembali dengan memperbaiki dokumen atau informasi yang diperlukan. Silakan hubungi kami untuk mendapatkan bimbingan lebih lanjut.</p>

            <p>Jika Anda memiliki pertanyaan atau ingin mendapatkan klarifikasi lebih lanjut, silakan hubungi kami melalui:</p>
            <ul>
                <li>Email: admin@ppds-online.com</li>
                <li>Telepon: (021) 123-4567</li>
            </ul>

            <p>Kami berharap dapat membantu Anda di kesempatan mendatang.</p>

            <p>Terima kasih atas minat Anda untuk bergabung dengan program PPDS Online kami.</p>

            <p>Salam hormat,<br>
            <strong>Tim PPDS Online</strong></p>
        </div>
        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
            <p>&copy; {{ date('Y') }} PPDS Online. All rights reserved.</p>
        </div>
    </div>
</body>
</html>