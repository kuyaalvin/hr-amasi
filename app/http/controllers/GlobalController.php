<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\GlobalModel;

class GlobalController extends Controller
{

protected function sendResponse(Request $request, GlobalModel $model, bool $status, string $redirect = null, string $statusMessage = null)
{
    $router = app('router');
    $isNamedRoute = $router->has($redirect);
    $errors = $model->errors();
    $response;
if ($request->ajax() || $request->wantsJson())
{
$responseData;
$statusCode;
if ($status)
{
    $responseData = ['redirect'=>($isNamedRoute) ? route($redirect) : url($redirect)];
    $statusCode = 200;
} else {
    $responseData = $errors;
$statusCode = 422;
}
    $response = response()->json($responseData, $statusCode);
} else {
    if ($status)
    {
        $response = $isNamedRoute ? redirect()->route($redirect) : redirect($redirect);
    } else {
        $response = back()->withErrors($errors)->withInput();
    }
}
if (isset($statusMessage))
{
    $request->session()->flash('status', $statusMessage);
}
return $response;
}

}
