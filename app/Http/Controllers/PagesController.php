<?php
namespace App\Http\Controllers;

use App\Models\Parts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    public $errors;

    public function home()
    {
         $tasks = array(
            'task1' => array (
              'title' => 'This is the first task that i have created for an example',
                'desc' => 'This is a description'
                ),
            'task2' => array (
                'title' => 'This is the second task that i have created for an example',
                'desc' => 'This is a description'
            ),
            'task3' => array (
                'title' => 'This is the third task that i have created for an example',
                'desc' => 'This is a description'
            ),
    );
        return view('welcome')->with('tasks', $tasks);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function sandbox()
    {
        return view('sandbox');
    }

    public function game()
    {
        return view('monster-hunter');
    }

    public function crudedit()
    {
        return view('crudapp.crudedit', [
            'parts' => Parts::Paginate(10)
        ]);
    }

    public function editpart(Parts $part)
    {
        return view('crudapp.edit', [
            'part' => $part
        ]);
    }
    public function editparts()
    {
        if(request()->input('page')){
            $pagenum = request()->input('page');
        }else{
            $pagenum = 1;
        }
            $pagenum  = $pagenum * 10;
            $limit = $pagenum - 10;
        if($pagenum === 10){
            return view('crudapp.edit_parts', [
                'parts' => Parts::all()->take(10)
            ]);
        }else{
            return view('crudapp.edit_parts', [
                'parts' => Parts::all()->skip($limit)->take(10)
            ]);
        }
    }

    public function search(Request $request){
        if($request->input('partnum')){
            $part = $request->input('partnum');
            $result =
                Parts::where('part_num', $part)
                    ->orWhere('part_num', 'LIKE', '%' . $part . '%')
                    ->get();
        }elseif($request->input('location') && $request->input('partselect')){

            if($request->input('location') != 'Filter By Location'){
                $location = $request->input('location');
            }
            if($request->input('partselect') != 'Filter By Part Number'){
                $partnum = $request->input('partselect');
            }
            if(isset($partnum) && isset($location)){
                $result = Parts::Paginate(10)->where('location', $location)->where('part_num', $partnum);
            }elseif(isset($partnum)){
                $result = Parts::Paginate(10)->where('part_num', $partnum);
            }elseif(isset($location)){
                $result = Parts::Paginate(10)->where('location', $location);
            }
        }
        if(isset($result)){
            return view('crudapp')->with('parts', $result)->with('succ', 'true');
        }
        return view('crudapp', [
            'parts' => Parts::Paginate(10)
        ])->with('fail', 'true');
    }

    public function stockdata(){
        return Parts::select('location', 'part_num')->get();
    }

    public function updatemany(Request $request)
    {
        $validator = $request->validate([
            '*' => 'required',
        ]);

        if(request()->input('page')){
            $pagenum = request()->input('page');
        }else{
            $pagenum = 1;
        }
        $pagenum  = $pagenum * 10;
        $limit = $pagenum - 10;

        if($pagenum === 10){
            $ids = Parts::select('id')->get()->take(10);
        }else{
            $ids = Parts::select('id')->get()->skip($limit)->take(10);
        }

        $idlist = '';
        foreach($ids as $id){
            $idlist = $idlist . ',' . $id->id;
        }
        $idlist = substr($idlist, 1);
        $ids = explode(",", $idlist);
        foreach($ids as $id){
            $part = Parts::find($id);
            $part->part_num = $request->input('part_num_' . $id);
            $part->part_description = $request->input('part_description_' . $id);
            $part->location = $request->input('location_' . $id);
            $part->stock = $request->input('stock_' . $id);
            $part->update();
            unset($part);
        }

        return redirect()->back()->with('message', 'Parts Updated!');
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            '*' => 'required',
        ]);

        $part = Parts::find($id);
        $part->part_num = $request->input('part_num');
        $part->part_description = $request->input('part_description');
        $part->location = $request->input('location');
        $part->stock = $request->input('stock');
        $part->update();
        return redirect()->back()->with('message', 'Part Updated!');
    }

    public function delete(Request $request, $id)
    {
        $part = Parts::find($id);
        $part->delete();
        return redirect()->back()->with('message', 'Part Removed!');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            '*' => 'required',
        ]);
        $part = new Parts;
        $part->part_num = $request->input('part_num');
        $part->part_description = $request->input('part_description');
        $part->location = $request->input('location');
        $part->stock = $request->input('stock');
        $part->save();
        return redirect()->back()->with('message', 'Part Added!');
    }

    public function crudcreate()
    {
        return view('crudapp.crudcreate');
    }

    public function crudapp()
    {

        return view('crudapp', [
            'parts' => Parts::Paginate(10)
        ]);
    }
}
