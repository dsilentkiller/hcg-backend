<?php
namespace App\Http\Middleware;
use Closure;
class Cors{
    // handling incoming request

public function handle($request, Closure $next){

    // header("Access-Control-Allow-Origin: *");
    // <!-- Allow options method -->

    $headers =[
        'Access-Control-Allow-Methods' =>'POST,GET,OPTIONS,PUT,DELETE',
        'Access-Control-Allow-Headers' =>'Content-Type, X-Auth-Token, Origin, Authorization',
    ];
    if ($request->getMethod()== "OPTIONS"){
        // the client side appilicatioon can set only headers allowed in access-control-allow-headers
        return response()->json('OK', 200,$headers);
    }
    $response = $next($request);
    foreach($headers as $key => $value){
        $response->header($key, $value);
    }
    return $response;
}
}





?>
