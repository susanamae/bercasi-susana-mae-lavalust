<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * StudentMiddleware
 * ------------------------------------------------------------------
 * Protects the /student/profile route.
 *
 * Access rule (unique to this activity):
 * A visitor must first "check in" through the student home page
 * (/student). Visiting /student sets $_SESSION['student_access'] = true.
 * Only after that check-in is /student/profile reachable. Anyone who
 * tries to jump straight to /student/profile without checking in first
 * (e.g. a fresh incognito session, or after using the "Log out" link)
 * is redirected back to /student with an explanation message instead
 * of seeing the profile.
 */
class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure $next Call this to let the request continue to the controller.
     * @return mixed
     */
    public function handle(Closure $next)
    {
        // Middleware runs before the Controller is instantiated, so the
        // session hasn't necessarily been started yet — start it here.
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $is_allowed = isset($_SESSION['student_access']) && $_SESSION['student_access'] === true;

        if ($is_allowed) {
            // Access granted -> continue to StudentController::profile()
            return $next();
        }

        // Access denied -> flash a message and redirect to the student home page
        $_SESSION['student_access_message'] = "Access denied: please open the Student Home page first before viewing the profile.";

        $target = rtrim(BASE_URL, '/') . '/';

        if (!headers_sent()) {
            header('Location: ' . $target, true, 302);
        }
        exit;
    }
}