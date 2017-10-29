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
    
protected function successResponse(Request $request, string $redirect, string $message, $flashOnAjax = true)
{
    $router = app('router');
    $isNamedRoute = $router->has($redirect);
if ($this->isAjaxRequest($request))
{
    $responseData['redirect'] = ($isNamedRoute) ? route($redirect) : url($redirect);
if ($flashOnAjax)
{
    $request->session()->flash('message', $message);
} else {
    $responseData['message'] = $message;
}
    $statusCode = 200;
    $response = response()->json($responseData, $statusCode);
} else {
    $response = $isNamedRoute ? redirect()->route($redirect) : redirect($redirect);
    $request->session()->flash('message', $message);
}
return $response;
}

protected function failedResponse(Request $request, GlobalModel $model)
{
    $errors = $model->errors();
    if ($this->isAjaxRequest($request))
    {
            $responseData = $errors->all();
            $statusCode = 422;
        $response = response()->json($responseData, $statusCode);
    } else {
            $response = back()->withErrors($errors)->withInput();
    }
    return $response;
}

private function isAjaxRequest(Request $request)
{
    return $request->ajax() || $request->wantsJson();
}

}
