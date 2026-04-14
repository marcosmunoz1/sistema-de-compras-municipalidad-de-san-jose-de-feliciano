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
            margin: 7mm;
        }

        body {
            margin: 0;
            padding: 8px;
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

            .no-print {
                display: none;
            }
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
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
            padding-bottom: 8px;
            margin-bottom: 8px;
            position: relative;
            z-index: 10;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-placeholder {
            width: 85px;
            height: 55px;
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
            padding: 4px 12px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .field-group {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2px;
            margin-bottom: 6px;
            position: relative;
            z-index: 10;
        }

        .modern-field {
            display: flex;
            align-items: center;
            background: rgba(248, 250, 252, 0.8);
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 2px 10px;
            margin-bottom: 2px;
        }

        .field-label {
            font-size: 11px;
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
            font-size: 12px;
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
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            text-transform: uppercase;
            text-align: left;
        }

        td {
            border-bottom: 1px solid #f1f5f9;
            padding: 3px 10px;
            height: 20px;
            font-size: 12px;
            vertical-align: middle;
        }

        .footer-area {
            margin-top: 8px;
            display: flex;
            justify-content: center;
            padding-bottom: 4px;
            position: relative;
            z-index: 10;
        }

        .signature-box {
            border-top: 2px solid #1e293b;
            text-align: center;
            padding-top: 8px;
            width: 250px;
            background: rgba(255, 255, 255, 0.7);
        }

        .signature-label {
            font-size: 15px;
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
            font-size: 13px;
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

        <!-- Encabezado Principal -->
        <table
            style="width: 100%; border: none; border-collapse: collapse; border-bottom: 3px solid #1e40af; padding-bottom: 10px; margin-bottom: 8px;">
            <tr>
                <td style="width: 70px; vertical-align: middle; border: none; padding: 0;">
                    <div class="logo-placeholder">
                        <img src="<?php echo e(public_path('logo/logo-pdf.png')); ?>" alt="Logo">
                    </div>
                </td>
                <td style="vertical-align: middle; border: none; padding-left: 15px;">
                    <div style="font-size: 18px; font-weight: 900; color: #1e293b; letter-spacing: -0.5px;">
                        MUNICIPALIDAD DE</div>
                    <div style="font-size: 18px; font-weight: 900; color: #1e40af; letter-spacing: -0.5px;">SAN JOSÉ DE
                        FELICIANO</div>
                    <div
                        style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 1px; margin-top: 2px;">
                        Gestión Corralón Municipal</div>
                    <div
                        style="font-size: 10px; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px;">
                        Solicitud Provisoria de Insumos</div>
                </td>
                <td style="text-align: right; vertical-align: middle; border: none; padding-bottom: 20px;">
                    <div class="title-badge" style="margin-bottom: 6px;">ORDEN DE COMPRA</div>
                    <div style="font-size: 16px; font-family: monospace; font-weight: 700; color: #1e293b;">N° <span
                            style="color: #dc2626;"><?php echo e(str_pad($compra->nr_orden, 12, '0', STR_PAD_LEFT)); ?></span>
                    </div>
                    <div
                        style="font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase; margin-top: 4px;">
                        Fecha: <span
                            style="border-bottom: 1px solid #cbd5e1; display: inline-block; min-width: 80px;"><?php echo e(\Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y')); ?></span>
                    </div>
                </td>
            </tr>
        </table>

        <div class="field-group">
            <div class="modern-field">
                <span class="field-label">Proveedor</span>
                <div class="field-value" style="font-size: 14px"><?php echo e($compra->proveedor->empresa ?? 'N/A'); ?></div>
            </div>
            <div class="modern-field">
                <span class="field-label">Entregar a</span>
                <div class="field-value" style="font-size: 14px"><?php echo e($compra->empleado->nombre ?? 'N/A'); ?></div>
            </div>
            <div class="modern-field">
                <span class="field-label">Sub Cuenta</span>
                <div class="field-value" style="font-size: 14px"><?php echo e($compra->sub_cuenta ?? 'N/A'); ?></div>
            </div>
            <div class="modern-field">
                <span class="field-label">Asunto</span>
                <div class="field-value" style="font-size: 14px"><?php echo e($compra->asunto_obra_automotor ?? 'N/A'); ?></div>
                <span class="ml-4"
                    style="font-size: 9px; color: #94a3b8; font-weight: bold; text-transform: uppercase;">(Vehículo /
                    Obra / Equipo)</span>
            </div>
            <?php if($compra->observacion): ?>
                <div class="modern-field">
                    <span class="field-label">Observación</span>
                    <div class="field-value"
                        style="font-size: 14px; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
                        <?php echo e($compra->observacion); ?></div>
                </div>
            <?php endif; ?>
        </div>

        <div class="table-container">
            <div style="margin-bottom: 4px;">

            </div>
            <table>
                <thead>
                    <tr>
                        <th width="18%">CANT. / U.M.</th>
                        <th width="52%">DESCRIPCIÓN DEL INSUMO</th>
                        <th width="30%">DESTINO (Veh. / Obra / Equipo)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $compra->detalle_compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="font-weight: 600; font-size: 14px"><?php echo e($detalle->cantidad); ?>

                                <?php echo e($detalle->producto->unidad ?? 'UND'); ?>

                            </td>
                            <td style="font-size: 14px"><?php echo e($detalle->producto->nombre ?? 'N/A'); ?></td>
                            <td style="font-size: 13px; color: #334155; font-weight: 600;">
                                <?php if($compra->destino instanceof \App\Models\Vehiculo): ?>
                                    <?php echo e($compra->destino->patente ?? ''); ?>

                                    <?php echo e($compra->destino->marca ?? ''); ?>

                                    <?php echo e($compra->destino->modelo ?? ''); ?>

                                <?php elseif($compra->destino instanceof \App\Models\Equipo): ?>
                                    <?php echo e($compra->destino->equipamiento ?? ''); ?>

                                    <?php if($compra->destino->marca): ?>
                                        - <?php echo e($compra->destino->marca); ?>

                                    <?php endif; ?>
                                <?php elseif($compra->destino instanceof \App\Models\Obra): ?>
                                    <?php echo e($compra->destino->nombre ?? ''); ?>

                                <?php elseif($compra->destino instanceof \App\Models\Deposito): ?>
                                    <?php echo e($compra->destino->nombre ?? ''); ?>

                                <?php else: ?>
                                    <?php echo e($compra->destino->nombre ?? 'N/A'); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php for($i = count($compra->detalle_compras); $i < 3; $i++): ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        <table
            style="width: 100%; margin-top: 15px; border: none; border-collapse: collapse; page-break-inside: avoid;">
            <tr style="page-break-inside: avoid;">
                <td style="width: 34%; text-align: center; vertical-align: bottom; border: none; padding: 0 8px;">
                    <?php if($compra->usuario && $compra->usuario->firma): ?>
                        <img src="<?php echo e(public_path('storage/' . $compra->usuario->firma)); ?>"
                            style="max-width: 180px; height: auto; max-height: 180px;">
                    <?php endif; ?>
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Autorizado por
                        jefe de compras.
                        <br> 
                        Cargado por <?php echo e($compra->usuario ? ': ' . $compra->usuario->name : ''); ?>

                    </div>
                </td>
                <td style="width: 33%; text-align: center; vertical-align: bottom; border: none; padding: 0 8px;">
                    <div style="border-bottom: 1.5px solid #000; height: 30px; margin-bottom: 4px;"></div>
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Firma Proveedor</div>
                    <div style="font-size: 10px; color: #64748b; text-transform: uppercase;">Aclaracion</div>
                </td>
                <td style="width: 33%; text-align: center; vertical-align: bottom; border: none; padding: 0 8px;">
                    <div style="border-bottom: 1.5px solid #000; height: 30px; margin-bottom: 4px;"></div>
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Firma Empleado Municipal
                    </div>
                    <div style="font-size: 10px; color: #64748b; text-transform: uppercase;">Recibí Conforme</div>
                </td>
            </tr>
        </table>
        <div class="copy-indicator uppercase">
            <span>Original: Contaduría Municipal</span>
            <span>San José de Feliciano - Entre Ríos</span>
            <span>Copia: Proveedor / Archivo</span>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/pdf/orden-compra.blade.php ENDPATH**/ ?>