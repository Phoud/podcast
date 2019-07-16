<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category, App\blog, App\magazine;
use App\webimage, App\formcontact, App\contact, App\video;
use App\tag;
use App\Media;
use App\Guest, App\PostTag, App\GuestPost;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('usermiddleware:super_admin,admin');
    }
    public function index()
    {
        $medias = Media::all();
        $mags = magazine::all();
        $users = User::where('Usertype', 'member')->get();
        $news = blog::all();
        $contacts = formcontact::all();
        return view('admin.pages.index', compact('medias', 'mags', 'users', 'news', 'contacts'));
    }
    public function types()
    {
        $category = category::orderBy('id', 'desc')->get();
        return view('admin.pages.type')->with('categorys', $category);
    }
    public function admin_blogs()
    {
        $blogs = blog::orderBy('id', 'desc')->get();
        return view('admin.pages.blog.blog', compact('blogs'));
    }
    public function admin_magazines()
    {
        $show_magazine = magazine::orderBy('id', 'desc')->get();
        return view('admin.pages.magazine.magazine')->with('show_magazines', $show_magazine);
    }
    public function getAddMagazine(){
        return view('admin.pages.magazine.add');
    }
    public function admin_logo_websites()
    {
        $show_webimage = webimage::first();
        return view('admin.pages.logo_web')->with('show_webimages', $show_webimage);
    }
    public function admin_form_contacts()
    {
        $show_formcontact = formcontact::orderBy('id', 'desc')->get();
        return view('admin.pages.form_contact')->with('show_formcontacts', $show_formcontact);
    }
    public function admin_contacts()
    {
        $show_contact = contact::first();
        return view('admin.pages.contact')->with('show_contacts', $show_contact);
    }
    

    # Insert Data Types
    public function insert_types(Request $request)
    {
        $insert_type = new category;
        $insert_type->name = $request->typename;
        $insert_type->save();
        return back();
    }
    public function edit_typess(Request $request, $id)
    {
        $edit_type = category::findOrfail($id);
        $edit_type->name = $request->typename;
        $edit_type->save();
        return back();
    }
    public function delete_types($id)
    {
        $delete_type = category::findOrfail($id);
        $delete_type->delete();
        return back();
    }


    public function getAddNews(){
        $tags = tag::all();
        return view('admin.pages.blog.add', compact('tags'));
    }
    # Insert Data Blog
    public function insert_blogs(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
            'body' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admins/blog/', $name);
            $save = new blog;
            $save->title = $request->title;
            $save->body = $request->body;
            $save->image = $name;
            $save->save();

            $tags = $request->tags;
            if(isset($tags) && is_array($tags) && count($tags) > 0){
                $oldtags = [];
                $newtags = [];
                foreach($tags as $key => $tag){
                    if(is_numeric($tag)){
                        $oldtags[] = $tag;
                    }else{
                        $newtags[] = $tag;
                    }
                }
                #insert new tag
                if(count( $newtags ) > 0){
                    foreach($newtags as $newtag){
                        $dbtag = tag::where('name', $newtag)->first();
                        if(!isset($dbtag)){
                            $oldtags[] = tag::insertGetId([
                                'name'=> $newtag,
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now()
                            ]);
                        }
                    }
                }
            //save all user input tag
                if(count( $oldtags ) > 0){
                    foreach($oldtags as $oldtag){
                        $save->tags()->save(new PostTag([
                            'tag_id' => $oldtag
                        ]));
                    }
                }
            }
            return redirect()->route('admin.blog');

        }

    }

    public function getUpdateNews($id){
        $updates = blog::findOrfail($id);
        $tags = tag::all();
        return view('admin.pages.blog.update', compact('updates', 'tags'));
    }
        
    public function edit_blogs(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
         $save = blog::findOrfail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admins/blog/', $name);
            
            $save->title = $request->title;
            $save->body = $request->body;
            $save->image = $name;
            $save->save();
        }else{
            $save->title = $request->title;
            $save->body = $request->body;
            $save->save();
            
        }
        $save->tags()->delete();
          $tags = $request->tags;
            if(isset($tags) && is_array($tags) && count($tags) > 0){
                $oldtags = [];
                $newtags = [];
                foreach($tags as $key => $tag){
                    if(is_numeric($tag)){
                        $oldtags[] = $tag;
                    }else{
                        $newtags[] = $tag;
                    }
                }
                #insert new tag
                if(count( $newtags ) > 0){
                    foreach($newtags as $newtag){
                        $dbtag = tag::where('name', $newtag)->first();
                        if(!isset($dbtag)){
                            $oldtags[] = tag::insertGetId([
                                'name'=> $newtag,
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now()
                            ]);
                        }
                    }
                }
            //save all user input tag
                if(count( $oldtags ) > 0){
                    foreach($oldtags as $oldtag){
                        $save->tags()->save(new PostTag([
                            'tag_id' => $oldtag
                        ]));
                    }
                }
            }
        return redirect()->route('admin.blog');
    }
    public function delete_blogs($id)
    {
        $delete_blog = blog::findOrfail($id);
        $delete_blog->delete();
        return back();
    }

    public function insert_magazines(Request $request)
    {
        $this->validate($request, [
            'date_of_publish' => 'required',
            'issue' => 'required',
            'cover' => 'required|image',
            'magazine' => 'required|max:500000|mimes:pdf',
            'description' => 'required'

        ]);

        if ($request->hasFile('magazine') && $request->hasFile('cover')) {
            $file = $request->file('magazine');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/magazine/', $name);
            $cover = $request->file('cover');
            $cover_name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $cover->getClientOriginalExtension();
            $cover->move(public_path() . '/admins/magazine', $cover_name);
            $insert_mag = new magazine;
            $insert_mag->magazines = $name;
            $insert_mag->cover = $cover_name;
            $insert_mag->date_of_publish = $request->date_of_publish;
            $insert_mag->issue = $request->issue;
            $insert_mag->description = $request->description;
            $insert_mag->save();
            return redirect()->route('admin.magazine');
        }
        
    }

    public function getUpdateMagazine($id){
        $update = magazine::findOrfail($id);
        return view('admin.pages.magazine.update', compact('update'));
    }
    public function edit_magazines(Request $request, $id)
    {
        $this->validate($request, [
            'date_of_publish' => 'required',
            'issue' => 'required', 
            'description' => 'required'

        ]);

        if ($request->hasFile('magazine') && $request->hasFile('cover')) {
            $file = $request->file('magazine');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/magazine/', $name);
            $cover = $request->file('cover');
            $cover_name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $cover->getClientOriginalExtension();
            $cover->move(public_path() . '/admins/magazine', $cover_name);
            $update = new magazine;
            $update->magazines = $name;
            $update->cover = $cover_name;
            $update->date_of_publish = $request->date_of_publish;
            $update->issue = $request->issue;
            $update->description = $request->description;
            $update->save();
            return redirect()->route('admin.magazine');
        }else if($request->hasFile('magazine')){
            $file = $request->file('magazine');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/magazine/', $name);
            $update = magazine::findOrfail($id);
            $update->magazines = $name;
            $update->date_of_publish = $request->date_of_publish;
            $update->issue = $request->issue;
            $update->description = $request->description;
            $update->save();
            return redirect()->route('admin.magazine');
        }else if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $cover_name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $cover->getClientOriginalExtension();
            $cover->move(public_path() . '/admins/magazine', $cover_name);
            $update = magazine::findOrfail($id);
            $update->cover = $cover_name;
            $update->date_of_publish = $request->date_of_publish;
            $update->issue = $request->issue;
            $update->description = $request->description;
            $update->save();
            return redirect()->route('admin.magazine');
        }else{
            $update = magazine::findOrfail($id);
            $update->date_of_publish = $request->date_of_publish;
            $update->issue = $request->issue;
            $update->description = $request->description;
            $update->save();
            return redirect()->route('admin.magazine');
        }
    }
    public function delete_magazines($id)
    {
        $delete_mag = magazine::findOrfail($id);
        $delete_mag->delete();
        return back();
    }

    public function insert_web_logos(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|image'
        ]);
        $insert_weblog = new webimage;

        // Insert Logo User 
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admins/weblogo/', $name);
            $insert_weblog->logo = $name;
            $insert_weblog->save();
            return back();
        }

        
    }
    public function edit_web_logos(Request $request, $id)
    {
        $this->validate($request, [
            'logo' => 'required|image'
        ]);
        $insert_weblog = webimage::find($id);

        // Insert Logo User 
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admins/weblogo/', $name);
            $insert_weblog->logo = $name;
            $insert_weblog->save();
            return back();
        }
    }

    public function insert_formcontacts(Request $request)
    {
        $insert_form_contact = new formcontact;
        $insert_form_contact->name = $request->name;
        $insert_form_contact->email = $request->email;
        $insert_form_contact->message = $request->messages;
        $insert_form_contact->save();
        return back();
    }
    public function edit_formcontacts(Request $request, $id)
    {
        $edit_form_contact = formcontact::findOrfail($id);
        $edit_form_contact->name = $request->name;
        $edit_form_contact->email = $request->email;
        $edit_form_contact->message = $request->messages;
        $edit_form_contact->save();
        return back();
    }
    public function delete_formcontacts($id)
    {
        $delete_form_contact = formcontact::findOrfail($id);
        $delete_form_contact->delete();
        return back();
    }

    public function insert_contacts(Request $request)
    {
        $insert_contact = new contact;
        $insert_contact->tel = $request->tel;
        $insert_contact->email = $request->email;
        $insert_contact->address = $request->address;
        $insert_contact->save();
        return back();
    }
    public function edit_contacts(Request $request, $id)
    {
        $edit_contact = contact::findOrfail($id);
        $edit_contact->tel = $request->tel;
        $edit_contact->email = $request->email;
        $edit_contact->address = $request->address;
        $edit_contact->save();
        return back();
    }

    # CRUD TAG
    public function show_tags()
    {
        $show_tag = tag::orderBy('id', 'desc')->get();
        return view('admin.pages.tag')->with('show_tags', $show_tag);
    }
    public function insert_tags(Request $request)
    {
        $rules = [
            't_name' => 'required',
        ];
        $inserttag = [
            't_name.required' => 'ກະລຸນາປ້ອນເເທ໋ກກ່ອນ',
        ];
        $sendrequest = $this->validate($request, $rules, $inserttag);

        $insert_tag = new tag;
        $insert_tag->tag_name = $request->t_name;
        $insert_tag->save();
        return back();
    }
    public function edit_tags(Request $request, $id)
    {
        $rules = [
            't_name' => 'required',
        ];
        $inserttag = [
            't_name.required' => 'ກະລຸນາປ້ອນເເທ໋ກກ່ອນ',
        ];
        $sendrequest = $this->validate($request, $rules, $inserttag);

        $edit_tag = tag::findOrfail($id);
        $edit_tag->tag_name = $request->t_name;
        $edit_tag->save();
        return back();
    }
    public function delete_tags($id)
    {
        $del_tag = tag::findOrfail($id);
        $del_tag->delete();
        return back();
    }

    # CRUD VIDEOS
    public function admin_videos()
    {
        $videos = Media::where('mediaType', 'video')->get();
        return view('admin.pages.videos.videos')->with('videos', $videos);
    }
    public function getAddVideo()
    {
        $tags = tag::all();
        $cates = category::all();
        $guests = Guest::all();
        return view('admin.pages.videos.add', compact('tags','cates','guests'));
    }
    public function admin_insert_videos(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
            'video' => 'required',
            'description' => 'required',
            'category' => 'required',
            'guests' => 'required'
        ]);
        $save = new Media;
        // Insert Photos  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $names = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $names);
            $save->image = $names;
        }

        // Insert Podcast  
        if ($request->hasFile('video')) { 
            $file = $request->file('video');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $name);
            $save->media = $name;
        }
        $save->title = $request->title;
        $save->description = $request->description;
        $save->mediaType = "video";
        $save->cate_id = $request->category;
        $save->save();

        // Insert New Tag and Old tag

        $tags = $request->tags;
            if(isset($tags) && is_array($tags) && count($tags) > 0){
                $oldtags = [];
                $newtags = [];
                foreach($tags as $key => $tag){
                    if(is_numeric($tag)){
                        $oldtags[] = $tag;
                    }else{
                        $newtags[] = $tag;
                    }
                }
                #insert new tag
                if(count( $newtags ) > 0){
                    foreach($newtags as $newtag){
                        $dbtag = tag::where('name', $newtag)->first();
                        if(!isset($dbtag)){
                            $oldtags[] = tag::insertGetId([
                                'name'=> $newtag,
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now()
                            ]);
                        }
                    }
                }
            //save all user input tag
                if(count( $oldtags ) > 0){
                    foreach($oldtags as $oldtag){
                        $save->tags()->save(new PostTag([
                            'tag_id' => $oldtag,
                            'type' => 'video'
                        ]));
                    }
                }
            }

            // Guest save

            $guests = $request->guests;
            if(count($guests) > 0){
                $oldguests = [];
                foreach($guests as $key => $guest){
                    if(is_numeric($guest)){
                        $oldguests[] = $guest;
                    }
                }
             
            //save all user input tag
                if(count( $oldguests ) > 0){
                    foreach($oldguests as $oldguest){
                        $save->guests()->save(new GuestPost([
                            'guest_id' => $oldguest,
                            'type' => 'video'
                        ]));
                    }
                }
            }
        return redirect()->route('admin.videos');
    
    }
    public function getUpdateVideo($id)
    {
        $update = Media::findOrfail($id);
        $tags = tag::all();
        $cates = category::all();
        $guests = Guest::all();
        return view('admin.pages.videos.update', compact('update','tags','cates','guests'));
    }
    public function updateVideo(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'guests' => 'required'
        ]);
        $update = Media::findOrfail($id);
        // Insert Photos  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $names = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $names);
            $update->image = $names;
        }

        // Insert Podcast  
        if ($request->hasFile('video')) { 
            $file = $request->file('video');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $name);
            $update->media = $name;
        }
        $update->title = $request->title;
        $update->description = $request->description;
        $update->mediaType = "video";
        $update->cate_id = $request->category;
        $update->save();

        // Insert New Tag and Old tag
        $update->tags()->delete();
        $tags = $request->tags;
            if(isset($tags) && is_array($tags) && count($tags) > 0){
                $oldtags = [];
                $newtags = [];
                foreach($tags as $key => $tag){
                    if(is_numeric($tag)){
                        $oldtags[] = $tag;
                    }else{
                        $newtags[] = $tag;
                    }
                }
                #insert new tag
                if(count( $newtags ) > 0){
                    foreach($newtags as $newtag){
                        $dbtag = tag::where('name', $newtag)->first();
                        if(!isset($dbtag)){
                            $oldtags[] = tag::insertGetId([
                                'name'=> $newtag,
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now()
                            ]);
                        }
                    }
                }
            //save all user input tag
                if(count( $oldtags ) > 0){
                    foreach($oldtags as $oldtag){
                        $update->tags()->save(new PostTag([
                            'tag_id' => $oldtag,
                            'type' => 'video'
                        ]));
                    }
                }
            }

            // Guest save
            $update->guests()->delete();
            $guests = $request->guests;
            if(count($guests) > 0){
                $oldguests = [];
                foreach($guests as $key => $guest){
                    if(is_numeric($guest)){
                        $oldguests[] = $guest;
                    }
                }
             
            //save all user input tag
                if(count( $oldguests ) > 0){
                    foreach($oldguests as $oldguest){
                        $update->guests()->save(new GuestPost([
                            'guest_id' => $oldguest,
                            'type' => 'video'
                        ]));
                    }
                }
            }
        return redirect()->route('admin.videos');
    }
    public function admin_delete_videos($id)
    {
        $delete_videos = Media::findOrfail($id);
        $delete_videos->delete();
        return back();
    }

    # CRUD PODCAST
    public function admin_podcasts()
    {
        $podcasts = media::where('mediaType', 'podcast')->get();
        return view('admin.pages.podcast.podcast', compact('podcasts'));
    }
    public function admin_show_add_podcasts()
    {
        $cates = category::all();
        $tags = tag::all();
        $guests = Guest::all();
        return view('admin.pages.podcast.add_podcast', compact('tags', 'cates', 'guests'));
    }
    public function admin_insert_podcasts(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
            'podcast' => 'required',
            'description' => 'required',
            'category' => 'required',
            'guests' => 'required'
        ]);

        $save = new Media;
        // Insert Photos  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $names = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $names);
            $save->image = $names;
        }

        // Insert Podcast  
        if ($request->hasFile('podcast')) { 
            $file = $request->file('podcast');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $name);
            $save->media = $name;
        }
        $save->title = $request->title;
        $save->description = $request->description;
        $save->cate_id = $request->category;
        $save->save();

        // Insert New Tag and Old tag

        $tags = $request->tags;
            if(isset($tags) && is_array($tags) && count($tags) > 0){
                $oldtags = [];
                $newtags = [];
                foreach($tags as $key => $tag){
                    if(is_numeric($tag)){
                        $oldtags[] = $tag;
                    }else{
                        $newtags[] = $tag;
                    }
                }
                #insert new tag
                if(count( $newtags ) > 0){
                    foreach($newtags as $newtag){
                        $dbtag = tag::where('name', $newtag)->first();
                        if(!isset($dbtag)){
                            $oldtags[] = tag::insertGetId([
                                'name'=> $newtag,
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now()
                            ]);
                        }
                    }
                }
            //save all user input tag
                if(count( $oldtags ) > 0){
                    foreach($oldtags as $oldtag){
                        $save->tags()->save(new PostTag([
                            'tag_id' => $oldtag,
                            'type' => 'podcast'
                        ]));
                    }
                }
            }

            // Guest save

            $guests = $request->guests;
            if(count($guests) > 0){
                $oldguests = [];
                foreach($guests as $key => $guest){
                    if(is_numeric($guest)){
                        $oldguests[] = $guest;
                    }
                }
             
            //save all user input tag
                if(count( $oldguests ) > 0){
                    foreach($oldguests as $oldguest){
                        $save->guests()->save(new GuestPost([
                            'guest_id' => $oldguest
                        ]));
                    }
                }
            }
        return redirect()->route('admin.podcast');
    }
    public function getUpdatePodcast($id){
        $update = Media::findOrfail($id);
        $cates = category::all();
        $tags = tag::all();
        $guests = Guest::all();
        return view('admin.pages.podcast.update', compact('update', 'tags', 'cates', 'guests'));
    }
    public function updatePodcast(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'guests' => 'required'
        ]);

        $update = Media::findOrfail($id);
        // Insert Photos  
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $names = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $names);
            $update->image = $names;
        }

        // Insert Podcast  
        if ($request->hasFile('podcast')) { 
            $file = $request->file('podcast');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/admins/media/', $name);
            $update->media = $name;
        }
        $update->title = $request->title;
        $update->description = $request->description;
        $update->cate_id = $request->category;
        $update->save();

        // Insert New Tag and Old tag
        $update->tags()->delete();
        $tags = $request->tags;
            if(isset($tags) && is_array($tags) && count($tags) > 0){
                $oldtags = [];
                $newtags = [];
                foreach($tags as $key => $tag){
                    if(is_numeric($tag)){
                        $oldtags[] = $tag;
                    }else{
                        $newtags[] = $tag;
                    }
                }
                #insert new tag
                if(count( $newtags ) > 0){
                    foreach($newtags as $newtag){
                        $dbtag = tag::where('name', $newtag)->first();
                        if(!isset($dbtag)){
                            $oldtags[] = tag::insertGetId([
                                'name'=> $newtag,
                                'created_at' => \Carbon\Carbon::now(),
                                'updated_at' => \Carbon\Carbon::now()
                            ]);
                        }
                    }
                }
            //save all user input tag
                if(count( $oldtags ) > 0){
                    foreach($oldtags as $oldtag){
                        $update->tags()->save(new PostTag([
                            'tag_id' => $oldtag,
                            'type' => 'podcast'
                        ]));
                    }
                }
            }

            // Guest save
            $update->guests()->delete();
            $guests = $request->guests;
            if(count($guests) > 0){
                $oldguests = [];
                foreach($guests as $key => $guest){
                    if(is_numeric($guest)){
                        $oldguests[] = $guest;
                    }
                }
             
            //save all user input tag
                if(count( $oldguests ) > 0){
                    foreach($oldguests as $oldguest){
                        $update->guests()->save(new GuestPost([
                            'guest_id' => $oldguest
                        ]));
                    }
                }
            }
        return redirect()->route('admin.podcast');
    }
    public function admin_delete_podcasts($id)
    {
        $delete_podcast = Media::findOrfail($id);
        $delete_podcast->delete();
        return back();
    }

    // Guest
    public function getGuest(){
        $guests = Guest::all();
        return view('admin.pages.guest.guest', compact('guests'));
    }
    public function getAddGuest(){
        return view('admin.pages.guest.add');
    }

    public function insertGuest(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'photo' => 'required|image'
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admins/guest/', $name);
            $save = new Guest;
            $save->photo = $name;
            $save->name = $request->name;
            $save->position = $request->position;
            $save->save();
            return redirect()->route('admin.getGuest');
        }
    }

    public function deleteGuest($id){
        $delete = Guest::findOrfail($id);
        $delete->delete();
        return back();
    }

    public function getUpdateGuest($id){
        $update = Guest::findOrfail($id);
        return view('admin.pages.guest.update', compact('update'));
    }

    public function updateGuest(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required'
        ]);

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/admins/guest/', $name);
            $save = Guest::findOrfail($id);
            $save->photo = $name;
            $save->name = $request->name;
            $save->position = $request->position;
            $save->save();
            return redirect()->route('admin.getGuest');
        }else{
             $save = Guest::findOrfail($id);
            $save->name = $request->name;
            $save->position = $request->position;
            $save->save();
            return redirect()->route('admin.getGuest');
        }
    }

    // user
    public function getUsers(){
        $users = User::where('Usertype', 'member')->get();
        return view('admin.pages.user.users', compact('users'));
    }
    public function addUsers(){
        return view('admin.pages.user.add');
    }
    public function userSignup(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required:email',
            'password' => 'required'
        ]);
        if($request->password == $request->confirmpassword){
            $save = new User;
            $save->name = $request->name;
            $save->email = $request->email;
            $save->Usertype = 'member';
            $save->password = Hash::make($request->password);
            if($request->hasfile('profile')){
                $file = $request->file('profile');
                $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/home/images/', $name);

                $save->profile = $name;
            }
            
            $save->save();
            return redirect()->route('getUsers');
        }

    }
    public function getUpdateUser($id){
        $user = User::findOrfail($id);
        return view('admin.pages.user.update', compact('user'));
    }
    public function userUpdate(Request $request, $id){
        $this->validate($request, [ 'name' => 'required', 'email' => 'required']);
        $update = User::findOrFail($id);
        $update->name = $request->name;
        $update->email = $request->email;
        
        if($request->hasFile('profile') && $request->password == '' && $request->confirmpassword == ''){
            $file = $request->file('profile');
            $name = md5(date('Y-m-d h:m:s') . microtime()) . time() . '_attach_.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/home/images/', $name);
            $update->profile = $name;
            $update->save();
            return redirect()->route('getUsers');
        }

        if($request->password == $request->confirmpassword && !$request->password == '' && !$request->confirmpassword == ''){
            $update->password = Hash::make($request->confirmpassword);
            $update->save();
        }
        
        $update->save();
        return redirect()->route('getUsers');
    }
    public function userDelete($id){
        $delete = User::findOrfail($id);
        $delete->delete();
        return back();
    }
    public function contactDetail($id){
        $contact = formcontact::findOrfail($id);
        return view('admin.pages.contactdetail', compact('contact'));
    }
}
