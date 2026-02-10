<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Compras - San José de Feliciano</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }
        
        body {
            margin: 0;
            padding: 15px;
            font-family: 'DejaVu Sans', sans-serif;
            color: #1e293b;
            background-color: white;
            font-size: 11px;
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
            }
            .no-print { display: none; }
        }

        .page {
            background: white;
            padding: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid #e2e8f0;
            box-sizing: border-box;
        }

        /* Header con tabla para compatibilidad DomPDF */
        .header-table {
            width: 100%;
            border-bottom: 3px solid #1e40af;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .logo-placeholder {
            width: 50px;
            height: 50px;
            background-color: #1e40af;
            color: white;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            line-height: 50px;
            float: left;
            margin-right: 12px;
        }

        .org-info h1 {
            margin: 0;
            font-size: 16px;
            color: #1e40af;
            font-weight: bold;
        }

        .org-info p {
            margin: 2px 0 0 0;
            font-size: 10px;
            color: #64748b;
        }

        .report-info {
            text-align: right;
        }

        .report-info h2 {
            margin: 0;
            font-size: 18px;
            color: #1e40af;
            font-weight: bold;
            text-transform: uppercase;
        }

        .report-info p {
            margin: 3px 0 0 0;
            font-size: 10px;
            color: #64748b;
        }

        /* Summary con tabla */
        .summary-table {
            width: 100%;
            margin-bottom: 15px;
        }

        .summary-table td {
            width: 25%;
            text-align: center;
            padding: 10px;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
        }

        .summary-label {
            font-size: 9px;
            color: #64748b;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .summary-value {
            font-size: 18px;
            font-weight: bold;
            color: #1e40af;
        }

        .summary-value.success {
            color: #16a34a;
        }

        .summary-value.warning {
            color: #ca8a04;
        }

        .filters-section {
            background-color: #f1f5f9;
            padding: 8px 12px;
            margin-bottom: 15px;
            font-size: 10px;
            color: #475569;
        }

        .filters-section strong {
            color: #1e293b;
        }

        /* Tabla principal */
        table.main-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.main-table thead th {
            background-color: #1e40af;
            color: white;
            padding: 10px 8px;
            text-align: center;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        table.main-table tbody tr {
            border-bottom: 1px solid #e2e8f0;
        }

        table.main-table tbody td {
            padding: 8px;
            text-align: center;
            font-size: 10px;
            color: #334155;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            font-size: 9px;
            font-weight: bold;
        }

        .badge-success {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-warning {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-info {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .badge-error {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-primary {
            background-color: #e0e7ff;
            color: #3730a3;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        /* Footer con tabla */
        .footer-table {
            width: 100%;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #e2e8f0;
            font-size: 9px;
            color: #64748b;
        }

        /* Fila de compra destacada */
        .compra-row {
            background-color: #1e40af;
        }

        .compra-row td {
            color: #ffffff !important;
            font-weight: bold;
            padding: 10px 8px;
        }

        .compra-row td * {
            color: #ffffff !important;
        }

        .compra-row .badge {
            background-color: #3b82f6;
            color: #ffffff !important;
        }

        /* Fila de detalle */
        .detail-row {
            background-color: #f1f5f9;
        }

        .detail-row td {
            padding: 12px 15px;
            text-align: left;
        }

        .insumos-container {
            background-color: white;
            padding: 12px;
            border: 1px solid #e2e8f0;
            margin: 5px 0;
        }

        .insumos-table {
            width: 100%;
            border-collapse: collapse;
        }

        .insumos-table th {
            background-color: #e2e8f0;
            color: #475569;
            padding: 8px 12px;
            font-size: 9px;
            text-align: left;
            font-weight: bold;
            border-bottom: 2px solid #cbd5e1;
        }

        .insumos-table td {
            padding: 8px 12px;
            font-size: 9px;
            border-bottom: 1px solid #e2e8f0;
            color: #334155;
        }

        .insumos-header {
            font-size: 10px;
            color: #1e40af;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .orden-badge {
            background-color: #1e40af;
            color: white;
            padding: 2px 8px;
            font-size: 9px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="page">
        <!-- Header con tabla para DomPDF -->
        <table class="header-table">
            <tr>
                <td style="width: 60%;">
                    <div class="logo-placeholder">SJF</div>
                    <div class="org-info" style="display: inline-block;">
                        <h1>Municipalidad de San José de Feliciano</h1>
                        <p>Sistema de Gestión Municipal</p>
                    </div>
                </td>
                <td style="width: 40%;" class="report-info">
                    <h2>Reporte de Compras</h2>
                    <p>Generado: <?php echo e(now()->format('d/m/Y H:i')); ?></p>
                    <?php if(isset($fechaDesde) && isset($fechaHasta)): ?>
                        <p>Período: <?php echo e($fechaDesde); ?> - <?php echo e($fechaHasta); ?></p>
                    <?php endif; ?>
                </td>
            </tr>
        </table>

        <!-- Resumen con tabla -->
        <table class="summary-table">
            <tr>
                <td>
                    <div class="summary-label">Total de Compras</div>
                    <div class="summary-value"><?php echo e($compras->count()); ?></div>
                </td>
                <td>
                    <div class="summary-label">Monto Total</div>
                    <div class="summary-value success">$<?php echo e(number_format($compras->sum('total'), 2)); ?></div>
                </td>
                <td>
                    <div class="summary-label">Finalizadas</div>
                    <div class="summary-value"><?php echo e($compras->where('estado_compra', 'Finalizada')->count()); ?></div>
                </td>
                <td>
                    <div class="summary-label">Pendientes</div>
                    <div class="summary-value warning"><?php echo e($compras->where('estado_compra', 'Pendiente de factura')->count()); ?></div>
                </td>
            </tr>
        </table>

        <!-- Filtros aplicados -->
        <?php if(isset($filtros) && !empty($filtros)): ?>
        <div class="filters-section">
            <strong>Filtros aplicados:</strong> <?php echo e($filtros); ?>

        </div>
        <?php endif; ?>

        <!-- Tabla de compras -->
        <table class="main-table">
            <thead>
                <tr>
                    <th>Nr. Orden</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Empleado</th>
                    <th>Destino</th>
                    <th>Insumos</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="compra-row" style="background-color: #1e40af;">
                        <td style="color: #ffffff; font-weight: bold;"><?php echo e($compra->nr_orden); ?></td>
                        <td style="color: #ffffff;"><?php echo e(\Carbon\Carbon::parse($compra->fecha_orden)->format('d/m/Y')); ?></td>
                        <td style="color: #ffffff;"><?php echo e($compra->proveedor->nombre ?? 'N/A'); ?></td>
                        <td style="color: #ffffff;"><?php echo e($compra->empleado->nombre ?? 'N/A'); ?></td>
                        <td style="color: #ffffff;">
                            <?php if($compra->destino): ?>
                                <?php echo e(class_basename($compra->destino_tipo)); ?>: 
                                <?php echo e($compra->destino->nombre ?? $compra->destino->patente ?? $compra->destino->equipamiento ?? 'N/A'); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td style="color: #ffffff;"><?php echo e($compra->detalle_compras->count()); ?></td>
                        <td style="color: #ffffff; font-weight: bold; text-align: right;">$<?php echo e(number_format($compra->total, 2)); ?></td>
                        <td style="color: #ffffff;">
                            <span class="badge" style="background-color: #3b82f6; color: #ffffff; padding: 3px 8px;"><?php echo e($compra->estado_compra); ?></span>
                        </td>
                    </tr>
                    <?php if($compra->detalle_compras->count() > 0): ?>
                    <tr class="detail-row">
                        <td colspan="8">
                            <div class="insumos-container">
                                <div class="insumos-header">
                                    Detalle de insumos <span class="orden-badge">Orden #<?php echo e($compra->nr_orden); ?></span>
                                </div>
                                <table class="insumos-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 40%;">Producto</th>
                                            <th style="width: 15%; text-align: center;">Cantidad</th>
                                            <th style="width: 20%; text-align: right;">Precio Unit.</th>
                                            <th style="width: 25%; text-align: right;">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $compra->detalle_compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($detalle->producto->nombre ?? 'Producto no disponible'); ?></td>
                                            <td style="text-align: center; font-weight: 600;"><?php echo e($detalle->cantidad); ?></td>
                                            <td style="text-align: right;">$<?php echo e(number_format($detalle->precio, 2)); ?></td>
                                            <td style="text-align: right; font-weight: 700; color: #1e40af;">$<?php echo e(number_format($detalle->subtotal, 2)); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 20px; color: #64748b;">
                            No se encontraron compras para el período seleccionado
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Footer con tabla para DomPDF -->
        <table class="footer-table">
            <tr>
                <td style="text-align: left;">
                    <strong>Sistema Municipal</strong> - Reporte generado automáticamente
                </td>
                <td style="text-align: right;">
                    Total registros: <?php echo e($compras->count()); ?> | Monto total: $<?php echo e(number_format($compras->sum('total'), 2)); ?>

                </td>
            </tr>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views\pdf\reporte-compras.blade.php ENDPATH**/ ?>