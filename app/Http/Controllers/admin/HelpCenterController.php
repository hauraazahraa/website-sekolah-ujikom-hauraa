<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PengaturanSitus;

class HelpCenterController extends Controller {
    public function index() {
        $pengaturan = PengaturanSitus::current();

        return view('admin.help-center.index', compact('pengaturan'));
    }
}
