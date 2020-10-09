<?php

namespace Database\Seeders;

use App\Models\PodcastCategory;
use Illuminate\Database\Seeder;

class PodcastCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arts = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Arts', 'programming' => 'Arts']);
        PodcastCategory::firstOrCreate(['category_id' => $arts->id, 'name' => 'Books', 'programming' => 'Books']);
        PodcastCategory::firstOrCreate(['category_id' => $arts->id, 'name' => 'Design', 'programming' => 'Design']);
        PodcastCategory::firstOrCreate(['category_id' => $arts->id, 'name' => 'Fashion & Beauty', 'programming' => 'Fashion &amp; Beauty']);
        PodcastCategory::firstOrCreate(['category_id' => $arts->id, 'name' => 'Food', 'programming' => 'Food']);
        PodcastCategory::firstOrCreate(['category_id' => $arts->id, 'name' => 'Performing Arts', 'programming' => 'Performing Arts']);
        PodcastCategory::firstOrCreate(['category_id' => $arts->id, 'name' => 'Visual Arts', 'programming' => 'Visual Arts']);
        $business = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Business', 'programming' => 'Business']);
        PodcastCategory::firstOrCreate(['category_id' => $business->id, 'name' => 'Careers', 'programming' => 'Careers']);
        PodcastCategory::firstOrCreate(['category_id' => $business->id, 'name' => 'Entrepreneurship', 'programming' => 'Entrepreneurship']);
        PodcastCategory::firstOrCreate(['category_id' => $business->id, 'name' => 'Investing', 'programming' => 'Investing']);
        PodcastCategory::firstOrCreate(['category_id' => $business->id, 'name' => 'Management', 'programming' => 'Management']);
        PodcastCategory::firstOrCreate(['category_id' => $business->id, 'name' => 'Marketing', 'programming' => 'Marketing']);
        PodcastCategory::firstOrCreate(['category_id' => $business->id, 'name' => 'Non-Profit', 'programming' => 'Non-Profit']);
        $comedy = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Comedy', 'programming' => 'Comedy']);
        PodcastCategory::firstOrCreate(['category_id' => $comedy->id, 'name' => 'Comedy Interviews', 'programming' => 'Comedy Interviews']);
        PodcastCategory::firstOrCreate(['category_id' => $comedy->id, 'name' => 'Improv', 'programming' => 'Improv']);
        PodcastCategory::firstOrCreate(['category_id' => $comedy->id, 'name' => 'Stand-Up', 'programming' => 'Stand-Up']);
        $education = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Education', 'programming' => 'Education']);
        PodcastCategory::firstOrCreate(['category_id' => $education->id, 'name' => 'Courses', 'programming' => 'Courses']);
        PodcastCategory::firstOrCreate(['category_id' => $education->id, 'name' => 'How To', 'programming' => 'How To']);
        PodcastCategory::firstOrCreate(['category_id' => $education->id, 'name' => 'Language Learning', 'programming' => 'Language Learning']);
        PodcastCategory::firstOrCreate(['category_id' => $education->id, 'name' => 'Self-Improvement', 'programming' => 'Self-Improvement']);
        $fiction = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Fiction', 'programming' => 'Fiction']);
        PodcastCategory::firstOrCreate(['category_id' => $fiction->id, 'name' => 'Comedy Fiction', 'programming' => 'Comedy Fiction']);
        PodcastCategory::firstOrCreate(['category_id' => $fiction->id, 'name' => 'Drama', 'programming' => 'Drama']);
        PodcastCategory::firstOrCreate(['category_id' => $fiction->id, 'name' => 'Science Fiction', 'programming' => 'Science Fiction']);
        PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Government', 'programming' => 'Government']);
        PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'History', 'programming' => 'History']);
        $health = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Health & Fitness', 'programming' => 'Health &amp; Fitness']);
        PodcastCategory::firstOrCreate(['category_id' => $health->id, 'name' => 'Alternative Health', 'programming' => 'Alternative Health']);
        PodcastCategory::firstOrCreate(['category_id' => $health->id, 'name' => 'Fitness', 'programming' => 'Fitness']);
        PodcastCategory::firstOrCreate(['category_id' => $health->id, 'name' => 'Medicine', 'programming' => 'Medicine']);
        PodcastCategory::firstOrCreate(['category_id' => $health->id, 'name' => 'Mental Health', 'programming' => 'Mental Health']);
        PodcastCategory::firstOrCreate(['category_id' => $health->id, 'name' => 'Nutrition', 'programming' => 'Nutrition']);
        PodcastCategory::firstOrCreate(['category_id' => $health->id, 'name' => 'Sexuality', 'programming' => 'Sexuality']);
        $kids = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Kids & Family', 'programming' => 'Kids &amp; Family']);
        PodcastCategory::firstOrCreate(['category_id' => $kids->id, 'name' => 'Education for Kids', 'programming' => 'Education for Kids']);
        PodcastCategory::firstOrCreate(['category_id' => $kids->id, 'name' => 'Parenting', 'programming' => 'Parenting']);
        PodcastCategory::firstOrCreate(['category_id' => $kids->id, 'name' => 'Pets & Animals', 'programming' => 'Pets &amp; Animals']);
        PodcastCategory::firstOrCreate(['category_id' => $kids->id, 'name' => 'Stories for Kids', 'programming' => 'Stories for Kids']);
        $leisure = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Leisure', 'programming' => 'Leisure']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Animation & Manga', 'programming' => 'Animation &amp; Manga']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Automotive', 'programming' => 'Automotive']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Aviation', 'programming' => 'Aviation']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Crafts', 'programming' => 'Crafts']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Games', 'programming' => 'Games']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Hobbies', 'programming' => 'Hobbies']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Home & Garden', 'programming' => 'Home &amp; Gargen']);
        PodcastCategory::firstOrCreate(['category_id' => $leisure->id, 'name' => 'Video Games', 'programming' => 'Video Games']);
        $music = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Music', 'programming' => 'Music']);
        PodcastCategory::firstOrCreate(['category_id' => $music->id, 'name' => 'Music Commentary', 'programming' => 'Music Commentary']);
        PodcastCategory::firstOrCreate(['category_id' => $music->id, 'name' => 'Music History', 'programming' => 'Music History']);
        PodcastCategory::firstOrCreate(['category_id' => $music->id, 'name' => 'Music Interviews', 'programming' => 'Music Interviews']);
        $news = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'News', 'programming' => 'News']);
        PodcastCategory::firstOrCreate(['category_id' => $news->id, 'name' => 'Business News', 'programming' => 'Business News']);
        PodcastCategory::firstOrCreate(['category_id' => $news->id, 'name' => 'Daily News', 'programming' => 'Daily News']);
        PodcastCategory::firstOrCreate(['category_id' => $news->id, 'name' => 'Entertainment News', 'programming' => 'Entertainment News']);
        PodcastCategory::firstOrCreate(['category_id' => $news->id, 'name' => 'News Commentary', 'programming' => 'Entertainment Commentary']);
        PodcastCategory::firstOrCreate(['category_id' => $news->id, 'name' => 'Politics', 'programming' => 'Politics']);
        PodcastCategory::firstOrCreate(['category_id' => $news->id, 'name' => 'Sports News', 'programming' => 'Sports News']);
        PodcastCategory::firstOrCreate(['category_id' => $news->id, 'name' => 'Tech News', 'programming' => 'Tech News']);
        $religion = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Religion & Spirituality', 'programming' => 'Religion &amp; Spirituality']);
        PodcastCategory::firstOrCreate(['category_id' => $religion->id, 'name' => 'Buddhism', 'programming' => 'Buddhism']);
        PodcastCategory::firstOrCreate(['category_id' => $religion->id, 'name' => 'Christianity', 'programming' => 'Christianity']);
        PodcastCategory::firstOrCreate(['category_id' => $religion->id, 'name' => 'Hinduism', 'programming' => 'Hinduism']);
        PodcastCategory::firstOrCreate(['category_id' => $religion->id, 'name' => 'Islam', 'programming' => 'Islam']);
        PodcastCategory::firstOrCreate(['category_id' => $religion->id, 'name' => 'Judaism', 'programming' => 'Judaism']);
        PodcastCategory::firstOrCreate(['category_id' => $religion->id, 'name' => 'Religion', 'programming' => 'Religion']);
        PodcastCategory::firstOrCreate(['category_id' => $religion->id, 'name' => 'Spirituality', 'programming' => 'Spirituality']);
        $science = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Science', 'programming' => 'Science']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Astronomy', 'programming' => 'Astronomy']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Chemistry', 'programming' => 'Chemistry']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Earth Sciences', 'programming' => 'Earth Sciences']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Life Sciences', 'programming' => 'Life Sciences']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Mathematics', 'programming' => 'Mathematics']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Natural Sciences', 'programming' => 'Natural Sciences']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Nature', 'programming' => 'Nature']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Physics', 'programming' => 'Physics']);
        PodcastCategory::firstOrCreate(['category_id' => $science->id, 'name' => 'Social Sciences', 'programming' => 'Social Sciences']);
        $society = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Society & Culture', 'programming' => 'Society &amp; Culture']);
        PodcastCategory::firstOrCreate(['category_id' => $society->id, 'name' => 'Documentary', 'programming' => 'Documentary']);
        PodcastCategory::firstOrCreate(['category_id' => $society->id, 'name' => 'Personal Journals', 'programming' => 'Personal Journals']);
        PodcastCategory::firstOrCreate(['category_id' => $society->id, 'name' => 'Philosophy', 'programming' => 'Philosophy']);
        PodcastCategory::firstOrCreate(['category_id' => $society->id, 'name' => 'Places & Travel', 'programming' => 'Places &amp; Travel']);
        PodcastCategory::firstOrCreate(['category_id' => $society->id, 'name' => 'Relationships', 'programming' => 'Relationships']);
        $sports = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Sports', 'programming' => 'Sports']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Baseball', 'programming' => 'Baseball']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Basketball', 'programming' => 'Basketball']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Cricket', 'programming' => 'Cricket']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Fantasy Sports', 'programming' => 'Fantasy Sports']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Football', 'programming' => 'Football']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Golf', 'programming' => 'Golf']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Hockey', 'programming' => 'Hockey']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Rugby', 'programming' => 'Rugby']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Running', 'programming' => 'Running']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Soccer', 'programming' => 'Soccer']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Swimming', 'programming' => 'Swimming']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Tennis', 'programming' => 'Tennis']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Volleyball', 'programming' => 'Volleyball']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Wilderness', 'programming' => 'Wilderness']);
        PodcastCategory::firstOrCreate(['category_id' => $sports->id, 'name' => 'Wrestling', 'programming' => 'Wrestling']);
        PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'Technology', 'programming' => 'Technology']);
        PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'True Crime', 'programming' => 'True Crime']);
        $tv = PodcastCategory::firstOrCreate(['category_id' => NULL, 'name' => 'TV & Film', 'programming' => 'TV &amp; Film']);
        PodcastCategory::firstOrCreate(['category_id' => $tv->id, 'name' => 'After Shows', 'programming' => 'After Shows']);
        PodcastCategory::firstOrCreate(['category_id' => $tv->id, 'name' => 'Film History', 'programming' => 'Film History']);
        PodcastCategory::firstOrCreate(['category_id' => $tv->id, 'name' => 'Film Interviews', 'programming' => 'Film Interviews']);
        PodcastCategory::firstOrCreate(['category_id' => $tv->id, 'name' => 'Film Reviews', 'programming' => 'Film Reviews']);
        PodcastCategory::firstOrCreate(['category_id' => $tv->id, 'name' => 'TV Reviews', 'programming' => 'TV Reviews']);
    }
}
