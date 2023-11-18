<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'product_id',
        'name_pr',
        'name_serial',
        'detail',
        'price',
        'quantity_pr',
        'guarantee_period',
        'supplier_id',
    ];

    protected $hidden = [
        'updated_at',
        'pivot',
        'category',
        'suppliers',
        'image'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'product_category.category_id');
    }

    public function suppliers():BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'product_id', 'product_id');
    }
}
