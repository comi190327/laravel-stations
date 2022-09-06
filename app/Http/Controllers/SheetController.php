<?php
namespace App\Http\Controllers;
use App\Models\Sheet;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\support\Facedes\DB;
use Exception;

class SheetController extends Controller
{
    public function index(Request $request)
    {
        $sheets = Sheet::all();
        return view('sheet', ['sheets' => $sheets]);
    }
}