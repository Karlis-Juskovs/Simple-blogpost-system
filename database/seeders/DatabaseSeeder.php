<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Health'],
            ['name' => 'Travel'],
            ['name' => 'Food'],
            ['name' => 'Lifestyle'],
            ['name' => 'Finance'],
            ['name' => 'Education'],
            ['name' => 'Entertainment'],
            ['name' => 'Sports'],
            ['name' => 'News'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }

        $users = [
            [
                'name' => "Jezal Luthar",
                'email' => "jezal.luthar@first.com"
            ],
            [
                'name' => "Logen Ninefingers",
                'email' => "logen.ninefingers@first.com",
            ]
        ];

        $luthar = User::firstOrNew($users[0]);
        $luthar->password = bcrypt('password1');
        $luthar->save();

        $logen = User::firstOrNew($users[1]);
        $logen->password = bcrypt('password2');
        $logen->save();


        $blogPosts = [
            [
                "title" => "The Art of Minimalism",
                "content" => "Minimalism is not just a design aesthetic but a lifestyle choice. In this blog, we explore how minimalism can help declutter your life and mind."
            ],
            [
                "title" => "10 Tips for Healthy Eating",
                "content" => "Eating healthy doesn't have to be complicated. Here are 10 simple tips to help you maintain a balanced diet."
            ],
            [
                "title" => "Traveling on a Budget",
                "content" => "Discover how to explore the world without breaking the bank with our comprehensive guide to budget travel."
            ],
            [
                "title" => "The Benefits of Morning Exercise",
                "content" => "Starting your day with exercise can boost your energy and mood. Learn more about the benefits of morning workouts."
            ],
            [
                "title" => "How to Start a Blog",
                "content" => "Interested in starting your own blog? Follow these steps to get started and make your blog a success."
            ],
            [
                "title" => "Understanding Cryptocurrency",
                "content" => "Cryptocurrency is transforming the financial landscape. This post covers the basics you need to know about digital currencies."
            ],
            [
                "title" => "Work-Life Balance: Tips for Professionals",
                "content" => "Achieving a work-life balance is crucial for mental health. Here are some strategies to help you manage your time effectively."
            ],
            [
                "title" => "The Rise of Remote Work",
                "content" => "Remote work is becoming more common. Explore the pros and cons of working from home and how to stay productive."
            ],
            [
                "title" => "Mastering Public Speaking",
                "content" => "Public speaking can be daunting. This guide provides tips and techniques to help you become a confident speaker."
            ],
            [
                "title" => "Exploring the Great Outdoors",
                "content" => "Nature offers a respite from our busy lives. Discover the benefits of spending time outdoors and how to make the most of it."
            ],
            [
                "title" => "Cooking for Beginners",
                "content" => "New to cooking? Here are some easy recipes and tips to help you get started in the kitchen."
            ],
            [
                "title" => "The Power of Positive Thinking",
                "content" => "Positive thinking can have a significant impact on your life. Learn how to cultivate a positive mindset."
            ],
            [
                "title" => "A Guide to Mindfulness",
                "content" => "Mindfulness is a powerful practice that can reduce stress and improve well-being. Here’s how to get started."
            ],
            [
                "title" => "Investing 101",
                "content" => "Investing can be intimidating for beginners. This post breaks down the basics of investing and how to get started."
            ],
            [
                "title" => "DIY Home Decor Ideas",
                "content" => "Transform your living space with these creative and budget-friendly DIY home decor ideas."
            ],
            [
                "title" => "The Importance of Sleep",
                "content" => "Sleep is essential for good health. Learn about the benefits of quality sleep and tips for better sleep hygiene."
            ],
            [
                "title" => "Time Management Tips for Students",
                "content" => "Balancing schoolwork and personal life can be challenging. Here are some time management tips for students."
            ],
            [
                "title" => "A Beginner's Guide to Yoga",
                "content" => "Yoga is a great way to improve flexibility and reduce stress. This guide will help you start your yoga journey."
            ],
            [
                "title" => "How to Grow Your Own Garden",
                "content" => "Growing your own garden can be rewarding. Learn the basics of gardening and how to start your own."
            ],
            [
                "title" => "The Future of Technology",
                "content" => "Technology is evolving rapidly. This post explores the latest trends and what the future might hold."
            ],
            [
                "title" => "Building Healthy Relationships",
                "content" => "Healthy relationships are key to a fulfilling life. Discover tips on building and maintaining strong relationships."
            ],
            [
                "title" => "The Impact of Social Media",
                "content" => "Social media has changed the way we communicate. This post examines its impact on society and individuals."
            ],
            [
                "title" => "Career Development Tips",
                "content" => "Advancing in your career requires planning and effort. Here are some tips to help you achieve your career goals."
            ],
            [
                "title" => "The Art of Negotiation",
                "content" => "Negotiation is a valuable skill in both personal and professional settings. Learn strategies for effective negotiation."
            ],
            [
                "title" => "Sustainable Living Tips",
                "content" => "Living sustainably can help protect the environment. Here are some tips to make your lifestyle more eco-friendly."
            ],
            [
                "title" => "Understanding Mental Health",
                "content" => "Mental health is just as important as physical health. Learn about common mental health issues and how to seek help."
            ],
            [
                "title" => "The Benefits of Volunteering",
                "content" => "Volunteering can be incredibly rewarding. Discover the benefits of giving back to your community."
            ],
            [
                "title" => "Effective Study Techniques",
                "content" => "Studying effectively can make a big difference in academic performance. Here are some techniques to improve your study habits."
            ],
            [
                "title" => "A Guide to Personal Finance",
                "content" => "Managing your personal finances is crucial for financial stability. This guide covers the basics of budgeting, saving, and investing."
            ],
            [
                "title" => "Exploring Different Cultures",
                "content" => "Learning about different cultures can broaden your perspective. Discover ways to explore and appreciate cultural diversity."
            ],
            [
                "title" => "The Science of Happiness",
                "content" => "What makes us happy? This post delves into the science of happiness and how to cultivate a joyful life."
            ]
        ];

        for ($i = 0; $i < count($blogPosts); $i++) {
            $blogPost = BlogPost::firstOrNew($blogPosts[$i]);
            $blogPost->owner_id = $i % 2 ? $luthar->id : $logen->id;
            $blogPost->saveQuietly();

            $commentText = null;
            switch ($i % 10) {
                case 1:
                    $categoryId = 2;
                    $commentText = 'Thanks for sharing this information. It was an interesting read.';
                    break;
                case 2:
                    $categoryId = 3;
                    break;
                case 3:
                    $categoryId = 4;
                    $commentText = 'I found your post quite informative. I learned something new today.';
                    break;
                case 4:
                    $categoryId = 5;
                    break;
                case 5:
                    $categoryId = 6;
                    $commentText = 'This is a well-written article. I appreciate the effort you put into explaining the details.';
                    break;
                case 6:
                    $categoryId = 7;
                    $commentText = 'Your points are clearly presented. It was helpful to see this perspective.';
                    break;
                case 7:
                    $categoryId = 8;
                    break;
                case 8:
                    $categoryId = 9;
                    $commentText = 'Good overview of the topic. I enjoyed reading it.';
                    break;
                case 9:
                    $categoryId = 10;
                    $commentText = 'This was an insightful post. Looking forward to reading more from you.';
                    break;
                default:
                    $categoryId = 1;
            }

            try {
                $blogPost->categories()->attach($categoryId);
            } catch(\Exception $e) {
                // duplicate entry
            }

            if ($commentText) {
                //multiple same entries are acceptable
                $blogPost->comments()->create([
                    'content' => $commentText,
                    'owner_id' => $i % 2 ? $logen->id : $luthar->id
                ]);
            }
        }
    }
}
