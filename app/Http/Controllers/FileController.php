<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use App\Models\UploadedFile;

class FileController extends Controller
{
    public function uploadpage(Request $request)
    {
        // Fetch data from the database with the default sorting
        $data = UploadedFile::orderBy('name', 'asc')->paginate(10);

        return view('ojtCoordinator.upload', [
            'data' => $data,
            'order' => 'asc', // Default sorting order
            'sortedBy' => 'name', // Default sorted column
        ]);
    }


    public function uploadfile(Request $request)
    {
        
        $data=new UploadedFile();
	    $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $data->file=$filename;

        $data->name=$request->name;

        $data->save();

        return redirect()->back();

    }


    public function show(Request $request)
    {
        // Retrieve query parameters for sorting
        $column = $request->input('column', 'name'); // Default column to sort by
        $order = $request->input('order', 'asc'); // Default sorting order

        // Fetch data from the database and apply sorting
        $data = UploadedFile::orderBy($column, $order)->paginate(10);

        return view('ojtCoordinator.upload', [
            'data' => $data,
            'order' => $order,
            'sortedBy' => $column,
        ]);

    }

    public function download(Request $request, $file)
    {   
	    return response()->download(public_path('assets/'.$file));

    }


    public function view($id)
    {

        $data=UploadedFile::find($id);

        return view('ojtCoordinator.view',compact('data'));
    }

    

    public function remove($id)
    {

        $data=UploadedFile::find($id);
        $data->delete();
        return redirect()->back();
    }
    
    public function search(Request $request){

        if($request->search){
            $searchFile = UploadedFile::where('name', 'LIKE', '%'.$request->search. '%')->latest()->paginate(15);
            return view('ojtCoordinator.search',compact('searchFile'));
        }

        else{
            return redirect()->back()->with('message', 'Empty Search');
            
        }
    }
}
