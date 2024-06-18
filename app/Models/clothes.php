<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;


/**
 * Class Clothes.
 * 
 * @author  Bryan <bryan.422021003@civitas.ukrida.ac.id>
 * 
 * @OA\Schema(
 *     description="Clothes model",
 *     title="Clothes model",
 *     required={"title", "author"},
 *     @OA\Xml(
 *         name="Clothes"
 *     )
 * )
 */
class Clothes extends Model
{
    // use HasFactory;
    use SoftDeletes;
    protected $table = 'clothes';
    protected $fillable = [
        'id',
        'name',
        'type',
        'price',
        'quantity',
        'description',
        'created_at',
        'created_by',
        'updated_at',
    ];

    public function data_adder(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}