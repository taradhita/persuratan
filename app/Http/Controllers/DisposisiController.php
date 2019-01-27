<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisposisiRequest;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index()
    {
        return view('superadmin.superadmin-dashboard.upload-disposisi');

    }

    public function create()
    {

    }

    public function store(DisposisiRequest $request)
    {
        dd('a');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
