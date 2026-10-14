<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default AI Provider
    |--------------------------------------------------------------------------
    |
    | Supported: 'llm', 'gemini', 'mock'
    |
    */
    'default' => env('AI_PROVIDER', 'mock'),

    /*
    |--------------------------------------------------------------------------
    | AI Providers Configuration
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'llm' => [
            'api_key' => env('LLM_API_KEY', env('NINEROUTER_API_KEY', '')),
            'base_url' => env('LLM_BASE_URL', 'http://localhost:20128/v1'),
            'model' => env('LLM_MODEL', 'default-model'),
            'max_tokens' => (int) env('LLM_MAX_TOKENS', 2048),
            'temperature' => (float) env('LLM_TEMPERATURE', 0.2),
            'max_retries' => (int) env('LLM_MAX_RETRIES', 3),
            'timeout' => (int) env('LLM_TIMEOUT', 30),
        ],
        'gemini' => [
            'api_key' => env('GEMINI_API_KEY'),
            'model' => env('GEMINI_MODEL', 'gemini-1.5-flash'),
            'base_url' => env('GEMINI_BASE_URL', 'https://generativelanguage.googleapis.com/v1beta'),
            'timeout' => (int) env('GEMINI_TIMEOUT', 30),
        ],
        'mock' => [
            'default_response' => 'Halo! Saya AI Assistant D-KREASI. Ada yang bisa saya bantu terkait Undangan Digital atau Website Bisnis?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Multi-Layer AI Profiles & Configuration
    |--------------------------------------------------------------------------
    */
    'layers' => [
        'l1' => [
            'name' => 'D-KREASI Home Assistant',
            'persona_code' => 'L1_HOME',
            'temperature' => 0.7,
        ],
        'l2' => [
            'name' => 'Undangan Digital Assistant',
            'persona_code' => 'L2_UNDANGAN',
            'temperature' => 0.7,
        ],
        'l3' => [
            'name' => 'Sales AI Website Bisnis (WEBIA)',
            'persona_code' => 'L3_WEBIA_SALES',
            'temperature' => 0.6,
        ],
        'l4' => [
            'name' => 'Customer Business Chatbot',
            'persona_code' => 'L4_BUSINESS_CHATBOT',
            'temperature' => 0.3,
        ],
    ],
];
