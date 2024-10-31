<?php

namespace App\Models;

use App\Helpers\Enum;
use ReflectionClass;

abstract class PageType extends Enum
{
    /*
     * examples:
     * #1: controller_moduleCategory.action
     * #2: controller.action
     *
     * action = view
    */

    const INDEX_SHOW = [
        'name' => 'index.show',
        'module' => false,
        'fields' => [
            'rotator' => ['rotator', 'Slider'],
            'subheader_about_us' => ['head', 'Podtytuł - O nas'],
            'header_about_us' => ['head', 'Nagłówek - O nas'],
            'description_about_us' => ['text', 'Opis - O nas'],
            'subtitle_why_us' => ['head', 'Podtytuł - Dlaczego My'],
            'header_why_us' => ['head', 'Nagłówek - Dlaczego My'],
            'description_why_us' => ['text', 'Opis - Dlaczego My'],
            'subtitle_about_fishery' => ['head', 'Podtytuł - O łowisku'],
            'header_about_fishery' => ['head', 'Nagłówek - O łowisku'],
            'short_description_about_fishery' => ['text', 'Krótki Opis - O łowisku'],
            'long_description_about_fishery' => ['text', 'Długi Opis - O łowisku'],
            'subtitle_news' => ['head', 'Podtytuł - Aktualności'],
            'title_news' => ['head', 'Tytuł - Aktualności'],
            'description_news' => ['text', 'Opis - Aktualności'],
        ]
    ];
    const PAGE_SHOW = [
        'name' => 'page.show',
        'module' => false,
        'fields' => [
            'text1' => ['text', 'Text na stronie głównej']
        ]
    ];
    const GALLERY_SHOW = [
        'name' => 'gallery.show',
        'module' => false,
        'fields' => [
//            'text1' => ['text', 'Text na stronie głównej']
        ]
    ];
    const VIDEO_SHOW = [
        'name' => 'video.show',
        'module' => false,
        'fields' => [
            'text1' => ['text', 'Text na stronie głównej']
        ]
    ];
    const ABOUT_US_SHOW = [
        'name' => 'about-us.show',
        'module' => false,
        'fields' => [
            'subheader_about_us' => ['head', 'Podtytuł - O nas'],
            'header_about_us' => ['head', 'Nagłówek - O nas'],
            'description_about_us' => ['text', 'Opis - O nas'],
        ]
    ];
    const CONTACT_SHOW = [
        'name' => 'contact.show',
        'module' => false,
        'fields' => [
            'subtitle_contact' => ['head', 'Podtytuł - Kontakt'],
            'header_contact' => ['head', 'Tytuł - Kontakt'],
            'description_contact' => ['text', 'Opis - Kontakt'],
        ]
    ];
    const ARTICLE_INDEX = [
        'name' => 'article.index',
        'module' => true,
        'fields' => [
            'text1' => ['text', 'Text na stronie głównej']
        ]
    ];
    const ARTICLE_CATEGORY_INDEX = [
        'name' => 'article_category.index',
        'module' => true,
        'fields' => [
            'text1' => ['text', '']
        ]
    ];
    const OFFER_INDEX = [
        'name' => 'offer.index',
        'module' => true,
        'fields' => [
            'text1' => ['text', '']
        ]
    ];
    const OFFER_CATEGORY_INDEX = [
        'name' => 'offer_category.index',
        'module' => true,
        'fields' => [
            'text1' => ['text', '']
        ]
    ];
    const REALIZATION_INDEX = [
        'name' => 'realization.index',
        'module' => true,
        'fields' => [
            'text1' => ['text', '']
        ]
    ];
    const REALIZATION_CATEGORY_INDEX = [
        'name' => 'realization_category.index',
        'module' => true,
        'fields' => [
            'text1' => ['text', '']
        ]
    ];


    static function getNames() : array {
        $class = new ReflectionClass(get_called_class());
        $types = array_values($class->getConstants());
        $names = [];
        foreach ($types as $type) {
            $names[] = $type['name'];
        }
        return $names;
    }

    static function getByName($name) : array {
        $class = new ReflectionClass(get_called_class());
        $types = array_values($class->getConstants());
        foreach ($types as $type) {
            if($type['name'] == $name)
                return $type;
        }
//        return $names;
    }
}
