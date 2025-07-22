<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WebSetting extends Model
{
    protected $table = 'web_settings';
    
    protected $fillable = [
        'name',
        'logo'
    ];

    protected $attributes = [
        'name' => '',
        'logo' => null
    ];

    public function getLogo()
    {
        return $this->getAttribute('logo');
    }

    public function setLogo($value)
    {
        $this->setAttribute('logo', $value);
    }

    public function getName()
    {
        return $this->getAttribute('name');
    }

    public function setName($value)
    {
        $this->setAttribute('name', $value);
    }
}
