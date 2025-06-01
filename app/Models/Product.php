<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name_product',
        'ukuran',
        'masa_waktu',
        'harga',
        'satuan',
        'tipe',
        'image'
    ];

    // Format Harga 
    public function getFormattedHargaAttribute(){
        return 'Rp. ' . number_format($this->harga, 2, ',', '.');
    }

    // Format tampilan satuan: Rp. 190,00 / m²
    public function getHargaPerUkuranAttribute()
    {
        return $this->formatted_harga . ' / ' . $this->ukuran;
    }

    // Getter untuk menampilkan waktu pengerjaan secara lebih ramah
    public function getMasaWaktuFormattedAttribute()
    {
        return $this->masa_waktu; // misal "3 - 4 Days"
    }
}