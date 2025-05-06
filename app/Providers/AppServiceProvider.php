<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrapFive();
        if (env('APP_ENV') === 'production') {
            \URL::forceScheme('https');
        }

        // ✅ Place inside boot() method
        View::composer('*', function ($view) {
            $candidate = Auth::guard('candidate')->user();

            $hasCompletedBehaviour = false;
            $hasCompletedValue = false;

            if ($candidate) {
                $hasCompletedValue = !empty($candidate->value_assessment_completed_at);

                $completed = json_decode($candidate->behaviour_assesment_completed_at, true);
                $hasCompletedBehaviour = is_array($completed) &&
                    !array_diff(['t1', 't2', 't3', 't4', 't5'], array_keys(array_filter($completed)));
            }

            $view->with([
                'hasCompletedBehaviour' => $hasCompletedBehaviour,
                'hasCompletedValue' => $hasCompletedValue
            ]);
        });
    }
}
