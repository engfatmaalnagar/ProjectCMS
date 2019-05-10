<?php

use Illuminate\Database\Seeder;
use App\Models\Link;
class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //articles
        /*$link = Link::create(['title'=>'المقالات','icon'=>'flaticon-layers','parent_id'=>0]);
        Link::create(['title'=>'اضافة مقال جديد','route_name'=>'article.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة المقالات','route_name'=>'article.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'article.trash','icon'=>'','parent_id'=>$link->id]);
    
        //articles categories
        $link = Link::create(['title'=>'تصنيفات المقالات','icon'=>'fa fa-list-alt','parent_id'=>0]);
        Link::create(['title'=>'اضافة تصنيف جديد','route_name'=>'category.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة تصنيفات المقالات','route_name'=>'category.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'category.trash','icon'=>'','parent_id'=>$link->id]);
   
        //articles types
        $link = Link::create(['title'=>'أنواع المقالات','icon'=>'fa fa-align-justify','parent_id'=>0]);
        Link::create(['title'=>'اضافة نوع جديد','route_name'=>'type.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة أنواع المقالات','route_name'=>'type.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'type.trash','icon'=>'','parent_id'=>$link->id]);
    
        //writers
        $link = Link::create(['title'=>'الكتاب','icon'=>'fa fa-users','parent_id'=>0]);
        Link::create(['title'=>'اضافة كاتب جديد','route_name'=>'writers.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة الكتاب','route_name'=>'writers.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'writers.trash','icon'=>'','parent_id'=>$link->id]);

        //photos
        $link = Link::create(['title'=>'الصور','icon'=>'fa fa-list','parent_id'=>0]);
        Link::create(['title'=>'اضافة صورة جديدة','route_name'=>'photo.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة الصور','route_name'=>'photo.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'photo.trash','icon'=>'','parent_id'=>$link->id]);

        
        //photos categories
        $link = Link::create(['title'=>'تصنيفات الصور','icon'=>'fa fa-file-image','parent_id'=>0]);
        Link::create(['title'=>'اضافة تصنيف صورة جديد','route_name'=>'photo-category.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة تصنيفات الصور','route_name'=>'photo-category.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'photo-category.trash','icon'=>'','parent_id'=>$link->id]);

        
        //Videos
        $link = Link::create(['title'=>'الفيديو','icon'=>'fa fa-video','parent_id'=>0]);
        Link::create(['title'=>'اضافة فيديو جديد','route_name'=>'video.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة الصور','route_name'=>'video.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'video.trash','icon'=>'','parent_id'=>$link->id]);

        
        //Videos categories
        $link = Link::create(['title'=>'تصنيفات الفيديو','icon'=>'fa fa-file-video','parent_id'=>0]);
        Link::create(['title'=>'اضافة تصنيف فيديو جديد','route_name'=>'video-category.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة تصنيفات الصور','route_name'=>'video-category.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'video-category.trash','icon'=>'','parent_id'=>$link->id]);

        //adv
        $link = Link::create(['title'=>'الاعلانات','icon'=>'flaticon-laptop','parent_id'=>0]);
        Link::create(['title'=>'اضافة اعلان جديد','route_name'=>'adv.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة الاعلانات','route_name'=>'adv.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'adv.trash','icon'=>'','parent_id'=>$link->id]);

             
        //users
        $link = Link::create(['title'=>'المستخدمين','icon'=>'fa fa-user','parent_id'=>0]);
        Link::create(['title'=>'اضافة مستخدم جديد','route_name'=>'users.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة المستخدمين','route_name'=>'users.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'users.trash','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'صلاحيات المستخدم','route_name'=>'users.links','show_in_menu'=>0,'icon'=>'','parent_id'=>$link->id]);
        */
        
        //adv
       /* $link = Link::create(['title'=>'الشرائح','icon'=>'fa fa-desktop','parent_id'=>0]);
        Link::create(['title'=>'اضافة شريحة جديدة','route_name'=>'slider.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة الشرائح','route_name'=>'slider.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'slider.trash','icon'=>'','parent_id'=>$link->id]);

     
        //adv
        $link = Link::create(['title'=>'الصفحات الثابتة','icon'=>'fa fa-book-open','parent_id'=>0]);
        Link::create(['title'=>'اضافة صفحة ثابتة','route_name'=>'staticpage.create','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'ادارة الصفحات الثابتة','route_name'=>'staticpage.index','icon'=>'','parent_id'=>$link->id]);
        Link::create(['title'=>'سلة المهملات','route_name'=>'staticpage.trash','icon'=>'','parent_id'=>$link->id]);
*/

//writers
$link = Link::create(['title'=>'الاعضاء','icon'=>'fa fa-users','parent_id'=>0]);
Link::create(['title'=>'اضافة عضو جديد','route_name'=>'members.create','icon'=>'','parent_id'=>$link->id]);
Link::create(['title'=>'ادارة الاعضاء','route_name'=>'members.index','icon'=>'','parent_id'=>$link->id]);
Link::create(['title'=>'سلة المهملات','route_name'=>'members.trash','icon'=>'','parent_id'=>$link->id]);

    }
}
