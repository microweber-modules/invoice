<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/microweber/microweber/blob/master/LICENSE
 *
 */

namespace MicroweberPackages\Invoice;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class InvoicesManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        View::addNamespace('invoice', __DIR__.'/resources/views');

        $this->loadMigrationsFrom(__DIR__ . '/database/');
        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
    }
}
