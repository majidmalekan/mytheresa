<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $hidden=["deleted_at","updated_at"];

    const CURRENCY = "EUR";
    const CategoryName = "boots";
    const SKU = "000003";

    /**
     * @param $value
     * @return array
     */
    public function getPriceAttribute($value): array
    {

        $percent = $this->calculatePercent();
        return $this->calculatePrice($value, $percent);
    }

    /**
     * @param $price
     * @param $percent
     * @return array
     */
    protected function calculatePrice($price, $percent): array
    {
        return [
            'original' => $price,
            'final' => $percent == null ? $price : round(($price * $percent) / 100),
            'discount_percentage' => $percent == null ? $percent : $percent . "%",
            'currency' => self::CURRENCY
        ];
    }

    protected function calculatePercent()
    {
        $percent = null;
        if ($this->category == self::CategoryName && $this->sku == self::SKU) {
            $percent = max(config('constants.discount_percentage'));
        } elseif ($this->category == self::CategoryName) {
            $percent = config('constants.discount_percentage.category');
        } elseif ($this->sku == self::SKU) {
            $percent = config('constants.discount_percentage.sku');
        }
        return $percent;
    }
}
