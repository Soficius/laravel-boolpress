<?php

use App\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        // in questo modo randomizzo gli utenti, le categorie e i tags
        $user_ids = User::pluck('id')->toArray();
        $category_ids = Category::pluck('id')->toArray();
        $tag_ids = Tag::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $new_post = new Post();
            $new_post->title = $faker->text(20);
            $new_post->user_id = Arr::random($user_ids);
            $new_post->category_id = Arr::random($category_ids);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = $faker->paragraph(2, true);
            $new_post->image = $faker->imageUrl(100, 100);
            $new_post->save();

            // randomizzare i tag
            $post_tags = [];
            $array_length = rand(0, count($tag_ids));

            while (count($post_tags) < $array_length) {
                $rand_num = Arr::random($tag_ids);
                if (!in_array($rand_num, $post_tags)) $post_tags[] = $rand_num;
            }

            // soluzione data da marco
            // foreach($tag_ids as $tag_id){
            // if(ran(0,1)), $post_tags[] =$tag_id
            // }

            $new_post->tags()->attach($post_tags);
        }
    }
}
