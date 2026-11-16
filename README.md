# Practica1

Aplicación Laravel para administrar cuentas bancarias y transacciones.

## Funcionamiento

Las rutas web delegan en `AccountController` y `TransactionController`. Los
modelos `Account`, `Transaction` y `User` representan la información y las
migraciones crean las tablas necesarias. Las vistas Blade permiten listar,
crear y consultar cuentas y movimientos.

## Requisitos e instalación

- PHP 8.2 o posterior.
- Composer.
- Base de datos compatible con Laravel (SQLite, MySQL o PostgreSQL).
- Node.js y npm para compilar los recursos frontend.

```bash
git clone https://github.com/Reclax/Practica1.git
cd Practica1
composer install
cp .env.example .env
php artisan key:generate
```

Configura `DB_*` en `.env`, prepara la base de datos y ejecuta:

```bash
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

Abre `http://localhost:8000`.

## Estructura

- `routes/web.php`: rutas de la aplicación.
- `app/Http/Controllers`: flujo HTTP.
- `app/Models`: modelos Eloquent.
- `resources/views`: interfaz Blade.
- `database/migrations`: esquema.
