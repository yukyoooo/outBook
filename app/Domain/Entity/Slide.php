<?php

declare(strict_types=1);

namespace App\Domain\Entity;

class Slide
{
    protected ?int $id;
    protected $user_id;
    protected string $book_title;

    public function __construct(?int $id, $user_id, string $book_title)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->book_title = $book_title;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getBookTitle(): string
    {
        return $this->book_title;
    }
}
