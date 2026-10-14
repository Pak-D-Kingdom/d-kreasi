<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AI\LlmGateway;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AiChatController extends Controller
{
    public function __construct(
        protected LlmGateway $llmGateway
    ) {}

    /**
     * Handle incoming chat requests for AI Assistant (L1 - L4).
     */
    public function chat(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'layer' => ['required', 'string', 'in:l1,l2,l3,l4'],
            'messages' => ['required', 'array', 'min:1'],
            'messages.*.role' => ['required', 'string', 'in:user,assistant,system'],
            'messages.*.content' => ['required', 'string', 'max:4000'],
            'session_id' => ['nullable', 'string', 'max:100'],
            'tenant_id' => ['nullable', 'string', 'max:100'],
            'context' => ['nullable', 'array'],
        ]);

        $layer = strtolower($validated['layer']);

        // Default Deny rule for L4 (Tenant boundary)
        if ($layer === 'l4' && empty($validated['tenant_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'tenant_id is strictly required for layer 4 requests (Tenant Boundary Protection).',
            ], 422);
        }

        $options = [
            'layer' => $layer,
            'session_id' => $validated['session_id'] ?? null,
            'tenant_id' => $validated['tenant_id'] ?? null,
            'context' => $validated['context'] ?? [],
        ];

        $response = $this->llmGateway->chat($layer, $validated['messages'], $options);

        return response()->json([
            'success' => true,
            'layer' => $layer,
            'message' => [
                'role' => 'assistant',
                'content' => $response['content'],
            ],
            'meta' => [
                'provider' => $response['provider'],
                'model' => $response['model'],
                'is_fallback' => $response['is_fallback'],
                'usage' => $response['usage'],
            ],
        ]);
    }
}
