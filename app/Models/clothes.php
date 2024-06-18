<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;


/**
 * Class Book.
 * 
 * @author  Evelline <evelline.kristiani@ukrida.ac.id>
 * 
 * @OA\Schema(
 *     description="Book model",
 *     title="Book model",
 *     required={"title", "author"},
 *     @OA\Xml(
 *         name="Book"
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