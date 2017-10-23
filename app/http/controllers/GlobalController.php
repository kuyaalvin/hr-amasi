<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\GlobalModel;

class GlobalController extends Controller
{

protected function sendResponse(Request $request, GlobalModel $model, bool $status, string $redirect = null, string $statusMessage = null)
{
    $errors = $model->errors();
    $response;
// if ($request->ajax() || $request->wantsJson())
// {
    $response = response()->json(($status ? ['redirect'=>$redirect] : $errors), ($status ? 200 : 422));
// }
// $response = $status ? redirect($redirect) : back()->withErrors($errors)->withInput();
if (isset($statusMessage))
{
    $request->session()->flash('status', $statusMessage);
}
return $response;
}

}
