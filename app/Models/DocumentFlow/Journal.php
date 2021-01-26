<?php

namespace App\Models\DocumentFlow;

use Cerbero\QueryFilters\FiltersRecords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FiltersRecords;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
