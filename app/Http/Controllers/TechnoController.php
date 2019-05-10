<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\StaticPage;
use App\Models\Slider;
use App\Models\Type;
use App\Models\Category;
use App\Models\Video;
use App\Models\PhotoCategory;
use App\Models\VideoCategory;
use App\Models\Adv;

class TechnoController extends Controller
{
    public function index()
    {
       // $sliders = Slider::where("deleted",0)->where("active",1)->inRandomOrder()->take(5)->get();
        
        return view('home');
    }
    public function articles(Request $request)
    {
        $types=Type::get();
        $categories=Category::get();
        $q = $request->q;
        $category=$request->category;
        $types_id=$request->types_id;
        $order_by = $request->order_by;
        $items = Article::whereRaw("deleted = 0 and published = 1");
        if($q){
            $items->whereRaw("(title like ? or sub_title like ?)", ["%$q%","%$q%"]);
        }
        if($category){
            $items->where("categories_id", $category);
        }
        if($types_id){
            $items->where("types_id", $types_id);
        }  
        $orderBy = 'id'; $orderByDirection = 'desc';
        if($order_by=='1'){
            $orderBy = 'id'; $orderByDirection = 'desc';
        }
        else if($order_by=='2'){
            $orderBy = 'id'; $orderByDirection = 'asc';
        }
        else if($order_by=='3'){
            $orderBy = 'title'; $orderByDirection = 'asc';
        }
        else if($order_by=='4'){
            $orderBy = 'title'; $orderByDirection = 'desc';
        }
        $items =  $items->orderBy($orderBy, $orderByDirection)->paginate(21)->appends([
            "q" => $q,
            'category' =>$category,
            'order_by' =>$order_by,
            'type' => $types_id
        ]);
        return view("Techno.articles", compact("items","types","categories"));
      
    }
    public function article($id)
    {
        $item = Article::find($id);
        if(!$item || $item->deleted || !$item->published){
            return redirect(route("home"));
        }
        $otherArticles = Article::where('deleted',0)
            ->where('published',1)
            ->where('id','!=',$id)
            ->orderBy('id','desc')
            ->take(3)->get();
        return view('Techno.article')->withItem($item)->withArticles($otherArticles);
    }
    public function videos(Request $request)
    {
        $q = $request->q;
        $order_by = $request->order_by;
        $items = VideoCategory::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }
        $orderBy = 'id'; $orderByDirection = 'desc';
        if($order_by=='1'){
            $orderBy = 'id'; $orderByDirection = 'desc';
        }
        else if($order_by=='2'){
            $orderBy = 'id'; $orderByDirection = 'asc';
        }
        else if($order_by=='3'){
            $orderBy = 'name'; $orderByDirection = 'asc';
        }
        else if($order_by=='4'){
            $orderBy = 'name'; $orderByDirection = 'desc';
        }
        $items =  $items->orderBy($orderBy, $orderByDirection)->paginate(21)->appends([
            "q" => $q,
            'order_by' =>$order_by
        ]);
        return view("Techno.videos", compact("items"));
    }
    public function video($id)
    {
        return view('Techno.video');
    }
    public function photos(Request $request)
    {
        $q = $request->q;
        $order_by = $request->order_by;
        $items = PhotoCategory::whereRaw("deleted = 0 and published=1 and id in (select photo_categories_id from photos where deleted=0 and published=1)");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }
        $orderBy = 'id'; $orderByDirection = 'desc';
        if($order_by=='1'){
            $orderBy = 'id'; $orderByDirection = 'desc';
        }
        else if($order_by=='2'){
            $orderBy = 'id'; $orderByDirection = 'asc';
        }
        else if($order_by=='3'){
            $orderBy = 'name'; $orderByDirection = 'asc';
        }
        else if($order_by=='4'){
            $orderBy = 'name'; $orderByDirection = 'desc';
        }
        $items =  $items->orderBy($orderBy, $orderByDirection)->paginate(21)->appends([
            "q" => $q,
            'order_by' =>$order_by
        ]);
        return view("Techno.photos", compact("items"));
    }
    public function photo($id)
    {
        $item = PhotoCategory::find($id);
        if(!$item || $item->deleted || !$item->published){
            return redirect(route("hom"));
        }
        return view('Techno.photo')->withItem($item);
    
    }
    public function page($id)
    {
        $item = StaticPage::find($id);
        if(!$item || $item->deleted || !$item->active){
            return redirect(route("home"));
        }
        return view('Techno.page')->withItem($item);
    }

    public function pages()
    {
        $item = StaticPage::get();
        if(!$item || $item->deleted || !$item->active){
            return redirect(route("home"));
        }
        return view('Techno.page')->withItem($item);
    }
    public function contact()
    {
        return view('Techno.contact');
    }
    public function about()
    {
        return view('Techno.about');
    }
    public function adv($id)
    {
        $item = Adv::find($id);
        if(!$item || $item->deleted || !$item->published){
            return redirect(route("home"));
        }
        return view('Techno.adv')->withItem($item);
    
    }
}
