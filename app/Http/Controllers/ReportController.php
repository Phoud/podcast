<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Media;
use App\magazine;
use App\Download;
use DB, PDF;
class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('usermiddleware:super_admin,admin');
    }

    public function userReport(){
    	$users = User::where('Usertype', 'member')->get();
    	return view('admin.pages.report.user.user', compact('users'));
    }
    public function userReportGenerate(){
        $users = User::where('Usertype', 'member')->get();
        // return view('admin.pages.report.user.user-generate', compact('users'));
        $generate_pdf = PDF::loadView('admin.pages.report.user.user-generate', ['users' => $users]);
        return $generate_pdf->download('user-report-' . md5(uniqid('user-report', true)) . '.pdf');
    }

    public function podcastReport(){
    	$podcasts = Media::where('mediaType', 'podcast')->get();
    	return view('admin.pages.report.podcast.podcast', compact('podcasts'));
    }
    public function podcastReportGenerate(){
        $podcasts = Media::where('mediaType', 'podcast')->get();
        // return view('admin.pages.report.user.user-generate', compact('users'));
        $generate_pdf = PDF::loadView('admin.pages.report.podcast.podcast-generate', ['podcasts' => $podcasts]);
        return $generate_pdf->download('podcast-report-' . md5(uniqid('podcast-report', true)) . '.pdf');
    }
    public function videoReport(){
    	$videos = Media::where('mediaType', 'video')->get();
    	return view('admin.pages.report.video.video', compact('videos'));
    }
    public function videoReportGenerate(){
        $videos = Media::where('mediaType', 'video')->get();
        // return view('admin.pages.report.user.user-generate', compact('users'));
        $generate_pdf = PDF::loadView('admin.pages.report.video.video-generate', ['videos' => $videos]);
        return $generate_pdf->download('video-report-' . md5(uniqid('video-report', true)) . '.pdf');
    }
    public function magazineReport(){
    	$mags = magazine::all();
    	return view('admin.pages.report.magazine.magazine', compact('mags'));
    }
    public function magazineReportGenerate(){
        $mags = magazine::all();
        // return view('admin.pages.report.user.user-generate', compact('users'));
        $generate_pdf = PDF::loadView('admin.pages.report.magazine.magazine-generate', ['mags' => $mags]);
        return $generate_pdf->download('magazine-report-' . md5(uniqid('magazine-report', true)) . '.pdf');
    }
    public function topDownload(){
    	$media = Media::select('media.*', DB::raw('count(downloads.post_id) as download_count'))->leftJoin('downloads', 'downloads.post_id', 'media.id')->groupBy('media.id')->orderBy('download_count', 'desc')->get();
    	return view('admin.pages.report.ranking.topdownload', compact('media'));
    }
    public function topdownloadReportGenerate(){
        $media = Media::select('media.*', DB::raw('count(downloads.post_id) as download_count'))->leftJoin('downloads', 'downloads.post_id', 'media.id')->groupBy('media.id')->orderBy('download_count', 'desc')->get();
        // return view('admin.pages.report.user.user-generate', compact('users'));
        $generate_pdf = PDF::loadView('admin.pages.report.ranking.topdownload-generate', ['media' => $media]);
        return $generate_pdf->download('topdownload-report-' . md5(uniqid('topdownload-report', true)) . '.pdf');
    }
    public function likeReport(){
        $media = Media::select('media.*', DB::raw('count(likes.post_id) as like_count'))->leftJoin('likes', 'likes.post_id', 'media.id')->groupBy('media.id')->orderBy('like_count', 'desc')->get();
        return view('admin.pages.report.like.toplike', compact('media'));
    }
    
    public function toplikeReportGenerate(){
        $media = Media::select('media.*', DB::raw('count(likes.post_id) as like_count'))->leftJoin('likes', 'likes.post_id', 'media.id')->groupBy('media.id')->orderBy('like_count', 'desc')->get();
        // return view('admin.pages.report.user.user-generate', compact('users'));
        $generate_pdf = PDF::loadView('admin.pages.report.like.toplike-generate', ['media' => $media]);
        return $generate_pdf->download('toplike-report-' . md5(uniqid('toplike-report', true)) . '.pdf');
    }
}
