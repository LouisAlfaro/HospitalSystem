<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HospitalRepositoryInterface;
use App\Repositories\StoredProcedureHospitalAdapter;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(HospitalRepositoryInterface::class, StoredProcedureHospitalAdapter::class);
    }

    public function boot()
    {
        //
    }
}
