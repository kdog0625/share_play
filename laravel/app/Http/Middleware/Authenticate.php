<?php
/**
 * ユーザー認証用ミドルウェア
 */
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * @param Request $request リクエスト
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            return route('login');
        }
    }
}
