<?php $__env->startSection('title', 'Roles'); ?>  
<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Listado de Roles</h1>

        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-store')): ?>
        <button class="btn btn-primary btn-md" onclick="abrir_modal('ventana_modal','Agregar',0,[],[])">
            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>Nuevo rol
        </button>
        <?php endif; ?>
    </div>
    <div class="card bg-base-100 shadow">
        <div class="card-body p-4"> 
             <div class="flex flex-col gap-3">
                <!-- TÍTULO-->
                <div class="flex items-center justify-between">
                    <h4 class="text-lg font-semibold">Historial de roles</h4> 
                </div>
            </div> 

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th class="text-center">Nr</th>
                            <th class="text-center">Nombre del rol</th>
                            <th class="text-center">Permisos</th>
                            <th class="text-center">Fecha y hora de creación</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: center"><?php echo e($contador++); ?></td>
                                <td class="text-center"><?php echo e($role->name); ?></td>
                                <td class="text-center">
                                    <button 
                                        onclick="mostrarPermisos(this)" 
                                        data-role-name="<?php echo e($role->name); ?>"
                                        data-permisos='<?php echo json_encode($role->permissions->pluck('name'), 15, 512) ?>'
                                        class="btn btn-sm btn-ghost gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                                            <path d="M9 3v18"></path>
                                        </svg>
                                        <span class="badge badge-primary badge-sm"><?php echo e($role->permissions->count()); ?></span>
                                    </button>
                                </td>
                                <td class="text-center"> <?php echo e($role->created_at->format('d/m/Y H:i')); ?></td>

                                <td class="text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-show')): ?>
                                        <button class="btn btn-info btn-sm"
                                            onclick="abrir_modal(
                                                'ventana_modal',
                                                'Ver <?php echo e($role->name); ?>',
                                                1,                  // MODO VER
                                                ['name'],
                                                JSON.parse(this.dataset.role)
                                            )"
                                            data-role='<?php echo json_encode($role, 15, 512) ?>'>
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-eye'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                        <?php endif; ?>

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-edit')): ?>
                                        <button class="btn btn-warning btn-sm"
                                            onclick="abrir_modal(
                                            'ventana_modal',
                                            'Editar <?php echo e($role->name); ?>',
                                            2,
                                            ['name'],
                                            JSON.parse(this.dataset.role)
                                        )"
                                            data-role='<?php echo json_encode($role, 15, 512) ?>'>
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-pencil'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                        <?php endif; ?>

                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-asignar')): ?>
                                        <a class="btn btn-success btn-sm" href="<?php echo e(url('/admin/roles/asignar/'.$role->id)); ?>">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-check-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </a> 
                                        <?php endif; ?>  
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-destroy')): ?>
                                        <button class="btn btn-error btn-sm"
                                            onclick="confirmarEliminacion(<?php echo e($role->id); ?>)">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-s-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- MODAL -->
    <dialog id="ventana_modal" class="modal">
        <div class="modal-box">

            <form action="<?php echo e(route('admin.roles.store')); ?>" id="form" name="form" method="POST">
                <?php echo csrf_field(); ?>

                <!-- TÍTULO -->
                <h3 class="font-bold text-lg mb-4" id="ventana_modal_titulo"></h3>

                <!-- CAMPO -->
                <div class="form-control mb-4">
                    <label for="nombre" class="label">
                        <span class="label-text">Nombre del rol<span class="text-red-600">*</span></span>
                    </label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" id="name"
                        class="w-full h-10 rounded-md border border-base-300 bg-base-200 
                            px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary 
                            focus:border-primary transition <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="Nombre del rol" required/> 
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>

                <!-- HIDDENS -->
                <input type="hidden" name="accion" id="accion" value="1">
                <input type="hidden" name="id" id="id" value="0">

                <!-- BOTONES -->
                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('ventana_modal').close()" class="btn">
                        Cerrar
                    </button>

                    <button id="btn_guardar" type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>

            </form>
        </div>

        <!-- PARA QUE SE CIERRE HACIENDO CLICK FUERA  -->
        <form method="dialog" class="modal-backdrop">
            <button>Cerrar</button>
        </form>
    </dialog>

    <!-- Modal para ver permisos -->
    <dialog id="modal_permisos" class="modal">
        <div class="modal-box max-w-2xl">
            <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                    <rect width="18" height="18" x="3" y="3" rx="2"></rect>
                    <path d="M9 3v18"></path>
                </svg>
                Permisos del rol: <span id="modal_permisos_rol_nombre" class="text-primary"></span>
            </h3>

            <div id="modal_permisos_contenido" class="max-h-96 overflow-y-auto">
                <!-- Los permisos se cargarán aquí dinámicamente -->
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cerrar</button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>Cerrar</button>
        </form>
    </dialog>

    <!-- Modal para eliminar -->
    <dialog id="modal_eliminar_rol" class="modal">
        <div class="modal-box">

            <h3 class="font-bold text-lg flex items-center gap-2 text-red-600">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                Confirmar eliminación
            </h3>

            <p class="py-4">
                ¿Seguro que querés eliminar este rol?
            <div>
                <span class="text-red-600 font-semibold">Esta acción no se puede deshacer.</span>
            </div>
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancelar</button>
                </form>

                <!-- Formulario eliminar -->
                <form id="formEliminarRol" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="btn btn-error">
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        Eliminar
                    </button>
                </form>
            </div>

        </div>
    </dialog>

    <?php if($errors->any()): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('ventana_modal').showModal();
            });
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        function abrir_modal(modal, title, accion, campos, dato) {
            const dlg = document.getElementById(modal);
            dlg.showModal();

            document.getElementById(`${modal}_titulo`).textContent = title;
            document.getElementById("accion").value = accion;

            const form = document.getElementById("form");
            const inputs = form.querySelectorAll("input, select, textarea");
            const btnGuardar = document.getElementById("btn_guardar");

            // MODO VER (1) → deshabilitar inputs y ocultar botón
            if (accion === 1) {
                inputs.forEach(input => input.setAttribute("disabled", true));
                btnGuardar.style.display = "none";
            }

            // MODO AGREGAR (0) o EDITAR (2) → habilitar inputs y mostrar botón
            if (accion === 0 || accion === 2) {
                inputs.forEach(input => input.removeAttribute("disabled"));
                btnGuardar.style.display = "inline-flex"; // vuelve a mostrarse
            }

            // Cargar datos si hay campos definidos
            if (campos.length >= 1) {
                campos.forEach((campo) => {
                    document.getElementById(campo).value = dato[campo];
                });
                document.getElementById("id").value = dato['id'];
            } else {
                form.reset();
            }
        }




        function cerrar_modal() {
            document.getElementById('ventana_modal').close();
        }

        function confirmarEliminacion(id) {
            const form = document.getElementById('formEliminarRol');
            form.action = routeEliminarRol(id);
            document.getElementById('modal_eliminar_rol').showModal();
        }

        // Genera la URL usando el helper de Laravel
        function routeEliminarRol(id) {
            return "<?php echo e(url('/admin/roles')); ?>/" + id;
        }


        function mostrarPermisos(button) {
            const rolNombre = button.dataset.roleName;
            const permisos = JSON.parse(button.dataset.permisos);
            
            document.getElementById('modal_permisos_rol_nombre').textContent = rolNombre;
            
            const contenido = document.getElementById('modal_permisos_contenido');
            
            if (permisos.length === 0) {
                contenido.innerHTML = `
                    <div class="alert alert-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>Este rol no tiene permisos asignados</span>
                    </div>
                `;
            } else {
                let html = '<div class="grid grid-cols-2 gap-2">';
                permisos.forEach(permiso => {
                    html += `
                        <div class="flex items-center gap-2 p-2 bg-base-200 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-sm">${permiso}</span>
                        </div>
                    `;
                });
                html += '</div>';
                contenido.innerHTML = html;
            }
            
            document.getElementById('modal_permisos').showModal();
        }

        document.addEventListener('DOMContentLoaded', () => {

            const modal = document.getElementById('ventana_modal');

            modal.addEventListener('close', () => {

                // Quitar mensajes de error
                document.querySelectorAll('.error-message').forEach(el => el.remove());

                // Quitar clases de error de inputs
                document.querySelectorAll('.input-error').forEach(el => {
                    el.classList.remove('input-error');
                });

            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\sistema-municipal\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>