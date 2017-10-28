<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\GlobalModel;

class GlobalController extends Controller
{

    public function __construct()
    {
    // $this->middleware(['authenticate', 'token']);
    }
    
protected function successResponse(Request $request, string $redirect, string $message = null)
{
    $response;
    $router = app('router');
    $isNamedRoute = $router->has($redirect);
if ($request->ajax() || $request->wantsJson())
{
    $responseData = ['redirect'=>($isNamedRoute) ? route($redirect) : url($redirect)];
    $statusCode = 200;
    $response = response()->json($responseData, $statusCode);
} else {
        $response = $isNamedRoute ? redirect()->route($redirect) : redirect($redirect);
}
if (isset($message))
{
    $request->session()->flash('message', $message);
}
return $response;
}

protected function failedResponse(Request $request, GlobalModel $model)
{
    $response;
    $errors = $model->errors();
    if ($request->ajax() || $request->wantsJson())
    {
            $responseData = $errors->all();
            $statusCode = 422;
        $response = response()->json($responseData, $statusCode);
    } else {
            $response = back()->withErrors($errors)->withInput();
    }
    return $response;
}

}
