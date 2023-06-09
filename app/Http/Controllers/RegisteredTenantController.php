<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisteredTenantController extends Controller
{
    public function register(): View
    {
        return view('auth.register-tenant');
    }

    public function store(Request $request): RedirectResponse
    {
        $tenant = Tenant::create($request->all());
        $tenant->createDomain($request->domain);

        dd($tenant);
    }
}
