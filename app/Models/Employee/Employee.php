<?php

namespace App\Models\Employee;

use App\Models\Image\Image;
use App\Models\Position\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee\Employee
 *
 * @property int $id
 * @property string $full_name
 * @property int|null $position_id
 * @property int|null $head_id
 * @property string $confirmed_at
 * @property string $phone_number
 * @property string $email
 * @property float $salary
 * @property int|null $image_id
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Image $avatar
 * @property-read Position|null $position
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereHeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'head_id',
        'date_of_employment',
        'position_id',
        'phone_number',
        'email',
        'salary',
    ];

    public function avatar()
    {
        return $this->belongsTo(Image::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function getAvatarPath()
    {
        return $this->avatar ? $this->avatar->path : '/images/no-image.jpg';
    }

    public function getPositionName()
    {
        return $this->position ? $this->position->name : 'No position';
    }
}
