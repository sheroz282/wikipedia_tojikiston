<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PhotoQualityControl;
use Illuminate\Http\Request;

class ParkMetaController extends Controller
{
    private $park_meta;
    public function __construct(PhotoQualityControl $park_meta)
    {
        return $this->park_meta = $park_meta;
    }

    public function getAllHistories()
    {
        $all_histories = $this->park_meta::all();
        return response()->json($all_histories);
    }

    public function getViolations()
    {
        $park_violations = $this->park_meta::all()->where('status', '=', '12');
        return response()->json($park_violations);
    }
}
