   public function project_store(Request $req)                             // store Projects
    {
        $title = $req->input('title');
        $body = $req->input('body');

        $file = $req->file('image');
        $file1 = $req->file('image1');

        $array  = array($file,$file1);

        if($req->hasFile('image')){
          $arr_len = count($file);

          for($i=0; $i<$arr_len; $i++){
            $destinationPath = 'public/project-images/';
            $size[$i] = $file[$i]->getSize();
            if($size[$i] < 200000){

              $originalFile[$i] = $file[$i]->getClientOriginalName();
              $file[$i]->move($destinationPath, $originalFile[$i]);
            }
            else
            {
              return redirect('/add')->with('image_error', 'large'); 
            }
          }
        }

        if($req->hasFile('image1')){
          $arr_len1 = count($file1);
          for($i=0; $i<$arr_len1; $i++){

            $destinationPath = 'public/project-images/';

            $size1[$i] = $file1[$i]->getSize();
            if($size1[$i] < 200000){

              $originalFile1[$i] = $file1[$i]->getClientOriginalName();
              $file1[$i]->move($destinationPath, $originalFile1[$i]);

            }
            else{return redirect('/add')->with('image_error', 'large'); }

          } 
        }

        $user_id = auth()->user()->id;

        foreach($title as $item=>$v){
  

          if($file == NULL && $file1 == NULL){
            $data = array('title' => $title[$item], 'body' => $body[$item], 'user_id' => $user_id);
          }

          elseif($file == NULL){
            $data = array('title' => $title[$item], 'body' => $body[$item],'image1' => $originalFile1[$item], 'user_id' => $user_id);
          }
     
          elseif($file1 == NULL){
            $data = array('title' => $title[$item], 'body' => $body[$item],'image' => $originalFile[$item], 'user_id' => $user_id);
          }

          elseif($file != NULL && $file1 != NULL){
            
            $data = array('title' => $title[$item], 'body' => $body[$item], 'image' => $originalFile[$item],'image1' => $originalFile1[$item], 'user_id' => $user_id);
          }


          DB::table('projects')->insert($data);
        }

        session()->flash('project_success', 'Data has been saved successfully !'); 

        return redirect('/add#project-form');

       
    }