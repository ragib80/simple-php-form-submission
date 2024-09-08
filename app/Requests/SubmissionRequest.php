<?php

declare(strict_types=1);

namespace App\Requests;

class SubmissionRequest
{
    private array $errors = [];

    public function validate(array $data): bool
    {

        if (!isset($data['amount']) || !is_numeric($data['amount'])) {
            $this->errors['amount'] = 'Amount must be a number.';
        }

        if (!isset($data['buyer']) || !preg_match('/^[a-zA-Z0-9\s]{1,20}$/', $data['buyer'])) {
            $this->errors['buyer'] = 'Buyer must contain only letters, numbers, and spaces, and must not exceed 20 characters.';
        }

        if (!isset($data['receipt_id']) || !preg_match('/^[a-zA-Z]+$/', $data['receipt_id'])) {
            $this->errors['receipt_id'] = 'Receipt ID must contain only text.';
        }

        if (isset($data['items'][0]) && !preg_match('/^[a-zA-Z]+$/', $data['items'][0])) {
            $this->errors['items'] = 'item must only contain text.';
        }

        if (isset($data['items']) && is_array($data['items'])) {
            $cleanedItems = [];
            foreach ($data['items'] as $key => $item) {
                if (!empty($item) && $key > 0) {
                    $cleanedItems[] = $item;
                }
            }
            if (!empty($cleanedItems)) {
                $data['items'] = implode(',', $cleanedItems);
            }
        }

        if (!isset($data['buyer_email']) || !filter_var($data['buyer_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['buyer_email'] = 'Please enter a valid email address.';
        }

        if (isset($data['note'])) {
            $note = trim($data['note']);
            $charCount = strlen($note);

            if (empty($note)) {
                $this->errors['note'] = 'Note is required.';
            } elseif ($charCount > 30) {
                $this->errors['note'] = 'Note must not exceed 30 characters.';
            }
        } else {
            $this->errors['note'] = 'Note is required.';
        }

        if (!isset($data['city']) || !preg_match('/^[a-zA-Z\s]+$/', $data['city'])) {
            $this->errors['city'] = 'City must contain only letters and spaces.';
        }

        if (!isset($data['phone']) || !preg_match('/^[0-9]{1,20}+$/', $data['phone'])) {
            $this->errors['phone'] = 'Phone contain only numbers.';
        }

        if (!isset($data['entry_by']) || !is_numeric($data['entry_by'])) {
            $this->errors['entry_by'] = 'Entry by must be a Valid option.';
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
