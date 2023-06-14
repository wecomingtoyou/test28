<?php

declare(strict_types=1);

namespace Shared\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentModel extends Model
{
    use HasFactory;
}
