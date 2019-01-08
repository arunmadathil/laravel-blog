<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth:web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	return view('admin.settings.index');
    }

    public function store(Request $request)
    {

    	$img_logo_url = '';
       
    	if($request->logo_reference =='' || $request->hasFile('logo'))
    	{
    		if($request->hasFile('logo'))
    		{
    			$img = $request->file('logo');
    			if($img->move('logo',$img->getClientOriginalName()))
    			{
    				$img_logo_url = '/logo/'.$img->getClientOriginalName();
    			} 
    		}
    		else
    		{
    			$img_logo_url = $request->logo_reference;
    		}

    	}
    	else
    	{
    		$img_logo_url = $request->logo_reference;
    	}




    	$array = ['country' =>4];
    	$fp = fopen(base_path() .'/config/settings.php' , 'w');
    	fwrite($fp, "<?php 
    		return 
    		[
    		'general' => [
    		'site_name' =>'".$request->name."',
    		'logo' =>'".$img_logo_url."',
    		'font'=>'fon'
    		],

    	];");
    	fclose($fp);


    	return redirect()->route('admin.settings');

    } 
}
?>