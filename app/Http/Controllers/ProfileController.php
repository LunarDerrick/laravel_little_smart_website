<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
// use Illuminate\Support\Facades\Log;
// use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the current authenticated user
        $user = Auth::user();

        // Fetch the Facebook App ID from the config
        $facebookAppId = config('facebook.app_id');

        // pass an empty variable
        // $user = null;
        // $facebookAppId = null;

        return view('profile', compact('user', 'facebookAppId'));
    }

    /**
     * Stores authenticated Facebook information that lasts throughout
     * the current session only.
     */
    public function storeFbProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'access_token' => 'required|string',
        ]);

        // // Check access token validity & expiry duration
        // $accessToken = $request->access_token;
        // $appId = config('facebook.app_id');
        // $appSecret = config('facebook.app_secret');

        // // Validate the access token
        // $response = Http::get("https://graph.facebook.com/debug_token", [
        //     'input_token' => $accessToken,
        //     'access_token' => "{$appId}|{$appSecret}",
        // ]);

        // $tokenData = $response->json();
        // Log::info("token data: ", $tokenData);
        // $dataAccessExpiration = Carbon::createFromTimestamp($tokenData['data']['data_access_expires_at']);
        // $expiration = Carbon::createFromTimestamp($tokenData['data']['expires_at']);

        // // Get the human-readable duration from now
        // $timeRemainingDataAccess = $dataAccessExpiration->diffForHumans();
        // $timeRemaining = $expiration->diffForHumans();

        // // Log the results
        // Log::info("Data access expires in: " . $timeRemainingDataAccess);
        // Log::info("Token expires in: " . $timeRemaining);

        // Store the data in the session
        session([
            'fb_name' => $request->name,
            'fb_access_token' => $request->access_token,
        ]);

        return response()->json([
            'success' => 'Facebook connected successfully.',
            'error' => 'Failed to save FB data.',
        ]);
    }

    /**
     * Removes Facebook information that was previously stored in session.
     */
    public function unlinkFb()
    {
        $fbAccessToken = session('fb_access_token');

        if (!$fbAccessToken) {
            return response()->json(['error' => 'No Facebook access token found'], 400);
        }

        // Make the API call to Facebook to revoke the permissions
        Http::post('https://graph.facebook.com/v21.0/me/permissions', [
            'access_token' => $fbAccessToken,
        ]);

        // Remove Facebook data from the session
        session()->forget(['fb_name', 'fb_access_token']);

        return response()->json([
            'success' => 'Facebook account unlinked successfully.',
            'error' => 'Failed to unlink Facebook account.',
        ]);
    }
}
