<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StoryController extends Controller
{
    public function index()
    {
        // كل القصص النشطة (قبل 24 ساعة)
        $stories = Story::with('user')
            ->active()
            ->latest()
            ->get();

        return view('stories.index', compact('stories'));
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20000',
            'text' => 'nullable|string|max:500',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'expires_at' => now()->addDay(),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('stories', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('stories', 'public');
        }

        if ($request->text) {
            $data['text'] = $request->text;
        }

        Story::create($data);

        return redirect()->route('stories.index')->with('success', 'تم نشر القصة بنجاح ✅');
    }

    // حذف تلقائي (تقدر تستدعيه من Scheduler)
    public function cleanup()
    {
        Story::where('expires_at', '<', now())->delete();
    }
}
