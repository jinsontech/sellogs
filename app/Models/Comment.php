<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::enforceMorphMap([
    'customer' => 'App\Models\Customer',
    'admin'    => 'App\Models\Admin',
]);

class Comment extends Model
{
    use HasFactory;

    public function authorable()
    {
        return $this->morphTo();
    }
}
