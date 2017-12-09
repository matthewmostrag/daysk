<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int status
 */
class Task extends Model
{
    const STATUS_TODO = 0;
    const STATUS_DOING = 1;
    const STATUS_DONE = 2;

    protected $fillable = ['title', 'description', 'due_date'];

    /**
     * Scope a query to only include popular users.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeToday($query)
    {
        return $query->whereDate('due_date', Carbon::today()->toDateString());
    }

    /**
     * Mark a task as done
     */
    public function done()
    {
        $this->status = 1;
        $this->save();
    }

    /**
     * Mark a task as undone
     */
    public function undone()
    {
        $this->status = 0;
        $this->save();
    }
}
