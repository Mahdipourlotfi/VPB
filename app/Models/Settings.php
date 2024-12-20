<?php

namespace App\Models;

use App\Models\User;
use App\Models\SettingsItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','settingsitems_id','value'];
    public $table = 'Settings';
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function item(): BelongsTo
    {
        /**
         * Get all of the comments for the Settings
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
   
            return $this->belongsTo(SettingsItems::class,  'settingsitems_id','id');
        
    }
}
