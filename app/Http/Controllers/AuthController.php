<?php

namespace App\Http\Controllers;

use App\Models\OauthToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if ($response->successful()) {
            $tokenData = $response->json();

            // Retrieve user details using the access token
            $userResponse = Http::withToken($tokenData['access_token'])->get(env('IDP_URL').'/api/user');
            if ($userResponse->successful()) {

                $userData = $userResponse->json();

                // Attempt to find the user
                $user = User::where('email', $userData['email'])->first();

                // If user not found, create the user
                if (! $user) {
                    $user = User::create([
                        'name' => $userData['name'],
                        'email' => $userData['email'],
                    ]);
                }

                // Save the token
                OauthToken::updateOrCreate([
                    'user_id' => $user['id'],
                ], [
                    'access_token' => $tokenData['access_token'],
                    'refresh_token' => $tokenData['refresh_token'],
                ]);

                // Log in the user
                Auth::login($user);

                return redirect()->route('dashboard');
            } else {
                return response()->json([
                    'error' => 'Failed to retrieve user information.',
                    'details' => $userResponse->json(),
                ], $userResponse->status());
            }
        } else {
            return response()->json([
                'error' => 'Failed to retrieve access token.',
                'details' => $response->json(),
            ], $response->status());
        }
    }
}
