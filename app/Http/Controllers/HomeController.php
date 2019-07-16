<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media, App\tag, App\category;
use App\Guest, App\GuestPost;
use App\blog;
use App\contact, App\formcontact;
use Mail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Comment;
use Auth;
use App\Like;
use App\magazine;
use App\Download;

class HomeController extends Controller
{
    public function index()
    {
        $latest = Media::orderBy('id', 'desc')->first();
        $videos = Media::where('mediaType', 'video')->orderBy('id', 'desc')->first();
        $podcasts = Media::where('mediaType', 'podcast')->limit(3)->orderBy('id', 'desc')->get();
        $feature = Media::where('mediaType', 'podcast')->orderBy('id', 'desc')->first();
        $magazines = magazine::limit(4)->orderBy('id', 'desc')->get();
        return view('home.pages.index', compact('podcasts', 'videos', 'magazines', 'feature', 'latest'));
    }
    public function about()
    {
        return view('home.pages.about');
    }
    public function episodes(Request $request)
    {
        $tags = tag::all();
        $cates = category::all();
        $podcasts = $this->searchMedia($request, 'podcast');
        return view('home.pages.episodes', compact('podcasts', 'tags', 'cates'));
    }
    public function episode($id)
    {
        $episode = GuestPost::where('post_id', $id)->get();
        $media = Media::where('id', $id)->first();
        $tags = tag::all();
        $cates = category::all();

        Session::flash('login_reload', 'yes');
        
        return view('home.pages.episode', compact('episode', 'tags', 'cates','media'));
    }
    public function blog(Request $request)
    {
        $tags = tag::all();
        $cates = category::all();
        $blogs = $this->searchMedia($request, 'blog');
        return view('home.pages.compose.blog', compact('blogs', 'tags', 'cates'));
    }
    public function read($id){
        $read = blog::findOrFail($id);
        $blogs = blog::where('id', '!=', $id)->get();
        return view('home.pages.compose.read', compact('read', 'blogs'));
    }
    public function contact()
    {
        $contact = contact::first();
        return view('home.pages.contact', compact('contact'));
    }
    public function videos(Request $request){
        
        $tags = tag::all();
        $cates = category::all();
        $videos = $this->searchMedia($request, 'video');
        return view('home.pages.videos', compact('videos', 'tags', 'cates'));
    }
    public function video($id){
        $video = GuestPost::where('post_id', $id)->get();
        $media = Media::where('id', $id)->first();
        $tags = tag::all();
        $cates = category::all();
        return view('home.pages.video', compact('video', 'tags', 'cates', 'media'));
    }
    public function contactForm(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $save = new formcontact;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->subject = $request->subject;
        $save->message = $request->message;
        $save->save();
        $data = [];
        $data['name'] = $save->name;
        $data['email'] = $save->email;
        $data['subject'] = $save->subject;
        $data['messagebody'] = $save->message;
        Mail::send('home.mail', $data, function ($message) use ($data) {
            $message->from('108megaheard@gmail.com');
            $message->to('psoulytar@gmail.com');
            $message->subject('Message from 108Megaheard user.');
        });

        return back();
    }

    public function getSignup(){
        return view('home.pages.member.signup');
    }

    public function memberSignup(Request $request){
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
            return back();
        }

        return back()->withErrors(['error'=> 'ລະຫັດຜ່ານບໍ່ກົງກັນ']);
    }

    public function postComment(Request $request){
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $post = new Comment;
        $post->comment = $request->comment;
        $post->post_id = $request->post_id;
        $post->user_id = Auth::user()->id;
        $post->save();
        return back();
    }

    public function getDonwload($id)
    {
        if(Auth::check()){
            $download = Media::where('id', '=', $id)->firstOrFail();
            $save = new Download;
            $save->user_id = Auth::user()->id;
            $save->post_id = $id;
            $save->save();
            $pathToFile= public_path()."/admins/media/". $download->media;
            return response()->download($pathToFile);
        }else{
            return back()->withErrors('error', 'ກະລຸນາເຂົ້າສູ່ລະບົບກ່ອນຈຶ່ງສາມາດ Download ໄດ້');
        }

    }

    public function getProfile(){
        $tags = tag::all();
        $cates = category::all();
        $profile = User::where('id', Auth::user()->id)->first();
        return view('home.pages.member.member', compact('tags', 'cates', 'profile'));
    }

    public function getProfileUpdate($id){
        $update = User::findOrFail($id);
        return view('home.pages.member.update', compact('update'));
    }

    public function profileUpdate(Request $request, $id){

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
            return redirect()->route('getProfile');
        }

        if($request->password == $request->confirmpassword && !$request->password == '' && !$request->confirmpassword == ''){
            $update->password = Hash::make($request->confirmpassword);
            $update->save();
        }

        $update->save();
        return redirect()->route('getProfile');
    }

// Implementing Like
    public function isLikedByMe($id)
    {
        $post = Media::findOrFail($id);
        $like = Like::where('user_id', Auth::id())->where('post_id', $post->id)->first();
        if (isset($like)){
            return 'true';
        }
        return 'false';
    }

    public function like(Request $request)
    {
        $post  = Media::find($request->id);
        if(!isset( $post ) || !Auth::check()){
            return ['success' => false];
        }

        $existing_like = Like::withTrashed()->wherePostId($post->id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::id()
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }

        $likeCount = Like::where('post_id', $post->id)->get()->count();

        return ['success' => true, 'count' => $likeCount];
    }

    public function getMagazine(Request $request){
        $tags = tag::all();
        $cates = category::all();
        $magazines = $this->searchMedia($request, 'mag');
        return view('home.pages.magazine.magazines', compact('tags', 'cates', 'magazines'));
    }

    public function viewMagazine($id){
        $mag = magazine::findOrfail($id);
        return view('home.pages.magazine.magazine', compact('mag'));
    }

    public function searchMedia(Request $request, $type){
        $query = $request->get('query');
        switch ($type) {
            case 'mag': 
                $mags = magazine::paginate(6);
                if(!empty($query)){
                    $mags = magazine::orderBy('id', 'desc');
                    $mags->where('issue', 'like', "%{$query}%");
                    $mags = $mags->paginate(6);
                }
                return $mags;
                break;

            case 'podcast': 
                $podcasts = Media::where('mediaType', 'podcast')->paginate(6);
                if(!empty($query)){
                    $podcasts = Media::where('mediaType', 'podcast')->orderBy('id', 'desc');
                    $podcasts->where('title', 'like', "%{$query}%");
                    $podcasts = $podcasts->paginate(6);
                }
                return $podcasts;
                break;
            case 'video': 
                $videos = Media::where('mediaType', 'video')->paginate(6);
                if(!empty($query)){
                    $videos = Media::where('mediaType', 'video')->orderBy('id', 'desc');
                    $videos->where('title', 'like', "%{$query}%");
                    $videos = $videos->paginate(6);
                }
                return $videos;
                break;
            case 'blog': 
                $blogs = blog::paginate(6);
                if(!empty($query)){
                    $blogs = blog::orderBy('id', 'desc');
                    $blogs->where('title', 'like', "%{$query}%");
                    $blogs = $blogs->paginate(6);
                }
                return $blogs;
                break;
            
            default:
                # code...
                break;
        }
    }
    
}
