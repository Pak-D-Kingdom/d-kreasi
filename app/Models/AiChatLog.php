<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiChatLog extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'session_id',
        'layer',
        'tenant_id',
        'user_message',
        'assistant_message',
        'provider',
        'model',
        'prompt_tokens',
        'completion_tokens',
        'total_tokens',
        'latency_ms',
        'is_fallback',
        'error_message',
        'context_metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'prompt_tokens' => 'integer',
        'completion_tokens' => 'integer',
        'total_tokens' => 'integer',
        'latency_ms' => 'integer',
        'is_fallback' => 'boolean',
        'context_metadata' => 'array',
    ];
}
