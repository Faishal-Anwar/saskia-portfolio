<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cloudinary\Cloudinary;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $experiences = Experience::latest()->paginate(10);

        return view('experience', compact('experiences'));
    }

    public function create()
    {
        return view('experience.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'overview' => 'required',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->except('image');

        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);
        $uploadedFile = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), ['folder' => 'experiences']);
        $data['image'] = $uploadedFile['secure_url'];
        $data['image_public_id'] = $uploadedFile['public_id'];

        $data['slug'] = \Illuminate\Support\Str::slug($request->title);
        $data['is_featured'] = $request->has('is_featured');

        Experience::create($data);

        return redirect()->route('experience.index')
                        ->with('success','Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        $otherExperiences = Experience::where('slug', '!=', $experience->slug)->latest()->take(2)->get();
        return view('experience-detail', compact('experience', 'otherExperiences'));
    }

    public function edit(Experience $experience)
    {
        return view('experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'overview' => 'required',
            'is_featured' => 'nullable|boolean',
        ]);

        $data = $request->except('image');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            if ($experience->image_public_id) {
                $cloudinary = new Cloudinary([
                    'cloud' => [
                        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                        'api_key'    => env('CLOUDINARY_API_KEY'),
                        'api_secret' => env('CLOUDINARY_API_SECRET'),
                    ],
                ]);
                $cloudinary->uploadApi()->destroy($experience->image_public_id);
            }
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);
            $uploadedFile = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), ['folder' => 'experiences']);
            $data['image'] = $uploadedFile['secure_url'];
            $data['image_public_id'] = $uploadedFile['public_id'];
        }

        $data['slug'] = \Illuminate\Support\Str::slug($request->title);

        $experience->update($data);

        return redirect()->route('experience.index')
                        ->with('success','Experience updated successfully');
    }

    public function destroy(Experience $experience)
    {
        if ($experience->image_public_id) {
            $cloudinary = new Cloudinary([
                'cloud' => [
                    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                    'api_key'    => env('CLOUDINARY_API_KEY'),
                    'api_secret' => env('CLOUDINARY_API_SECRET'),
                ],
            ]);
            $cloudinary->uploadApi()->destroy($experience->image_public_id);
        }

        $experience->delete();

        return redirect()->route('experience.index')
                        ->with('success','Experience deleted successfully');
    }
}