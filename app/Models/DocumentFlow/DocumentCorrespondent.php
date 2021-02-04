<?php

namespace App\Models\DocumentFlow;

use Cerbero\QueryFilters\FiltersRecords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentCorrespondent extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FiltersRecords;

    protected $fillable = [
        'number',
        'name'
    ];

    public function incomings()
    {
        return $this->hasMany(DocumentIncoming::class);
    }

    public function outgoings()
    {
        return $this->hasMany(DocumentOutgoing::class);
    }
}
