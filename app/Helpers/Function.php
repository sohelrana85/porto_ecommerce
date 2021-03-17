<?php

use App\Models\Category;

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function setMessage($type, $message)
{
    session()->flash('type', $type);
    session()->flash('message', $message);
}

function getCategory($categories, $level = "", $root_cat = "")
{
    $output = "";
    foreach ($categories as $category) {
        if ($category->id == $root_cat) {
            $output .= '<option value = "' . $category->id . '" selected="">' . $category->name . '</option>';
        } else {
            $output .= '<option value = "' . $category->id . '">' . $category->name . '</option>';
        }
        if (count($category->sub_category)) {
            foreach ($category->sub_category as $sub_cat) {
                if ($sub_cat->id == $root_cat) {
                    $output .= '<option value="' . $sub_cat->id . '" selected="">' . $category->name . ' > ' . $sub_cat->name . '</option>';
                } else {
                    $output .= '<option value="' . $sub_cat->id . '">' . $category->name . ' > ' . $sub_cat->name . '</option>';
                }
                if ($level == 3) {
                    foreach ($sub_cat->sub_category as $sub_cat1) {
                        if ($sub_cat1->id == $root_cat) {
                            $output .= '<option value="' . $sub_cat1->id . '" selected="">' . $category->name . ' > ' . $sub_cat->name . ' > ' . $sub_cat1->name . '</option>';
                        } else {
                            $output .= '<option value="' . $sub_cat1->id . '">' . $category->name . ' > ' . $sub_cat->name . ' > ' . $sub_cat1->name . '</option>';
                        }
                    }
                }
            }
        }
    }
    return $output;
}

function color()
{
    return [
        '1' => 'White',
        '2' => 'Black',
        '3' => 'Yellow',
        '4' => 'Blue',
        '5' => 'Red'
    ];
}

function colorCode($name)
{
    switch ($name) {
        case 'White':
            return 'ffffff';
            break;
        case 'Black':
            return '000000';
            break;
        case 'Yellow':
            return 'FFFF00';
            break;
        case 'Blue':
            return '0000FF';
            break;
        case 'Red':
            return 'ff0000';
            break;
    }
}


function size()
{
    return [
        '1' => 'SM',
        '2' => 'M',
        '3' => 'L',
        '4' => 'XL',
        '5' => 'XXL'
    ];
}

function frontendCategories($categories)
{
    $output = "";
    $output .= '<ul class="menu menu-vertical sf-arrows">';
    foreach ($categories as $category) {
        $output .= '<li><a href = "javascript:avoid(0)" class = "sf-with-ul">' . $category->name . '</a>';

        if (count($category->sub_category)) {
            $output .= '<ul>';
            foreach ($category->sub_category as $sub_cat) {
                $output .= '<li><a href = "' . route('products', [$category->slug, $sub_cat->slug]) . '">' . $sub_cat->name . '</a>';

                if (count($sub_cat->sub_category)) {
                    $output .= '<ul>';
                    foreach ($sub_cat->sub_category as $sub_cat1) {
                        $output .= '<li><a href = "' . route('products', [$category->slug, $sub_cat->slug, $sub_cat1->slug]) . '">' . $sub_cat1->name . '</a>';
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                }

                $output .= '</li>';
            }
            $output .= '</ul>';
        }

        $output .= '</li>';
    }
    $output .= '</ul>';
    return $output;
}

function searchCategories($categories)
{
    $output = "";
    foreach ($categories as $category) {
        $output .= '<option value="">' . $category->name;
    }
    $output .= '</option>';
    return $output;
}
