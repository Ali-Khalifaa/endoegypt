<?php

namespace App\Models;

use App\Traits\SearchFilterTrait;
use App\Traits\TranslationsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildSafetyPolicy extends Model
{
    use HasFactory , TranslationsTrait,SearchFilterTrait;

    protected $guarded = ['id'];

    protected $table = "child_safety_policies";
}
