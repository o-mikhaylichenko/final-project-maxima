<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();
        $roles = $user ? $user->roles()->pluck('title') : null;
        $isAdmin = $roles && $roles->contains('admin');
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user ? $user->only('id', 'name', 'email', 'city_id') : null,
                'roles' => $roles,
                'isAdmin' => $isAdmin,
            ],
        ];
    }
}
