<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Submission;
use App\Requests\SubmissionRequest;

class SubmissionController
{
    private Submission $submission;

    public function __construct()
    {
        $this->submission = new Submission();
    }

    public function dashboard()
    {
        $content = file_get_contents('../app/views/dashboard/dashboard.php');
        $title = "Dahboard";
        include '../app/views/layouts/layout.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = new SubmissionRequest();

            if (!$request->validate($_POST)) {
                header('Content-Type: application/json');
                echo json_encode(['status' => 400, 'errors' => $request->errors(), 'data' => $_POST]);
                exit;
            }

            $entry_by = $_POST['entry_by'];
            $cookie_name = 'submission_' . $entry_by;

            if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] === 'submitted') {
                echo json_encode(['status' => 429, 'message' => 'You have already submitted within the last 24 hours.']);
                exit;
            }

            $result = $this->submission->save($_POST);
            if ($result === true) {
                setcookie($cookie_name, 'submitted', time() + 86400, '/');
                echo json_encode(['status' => 200, 'message' => 'Submitted Successfully!']);
            } else {
                echo json_encode(['status' => 400, 'message' => $result]);
            }

            exit;
        }

        $title = "Create Submission";
        $content = file_get_contents('../app/views/submissions/create.php');
        $external_js = 'js/submission.js';
        include '../app/views/layouts/layout.php';
    }
    public function list(): void
    {
        $submissionList = $this->submission->getSubmissions();
        ob_start();
        include '../app/views/submissions/list.php';
        $content = ob_get_clean();
        $external_js = 'js/filter.js';
        $title = "Submission List";
        include '../app/views/layouts/layout.php';
    }

    public function report(): void
    {
        $filters = [
            'date_from' => $_POST['date_from'] ?? '',
            'date_to' => $_POST['date_to'] ?? '',
            'user_id' => $_POST['entry_by'] ?? ''
        ];

        $submissions = $this->submission->getSubmissions($filters);

        header('Content-Type: application/json');
        if (empty($submissions)) {
            echo json_encode(['message' => 'No submissions found', 'filters' => $filters]);
        } else {
            echo json_encode(['submissions' => $submissions, 'filters' => $filters]);
        }
    }
}
