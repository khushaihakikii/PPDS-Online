<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PPDS Online Disetujui</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #10b981; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
        .content { background-color: #f9f9f9; padding: 20px; border-radius: 0 0 5px 5px; }
        .button { display: inline-block; background-color: #10b981; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Selamat!</h1>
            <h2>Pendaftaran PPDS Online Anda Telah Disetujui</h2>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $registration->full_name }}</strong>,</p>

            <p>Kami dengan senang hati menginformasikan bahwa pendaftaran PPDS Online Anda telah <strong>disetujui</strong> oleh tim admin.</p>

            <div style="background-color: white; padding: 15px; border-radius: 5px; margin: 20px 0; border-left: 4px solid #10b981;">
                <h3 style="margin-top: 0; color: #10b981;">Detail Pendaftaran:</h3>
                <p><strong>Nama Lengkap:</strong> {{ $registration->full_name }}</p>
                <p><strong>Email:</strong> {{ $registration->email }}</p>
                <p><strong>Nomor Telepon:</strong> {{ $registration->phone }}</p>
                <p><strong>Institusi:</strong> {{ $registration->institution }}</p>
                <p><strong>Program Studi:</strong> {{ $registration->study_program }}</p>
                <p><strong>Tanggal Pendaftaran:</strong> {{ $registration->created_at->format('d M Y') }}</p>
                <p><strong>Status:</strong> <span style="color: #10b981; font-weight: bold;">Disetujui</span></p>
            </div>

            <p>Selanjutnya, Anda akan menerima informasi lebih lanjut mengenai proses PPDS Online melalui email terpisah atau kontak dari tim kami.</p>

            <p>Jika Anda memiliki pertanyaan, silakan hubungi kami melalui:</p>
            <ul>
                <li>Email: admin@ppds-online.com</li>
                <li>Telepon: (021) 123-4567</li>
            </ul>

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