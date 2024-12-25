<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class NavController extends Controller {

    public function dashboard() {
        return Inertia::render("Dashboard");
    }

    public function organization() {
        return Inertia::render("Organization");
    }
    public function contracts() {
        return Inertia::render("Contracts");
    }
    public function reports() {
        return Inertia::render("Reports");
    }

}
