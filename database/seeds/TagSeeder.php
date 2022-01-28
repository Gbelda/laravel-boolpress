<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Javascript Dev', 'Automation Coding', 'Web designer', 'Best Practices', 'Coding Life', 'Computer Science'];

        foreach ($tags as $tag){
            $_tag = new Tag();
            $_tag->name = $tag;
            $_tag->slug = Str::slug($tag);
            $_tag->save();
        }
    }
}
