<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cooperative;
use App\Models\Province;
use App\Models\Town;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
    public function provinces(Request $request)
    {
        $term = $request->term ?: '';

        return Province::select('id', 'name as text')
            ->where('name', 'like', '%' . $term . '%')
            ->get();
    }

    public function towns(Request $request)
    {
        $term = $request->term ?: '';
        $provinceId = $request->province_id ?: 0;

        return Town::select('id', 'name as text')
            ->where('name', 'like', '%' . $term . '%')
            ->where('province_id', $provinceId)
            ->get();
    }

    public function cooperatives(Request $request)
    {
        $term = $request->term ?: '';

        return Cooperative::select('id', 'name as text')
            ->where('name', 'like', '%' . $term . '%')
            ->get();
    }
}
