<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'website_name',
        'url',
        'status',
        'notes',
        'domain_expiry',
        'hosting_expiry',
        'price',
        'payment_date',
        'payment_status',
        'package_status',
        'hosting_provider'
    ];

    protected $casts = [
        'domain_expiry' => 'date',
        'hosting_expiry' => 'date',
        'payment_date' => 'date',
        'price' => 'decimal:2'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function getDomainExpiryStatusAttribute()
    {
        if (!$this->domain_expiry) return 'unknown';
        
        $daysUntilExpiry = Carbon::now()->diffInDays($this->domain_expiry, false);
        
        if ($daysUntilExpiry < 0) return 'expired';
        if ($daysUntilExpiry <= 30) return 'warning';
        return 'safe';
    }

    public function getHostingExpiryStatusAttribute()
    {
        if (!$this->hosting_expiry) return 'unknown';
        
        $daysUntilExpiry = Carbon::now()->diffInDays($this->hosting_expiry, false);
        
        if ($daysUntilExpiry < 0) return 'expired';
        if ($daysUntilExpiry <= 30) return 'warning';
        return 'safe';
    }

    public function getPackageStatusLabelAttribute()
    {
        $labels = [
            'website' => 'Pembuatan Website',
            'maintenance' => 'Maintenance',
            'seo' => 'SEO',
            'website_maintenance' => 'Pembuatan Website & Maintenance',
            'website_seo' => 'Pembuatan Website & SEO',
            'website_maintenance_seo' => 'Pembuatan Website, Maintenance & SEO'
        ];

        return $labels[$this->package_status] ?? 'Pembuatan Website';
    }
}
