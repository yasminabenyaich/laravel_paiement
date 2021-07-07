<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function getPrice()
    {
        $price = $this->price / 100;

        return number_format($price, 2, ',', ' ') . ' €';
    }
}
// https://www.php.net/manual/fr/function.number-format.php
// $this.price => Le prix de base (en centime)
// On retourne un nombre (PHP) 
// $price = la valeur en euros =>
// 2 = définit cmb de nbr il ya après la virgule
// ' , '=> Le séparateur entre le nbr décimal et le nombre entier
//'  ' => Le séprateur arrivé au millier d'euro => visuel ex: 10 000
// . => Concaténé