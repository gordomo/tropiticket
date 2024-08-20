<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Organiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrganizerApiController extends Controller
{
    public function getOrganizers() {
        return Organiser::paginate(10);
    }
}
