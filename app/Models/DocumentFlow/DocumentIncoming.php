<?php

namespace App\Models\DocumentFlow;

use App\Models\User;
use Asantibanez\LaravelEloquentStateMachines\Traits\HasStateMachines;
use Cerbero\QueryFilters\FiltersRecords;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class DocumentIncoming extends Model
{
    use HasFactory;
    use SoftDeletes;
    use FiltersRecords;
    use HasMediaTrait;
    use LogsActivity;
    use HasStateMachines;

    protected $fillable = [
        'number',
        'year',
        'registration_date',
        'sheets',
        'document_date',
        'correspondent_id',
        'type_id',
        'importance_id',
        'content',
        'curator_id',
        'resolution_date',
        'resolution',
        'executor_id',
        'planned_date',
        'due_date',
        'comment'
    ];

    protected static $logAttributes = [
        'number',
        'year',
        'registration_date',
        'sheets',
        'document_date',
        'correspondent_id',
        'type_id',
        'importance_id',
        'content',
        'curator_id',
        'resolution_date',
        'resolution',
        'executor_id',
        'planned_date',
        'due_date',
        'comment'
    ];

    public function correspondent()
    {
        return $this->belongsTo(DocumentCorrespondent::class);
    }

    public function importance()
    {
        return $this->belongsTo(DocumentImportance::class);
    }

    public function type()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function curator() {
        return $this->belongsTo(User::class);
    }

    public function executor() {
        return $this->belongsTo(User::class);
    }

}
