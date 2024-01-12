<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiPendidikan extends Model
{
    use HasFactory;

    protected $table ='pegawai_pendidikan';

    protected $guarded = [];
}
