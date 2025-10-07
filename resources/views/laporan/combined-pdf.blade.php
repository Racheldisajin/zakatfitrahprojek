<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 10pt;
            line-height: 1.4;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        h1 {
            font-size: 16pt;
            margin: 0 0 5px 0;
        }
        h2 {
            font-size: 14pt;
            margin: 20px 0 10px 0;
            color: #444;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        h3 {
            font-size: 12pt;
            margin: 15px 0 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: left;
            padding: 8px;
            font-size: 10pt;
        }
        td {
            padding: 6px 8px;
            font-size: 9pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .summary {
            margin-bottom: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
        }
        .summary-item {
            text-align: center;
        }
        .summary-item h4 {
            margin: 0 0 5px 0;
            font-size: 10pt;
        }
        .summary-item p {
            margin: 0;
            font-size: 12pt;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 9pt;
            color: #777;
        }
        .page-break {
            page-break-after: always;
        }
        .highlight {
            background-color: #f5fff5;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Dicetak pada tanggal: {{ date('d/m/Y H:i') }}</p>
    </div>

    <!-- Ringkasan -->
    <div class="summary">
        <h3 class="text-center">Ringkasan</h3>
        <table>
            <tr>
                <th width="25%">Beras Terkumpul</th>
                <th width="25%">Uang Terkumpul</th>
                <th width="25%">Beras Tersalurkan</th>
                <th width="25%">Uang Tersalurkan</th>
            </tr>
            <tr>
                <td class="text-center">{{ number_format($totalBerasCollected, 1) }} kg</td>
                <td class="text-center">Rp {{ number_format($totalUangCollected, 0, ',', '.') }}</td>
                <td class="text-center">{{ number_format($totalBerasDistributed, 1) }} kg</td>
                <td class="text-center">Rp {{ number_format($totalUangDistributed, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th width="50%" colspan="2">Saldo Beras</th>
                <th width="50%" colspan="2">Saldo Uang</th>
            </tr>
            <tr>
                <td class="text-center" colspan="2">{{ number_format($berasBalance, 1) }} kg</td>
                <td class="text-center" colspan="2">Rp {{ number_format($uangBalance, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <!-- Pengumpulan Zakat -->
    <h2>Pengumpulan Zakat</h2>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Nama Muzakki</th>
                <th width="15%">Tanggal</th>
                <th width="15%">Jenis Bayar</th>
                <th width="15%">Jumlah Beras (kg)</th>
                <th width="15%">Jumlah Uang (Rp)</th>
                <th width="15%">Jumlah Tanggungan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengumpulanZakat as $index => $zakat)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $zakat->muzakki->nama ?? $zakat->nama_kk }}</td>
                <td>{{ $zakat->created_at->format('d/m/Y') }}</td>
                <td>{{ ucfirst($zakat->jenis_bayar) }}</td>
                <td class="text-right">
                    @if($zakat->jenis_bayar == 'beras')
                        {{ number_format($zakat->bayar_beras, 1) }}
                    @else
                        -
                    @endif
                </td>
                <td class="text-right">
                    @if($zakat->jenis_bayar == 'uang')
                        {{ number_format($zakat->bayar_uang, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td class="text-center">{{ $zakat->jumlah_tanggungan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data pembayaran zakat untuk periode ini</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="highlight">
                <td colspan="4" class="text-right"><strong>Total Pengumpulan</strong></td>
                <td class="text-right"><strong>{{ number_format($totalBerasCollected, 1) }} kg</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($totalUangCollected, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <div class="page-break"></div>

    <!-- Distribusi Zakat -->
    <h2>Distribusi Zakat</h2>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Nama Mustahik</th>
                <th width="15%">Tanggal</th>
                <th width="15%">Kategori</th>
                <th width="15%">Jenis Distribusi</th>
                <th width="10%">Jumlah Beras (kg)</th>
                <th width="10%">Jumlah Uang (Rp)</th>
                <th width="10%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($distribusiZakat as $index => $distribusi)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $distribusi->nama_mustahik }}</td>
                <td>{{ \Carbon\Carbon::parse($distribusi->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $distribusi->kategori }}</td>
                <td>{{ ucfirst($distribusi->jenis_distribusi) }}</td>
                <td class="text-right">
                    @if($distribusi->jenis_distribusi == 'beras' || $distribusi->jenis_distribusi == 'kombinasi')
                        {{ number_format($distribusi->jumlah_beras, 1) }}
                    @else
                        -
                    @endif
                </td>
                <td class="text-right">
                    @if($distribusi->jenis_distribusi == 'uang' || $distribusi->jenis_distribusi == 'kombinasi')
                        {{ number_format($distribusi->jumlah_uang, 0, ',', '.') }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $distribusi->keterangan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data distribusi zakat untuk periode ini</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr class="highlight">
                <td colspan="5" class="text-right"><strong>Total Distribusi</strong></td>
                <td class="text-right"><strong>{{ number_format($totalBerasDistributed, 1) }} kg</strong></td>
                <td class="text-right"><strong>Rp {{ number_format($totalUangDistributed, 0, ',', '.') }}</strong></td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>{{ $title }} | Halaman {PAGENO}</p>
    </div>
</body>
</html> 