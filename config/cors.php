<?php

namespace App\Http\Middleware;
use Closure;

class Cors{

public function handle($request, Closure $next){
    return $next($request)
    ->header('Access-Control-Allow-Origin', "*")
    ->header('Access-Control-Allow-Methods','GET,POST,PUT,DELETE,OPTIONS')
    ->header('Access-Control-Allow-Headers','Origin,Content-Type,Accept,Authorization,X-Request-With');



}
}


// $allowedOrigins = [
    // 'http://localhost:3000/',
    // 'https://apps.tararoutray.com'
// ];
/**
 * Check if the HTTP_ORIGIN key is available and is not empty.
 */
// if (isset($_SERVER['HTTP_ORIGIN']) && !empty($_SERVER['HTTP_ORIGIN'])) {
    /**
     * Loop through each allowed origin.
     */
    // foreach ($allowedOrigins as $allowedOrigin) {
        /**
         * Check if the origin sent in the request header is in the allowed origins list.
         */
        // if (preg_match('#' . $allowedOrigin . '#', $_SERVER['HTTP_ORIGIN'])) {
            /**
             * Send the CORS response headers.
             */
            // header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            // header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
            // header('Access-Control-Max-Age: 1000');
            // header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
            // break;
//         }
//     }
// }

