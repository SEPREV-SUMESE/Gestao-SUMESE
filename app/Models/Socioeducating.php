<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socioeducating extends Model
{
    protected $table = 'socioeducating';

    protected $fillable = [
        'photo_path','full_name','social_name','birth_date','document_id','education','marital_status',
        'gender_identity','sexual_orientation','race','weight_kg','height_cm','bmi',
        'address','guardians','contact','status','created_by'
    ];
    
    protected $casts = [
        'birth_date' => 'date',
    ];

    public function documents()
    {
        return $this->hasOne(SocioeducatingDocument::class);
    }

    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->full_name);
        $initials = '';

        if (count($words) >= 2) {
            $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
        } else if (count($words) == 1) {
            $initials = strtoupper(substr($words[0], 0, 2));
        }

        ///return $initials . 'º';
        return $initials;
    }
}