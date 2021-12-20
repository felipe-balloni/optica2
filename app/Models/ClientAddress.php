<?php

declare(strict_types=1);

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Scalar\String_;

class ClientAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type_id',
        'postal_code',
        'address_1',
        'number',
        'complement',
        'address_2',
        'state_id',
        'city_id',
        'comments',
    ];

    protected $with = [
        'client',
        'type',
        'state',
        'city',
    ];

    public static function GetAddress(string $state): array | int
    {

        $response = Http::get('https://brasilapi.com.br/api/cep/v1/'. $state);

        if ( $response->ok() ) {
            $data = $response->json();

            $state = State::with('cities')->where('abbreviation', $data['state'])->first();

            $data['state'] = $state->id;
            $data['city'] = $state->cities->where('city', $data['city'])->first()->id;

            return $data;
        }

        return $response->status();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function getAddressAttribute()
    {
//        return "{$this->address_1}, {$this->number}";
        return [
            'postal_code' => $this->postal_code,
            'address_1' => $this->address_1,
            'number' => $this->number,
            'complement' => $this->complement,
            'address_2' => $this->address_2,
            'state' => $this->state->abbreviation,
            'city' => $this->city->city,
        ];
    }

}
