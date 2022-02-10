<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\DataProvider\SlideRepositoryInterface;
use App\DataProvider\Eloquent\Slide as EloquentSlide;
use App\Domain\Entity\Slide;

class SlideRepository implements SlideRepositoryInterface
{
    private EloquentSlide $eloquentSlide;

    public function __construct(EloquentSlide $eloquentSlide)
    {
        $this->eloquentSlide = $eloquentSlide;
    }

    public function getAll()
    {
        return $this->eloquentSlide->with('user')
            ->orderByDesc('created_at')
            ->paginate(15);
    }

    public function store(Slide $slide)
    {
        $eloquent = $this->eloquentSlide->newInstance();
        $eloquent->user_id = $slide->getUserId();
        $eloquent->book_title = $slide->getBookTitle();
        $eloquent->save();

        return $eloquent->id;
    }
}
