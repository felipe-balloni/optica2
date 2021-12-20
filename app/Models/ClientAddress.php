<?php

declare(strict_types=1);

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
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
//        'state',
//        'city',
    ];

    public static function GetAddress(string $state): array | int
    {

        $response = Http::get('https://brasilapi.com.br/api/cep/v1/'. $state);

        ray($response, $response->ok(), $response->status(), $response->json() );

        if ( $response->ok() ) {
            $data = $response->json();

            $state = State::with('cities')->where('abbreviation', $data['state'])->firstOrFail();
            $city = $state->cities->where('city', $data['city'])->first();

            $data['state'] = $state->id;
            $data['city'] = $city->id ?? null;

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

    public function getAddressAttribute(): array
    {
        return [
            'postal_code' => $this->postal_code,
            'address_1' => $this->address_1,
            'number' => $this->number,
            'complement' => $this->complement,
            'address_2' => $this->address_2,
            'state' => State::getState()->where('id', $this->state_id)->first()->abbreviation,
            'city' => City::getCitiesOfState($this->state_id)->get($this->city_id)->city,
//            'city' => 1,
        ];
    }

}
