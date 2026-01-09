<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Carga de Combustible - San José de Feliciano</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');

        @page {
            size: A4;
            margin: 10mm; 
        }
        
        body {
            margin: 0;
            padding: 15px;
            font-family: 'Inter', sans-serif;
            color: #1e293b;
            background-color: white;
        }

        @media print {
            body { 
                background-color: white; 
                padding: 0; 
            }
            .page { 
                box-shadow: none !important;
                margin: 0 !important;
                border: none !important;
                height: auto;
                width: 100%;
            }
            .no-print { display: none; }
        }

        @media screen {
            .page {
                width: calc(100% - 10px);
                max-width: 780px;
                margin: 0 auto;
            }
        }

        .page {
            background: white;
            padding: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            border: 1px solid #e2e8f0;
            box-sizing: border-box;
            position: relative;
        }

        /* Marca de agua repetitiva */
        .watermark-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            opacity: 0.04;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-content: space-around;
            transform: rotate(-25deg) scale(1.2);
        }

        .watermark-text {
            font-size: 60px;
            font-weight: 900;
            text-transform: uppercase;
            white-space: nowrap;
            margin: 40px;
            letter-spacing: 10px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #b91c1c; 
            padding-bottom: 10px;
            margin-bottom: 12px;
            position: relative;
            z-index: 10;
            background: white;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-placeholder {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .logo-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .title-badge {
            background-color: #fef2f2;
            color: #b91c1c;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .field-group {
            display: grid;
            grid-template-columns: 1fr;
            gap: 5px;
            margin-bottom: 12px;
            position: relative;
            z-index: 10;
        }

        .modern-field {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 5px 12px;
        }

        .field-label {
            font-size: 9px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            width: 90px;
            flex-shrink: 0;
            border-right: 1px solid #cbd5e1;
            margin-right: 10px;
        }

        .field-value {
            flex-grow: 1;
            font-size: 10px;
            font-weight: 600;
            color: #1e293b;
        }

        .field-line {
            flex-grow: 1;
            border-bottom: 1px dashed #94a3b8;
            height: 18px;
        }

        .table-container {
            position: relative;
            z-index: 5;
            flex-grow: 1;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            background-color: transparent;
        }

        th {
            background-color: #b91c1c;
            color: white;
            font-size: 9px;
            font-weight: 600;
            padding: 6px 8px;
            text-transform: uppercase;
            text-align: left;
        }

        td {
            border-bottom: 1px solid #f1f5f9;
            padding: 4px 8px;
            height: 26px;
            font-size: 10px;
            background-color: rgba(255, 255, 255, 0.5);
            vertical-align: middle;
        }

        .footer-area {
            margin-top: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr; /* 🔑 3 columnas reales */
            column-gap: 16px;
            width: 100%;
            align-items: end;

            /* 🔒 reset de interferencias */
            flex: none;
        }

        .signature-box {
            width: 100%;
            text-align: center;
            display: block; /* 🔑 no flex */
        }

        .signature-space {
            width: 100%;
            height: 38px;
            border-bottom: 1.5px solid #000;
            margin-bottom: 6px;
        }

        .signature-label {
                font-size: 7px;
                font-weight: 700;
                color: #1e293b;
                text-transform: uppercase;
                line-height: 1.2;
            }

            .signature-sub {
                font-size: 6px;
                color: #64748b;
                text-transform: uppercase;
                line-height: 1.1;
            }


        .copy-indicator {
            margin-top: auto;
            padding-top: 10px;
            border-top: 1px dashed #cbd5e1;
            display: flex;
            justify-content: space-between;
            font-size: 9px;
            color: #94a3b8;
            font-weight: 600;
            position: relative;
            z-index: 10;
            background: white;
        }
    </style>
</head>
<body>

    <div class="page">
        <!-- Marca de agua adaptativa -->
        <div class="watermark-container">
            <div class="watermark-text">CARGA</div>
            <div class="watermark-text">CARGA</div>
        </div>

        <!-- Encabezado Principal -->
        <div class="header-section">
            <div class="logo-container">
                <div class="logo-placeholder">
                    <img src="{{ public_path('logo/logo-pdf.png') }}" alt="Logo"> 
                </div>
                <div>
                    <h1 class="text-xl font-black text-slate-900 tracking-tight">MUNICIPALIDAD DE</h1>
                    <h2 class="text-xl font-black text-red-700 tracking-tight">SAN JOSÉ DE FELICIANO</h2>
                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest mt-0.5">Gestión Corralón Municipal</p>
                </div>
            </div>
            <div class="text-right">
                <div class="title-badge mb-1.5">ORDEN DE CARGA</div>
                <div class="text-lg font-mono font-bold text-slate-800">N° <span class="text-red-600">{{ str_pad($combustible->codigo, 12, '0', STR_PAD_LEFT) }}</span></div>
                <div class="text-[12px] text-slate-500 font-semibold mt-0.5 uppercase">Fecha: <span class="border-b border-slate-300 inline-block w-28">{{ $combustible->fecha ? \Carbon\Carbon::parse($combustible->fecha)->format('d/m/Y') : '—' }}</span></div>
            </div>
        </div>

        <!-- Campos de Datos -->
        <div class="field-group">
            <div class="modern-field">
                <span class="field-label">Dominio</span>
                <div class="field-value">{{ $combustible->destino->patente ?? 'N/A' }}</div>
                <span class="ml-4 text-[9px] text-slate-400 font-bold uppercase">(Patente)</span>
            </div>
            <div class="modern-field">
                <span class="field-label">Entregar a</span>
                <div class="field-value">{{ $combustible->empleado->nombre ?? 'N/A' }}</div>
            </div>
            <div class="modern-field">
                <span class="field-label">Sub Cuenta</span>
                <div class="field-value">{{ $combustible->sub_cuenta ?? 'N/A' }}</div>
            </div>
            <div class="modern-field">
                <span class="field-label">Estación</span>
                <div class="field-value">{{ $combustible->estacion ?? 'N/A' }}</div>
            </div>
        </div>

        <!-- Tabla de Detalle -->
        <div class="table-container">
            <div style="margin-bottom: 4px;">
                <h3 class="text-[9px] font-black text-slate-700 uppercase tracking-wider">Detalle / Observaciones de Carga</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="100%">DESCRIPCIÓN DE LA CARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 600;">{{ $combustible->litros }} Litros - {{ $combustible->tipo }} - ${{ number_format($combustible->monto, 2, '.', ',') }}</td>
                    </tr>
                    @if($combustible->observaciones)
                    <tr>
                        <td>Observaciones: {{ $combustible->observaciones }}</td>
                    </tr>
                    @endif
                    @for($i = ($combustible->observaciones ? 2 : 1); $i < 3; $i++)
                    <tr>
                        <td></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- Área de Firmas (Triple validación) -->
        <div class="footer-area">
            <div class="signature-box">
                <div class="signature-space"></div>
                <span class="signature-label">Firma Portador</span>
                <span class="signature-sub">Aclaración y DNI</span>
            </div>
            <div class="signature-box">
                <div class="signature-space"></div>
                <span class="signature-label">Firma Empleado YPF</span>
                <span class="signature-sub">Estación de Servicio</span>
            </div>
            <div class="signature-box">
                <div class="signature-space"></div>
                <span class="signature-label">Autorizado por Funcionario</span>
                <span class="signature-sub">Sello y Firma Municipal</span>
            </div>
        </div>

        <!-- Pie de página -->
        <div class="copy-indicator uppercase">
            <span>Original: Contaduría</span>
            <span>Comprobante Estación de Servicio</span>
            <span>Copia: Archivo Corralón</span>
        </div>
    </div>

</body>
</html>
