<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory, HasUuids;

    /**
     * The pendidikan that belong to the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pendidikan()
    {
        return $this->belongsToMany(Pendidikan::class);
    }
}
