<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('backup:smart --only-db')
    ->dailyAt('13:00')
    ->timezone('America/Argentina/Buenos_Aires')
    ->onSuccess(function () {
        \Illuminate\Support\Facades\Log::info('Backup de 13:00 completado exitosamente');
    })
    ->onFailure(function () {
        \Illuminate\Support\Facades\Log::error('Backup de 13:00 falló - backup anterior mantenido');
    });

Schedule::command('backup:smart')
    ->dailyAt('22:00')
    ->timezone('America/Argentina/Buenos_Aires')
    ->onSuccess(function () {
        \Illuminate\Support\Facades\Log::info('Backup de 22:00 completado exitosamente');
    })
    ->onFailure(function () {
        \Illuminate\Support\Facades\Log::error('Backup de 22:00 falló - backup anterior mantenido');
    });

Schedule::command('backup:monitor')
    ->daily()
    ->timezone('America/Argentina/Buenos_Aires');
