<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class=>ProductPolicy::class,
        Category::class=>CategoryPolicy::class,
        User::class=>UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update-product', function ($user, $product){
        //     return $user->id == $product->user_id;
        // });
        // Gate::define('delete-product', function ($user, $product){
        //     if($user->id == $product->user_id || $user->role == User::ADMIN){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // });
    }
}
