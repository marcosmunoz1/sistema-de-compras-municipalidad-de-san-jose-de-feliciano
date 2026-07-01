-- SQL para crear los permisos de Destinos
-- Ejecuta esto en tu gestor de base de datos (phpMyAdmin, HeidiSQL, etc.)

INSERT INTO permissions (name, guard_name, created_at, updated_at) 
VALUES 
('destinos-index', 'web', NOW(), NOW()), 
('destinos-show', 'web', NOW(), NOW()),
('destinos-update', 'web', NOW(), NOW()),
('destinos-destroy', 'web', NOW(), NOW()),
('destinos-restore', 'web', NOW(), NOW())
ON DUPLICATE KEY UPDATE updated_at = NOW();

-- Después de ejecutar esto, asigna los permisos al rol Super-Admin
-- (Reemplaza 1 con el ID de tu rol Super-Admin si es diferente)
INSERT INTO role_has_permissions (permission_id, role_id)
SELECT p.id, 1
FROM permissions p
WHERE p.name LIKE 'destinos-%'
AND NOT EXISTS (
    SELECT 1 FROM role_has_permissions rhp 
    WHERE rhp.permission_id = p.id AND rhp.role_id = 1
);
