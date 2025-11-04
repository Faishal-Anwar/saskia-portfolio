@extends('layouts.app')

@section('content')
<section id="edit-experience" class="content-section space-y-12">
    <div data-aos="fade-up" class="card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold mb-6 text-primary">Edit Experience</h3>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700 dark:bg-red-200 dark:text-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('experience.update', $experience->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:col-span-2 gap-6">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-secondary">Title</label>
                    <input type="text" id="title" name="title" value="{{ $experience->title }}" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition" required>
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-secondary">Category</label>
                    <input type="text" id="category" name="category" value="{{ $experience->category }}" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition" required>
                </div>
                <div class="md:col-span-2">
                    <label for="is_featured" class="flex items-center text-sm font-medium text-secondary">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500" {{ $experience->is_featured ? 'checked' : '' }}>
                        <span class="ml-2">Mark as Featured Experience</span>
                    </label>
                </div>

                <div class="md:col-span-2">
                    <label for="image" class="block mb-2 text-sm font-medium text-secondary">Image</label>
                    <input type="file" id="image" name="image" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition">
                    <img src="{{ $experience->image }}" alt="{{ $experience->title }}" class="w-32 h-32 object-cover mt-4">
                </div>
                <div class="md:col-span-2">
                    <label for="overview" class="block mb-2 text-sm font-medium text-secondary">Overview</label>
                    <textarea id="overview" name="overview" rows="4" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition">{{ $experience->overview }}</textarea>
                </div>
            </div>
            <div class="mt-6 text-right">
                <button type="submit" class="bg-slate-900 text-white px-6 py-3 rounded-xl font-semibold text-base hover:bg-slate-800 dark:bg-sky-600 dark:hover:bg-sky-700 transition-all duration-300 transform hover:scale-105">
                    Update Experience
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
