<?php

namespace App\Models;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingsItems extends Model
{
    use HasFactory;
    protected $fillable = ['name','type'];
    public $table = 'SettingsItems';
    public function settings(): HasMany
    {
        return $this->hasMany(Settings::class,'settingsitem_id','id');
    }

}
