<?php

namespace App\Http\Controllers;

use App\Board;
use App\Category;
use Illuminate\Http\Request;

class BoardController extends Controller
{

    public function index()
    {
        $boards = Board::all();
        foreach($boards as $board) {
            $categories[$board->name] = Category::where('board',$board->id)->get();
        }

        return view('boards',[
            'boards' => $boards,
            'categories' => $categories
        ]);

    } 

}