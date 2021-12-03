<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MigrationsTables;
use Illuminate\Support\Facades\Artisan;
use Validator;

class GeneratorController extends Controller
{
    public function Generate(Request $request)
    {
    	$post = $request->input();

    	$validator = Validator::make($request->all(), [
            'name' => 'required',            
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }

        $name = explode(' ',$post['name']);
        foreach ($name as $key => $value) {
        	$name[$key] = ucfirst($value);
        }
        $name = implode(' ', $name);
        
        MigrationsTables::create([
          "name" => $name,
          "table" => str_replace(' ', '_', strtolower($name)),
        ]);
        
        $this->createModel($name,$post['field']);
        $this->createController($name,$post['field']);
        $this->createMigration($name,$post['field']);        
        $this->createStore($name,$post['field']);
        $this->createForm($name,$post['field']);
        $this->createIndex($name,$post['field']);
        $this->createRouteAPI($name,$post['field']);
        $this->createRouteFront($name,$post['field']);
        $this->createModule($name,$post['field']);
      //   $this->createNavigasi($name,$post['field']);

        Artisan::call('migrate');
        
        return response()->json(['status' => 'success'],200);
    }    
    public function createNavigasi($name='',$field)
    {
        //get route front
        $file = file_get_contents(base_path('resources/js/App.vue'));        
        
        $str = "{\n".
                    "to: '/[url_name]',\n".
                    "label: '[main_name]',\n".
                    "icon: 'table'\n".       
                "},\n".
                "// [navigasi]\n";
    
        $main_name = $name;
        $str = str_replace('[main_name]', $main_name, $str);    

        $url_name = strtolower(str_replace(' ', '-', $name));
        $str = str_replace('[url_name]', $url_name, $str);        
    
        // add in the bottom
        $file = str_replace('// [navigasi]', $str, $file);    


        $my_table = fopen(base_path("resources/js/App.vue"), "w") or die("Unable to open file!");    
        fwrite($my_table, $file);
        fclose($my_table);
    }
    public function createModule($name='',$field)
    {
        //get store index
        $file = file_get_contents(base_path('resources/js/store/index.js'));        
        

        $import = "import [import_name] from './modules/[import_name]'\n".
                "// [import]\n";
        $import_name = strtolower(str_replace(' ', '_', $name));
        $import = str_replace('[import_name]', $import_name, $import);
    
        $file = str_replace('// [import]', $import, $file);    
        
        $modules = "\n[modules_name],".
                "// [modules]";
        $modules_name = strtolower(str_replace(' ', '_', $name));
        $modules = str_replace('[modules_name]', $modules_name, $modules);
    
        $file = str_replace('// [modules]', $modules, $file);

        $my_table = fopen(base_path("resources/js/store/index.js"), "w") or die("Unable to open file!");    
        fwrite($my_table, $file);
        fclose($my_table);
    }
    public function createRouteFront($name='',$field)
    {
        //get route front
        $file = file_get_contents(base_path('resources/js/Layouts/Authenticated.vue'));        
        
        $str = '<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">'."\n".
                    "<BreezeNavLink ".':href="route('."'[url_name]'".')" '.":active=".'"route().current('."'[url_name]'".')"'.">".
                        "[main_name]".
                    "</BreezeNavLink>".
                "</div>\n".
                "<!-- [route] -->\n";
        $main_name = str_replace(' ', '', $name);            
        $str = str_replace('[main_name]', $main_name, $str);    
        $url_name = strtolower(str_replace(' ', '-', $name));
        $str = str_replace('[url_name]', $url_name, $str);        
        $file = str_replace('<!-- [route] -->', $str, $file);    

        $str = "<BreezeResponsiveNavLink ".':href="route('."'[url_name]'".')" '.":active=".'"route().current('."'[url_name]'".')"'.">".
                    "[main_name]".
                "</BreezeResponsiveNavLink>\n".
                "<!-- [routeResposive] -->\n";
        $main_name = str_replace(' ', '', $name);            
        $str = str_replace('[main_name]', $main_name, $str);    
        $url_name = strtolower(str_replace(' ', '-', $name));
        $str = str_replace('[url_name]', $url_name, $str);        
        $file = str_replace('<!-- [routeResposive] -->', $str, $file);    


        $my_table = fopen(base_path("resources/js/Layouts/Authenticated.vue"), "w") or die("Unable to open file!");    
        fwrite($my_table, $file);
        fclose($my_table);
    }
    public function createRouteAPI($name='',$field)
    {
        //get route api
        $file = file_get_contents(base_path('routes/web.php'));    

        $str = "// ".strtoupper($name)." \n".
                "Route::get('/dashboard/[url_name]', function () {
    return Inertia::render('[main_name]Index');
})->middleware(['auth', 'verified'])->name('[url_name]');
Route::get('/dashboard/[url_name]/form', function () {
    return Inertia::render('[main_name]Form');
})->middleware(['auth', 'verified'])->name('[main_name]Form');
Route::get('/dashboard/[url_name]/form/{id}', function (".'$id'.") {
    return Inertia::render('[main_name]Form',['id' => ".'$id'."]);
})->middleware(['auth', 'verified'])->name('[main_name]FormEdit');
Route::get('[url_name]', '[main_name]Controller@index');
Route::post('[url_name]', '[main_name]Controller@store');
Route::get('[url_name]/{id}', '[main_name]Controller@edit');
Route::put('[url_name]/{id}', '[main_name]Controller@update');
Route::delete('[url_name]/{id}', '[main_name]Controller@destroy');
Route::post('[url_name]/deletes', '[main_name]Controller@destroys');\n".
                "\n".
                "// [route]\n";

    
        $main_name = str_replace(' ', '', $name);            
        $str = str_replace('[main_name]', $main_name, $str);    

