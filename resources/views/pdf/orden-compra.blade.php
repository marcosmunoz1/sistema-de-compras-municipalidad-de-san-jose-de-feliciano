<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Compra A4 - San José de Feliciano</title>
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

        .watermark {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-35deg);
            font-size: 110px;
            font-weight: 900;
            color: rgba(226, 232, 240, 0.45);
            text-transform: uppercase;
            pointer-events: none;
            white-space: nowrap;
            z-index: 0;
            letter-spacing: 15px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #1e40af;
            padding-bottom: 10px;
            margin-bottom: 12px;
            position: relative;
            z-index: 10;
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
            background-color: #eff6ff;
            color: #1e40af;
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
            background: rgba(248, 250, 252, 0.8);
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
            background-color: #1e40af;
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
            vertical-align: middle;
        }

        .footer-area {
            margin-top: 12px;
            display: flex;
            justify-content: center;
            padding-bottom: 8px;
            position: relative;
            z-index: 10;
        }

        .signature-box {
            border-top: 2px solid #1e293b;
            text-align: center;
            padding-top: 8px;
            width: 250px;
            background: rgba(255,255,255,0.7);
        }

        .signature-label {
            font-size: 11px;
            font-weight: 700;
            color: #1e293b;
            text-transform: uppercase;
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
        }

        .text-xl {
            font-size: 20px;
        }

        .text-lg {
            font-size: 18px;
        }

        .font-black {
            font-weight: 900;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-slate-900 {
            color: #0f172a;
        }

        .text-blue-700 {
            color: #1d4ed8;
        }

        .text-slate-500 {
            color: #64748b;
        }

        .text-slate-800 {
            color: #1e293b;
        }

        .text-red-600 {
            color: #dc2626;
        }

        .text-slate-700 {
            color: #334155;
        }

        .text-slate-400 {
            color: #94a3b8;
        }

        .tracking-tight {
            letter-spacing: -0.025em;
        }

        .tracking-widest {
            letter-spacing: 0.1em;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        .tracking-tighter {
            letter-spacing: -0.05em;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .text-right {
            text-align: right;
        }

        .mb-1\.5 {
            margin-bottom: 6px;
        }

        .mt-0\.5 {
            margin-top: 2px;
        }

        .mb-2 {
            margin-bottom: 8px;
        }

        .ml-4 {
            margin-left: 16px;
        }
    </style>
</head>
<body>

    <div class="page">
        <div class="watermark text-slate-200">DUPLICADO</div>

        <div class="header-section">
            <div class="logo-container">
                <div class="logo-placeholder">
                    <img src="{{ public_path('logo/logo-pdf.png') }}" alt="Logo">   
                </div> 
                <div>
                    <h1 class="text-xl font-black text-slate-900 tracking-tight">MUNICIPALIDAD DE</h1>
                    <h2 class="text-xl font-black text-blue-700 tracking-tight">SAN JOSÉ DE FELICIANO</h2>
                    <p style="font-size: 11px; font-weight: bold; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; margin-top: 2px;">Gestión Corralón Municipal</p>
                </div>
            </div>
            <div class="text-right">
                <div class="title-badge mb-1.5">ORDEN DE COMPRA</div>
                <div class="text-lg font-mono font-bold text-slate-800">N° <span class="text-red-600">{{ str_pad($compra->nr_orden, 12, '0', STR_PAD_LEFT) }}</span></div>
                <div style="font-size: 12px; color: #64748b; font-weight: 600; margin-top: 2px; text-transform: uppercase;">Fecha: <span style="border-bottom: 1px solid #cbd5e1; display: inline-block; width: 112px;">{{ \Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y') }}</span></div>
            </div>
        </div>

        <div class="field-group">
            <div class="modern-field">
                <span class="field-label">Proveedor</span>
                <div class="field-value">{{ $compra->proveedor->nombre ?? 'N/A' }}</div>
            </div>
            <div class="modern-field">
                <span class="field-label">Entregar a</span>
                <div class="field-value">{{ $compra->empleado->nombre ?? 'N/A' }}</div>
            </div>
            <div class="modern-field">
                <span class="field-label">Sub Cuenta</span>
                <div class="field-value">{{ $compra->sub_cuenta ?? 'N/A' }}</div>
            </div>
            <div class="modern-field">
                <span class="field-label">Asunto</span>
                <div class="field-value">{{ $compra->asunto_obra_automotor ?? 'N/A' }}</div>
                <span class="ml-4" style="font-size: 9px; color: #94a3b8; font-weight: bold; text-transform: uppercase;">(Vehículo / Obra / Equipo)</span>
            </div>
        </div>

        <div class="table-container">
            <div style="margin-bottom: 4px;">
                <h3 style="font-size: 9px; font-weight: 900; color: #334155; text-transform: uppercase; letter-spacing: 0.05em;">Detalle de Insumos y Suministros</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="18%">CANT. / U.M.</th>
                        <th width="82%">DESCRIPCIÓN DEL INSUMO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($compra->detalle_compras as $detalle)
                    <tr>
                        <td style="font-weight: 600;">{{ $detalle->cantidad }} {{ $detalle->producto->unidad ?? 'UND' }}</td>
                        <td>{{ $detalle->producto->nombre ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                    @for($i = count($compra->detalle_compras); $i < 3; $i++)
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div class="footer-area">
            @if($compra->usuario && $compra->usuario->firma)
                <img src="{{ public_path('storage/' . $compra->usuario->firma) }}" alt="Firma" style="max-width: 200px; height: 130px; margin: 0 auto 8px auto; display: block;">
            @endif
            <div class="signature-box"> 
                <span class="signature-label">Autorizado por{{ $compra->usuario ? ': ' . $compra->usuario->name : '' }}</span>
                <p style="font-size: 9px; color: #94a3b8; margin-top: 2px; text-transform: uppercase; letter-spacing: -0.05em;">Firma y Sello de Autoridad Responsable</p>
            </div>
        </div>

        <div class="copy-indicator uppercase">
            <span>Original: Contaduría Municipal</span>
            <span>San José de Feliciano - Entre Ríos</span>
            <span>Copia: Proveedor / Archivo</span>
        </div>
    </div>

</body>
</html>