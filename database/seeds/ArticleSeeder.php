<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) { 
            $article = new Article();
            $article->title = $faker->sentence(6);
            $article->slug = Str::slug($article->title);
            $article->content = $faker->paragraphs(rand(4, 6), true);
            $article->image = 'placeholder/' . '2FURsbe7xklihm3NmO6YKvMXke1Gf1jOLyxHGU1v.jpg';
            $article->post_date = $faker->date();
            $article->save();
        }
    }
}
