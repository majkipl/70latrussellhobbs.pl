<?php

namespace App\Services;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SlugService
{
    public function generateUniqueSlug($name, $existingSlug = null)
    {
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $index = 1;

        while ($this->slugExists($slug, $existingSlug)) {
            $slug = $baseSlug . '-' . $index;
            $index++;
        }

        return $slug;
    }
    public function slugExists($slug, $existingSlug = null)
    {
        $query = DB::table('collections')->where('slug', $slug);

        if ($existingSlug) {
            $query->where('slug', '!=', $existingSlug);
        }

        return $query->exists();
    }
}
