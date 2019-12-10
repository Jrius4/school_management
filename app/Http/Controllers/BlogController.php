<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use App\Tag;

class BlogController extends Controller
{
    protected $limit = 20;

    public function index()
    {
        $posts = Post::with('author', 'tags', 'category', 'comments')
                    ->latestFirst()
                    ->published()
                    ->filter(request()->only(['term', 'year', 'month']))
                    ->paginate($this->limit);
        $postCategories=Category::get();

        return view("blog.index", compact('posts','postCategories'));
    }

    public function category(Category $category)
    {
        $postCategories=Category::get();
        $categoryName = $category->title;

        $posts = $category->posts()
                          ->with('author', 'tags', 'comments')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->limit);

         return view("blog.index", compact('posts', 'categoryName','postCategories'));
    }

    public function tag(Tag $tag)
    {
        $postCategories=Category::get();
        $tagName = $tag->title;

        $posts = $tag->posts()
                          ->with('author', 'category', 'comments')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->limit);

         return view("blog.index", compact('posts', 'tagName','postCategories'));
    }

    public function author(User $author)
    {
        $postCategories=Category::get();
        $authorName = $author->name;

        $posts = $author->posts()
                          ->with('category', 'tags', 'comments')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->limit);

         return view("blog.index", compact('posts', 'authorName','postCategories'));
    }

    public function show(Post $post)
    {
        $post->increment('view_count');

        $postComments = $post->comments()->simplePaginate(3);

        return view("blog.show", compact('post', 'postComments'));
    }
}
