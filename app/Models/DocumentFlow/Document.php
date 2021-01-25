<?php

namespace App\Models\DocumentFlow;

use Cerbero\QueryFilters\FiltersRecords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Document extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use FiltersRecords;
    use HasMediaTrait;
    use LogsActivity;

    protected $fillable = [
        'number',
        'year',
        'registered_at',
        'planned_at',
        'executed_at',
        'content',
        'resolution',
        'journal_id'
    ];

    protected static $logAttributes = [
        'number',
        'year',
        'registered_at',
        'planned_at',
        'executed_at',
        'content',
        'resolution',
        'journal_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
