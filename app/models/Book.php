<?php
/**
 * Created by PhpStorm.
 * User: maxi
 * Date: 3/19/17
 * Time: 9:52 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }

    public static function findBy($globalSearch)
    {

        if (!empty($globalSearch['value'])) {
            $q = self::
                select('books.*')
                ->where('books.name', 'LIKE', '%'.$globalSearch['value'].'%')
                ->join('authors', 'authors.id', '=', 'books.author_id')
                ->orWhere('authors.name', 'LIKE', '%'.$globalSearch['value'].'%');
            return $q->get();
        }

        return self::get();
        
    }
}