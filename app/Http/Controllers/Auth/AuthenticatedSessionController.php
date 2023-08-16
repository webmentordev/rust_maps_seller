<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        SEOMeta::setTitle('Login');
        SEOMeta::setCanonical(config('app.url').'/login');

        OpenGraph::setTitle('Login');
        OpenGraph::setUrl(config('app.url').'/login');
        OpenGraph::addProperty("type", "website");
        OpenGraph::addProperty("locale", "eu");
        OpenGraph::addImage(config('app.url').'/assets/rust_maps_preview.png');

        TwitterCard::setTitle('Login');
        TwitterCard::setSite('@buyrustmapsstore');
        TwitterCard::setImage(config('app.url').'/assets/rust_maps_preview.png');

        JsonLd::setTitle('Login');
        JsonLd::setType("WebSite");
        JsonLd::addImage(config('app.url').'/assets/rust_maps_preview.png');

        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
