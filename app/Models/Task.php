<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Task extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $fillable = [
        "title",
        "description",
        "type",
        "status",
        "start_date",
        "due_date",
        "estimate",
        "actual",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "assignee");
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'status' => $this->status
        ];
    }
}
