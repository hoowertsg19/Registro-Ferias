# Registro-Ferias

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 📌 Descripción del Proyecto

**Registro-Ferias** es una aplicación web desarrollada en Laravel que permite gestionar ferias y emprendedores de forma eficiente y moderna. El sistema está pensado para instituciones educativas o municipales que organizan eventos y desean registrar información como:

- Ferias realizadas (nombre, fecha, lugar, descripción)
- Emprendedores participantes (nombre, rubro, teléfono)
- Relación entre ferias y emprendedores

La aplicación incluye autenticación, un panel de control moderno con contadores visuales, y una interfaz optimizada para uso administrativo.

## 🧑‍💻 Funcionalidades

- Autenticación de usuarios con Laravel Breeze
- Panel principal con resumen de registros
- CRUD completo para:
  - Ferias
  - Emprendedores
- Asociación de múltiples emprendedores a una feria
- Validación de formularios
- Estilo responsive y modo oscuro integrado

## 🚀 Tecnologías

- PHP 8.2+
- Laravel 12
- Laravel Breeze (autenticación)
- TailwindCSS + Vite
- MySQL
- Composer / NPM

## ⚙️ Instalación local

```bash
git clone https://github.com/usuario/Registro-Ferias.git
cd Registro-Ferias
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
php artisan serve



👨‍🎓 Autores
Jorge Rodríguez
Norman Martínez
Hoowerts Gross