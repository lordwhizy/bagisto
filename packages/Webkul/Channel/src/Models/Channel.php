<?php

namespace Webkul\Channel\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Core\Models\Locale;
use Webkul\Core\Models\Currency;

class Channel extends Model
{
    protected $fillable = ['code', 'name', 'description', 'default_locale', 'base_currency'];

    /**
     * Get the channel locales.
     */
    public function locales()
    {
        return $this->belongsToMany(Locale::class, 'channel_locales');
    }

    /**
     * Get the default locale
     */
    public function default_locale()
    {
        return $this->belongsTo(Locale::class);
    }

    /**
     * Get the channel locales.
     */
    public function currencies()
    {
        return $this->belongsToMany(Currency::class, 'channel_currencies');
    }

    /**
     * Get the base currency
     */
    public function base_currency()
    {
        return $this->belongsTo(Currency::class);
    }
}