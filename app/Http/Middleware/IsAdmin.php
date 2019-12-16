<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use OneSignal;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->admin == 'true') {
    //OneSignal::sendNotificationToAll("Admin Login", $url = null, $data = null, $buttons = null, $schedule = null);
    //OneSignal::sendNotificationToUser("Ahmed Login", ['d2ef0531-c971-427d-b84a-296236802f14', 'f2e19798-c642-4754-9672-4ce24b1ee8dd'], $url = null, $data = null, $buttons = null, $schedule = null);
//            OneSignal::sendNotificationCustom([
//                'contents' => [
//                    'en' => 'Baz Login',
//                ],
//                'include_player_ids' => [
//
//                    'd5fb141c-e648-4507-89cb-e7efb69deb49',
//                    'd2ef0531-c971-427d-b84a-296236802f14',
//                ]
//            ]);
            return $next($request);
        }

        return redirect('/');
    }
}
