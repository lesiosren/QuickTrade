<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement() {
        return view('announcements.create')->with('message', 'Articolo aggiunto con successo');
    }

    public function showAnnouncement(Announcement $announcement) {
        return view('announcements.show', compact('announcement'));
    }

    public function indexAnnouncement() {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(9);
        return view('announcements.index', compact('announcements'));
    }

    public function searchAnnouncements(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(9);
        return view('announcements.index', compact('announcements'));
    }
}