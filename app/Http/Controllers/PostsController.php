<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use View;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post= Posts::all();       
        return view("blog1.index",[
            'post' => $post                      
        ]);
        //نوع بيانات من لارفيل بمثابه مصفوفه تقريبا ويدعى كوليكشن وهذا النوع المصفوفي هو عبارة عن نوع بيانات مستخدم لجلب البيانات 
       //  $post : الكوليكشن الي جايبلي بيانات من القاعدة 
       //  post  :  البيانات الي جبتها من القاعدة كلها صارت موجودة ضمن متغير اسمه بي او  هههههاي
    }

    /**  
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("blog1.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        // var_dump($req);
        // dd($req);
        $req->validate([                 //شغلتا التحقق من البيانات التي يتم ارسال عن طريق ريكويست وبوسعي افرض تعديلات على البيانات 
            'title' => 'required|max:255|unique:posts,title',
            'body' => 'required'
            // 'image'=>'nullable|image| max:2048|mimes:png,jpg,jpeg,svg,gif,'
        ]);

       

        $posts= new posts;
        $posts->title = $req->title;
        $posts->body = $req->body;
        // $posts->imge= $req->imge;


         // if($req->hasFile('image')) 
        // {
        //     $imageName = time().'.'.$req->image->extension();
        //     $req->image->move(public_path('images'),$imageName );
        //     $posts->image=$imageName;
        // }

        $posts->save();


        //or
        // Posts::create([
        //     'title' => $req->title,
        //      'body' => $req->body
        // ]);
        return redirect()->route('blog1.index')->with('post_created','the post has been created successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(posts $posts)
    {
        //$post=Posts::where('id', $posts->id); 
        //مافي داعي لهدا السطر شان حدد اي اي دي  بدي اخدها لانو الفي شي اسمه باللارفيل اسمه موديل رايت بايدنج فيه او بقوم بتحويل ال اي دي الى اوبجكت زهيك باحده نفسه ا
        
        return view('blog1.show',[
            'post' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(posts $posts)                                  
    {
        echo view('blog1.edit',[
            'post' => $posts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, posts $posts)
    {
        $req->validate([                 //شغلتا التحقق من البيانات التي يتم ارسال عن طريق ريكويست وبوسعي افرض تعديلات على البيانات 
            'title' => 'required|max:255',
            'body' => 'required|max:2000'
        ]);

        
         
         if($req->hasFile('image')) 
        {
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('images'),$imageName );
            $posts->update([
                'title' => $req->title,
                'body' => $req->body,
                'image'=>$imageName
             ]);
        }else{
            $posts->update([
                'title' => $req->title,
                 'body' => $req->body
             ]);
        }


         return to_route('blog.show',$posts);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(posts $posts)
    {
        $posts->delete();
        return to_route('blog.index')->with('post_deleted','the post has been deleted successfully');
    }
}
