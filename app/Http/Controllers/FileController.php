<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FileController extends Controller
{


    public function upload(Request $request)
    {

        if($request->hasfile('files'))  {

            foreach($request->file('files') as $file) {
                $file_name = $file->getClientOriginalName();
                $file->move(storage_path().'/file/', $file_name);
            }

            return redirect('/file')->with('status', 'File successfully uploaded');
        }

        return redirect('/file')->with('status', 'file failed to load');
    }

    public function download()
    {
        $d = storage_path('/file/');

        $last_file = $this->scan_dir($d);

        if (!empty($last_file)) {
            $file = storage_path('/file/' . $last_file[0]);

            return response()->download($file);
        }

        return '<h2 style="text-align: center; color: red">Not file</h2>';
    }


    public function scan_dir($dir) {
        $ignored = array('.', '..', '.svn', '.htaccess');

        $files = array();
        foreach (scandir($dir) as $file) {
            if (in_array($file, $ignored)) continue;
            $files[$file] = filemtime($dir . '/' . $file);
        }

        arsort($files);
        $files = array_keys($files);

        return ($files) ? $files : false;
    }
}
