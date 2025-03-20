<<<<<<< HEAD
# HospitalSystem

# Proyecto Laravel - Prueba Técnica

Este repositorio contiene un proyecto en Laravel que cumple con los siguientes puntos solicitados en la prueba técnica:

1. **Creación de Tablas** en la base de datos.  
2. **Inserción de Datos Iniciales** en algunas tablas.  
3. **Implementación de Stored Procedures** para el CRUD (registrar, actualizar, eliminar, listar).  
4. **Módulo de Autenticación** (login) en Laravel.  
5. **Página Principal** que redirige a funcionalidades de registro y búsqueda.  
6. **CRUD de Hospitales** con validaciones y búsqueda por distintos campos.

---

## Requisitos

- PHP 8.1+
- Composer 2+
- Laravel 10
- MySQL (u otro SGBD configurado en `.env`)

---

## Configuración

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/LouisAlfaro/HospitalSystem
   

2. **Instalar dependencias:**
   composer install

3. **Configurar archivo .env:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    Edita .env para ajustar las credenciales de tu base de datos:
    ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=hospital_bd
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña

**Scripts de Base de Datos**
En la carpeta scripts se incluyen archivos .sql para:

01_create_tables.sql: Crear tablas (gerente, condicion, distrito, sede, provincia, hospital).
02_insert_data.sql: Insertar datos iniciales en las tablas (excepto hospital).
03_stored_procedures.sql: Definir los stored procedures (hospital_registrar, hospital_actualizar, hospital_eliminar, hospital_listar).

**Ejecución de la Aplicación**
  ```bash
 php artisan serve