        $url_name = strtolower(str_replace(' ', '-', $name));
        $str = str_replace('[url_name]', $url_name, $str);        
    
        // add in the bottom
        $file = str_replace('// [route]', $str, $file);    


        $my_table = fopen(base_path("routes/web.php"), "w") or die("Unable to open file!");    
        fwrite($my_table, $file);
        fclose($my_table);
    }
    public function createIndex($name='',$field)
    {
        //get template migration
        $file = file_get_contents(base_path('Template/front/index.txt'));
        $file_name = str_replace(' ', '', $name.'Index.vue');        

        // main_name
        $main_name = str_replace(' ', '', $name);
        $file = str_replace('[main_name]', $main_name, $file);

        // api_name
        $api_name = strtolower(str_replace(' ', '-', $name));
        $file = str_replace('[url_name]', $api_name, $file);

        // state_name
        $state_name = strtolower(str_replace(' ', '_', $name));
        $file = str_replace('[state_name]', $state_name, $file);

        // info_name
        $info_name = $name;
        $file = str_replace('[info_name]', $info_name, $file);

        

        //  table_field
        $table_field = $field;
        $array_field = array();
        foreach ($table_field as $key => $row) {            
            array_push($array_field,"{key: '".strtolower(str_replace(' ', '_', $row['name']))."',field: '".$row['name']."'}");        
        }
        $table_field = implode(',
            ', $array_field);
        $file = str_replace('[table_field]', $table_field, $file);

        //  table_field_for_edit
        $table_field_for_edit = $field;
        $array_field_for_edit = array();
        foreach ($table_field_for_edit as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));            
            array_push($array_field_for_edit,"".$row['name'].": payload.".$row['name']."");
        }
        $table_field_for_edit = implode(',
            ', $array_field_for_edit);
        $file = str_replace('[table_field_for_edit]', $table_field_for_edit, $file);

        //  form_field
        $form_field = $field;
        
        if (!file_exists(base_path("resources/js/Pages/"))) {
            mkdir(base_path("resources/js/Pages/"), 0777, true);
        }
        $my_table = fopen(base_path("resources/js/Pages/".$file_name), "w") or die("Unable to open file!");    
        fwrite($my_table, $file);
        fclose($my_table);  
    }
    public function createForm($name='',$field)
    {
        //get template migration
        $file = file_get_contents(base_path('Template/front/form.txt'));
        $file_name = str_replace(' ', '', $name).'Form.vue';

        // main_name
        $main_name = str_replace(' ', '', $name);
        $file = str_replace('[main_name]', $main_name, $file);        

        // url_name
        $url_name = strtolower(str_replace(' ', '-', $name));
        $file = str_replace('[url_name]', $url_name, $file);

        // state_name
        $state_name = strtolower(str_replace(' ', '_', $name));
        $file = str_replace('[state_name]', $state_name, $file);

        // info_name
        $info_name = $name;
        $file = str_replace('[info_name]', $info_name, $file);        

        //  table_field_for_condition
        $table_field_for_condition = $field;
        $array_field_for_condition = array();
        foreach ($table_field_for_condition as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));            
            array_push($array_field_for_condition,"this.".$state_name."_errors.".$row['name']."== ''");
        }
        $table_field_for_condition = implode(' && ', $array_field_for_condition);
        $file = str_replace('[table_field_for_condition]', $table_field_for_condition, $file);

        //  form_field
        $form_field = $field;
        $array_field = array();
        foreach ($form_field as $key => $row) {            

            $row['name'] = explode(' ',$row['name']);
            foreach ($row['name'] as $key => $value) {
                $row['name'][$key] = ucfirst($value);
            }
            $row['name'] = implode(' ', $row['name']);

            switch ($row['type']) {
                case 'integer':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="number" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'boolean':
                    array_push($array_field, 
                        '<div class="col-span-5">
                            <Switch
                              v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'"
                              :class="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).' ? '."'bg-purple-700'".' : '."'bg-gray-400'".'"
                              class="relative inline-flex items-center h-6 rounded-full w-11"
                          >
                              <span class="sr-only">Enable notifications</span>
                              <span
                              :class="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).' ? '."'translate-x-6'".' : '."'translate-x-1'".'"
                              class="inline-block w-4 h-4 transform bg-white rounded-full transition duration-200 ease-in-out"
                              />
                          </Switch>
                          <span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>
                        </div>'."\n"
                    );                    
                    break;
                case 'date':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="date" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;                
                case 'string':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="text" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'text':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<textarea type="text" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'" />'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'tinyInteger':
                    array_push($array_field, 
                        '<div class="col-span-5">
                            <Switch
                              v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'"
                              :class="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).' ? '."'bg-purple-700'".' : '."'bg-gray-400'".'"
                              class="relative inline-flex items-center h-6 rounded-full w-11"
                          >
                              <span class="sr-only">Enable notifications</span>
                              <span
                              :class="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).' ? '."'translate-x-6'".' : '."'translate-x-1'".'"
                              class="inline-block w-4 h-4 transform bg-white rounded-full transition duration-200 ease-in-out"
                              />
                          </Switch>
                          <span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>
                          
                        </div>'."\n"
                    ); 
                    break;
                case 'dateTime':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="datetime-local" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'char':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="text" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );                    
                    break;
                case 'ipAddress':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="text" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'longText':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="text" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'json':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<textarea type="text" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'" />'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'macAddress':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="text" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'time':
                    array_push($array_field, 
                        '<div class="col-span-8">'."\n".
                            '<label label="'.$row['name'].'" class="block text-sm font-medium text-gray-700">'."\n".$row['name'].'</label>'."\n".
                            '<input type="time" class="input" placeholder="Input '.$row['name'].'" v-model="'.$state_name.'.'.strtolower(str_replace(' ', '_', $row['name'])).'">'."\n".
                            '<span class="mt-1 text-xs text-red-600 font-bold" v-if="'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'">{{'.$state_name.'_errors.'.strtolower(str_replace(' ', '_', $row['name'])).'}}</span>'."\n".
                        '</div>'."\n"
                    );
                    break;
                case 'timestamp':                    
                    break;            
                default:                    
                    break;
            }
        }
        $form_field = implode('
            ', $array_field);
        $file = str_replace('[form_field]', $form_field, $file);

        if (!file_exists(base_path("resources/js/Pages/"))) {
            mkdir(base_path("resources/js/Pages/"), 0777, true);
        }
        $my_table = fopen(base_path("resources/js/Pages/".$file_name), "w") or die("Unable to open file!");    
        fwrite($my_table, $file);
        fclose($my_table);  
    }
    public function createStore($name='',$field)
    {
        //get template migration
        $file = file_get_contents(base_path('Template/front/store.txt'));
        $file_name = strtolower(str_replace(' ', '_', $name).'.js');        

        // main_name
        $main_name = str_replace(' ', '', $name);
        $file = str_replace('[main_name]', $main_name, $file);

        // api_name
        $api_name = strtolower(str_replace(' ', '-', $name));
        $file = str_replace('[api_name]', $api_name, $file);

        // state_name
        $state_name = strtolower(str_replace(' ', '_', $name));
        $file = str_replace('[state_name]', $state_name, $file);

        // info_name
        $info_name = $name;
        $file = str_replace('[info_name]', $info_name, $file);

        //  table_field
        $table_field = $field;
        $array_field = array();
        foreach ($table_field as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));            
            array_push($array_field,"".$row['name'].": ''");
        }
        $table_field = implode(',
            ', $array_field);
        $file = str_replace('[table_field]', $table_field, $file);

        //  field_error
        $field_error = $field;
        $array_error = array();
        foreach ($field_error as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));            
            array_push($array_error,"
                if (payload.".$row['name'].") {
                    state.".$state_name."_errors.".$row['name']." = payload.".$row['name']."[0]
                }
                ");
        }
        $field_error = implode('', $array_error);
        $file = str_replace('[field_error]', $field_error, $file);

        //  table_field_for_edit
        $table_field_for_edit = $field;
        $array_field_for_edit = array();
        foreach ($table_field_for_edit as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));            
            array_push($array_field_for_edit,"".$row['name'].": payload.".$row['name']."");
        }
        $table_field_for_edit = implode(',
            ', $array_field_for_edit);
        $file = str_replace('[table_field_for_edit]', $table_field_for_edit, $file);


        $my_table = fopen(base_path("resources/js/store/modules/".$file_name), "w") or die("Unable to open file!");    
        fwrite($my_table, $file);
        fclose($my_table);  
    }

    public function createModel($name='',$field)
    {
    	//get template migration
    	$file = file_get_contents(base_path('Template/model.txt'));
    	$file_name = str_replace(' ', '', $name).'.php';
    	
    	// class_name
	    $class_name = str_replace(' ', '', $name);
	    $file = str_replace('[class_name]', $class_name, $file);

	    // table_name
	    $table_name = str_replace(' ', '_', strtolower($name));
	    $file = str_replace('[table_name]', $table_name, $file);

		//  table_field
		$table_field = $field;
    	$array_field = array();
    	foreach ($table_field as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));            
	    	array_push($array_field,"'".$row['name']."'");
    	}
    	$table_field = implode(',
    		', $array_field);
	    $file = str_replace('[table_field]', $table_field, $file);


    	$my_table = fopen(base_path("app/Models/".$file_name), "w") or die("Unable to open file!");	
		fwrite($my_table, $file);
		fclose($my_table);	
    }

    // membuat controller otomatis
    // require class_name model_name table_field variable_name 
    public function createController($name='',$field)
    {
		//get template migration
    	$file = file_get_contents(base_path('Template/controller.txt'));
    	$file_name = str_replace(' ', '', $name).'Controller.php';
    	
    	// class_name
	    $class_name = str_replace(' ', '', $name).'Controller';
	    $file = str_replace('[class_name]', $class_name, $file);

	    // model_name
	    $model_name = str_replace(' ', '', $name);
	    $file = str_replace('[model_name]', $model_name, $file);

	    // variable_name
	    $variable_name = str_replace(' ', '', strtolower($name));
	    $file = str_replace('[variable_name]', $variable_name, $file);

		//  table_field
		$table_field = $field;
    	$array_field = array();
    	foreach ($table_field as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));            
	    	array_push($array_field, "'".$row['name']."' => 'required'");
    	}
    	$table_field = implode(',
    		', $array_field);
	    $file = str_replace('[table_field]', $table_field, $file);

        //  table_search
        $table_search = $field;
        $array_search = array();
        foreach ($table_search as $key => $row) {
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));
            if ($key == 0) {
                array_push($array_search,"$"."data = $"."data->where('".$row['name']."','like','%'.$"."get['search'].'%');");
            }else{
                array_push($array_search,"$"."data = $"."data->orWhere('".$row['name']."','like','%'.$"."get['search'].'%');");
            }        
        }
        $table_search = implode('
            ', $array_search);
        $file = str_replace('[table_search]', $table_search, $file);


    	$my_table = fopen(base_path("app/Http/Controllers/".$file_name), "w") or die("Unable to open file!");	
		fwrite($my_table, $file);
		fclose($my_table);		
    }

    // membuat table otomatis
    // require class_name table_name table_field
    public function createMigration($name='',$field)
    {
    	//get template migration
    	$file = file_get_contents(base_path('Template/migration.txt'));
    	$file_name = date('Y_m_d_hisa').'_create_'.str_replace(' ', '_', strtolower($name)).'_table.php';
    	
    	// class_name
	    $class_name = 'Create'.str_replace(' ', '', $name).'Table';
	    $file = str_replace('[class_name]', $class_name, $file);

	    // table_name
	    $table_name = str_replace(' ', '_', strtolower($name));
	    $file = str_replace('[table_name]', $table_name, $file);

		//  table_field
		$table_field = $field;
    	$array_field = array();
    	foreach ($table_field as $key => $row) {    		
            $row['name'] = strtolower(str_replace(' ', '_', $row['name']));
	    	switch ($row['type']) {
	    		case 'integer':
	    			array_push($array_field, "$"."table->integer('".$row['name']."');");
	    			break;
	    		case 'boolean':
	    			array_push($array_field, "$"."table->boolean('".$row['name']."');");
	    			break;
	    		case 'date':
	    			array_push($array_field, "$"."table->date('".$row['name']."');");
	    			break;	    		
	    		case 'string':
	    			array_push($array_field, "$"."table->string('".$row['name']."',".$row['length'].");");
	    			break;
	    		case 'text':
	    			array_push($array_field, "$"."table->text('".$row['name']."');");
	    			break;
                case 'tinyInteger':
                    array_push($array_field, "$"."table->tinyInteger('".$row['name']."');");
                    break;
                case 'dateTime':
                    array_push($array_field, "$"."table->dateTime('".$row['name']."');");
                    break;
                case 'char':
                    array_push($array_field, "$"."table->char('".$row['name']."',".$row['length'].");");                    
                    break;
                case 'ipAddress':
                    array_push($array_field, "$"."table->ipAddress('".$row['name']."');");
                    break;
                case 'longText':
                    array_push($array_field, "$"."table->longText('".$row['name']."');");
                    break;
                case 'json':
                    array_push($array_field, "$"."table->json('".$row['name']."');");
                    break;
                case 'macAddress':
                    array_push($array_field, "$"."table->macAddress('".$row['name']."');");
                    break;
                case 'time':
                    array_push($array_field, "$"."table->time('".$row['name']."');");
                    break;
                case 'timestamp':
                    array_push($array_field, "$"."table->timestamp('".$row['name']."');");
                    break;            
	    		default:	    			
	    			break;
	    	}
    	}
    	$table_field = implode('
    		', $array_field);
	    $file = str_replace('[table_field]', $table_field, $file);


    	$my_table = fopen(base_path("database/migrations/".$file_name), "w") or die("Unable to open file!");	
		fwrite($my_table, $file);
		fclose($my_table);				
	}
}
