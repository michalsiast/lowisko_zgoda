<?php


namespace App\Http\Controllers;
use Illuminate\Support\Str;

use App\Helpers\SeoHelper;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($item) {
        SeoHelper::setSeo($item->seo);
        $item->text = $this->renderContent($item->text);
        return view('default.article.show', compact('item'));
    }

    public function index($view) {
        $items = Article::with([])
            ->activeAndLocale()
            ->orderByDesc('position')
            ->get();
        $view->items = $items;
    }

    public function home($view){
        $q = Article::with([])
            ->activeAndLocale()
            ->orderByDesc('position');

        if($view->limit)
            $q->limit($view->limit);

        $items = $q->get();
        $view->items = $items;
    }
    public function renderContent($content)
    {
        $content = preg_replace_callback('/<oembed url="(.*?)"><\/oembed>/', function ($matches) {
            $url = $matches[1];

            return $this->convertYouTubeToEmbed($url);
        }, $content);

        $content = preg_replace_callback('/<a href="(.*?)">(.*?)<\/a>/', function ($matches) {
            $url = $matches[1];

            if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
                return $this->convertYouTubeToEmbed($url);
            }

            return $matches[0];
        }, $content);

        return $content;
    }

    private function convertYouTubeToEmbed($url)
    {
        if (strpos($url, 'watch?v=') !== false) {
            $embedUrl = str_replace('watch?v=', 'embed/', strtok($url, '&'));
        } elseif (strpos($url, 'youtube.com/shorts/') !== false) {
            $videoId = substr(parse_url($url, PHP_URL_PATH), strlen('/shorts/'));
            $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
        } elseif (strpos($url, 'youtu.be') !== false) {
            $videoId = substr(parse_url($url, PHP_URL_PATH), 1);
            $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
        } else {
            return $url;
        }

        return '<iframe width="100%" height="430" src="' . $embedUrl . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen> </iframe>';
    }


}
