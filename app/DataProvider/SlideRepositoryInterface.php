<?php

namespace App\DataProvider;

use App\Domain\Entity\Slide;

interface SlideRepositoryInterface
{
    public function getAll();

    public function store(Slide $slide);
}
