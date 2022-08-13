<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function documentStatus()
    {
        return $this->belongsTo(DocumentStatus::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('name', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%');
    }

    public static function searchHome($search, $departmentId)
    {

        return empty($search) ? static::query()->where('department_id', $departmentId)
            : static::query()->where([
                ['id', 'like', '%'.$search.'%'],['department_id', 'like', $departmentId]
            ])->orWhere([
                ['name', 'like', '%'.$search.'%'],['department_id', 'like', $departmentId]
            ])->orWhere([
                ['description', 'like', '%'.$search.'%'],['department_id', 'like', $departmentId]]
            );
    }
}
