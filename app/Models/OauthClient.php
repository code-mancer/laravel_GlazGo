<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $secret
 */
class OauthClient extends Model
{
    use HasFactory;

    protected $table = 'oauth_clients';
}
