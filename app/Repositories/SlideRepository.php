<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Slide;

class SlideRepository
{
    public function getAll()
    {
        return Slide::with('user')
            ->orderByDesc('created_at')
            ->paginate(15);
    }
}
