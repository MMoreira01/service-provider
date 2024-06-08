<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Redirect user to the IdP for authentication
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => env('OAUTH_CLIENT_ID'),
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect(env('IDP_URL').'/oauth/authorize?'.$query);
    }

    // Handle the callback from the IdP
    public function callback(Request $request)
    {
        $http = new Client;

        $response = $http->post(env('IDP_URL').'/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('OAUTH_CLIENT_ID'),
                'client_secret' => env('OAUTH_CLIENT_SECRET'),
                'redirect_uri' => env('APP_URL').'/callback',
                'code' => $request->code,
            ],
        ]);

        $response = json_decode((string) $response->getBody(), true);
        $accessToken = $response['access_token'];

        // Use access token to get user info from IdP
        $response = $http->get(env('IDP_URL').'/api/user', [
            'headers' => [
                'Authorization' => 'Bearer '.$accessToken,
            ],
        ]);

        $user = json_decode((string) $response->getBody(), true);

        // Create or update the user in SP's database
        $spUser = User::updateOrCreate([
            'email' => $user['email'],
        ], [
            'name' => $user['name'],
        ]);

        // Log the user in
        Auth::login($spUser);

        return redirect('/');
    }
}
