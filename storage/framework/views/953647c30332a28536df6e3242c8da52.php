<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'titulo' => 'Generar Reporte',
    'modalId' => 'modal_reporte',
    'previewUrl' => '#',
    'downloadUrl' => '#',
    'descripcion' => 'Vista previa del reporte en PDF',
    'icono' => 'document'
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'titulo' => 'Generar Reporte',
    'modalId' => 'modal_reporte',
    'previewUrl' => '#',
    'downloadUrl' => '#',
    'descripcion' => 'Vista previa del reporte en PDF',
    'icono' => 'document'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!-- Botón para abrir el modal -->
<label for="<?php echo e($modalId); ?>" class="btn btn-outline btn-sm gap-2 cursor-pointer">
    <?php if($icono === 'document'): ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
            <polyline points="14 2 14 8 20 8"></polyline> 
            <line x1="16" x2="8" y1="13" y2="13"></line>
            <line x1="16" x2="8" y1="17" y2="17"></line>
            <line x1="10" x2="8" y1="9" y2="9"></line>
        </svg>
    <?php elseif($icono === 'printer'): ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="6 9 6 2 18 2 18 9"></polyline>
            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
            <rect width="12" height="8" x="6" y="14"></rect>
        </svg>
    <?php elseif($icono === 'chart'): ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" x2="18" y1="20" y2="10"></line>
            <line x1="12" x2="12" y1="20" y2="4"></line>
            <line x1="6" x2="6" y1="20" y2="14"></line>
        </svg>
    <?php endif; ?>
    <?php echo e($titulo); ?>

</label>

<!-- Modal del reporte -->
<input type="checkbox" id="<?php echo e($modalId); ?>" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle"> 
    <div class="modal-box max-w-4xl">
        <!-- Header del modal -->
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-base-300"> 
            <div class="flex items-center gap-3"> 
                <div class="p-2 rounded-lg bg-primary/10"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-lg"><?php echo e($titulo); ?></h3>
                    <p class="text-sm text-muted-foreground"><?php echo e($descripcion); ?></p>
                </div>
            </div>
            <label for="<?php echo e($modalId); ?>" class="btn btn-sm btn-circle btn-ghost">✕</label>
        </div>

        <!-- Contenido del modal - iframe con el PDF -->
        <div class="bg-base-200 rounded-lg p-2 mb-4">
            <iframe 
                id="iframe_<?php echo e($modalId); ?>"
                src="<?php echo e($previewUrl); ?>" 
                class="w-full h-96 rounded-lg border border-base-300"
                title="Vista previa del reporte">
            </iframe>
        </div>

        <!-- Acciones del modal -->
        <div class="modal-action flex justify-between">
            <div class="flex gap-2">
                <a href="<?php echo e($downloadUrl); ?>" class="btn btn-primary gap-2" download>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" x2="12" y1="15" y2="3"></line>
                    </svg>
                    Descargar PDF
                </a>
                <button onclick="document.getElementById('iframe_<?php echo e($modalId); ?>').contentWindow.print()" class="btn btn-outline gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect width="12" height="8" x="6" y="14"></rect>
                    </svg>
                    Imprimir
                </button>
            </div>
            <label for="<?php echo e($modalId); ?>" class="btn">Cerrar</label>
        </div>
    </div>
    <label class="modal-backdrop" for="<?php echo e($modalId); ?>">Cerrar</label>
</div>
<?php /**PATH C:\laragon\www\sistema-municipal\resources\views\components\boton-reporte.blade.php ENDPATH**/ ?>