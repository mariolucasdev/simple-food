<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTenantRequest;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisteredTenantController extends Controller
{
    public function register(): View
    {
        return view('auth.register-tenant');
    }

    public function store(RegisterTenantRequest $request): RedirectResponse
    {
        $tenant = Tenant::create($request->all());
        $tenant->createDomain($request->domain);

        return redirect(tenant_route($tenant->domains()->first()->domain, 'login'));
    }
}
