# Fardel · gestor de gastos personales

## Instalación (XAMPP / Laragon / hosting con PHP 8+)
1. Copia la carpeta `fardel` en `htdocs`.
2. phpMyAdmin → pestaña **Importar** → selecciona `database.sql` → Continuar.
3. Revisa `config.php` (por defecto: root, sin contraseña).
4. Abre `http://localhost/fardel/` y pulsa **«¿Primera vez? Crea tu cuenta»**.
   (Ya no hay usuario de prueba: el hash falso del SQL antiguo era la causa del fallo de login, así que `fix.php` desaparece.)

## Compartir gastos
El propietario copia su **código de invitación** (sección «Hogar») y la otra persona lo escribe al crear su cuenta. Desde ahí ven y comparten los mismos gastos, categorías y suscripciones. Si ya tenías la base importada, ejecuta `migracion_invitaciones.sql`.

## Qué incluye
Registro/login seguro (hash, CSRF, límite de intentos), gastos con crear/editar/borrar, fecha, nota y foto del ticket,
categorías editables con presupuesto mensual, suscripciones, filtros semana/mes/año con navegación,
búsqueda, gráficos, exportar CSV, modo claro/oscuro automático.

## Producción
Usa HTTPS, crea un usuario MySQL propio (no root) y mantén `uploads/` con su `.htaccess`.
