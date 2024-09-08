<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

class Submission
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
        date_default_timezone_set('Asia/Dhaka');
    }

    public function save(array $data): bool|string
    {
        $salt = bin2hex(random_bytes(16));
        $buyer_ip = $_SERVER['REMOTE_ADDR'];
        $hash_key = hash('sha512', $data['receipt_id'] . $salt);
        $entry_at = date('Y-m-d');
        $entry_by = (int) $data['entry_by'];
        $items = is_array($data['items']) ? implode(',', $data['items']) : '';

        $statement = $this->db->getConnection()->prepare(
            "INSERT INTO submissions (amount,buyer,receipt_id,items,buyer_email,buyer_ip,note,city,phone,hash_key,entry_at,entry_by) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $statement->bind_param(
            "issssssssssi",
            $data['amount'],
            $data['buyer'],
            $data['receipt_id'],
            $items,
            $data['buyer_email'],
            $buyer_ip,
            $data['note'],
            $data['city'],
            $data['phone'],
            $hash_key,
            $entry_at,
            $entry_by
        );

        if ($statement->execute()) {
            return true;
        } else {
            return "Error: " . $statement->error;
        }
    }

    public function getSubmissions(array $filters = []): array
    {
        $query = "SELECT * FROM submissions WHERE 1";

        if (!empty($filters['date_from']) && !empty($filters['date_to'])) {
            $query .= " AND entry_at BETWEEN '{$filters['date_from']}' AND '{$filters['date_to']}'";
        } elseif (!empty($filters['date_from'])) {
            $query .= " AND entry_at >= '{$filters['date_from']}'";
        } elseif (!empty($filters['date_to'])) {
            $query .= " AND DATE(entry_at) = '{$filters['date_to']}'";
        }

        if (!empty($filters['user_id'])) {
            $query .= " AND entry_by = {$filters['user_id']}";
        }

        $result = $this->db->getConnection()->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
