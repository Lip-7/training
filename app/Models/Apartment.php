<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Apartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeVisible(Builder $query)
    {
        return $query->where('visible', true);
    }
    public function scopePremium(Builder $query)
    {
        return $query->whereHas('sponsorships', function (Builder $query) {
            return $query->where('apartment_sponsorship.expire_date', '>=', now('Europe/Rome'));
        });
    }

    /* Apartment::near($longitude, $latitude, $radius)->premium->get(); */
    public function scopeNear(Builder $query, $latitude, $longitude, $radius): Builder
    {
        return $query->selectRaw("*, ST_Distance(coordinates, POINT(?, ?)) as distance", [$longitude, $latitude])
            ->whereRaw('ST_Distance_Sphere(coordinates, Point(?, ?)) <= ?', [$longitude, $latitude, $radius])
            ->orderBy('distance', 'asc');
    }

    public function scopeVisits(Builder $query): Builder
    {
        return $query->withCount('visits');
    }

    public function scopeSponsorEnd(Builder $query)
    {
        if (is_null($query->getQuery()->columns)) {
            $query->select('*');
        }
        return $query->selectSub(function ($q) {
            $q->select('expire_date')
                ->from('apartment_sponsorship')
                ->whereColumn('apartment_id', 'apartments.id')
                ->where('expire_date', '>=', now('Europe/Rome'))
                ->latest('expire_date')
                ->take(1);
        }, 'premium');
    }
    public static function generateSlug($name, $id)
    {
        return Str::slug($name . '-' . $id, '-');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class)->withPivot('expire_date');
    }

    protected function distance(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value * 1000, 2, ',', '')
        );
    }
    protected function coordinates(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Apartment::formattedCoordinates($value)

        );
    }

    protected function formattedCoordinates($coordinates)
    {
        return Apartment::query()
            ->selectRaw("ST_X(coordinates) as latitude, ST_Y(coordinates) as longitude")
            ->where('coordinates', $coordinates)
            ->first();
    }
}
