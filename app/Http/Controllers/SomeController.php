<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SomeController extends Controller
{
    public function someAdminAction(Request $request)
    {
        if (Gate::denies('admin-only')) {
            abort(403);
        }

        // ...admin-only action code...
    }
}
