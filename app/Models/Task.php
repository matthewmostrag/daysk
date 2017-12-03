<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_TODO = 0;
    const STATUS_DOING = 1;
    const STATUS_DONE = 2;

    protected $fillable = ['title', 'description', 'due_date'];

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
