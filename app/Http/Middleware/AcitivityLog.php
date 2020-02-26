<?php

namespace App\Http\Middleware;

use App\Activity;
use Closure;

class AcitivityLog
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

        $response = $next($request);

        if(auth()->user()) {

            #   Change description according to and from route.

            $description = "";

            if(request()->path() == "login"){
                $description = "login";
            }
            else if(request()->path() == "register"){
                $description = "registration";
            }
            else if(request()->path() == "/") {
                $description = "view_home";
            }
            else if (preg_match("/searches/", request()->path())){
                $description = "view_searches";
            }
            else if (preg_match("/lost-people/", request()->path())){
                $description = "view_lost_people_details";
            }
            else if (preg_match("/users/", request()->path())){
                $description = "view_user_details";
            }
            else {
                $description = "view";
            }

            #   From the method of GET or POST determine if the data has been posted.

            if((request()->method() == "POST" || request()->method() == "PUT") &&(preg_match("/searches/", request()->path())) ){
                $description = "saved_new_info_about_search";
            }

            Activity::create([
                'route' => request()->path(),
                'description' => $description,
                'os' => \BrowserDetect::getBrowser()->platform,
                'method' => request()->method(),
                'browser' => \BrowserDetect::getBrowser()->browser,
                'browser_version' => \BrowserDetect::getBrowser()->version,
                'ip_address' => request()->ip(),
                'language' => \Lang::locale(),
                'user_id' => auth()->id(),
            ]);

        }

        return $response;

    }
}
