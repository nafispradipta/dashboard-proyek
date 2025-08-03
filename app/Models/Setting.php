<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'is_public'
    ];
    
    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
    
    /**
     * Set a setting value
     *
     * @param string $key
     * @param mixed $value
     * @param array $attributes Additional attributes
     * @return Setting
     */
    public static function set($key, $value, array $attributes = [])
    {
        $setting = self::firstOrNew(['key' => $key]);
        $setting->value = $value;
        
        if (!empty($attributes)) {
            $setting->fill($attributes);
        }
        
        $setting->save();
        return $setting;
    }
}
