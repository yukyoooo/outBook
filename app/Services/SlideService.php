<?php

declare(strict_types=1);

namespace App\Services;

use App\DataProvider\SlideRepositoryInterface;
use App\Domain\Entity\Slide;

class SlideService
{
    private SlideRepositoryInterface $slide;

    public function __construct(SlideRepositoryInterface $slide)
    {
        $this->slide = $slide;
    }

    public function getAll()
    {
        return $this->slide->getAll();
    }

    public function store(int $user_id, string $book_title)
    {
        return $this->slide->store(new Slide(null, $user_id, $book_title));
    }
}
