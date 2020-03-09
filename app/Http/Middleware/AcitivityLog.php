<?php

namespace App\Http\Middleware;

use App\Activity;
use Closure;

class AcitivityLog
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (auth()->user()) {

            //   Change description according to and from route.
            $description = '';

            if (request()->path() == 'login') {
                $description = 'login';
            } elseif (request()->path() == 'register') {
                $description = 'registration';
            } elseif (request()->path() == '/') {
                $description = 'view_home';
            } elseif (preg_match('/searches/', request()->path())) {
                $description = 'view_searches';
            } elseif (preg_match('/lost-people/', request()->path())) {
                $description = 'view_lost_people_details';
            } elseif (preg_match('/users/', request()->path())) {
                $description = 'view_user_details';
            } else {
                $description = 'view';
            }

            // From the method of GET or POST determine if the data has been posted.
            if ((request()->method() == 'POST' || request()->method() == 'PUT') && (preg_match('/searches/', request()->path()))) {
                $description = 'saved_new_info_about_search';
            }

            Activity::create([
                'route'           => request()->path(),
                'description'     => $description,
                'method'          => request()->method(),
                'ip_address'      => request()->ip(),
                'id_user'         => auth()->id(),
            ]);
        }

        return $response;
    }
}
