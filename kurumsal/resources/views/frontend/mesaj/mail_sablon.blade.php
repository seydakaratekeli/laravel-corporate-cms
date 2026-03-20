
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teklif Formu</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			background: #f3f6fb;
			font-family: "Segoe UI", Tahoma, Arial, sans-serif;
			color: #1f2937;
		}

		.wrapper {
			width: 100%;
			padding: 24px 12px;
			box-sizing: border-box;
		}

		.mail-card {
			max-width: 680px;
			margin: 0 auto;
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 14px;
			overflow: hidden;
			box-shadow: 0 8px 28px rgba(15, 23, 42, 0.08);
		}

		.mail-header {
			padding: 22px 24px;
			background: linear-gradient(135deg, #0f766e 0%, #0ea5a6 100%);
			color: #ffffff;
		}

		.mail-header h2 {
			margin: 0;
			font-size: 22px;
			font-weight: 700;
			line-height: 1.3;
		}

		.mail-header p {
			margin: 8px 0 0;
			font-size: 14px;
			opacity: 0.95;
		}

		.mail-content {
			padding: 24px;
		}

		.field {
			padding: 12px 14px;
			margin-bottom: 10px;
			background: #f8fafc;
			border: 1px solid #e2e8f0;
			border-radius: 10px;
		}

		.label {
			display: block;
			font-size: 12px;
			text-transform: uppercase;
			letter-spacing: 0.05em;
			color: #64748b;
			margin-bottom: 6px;
			font-weight: 600;
		}

		.value {
			font-size: 15px;
			line-height: 1.6;
			color: #0f172a;
			word-break: break-word;
		}

		.message-box {
			min-height: 120px;
			white-space: pre-wrap;
		}

		.mail-footer {
			padding: 14px 24px 20px;
			font-size: 12px;
			color: #94a3b8;
			text-align: center;
		}

		@media (max-width: 600px) {
			.mail-header,
			.mail-content,
			.mail-footer {
				padding-left: 16px;
				padding-right: 16px;
			}

			.mail-header h2 {
				font-size: 19px;
			}
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="mail-card">
			<div class="mail-header">
				<h2>{{ $data->adi }} - Teklif Formu</h2>
				<p>Web sitesi uzerinden yeni bir teklif talebi alindi.</p>
			</div>

			<div class="mail-content">
				<div class="field">
					<span class="label">Ad Soyad</span>
					<div class="value">{{ $data->adi }}</div>
				</div>

				<div class="field">
					<span class="label">E-posta</span>
					<div class="value">{{ $data->email }}</div>
				</div>

				<div class="field">
					<span class="label">Telefon</span>
					<div class="value">{{ $data->telefon }}</div>
				</div>

				<div class="field">
					<span class="label">Konu</span>
					<div class="value">{{ $data->konu }}</div>
				</div>

				<div class="field">
					<span class="label">Mesaj</span>
					<div class="value message-box">{{ $data->mesaj }}</div>
				</div>
			</div>

			<div class="mail-footer">
				Bu e-posta otomatik olarak olusturulmustur.
			</div>
		</div>
	</div>
</body>
</html>
