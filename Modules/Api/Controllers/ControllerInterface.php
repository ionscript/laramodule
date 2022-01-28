<?php

declare(strict_types=1);

namespace Modules\Api\Controllers;


use Illuminate\Http\Request;

interface ControllerInterface
{
    public function index(Request $request);

    public function create();

    public function store(Request $request);

    public function show($id);

    public function edit($id);

    public function update(Request $request, $id);

    public function destroy($id);
}
