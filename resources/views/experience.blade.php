@extends('layouts.app')

@section('title', "Experience | Saskia Mariska's Portfolio")

@section('content')
<section id="experience" class="content-section space-y-12">
    {{-- Header --}}
    <div data-aos="fade-up" class="space-y-6 pt-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-3xl font-bold text-primary">My Experience</h2>
            <div class="flex items-center gap-4 flex-shrink-0">
                <div class="flex items-center gap-2 text-primary px-3 py-1.5 rounded-full text-sm font-semibold">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                    </span>
                    <span>Ready to Provide Care</span>
                </div>
                <a href="{{ route('contact') }}" class="bg-sky-600 text-white px-5 py-2.5 rounded-xl font-semibold text-base hover:bg-sky-700 dark:bg-sky-600 dark:hover:bg-sky-700 transition-all duration-300 transform hover:scale-105">Contact Me</a>
            </div>
        </div>
        <p class="text-lg leading-relaxed text-justify text-secondary">My experience as a nurse is a collection of stories of care, compassion, and clinical excellence. Each experience has taught me valuable lessons in patient advocacy, teamwork, and the importance of evidence-based practice. I am proud of the positive impact I have made on my patients' lives.</p>
    </div>

    {{-- Add New Experience Form (for authenticated users) --}}
    @auth
    <div data-aos="fade-up" class="card p-8 rounded-2xl">
        <h3 class="text-2xl font-bold mb-6 text-primary">Add New Experience</h3>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700 dark:bg-red-200 dark:text-red-800">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-secondary">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition" required>
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-secondary">Category</label>
                    <input type="text" id="category" name="category" value="{{ old('category') }}" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition" required>
                </div>
                <div class="md:col-span-2">
                    <label for="is_featured" class="flex items-center text-sm font-medium text-secondary">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2">Mark as Featured Experience</span>
                    </label>
                </div>
                <div class="md:col-span-2">
                    <label for="image" class="block mb-2 text-sm font-medium text-secondary">Image</label>
                    <input type="file" id="image" name="image" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition" required>
                </div>
                <div class="md:col-span-2">
                    <label for="overview" class="block mb-2 text-sm font-medium text-secondary">Overview</label>
                    <textarea id="overview" name="overview" rows="4" class="form-input w-full px-4 py-2.5 rounded-lg text-base focus:ring-2 focus:border-transparent transition">{{ old('overview') }}</textarea>
                </div>
            </div>
            <div class="mt-6 text-right">
                <button type="submit" class="bg-slate-900 text-white px-6 py-3 rounded-xl font-semibold text-base hover:bg-slate-800 dark:bg-sky-600 dark:hover:bg-sky-700 transition-all duration-300 transform hover:scale-105">
                    Add Experience
                </button>
            </div>
        </form>
    </div>
    @endauth

    {{-- Experience List --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach($experiences as $experience)
        <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="card rounded-2xl overflow-hidden group hover:-translate-y-1.5 transition-transform duration-300">
            <div class="overflow-hidden"><img src="{{ $experience->image }}" alt="{{ $experience->title }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"></div>
            <div class="p-6">
                <h3 class="text-xl font-semibold mb-2 text-primary flex items-center gap-2">
                    <span>{{ $experience->title }}</span>
                    @auth
                        @if($experience->is_featured)
                            <i data-lucide="star" class="w-4 h-4 text-amber-500 fill-amber-500"></i>
                        @endif
                    @endauth
                </h3>
                <p class="text-secondary mb-4 text-base text-justify">{{ $experience->overview }}</p>
                <div class="flex justify-between items-center">
                    <a href="{{ route('experience.show', $experience->slug) }}" class="font-semibold text-blue-600 dark:text-sky-400 hover:underline text-base flex items-center gap-2"><span>View Details</span><i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                    @auth
                    <div class="flex items-center gap-2">
                        <a href="{{ route('experience.edit', $experience->slug) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600 transition-colors">Edit</a>
                        <form action="{{ route('experience.destroy', $experience->slug) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition-colors">Delete</button>
                        </form>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- CTA --}}
     <div data-aos="zoom-in" class="card p-10 rounded-2xl grid-background">
        <div class="text-center">
            <h2 class="text-2xl font-semibold mb-4 max-w-md mx-auto text-primary">Need compassionate nursing care?</h2>
            <a href="{{ route('contact') }}" class="mt-6 inline-block bg-sky-600 text-white px-8 py-3 rounded-xl font-semibold text-base hover:bg-sky-700 dark:bg-sky-600 dark:hover:bg-sky-700 transition-all duration-300 transform hover:scale-105">
                Contact Saskia
            </a>
        </div>
    </div>
</section>
@endsection