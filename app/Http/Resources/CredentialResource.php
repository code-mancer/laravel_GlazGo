<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $access_token
 * @property string $refresh_token
 * @property string $token_type
 * @property string $expires_in
 * @property User $user
 */
class CredentialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'access_token' => $this->resource->access_token,
            'refresh_token' => $this->resource->refresh_token,
            'token_type'   => $this->resource->token_type,
            'expires_in'   => $this->resource->expires_in,
            'user'   => new UserResource($this->resource->user)
        ];
    }
}
