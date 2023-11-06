<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Str;

class Apartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopePremium(Builder $query) {
        return $query->whereHas('sponsorships', function (Builder $query) {
            return $query->where('apartment_sponsorship.expire_date', '>=', now('Europe/Rome'));
        });
    }

    /* Apartment::near($longitude, $latitude, $radius)->premium->get(); */
    public function scopeNear(Builder $query, $latitude, $longitude, $radius): Builder
    {

        return $query->selectRaw("user_id, name, slug, rooms, beds, bathrooms, mq, address, photo, visible, ST_Distance(coordinates, POINT(?, ?)) as distance, ST_X(coordinates) as lat, ST_Y(coordinates) as lon", [$longitude, $latitude])
            ->whereRaw('ST_Distance_Sphere(coordinates, Point(?, ?)) <= ?', [$longitude, $latitude, $radius])
            ->orderBy('distance', 'asc');
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
}
