<?php
// Verificar si la extensión fileinfo está habilitada
if (extension_loaded('fileinfo')) {
    echo "✓ La extensión fileinfo ESTÁ habilitada";
} else {
    echo "✗ La extensión fileinfo NO está habilitada";
}

echo "<br><br>";
echo "Extensiones cargadas:<br>";
print_r(get_loaded_extensions());
