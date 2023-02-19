<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
 
class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register the application's response macros.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data) {
            return Response::json([
              'success' => true,
              'data'    => $data,
            ]);
        });
    
        Response::macro('error', function ($message, $status_code = 400) {
            return Response::json([
              'success'  => false,
              'message'  => $message,
            ], $status_code);
        });
    }
}