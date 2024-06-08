<?php

namespace App\Http\Controllers;

use App\Models\OauthToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use InvalidArgumentException;

class AuthController extends Controller
{
    // Redirect user to the IdP for authentication
    public function redirect(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));
        $query = http_build_query([
            'client_id' => env('OAUTH_CLIENT_ID'),
            'redirect_uri' => env('APP_URL').'/callback',
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
            // 'prompt' => 'login',
        ]);

        return redirect(env('IDP_URL').'/oauth/authorize?'.$query);
    }

    // Handle the callback from the IdP
    public function callback(Request $request)
    {
        $state = $request->session()->pull('state');
        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class,
            'Invalid state value.'
        );

        $response = Http::post(env('IDP_URL').'/oauth/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('OAUTH_CLIENT_ID'),
            'client_secret' => env('OAUTH_CLIENT_SECRET'),
            'redirect_uri' => env('APP_URL').'/callback',
            'code' => $request->code,
        ]);

        $response = $response->json();

        // Get Auth User from IdP
        $user = Http::withToken($response['access_token'])->get(env('IDP_URL').'/api/user')->json();

        OauthToken::updateOrCreate([
            'user_id' => $user['id'],
        ], [
            'access_token' => $response['access_token'],
        ]);

        return redirect('/');
    }
}
