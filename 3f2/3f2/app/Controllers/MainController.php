<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
use App\Models\MainModel2;

class MainController extends BaseController
{
    public function test()
    {
        $j = new MainModel();
        $data['main'] = $j ->findAll();
        //var_dump($data);

        return view('main', $data);
    }
    public function save()
    {
        $main = new MainModel();
        $id =$this->request->getPost('id');
        $data =[
            'StudName' => $this->request->getPost('StudName'),
            'StudGender' => $this->request->getPost('StudGender'),
            'StudCourse' => $this->request->getPost('StudCourse'),
            'StudSection' => $this->request->getPost('StudSection'),
            'StudYear' => $this->request->getPost('StudYear'),
        ];
        if(isset($id)){
            $main->set($data)->where('id', $id)->update();
        }else{
            $main->save($data);
        }
        
        return redirect()->to('/test');
    }
    
    public function delete($id)
    {
        $main = new MainModel();
        $main->delete($id);
        return redirect()->to('/test');
    }

public function updates(){
  
    $data =[
        'StudId' => $this->request->getPost('StudId'),
        'StudName' => $this->request->getPost('StudName'),
        'StudGender' => $this->request->getPost('StudGender'),
        'StudCourse' => $this->request->getPost('StudCourse'),
        'StudSection' => $this->request->getPost('StudSection'),
        'StudYear' => $this->request->getPost('StudYear'),
    ];
    $main = new MainModel();
    $main->set($data)->where('id', $id)->update();
    return redirect()->to('/test');
}
public function update($id)
{
    $main = new MainModel();
    
    $data = [ 
        'd'=> $main->where('id', $id)->first(),
        'main' => $main -> findAll(),
        'tt' => 'update'
    ];
    return view('main', $data);
}
}
