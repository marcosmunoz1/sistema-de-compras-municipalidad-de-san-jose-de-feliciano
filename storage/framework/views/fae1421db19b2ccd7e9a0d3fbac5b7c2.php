<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Carga de Combustible - San Jose de Feliciano</title>
    <style>
        @page {
            size: 215.9mm 200.8mm;
            margin: 5mm;
        }

        body {
            margin: 0;
            padding: 4px;
            font-family: 'DejaVu Sans', Arial, sans-serif;
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
            padding: 6px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            border: 1px solid #e2e8f0;
            box-sizing: border-box;
            position: relative;
        }

        /* Marca de agua centrada */
        .watermark-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            pointer-events: none;
            z-index: 0;
            opacity: 0.04;
        }

        .watermark-text {
            font-size: 80px;
            font-weight: 900;
            text-transform: uppercase;
            white-space: nowrap;
            letter-spacing: 15px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #b91c1c;
            padding-bottom: 6px;
            margin-bottom: 6px;
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
            padding: 4px 10px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 15px;
            letter-spacing: 1px;
        }

        .field-group {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2px;
            margin-bottom: 4px;
            position: relative;
            z-index: 10;
        }

        .modern-field {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 2px 8px;
            margin-bottom: 1px;
        }

        .field-label {
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            width: 80px;
            flex-shrink: 0;
            border-right: 1px solid #cbd5e1;
            margin-right: 8px;
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
            background-color: #b91c1c;
            color: white;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 8px;
            text-transform: uppercase;
            text-align: left;
        }

        td {
            border-bottom: 1px solid #f1f5f9;
            padding: 3px 8px;
            height: 20px;
            font-size: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            vertical-align: middle;
        }

        .footer-area {
            margin-top: 6px;
            display: flex;
            justify-content: center;
            padding-bottom: 4px;
            position: relative;
            z-index: 10;
        }

        .signature-box {
            flex: 1;
            text-align: center;
            max-width: 32%;
        }

        .signature-space {
            width: 100%;
            height: 30px;
            border-bottom: 1.5px solid #000;
            margin-bottom: 4px;
        }

        .signature-label {
            font-size: 10px;
            font-weight: 700;
            color: #1e293b;
            text-transform: uppercase;
            line-height: 1.2;
            display: block;
        }

        .signature-sub {
            font-size: 9px;
            color: #64748b;
            text-transform: uppercase;
            line-height: 1.1;
            display: block;
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
            background: white;
        }
    </style>
</head>

