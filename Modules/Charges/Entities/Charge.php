<?php

namespace Modules\Charges\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charge extends Model
{
    use HasFactory;

    protected $fillable = ['date','add_by','description','produit','montant','type'];
    


    public function user()
    {
        return $this->belongsTo(User::class,'add_by');
    }


}
