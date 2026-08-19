<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * StudentController
 * ------------------------------------------------------------------
 * Handles the Student Information mini-app:
 *   - index()   -> /student          (home / landing page)
 *   - profile() -> /student/profile  (protected by StudentMiddleware)
 *   - logout()  -> /student/logout   (revokes access, for testing the middleware)
 */
class StudentController extends Controller
{
    /**
     * Sample student data (associative array), passed to the views.
     * Edit these values with your own information.
     */
    private $student = [
        'student_id'  => 'MCC2024-00047',
        'name'        => 'Susana Mae G. Bercasi',
        'course'      => 'BS Information Technology',
        'year'        => '3RD Year',
        'section'     => '3F1',
        'email'       => 'susanamaegardocebercasi@gmail.com',
        'address'     => 'Bancuro,Naujan,Oriental Mindoro, Philippines',
        'contact'     => '09484687984',
        'hobbies'     => 'Photography',
        'description' => 'A goal oriented person working hard to build the life she has always envisioned.',
    ];

    /**
     * GET /student
     * Student home page. Visiting this page "checks the student in",
     * granting session access to the protected profile page.
     */
    public function index()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Grant access to the middleware-protected /student/profile route.
        $_SESSION['student_access'] = true;

        // Pop the flash message (if the middleware redirected us here).
        $message = $_SESSION['student_access_message'] ?? null;
        unset($_SESSION['student_access_message']);

        $this->call->view('student_home', [
            'page_title' => 'Student Home - ' . $this->student['name'],
            'student'    => $this->student,
            'message'    => $message,
        ]);
    }

    /**
     * GET /student/profile
     * Student profile page. Protected by StudentMiddleware (route middleware
     * is applied in app/config/routes.php).
     */
    public function profile()
    {
        $this->call->view('student_profile', [
            'page_title' => 'Student Profile - ' . $this->student['name'],
            'student'    => $this->student,
        ]);
    }

    /**
     * GET /student/logout
     * Revokes the session access flag so the middleware can be re-tested.
     */
    public function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        unset($_SESSION['student_access']);

        redirect('student/profile');
    }
}
?>