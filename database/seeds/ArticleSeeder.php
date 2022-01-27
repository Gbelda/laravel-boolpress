<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
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
            $article->title = $faker->sentence();
            $article->content = $faker->paragraphs(rand(4, 6), true);
            $article->image = "https://picsum.photos/id/{$faker->numberbetween(1001, 1068)}/536/354";
            $article->post_date = $faker->date();
            $article->save();
        }
    }
}
