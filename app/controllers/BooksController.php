<?php
/**
 * Created by PhpStorm.
 * User: maxi
 * Date: 3/18/17
 * Time: 8:07 PM
 */

namespace App\Controllers;


use App\Models\Book;
use Framework\Base\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;

class BooksController extends BaseController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('index', ['foo' => 'bar']);
    }

    /**
     * @return JsonResponse
     */
    public function get()
    {

        $totalRecords = Book::get()->count();

        $start = (int)$this->request->get('start');
        $itemPerPage = (int)$this->request->get('length');
        $pages = ceil($totalRecords / $itemPerPage);

        $page = $start / $itemPerPage;

        $books = Book::findBy($this->request->get('search'));

        if ($itemPerPage != -1) {
            $start = 0;
            //$books->forPage($page,  $itemPerPage);
        }


        $books = $books->toArray();
        $data = [];
        foreach ($books as $book) {
            $data[] = [
                'id' => $book['id'],
                'title' => $book['name'],
                'author' => $book['author']['name']
            ];
        }

        $response = new JsonResponse([
            'data' => $data,
            'draw' => intval($this->request->get('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'start' => 0
        ]);

        return $response->send();
    }
}