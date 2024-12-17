<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        // Add dummy characters
        Character::create([
            'name' => 'Dream',
            'image' => 'https://i.pinimg.com/736x/57/65/e2/5765e2f9e4b023a0cfca3ddc9fc813df.jpg'
        ]);

        Character::create([
            'name' => 'Wilbur Soot',
            'image' => 'https://i.pinimg.com/736x/ce/cd/1c/cecd1c78144cdf36e11c9d8d5b9f1cdc.jpg'
        ]);

        Character::create([
            'name' => 'TommyInnit',
            'image' => 'https://i.pinimg.com/736x/a5/70/e9/a570e990b0a14f71bdf9e46000d1de6b.jpg'
        ]);
    }
}
