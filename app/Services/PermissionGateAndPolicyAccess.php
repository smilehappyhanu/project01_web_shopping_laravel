<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;
use App\Policies\ProductPolicy;
use App\Product;
use App\User;

class PermissionGateAndPolicyAccess {
    public function setGateAndPolicyAccess () {
        $this->defineGateCategory();
        $this->defineGateProduct();
    }
    public function defineGateCategory () {
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-add', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }
    public function defineGateProduct () {
        Gate::define('product-edit', 'App\Policies\ProductPolicy@update');
    }
}