<body>

    <div class="page">
        <!-- Marca de agua centrada -->
        <div class="watermark-container">
            <div class="watermark-text">CARGA</div>
        </div>

        <!-- Encabezado Principal -->
        <table
            style="width: 100%; border: none; border-collapse: collapse; border-bottom: 3px solid #b91c1c; padding-bottom: 10px; margin-bottom: 8px;">
            <tr>
                <td style="width: 70px; vertical-align: middle; border: none; padding: 0;">
                    <div class="logo-placeholder">
                        <img src="<?php echo e(public_path('logo/logo-pdf.png')); ?>" alt="Logo">
                    </div>
                </td>
                <td style="vertical-align: middle; border: none; padding-left: 15px;">
                    <div style="font-size: 18px; font-weight: 900; color: #1e293b; letter-spacing: -0.5px;">
                        MUNICIPALIDAD DE</div>
                    <div style="font-size: 18px; font-weight: 900; color: #b91c1c; letter-spacing: -0.5px;">SAN JOSE DE
                        FELICIANO</div>
                    <div
                        style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 1px; margin-top: 2px;">
                        Gestion Corralon Municipal - Combustibles</div>
                    <div
                        style="font-size: 10px; font-weight: 600; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px;">
                        Solicitud Provisoria de Insumos</div>
                </td>
                <td style="text-align: right; vertical-align: middle; border: none; padding-bottom: 20px;">
                    <div class="title-badge" style="margin-bottom: 6px;">ORDEN DE CARGA</div>
                    <div style="font-size: 16px; font-family: monospace; font-weight: 700; color: #1e293b;">N° <span
                            style="color: #b91c1c;"><?php echo e(str_pad($combustible->codigo, 12, '0', STR_PAD_LEFT)); ?></span>
                    </div>
                    <div
                        style="font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase; margin-top: 4px;">
                        Fecha: <span
                            style="border-bottom: 1px solid #cbd5e1; display: inline-block; min-width: 80px;"><?php echo e($combustible->fecha ? \Carbon\Carbon::parse($combustible->fecha)->format('d/m/Y') : '—'); ?></span>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Campos de Datos -->
        <div class="field-group">
            <?php if($combustible->destino instanceof \App\Models\Vehiculo): ?>
                
                <div class="modern-field">
                    <span class="field-label">Dominio</span>
                    <div class="field-value"><?php echo e($combustible->destino->patente ?? 'N/A'); ?></div>
                </div>
                <div class="modern-field">
                    <span class="field-label">Vehiculo</span>
                    <div class="field-value">
                        <?php echo e($combustible->destino->tipo ?? ''); ?>

                        <?php echo e($combustible->destino->marca ?? ''); ?>

                        <?php echo e($combustible->destino->modelo ?? ''); ?>

                        <?php if($combustible->destino->anio): ?> (<?php echo e($combustible->destino->anio); ?>) <?php endif; ?>
                        <?php if($combustible->destino->color): ?> - <?php echo e($combustible->destino->color); ?> <?php endif; ?>
                    </div>
                </div>
            <?php elseif($combustible->destino instanceof \App\Models\Equipo): ?>
                
                <div class="modern-field">
                    <span class="field-label">Equipo</span>
                    <div class="field-value"><?php echo e($combustible->destino->equipamiento ?? 'N/A'); ?></div>
                </div>
                <div class="modern-field">
                    <span class="field-label">Detalle</span>
                    <div class="field-value">
                        <?php echo e($combustible->destino->marca ?? ''); ?>

                        <?php if($combustible->destino->descripcion): ?> - <?php echo e($combustible->destino->descripcion); ?> <?php endif; ?>
                    </div>
                </div>
            <?php elseif($combustible->destino instanceof \App\Models\Destino): ?>
                
                <div class="modern-field">
                    <span class="field-label">Destino</span>
                    <div class="field-value"><?php echo e($combustible->destino->nombre ?? 'N/A'); ?></div>
                </div>
                <?php if($combustible->destino->descripcion): ?>
                    <div class="modern-field">
                        <span class="field-label">Detalle</span>
                        <div class="field-value"><?php echo e($combustible->destino->descripcion); ?></div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                
                <div class="modern-field">
                    <span class="field-label">Dominio</span>
                    <div class="field-value"><?php echo e($combustible->destino->patente ?? $combustible->destino->nombre ?? 'N/A'); ?>

                    </div>
                </div>
            <?php endif; ?>
            <div class="modern-field">
                <span class="field-label">Entregar a</span>
                <div class="field-value"><?php echo e($combustible->empleado->nombre ?? 'N/A'); ?></div>
            </div>
            <div class="modern-field">
                <span class="field-label">Sub Cuenta</span>
                <div class="field-value"><?php echo e($combustible->sub_cuenta ?? 'N/A'); ?></div>
            </div>
            <div class="modern-field">
                <span class="field-label">Estacion</span>
                <div class="field-value"><?php echo e($combustible->estacion ?? 'N/A'); ?></div>
            </div>
        </div>

        <!-- Tabla de Detalle -->
        <div class="table-container">
            <div style="margin-bottom: 4px;">
                <h3 class="text-[9px] font-black text-slate-700 uppercase tracking-wider">Detalle</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="100%">DESCRIPCION DE LA CARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 600;">
                            <?php if($combustible->litros !== null): ?>
                                <?php echo e($combustible->litros); ?> Litros - <?php echo e($combustible->tipo); ?>

                            <?php else: ?>
                                Carga completa - <?php echo e($combustible->tipo); ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <!-- Area de Firmas (Triple validacion) -->
        <table
            style="width: 100%; margin-top: 15px; border: none; border-collapse: collapse; page-break-inside: avoid;">
            <tr style="page-break-inside: avoid;">
                <td style="width: 33%; text-align: center; vertical-align: bottom; border: none; padding: 0 8px;">
                    <div style="font-size: 10px; color: #64748b; text-transform: uppercase;">Sello y Firma Municipal:
                    </div>
                    <?php if($combustible->user && $combustible->user->firma): ?>
                        <img src="<?php echo e(public_path('storage/' . $combustible->user->firma)); ?>"
                            style="max-width: 180px; height: auto; max-height: 180px;">
                    <?php endif; ?>
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Autorizado por
                        Funcionario<?php echo e($combustible->user ? ': ' . $combustible->user->name : ''); ?></div>
                </td>
                <td style="width: 33%; text-align: center; vertical-align: bottom; border: none; padding: 0 8px;">
                    <div style="border-bottom: 1.5px solid #000; height: 30px; margin-bottom: 4px;"></div>
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Firma Portador</div>
                    <div style="font-size: 10px; color: #64748b; text-transform: uppercase;">Aclaracion</div>
                </td>
                <td style="width: 33%; text-align: center; vertical-align: bottom; border: none; padding: 0 8px;">
                    <div style="border-bottom: 1.5px solid #000; height: 30px; margin-bottom: 4px;"></div>
                    <div style="font-size: 11px; font-weight: 700; text-transform: uppercase;">Firma Empleado YPF</div>
                    <div style="font-size: 10px; color: #64748b; text-transform: uppercase;">Estacion de Servicio</div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html><?php /**PATH C:\laragon\www\Sistema-talwind\resources\views/pdf/orden-carga.blade.php ENDPATH**/ ?>