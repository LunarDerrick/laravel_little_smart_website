<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SingleSessionRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // change this to 'false' to disable 'single session login' feature
        if (true) {

            $user = Auth::user();
            $currentSessionId = Session::getId();
            $sessionTimeout = config('session.lifetime') * 60; // Convert minutes to seconds

            try {
                // Start transaction
                DB::beginTransaction();

                // Disable expired session properly
                DB::table('sessions')
                    ->whereRaw('UNIX_TIMESTAMP() - last_activity > ?', [$sessionTimeout])
                    ->update(['is_first' => false]);

                if ($user) {
                    // Check if the current session is already marked as the first session
                    $isCurrentSessionFirst = DB::table('sessions')
                        ->where('id', $currentSessionId)
                        ->where('is_first', true)
                        ->exists();

                    if (!$isCurrentSessionFirst) {
                        // Check if there is any active session for this user with is_first = true
                        $isFirstSessionExists = DB::table('sessions')
                            ->where('user_id', $user->id)
                            ->where('is_first', true)
                            ->exists();

                        if (!$isFirstSessionExists) {
                            // No first session found, mark the current session as the first session
                            DB::table('sessions')
                                ->where('id', $currentSessionId)
                                ->update(['is_first' => true]);

                        } else {
                            DB::rollBack(); // Ensure to rollback on conflict
                            // There is already a first session, redirect to session conflict
                            return redirect()->route('session_conflict');
                        }
                    } else {
                        // Current session is already marked as the first session, continue
                    }
                }

                // Commit the transaction
                DB::commit();

            } catch (\Exception $e) {
                // Rollback the transaction on error
                DB::rollback();
                Log::error($e->getMessage());
            }
        }

        return $next($request);
    }
}
