<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AiKnowledgeChunk extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'layer',
        'tenant_id',
        'category',
        'title',
        'content',
        'keywords',
        'status',
        'version',
        'priority',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'keywords' => 'array',
        'metadata' => 'array',
        'version' => 'integer',
        'priority' => 'integer',
    ];

    /**
     * Scope only approved knowledge chunks.
     *
     * @param  Builder<AiKnowledgeChunk>  $query
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope by layer and enforce strict tenant boundary.
     *
     * @param  Builder<AiKnowledgeChunk>  $query
     */
    public function scopeForLayerAndTenant(Builder $query, string $layer, ?string $tenantId = null): Builder
    {
        $query->where('layer', strtolower($layer));

        if (strtolower($layer) === 'l4') {
            // Strict tenant boundary for L4
            if (empty($tenantId)) {
                return $query->whereRaw('1 = 0'); // Default Deny
            }

            return $query->where('tenant_id', $tenantId);
        }

        // For L1 - L3, tenant_id is either null (platform level) or matches
        return $query->whereNull('tenant_id');
    }
}
