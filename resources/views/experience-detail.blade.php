@extends('layouts.app')

@section('title', $experience->title . " | Saskia Mariska's Portfolio")

@section('content')
<section id="project-detail" class="content-section space-y-10">
    <a href="{{ route('experience.index') }}" class="inline-flex items-center gap-2 text-base text-blue-600 dark:text-sky-400 font-semibold hover:underline">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        Back to Experiences
    </a>
    <h2 class="text-3xl font-bold text-primary">{{ $experience->title }}</h2>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <div class="lg:col-span-2 space-y-6 text-base text-secondary">
            @if($experience->approach)
            <div>
                <h3 class="text-xl font-semibold mb-3 text-primary">My Approach to Care</h3>
                <p class="text-justify">{{ $experience->approach }}</p>
            </div>
            @endif
            @if($experience->vision)
            <div>
                <h3 class="text-xl font-semibold mb-3 text-primary">Vision for Patient Care</h3>
                <p class="text-justify">{{ $experience->vision }}</p>
            </div>
            @endif
            @if($experience->design)
             <div>
                <h3 class="text-xl font-semibold mb-3 text-primary">Patient-Centered Approach</h3>
                <p class="text-justify">{{ $experience->design }}</p>
            </div>
            @endif
            @if($experience->overview)
            <div>
                <h3 class="text-xl font-semibold mb-3 text-primary">Experience Overview</h3>
                <p class="text-justify">{{ $experience->overview }}</p>
            </div>
            @endif
            @if($experience->conclusion)
             <div>
                <h3 class="text-xl font-semibold mb-3 text-primary">Conclusion</h3>
                <p class="text-justify">{{ $experience->conclusion }}</p>
            </div>
            @endif
        </div>
        <div class="lg:col-span-1 space-y-6">
            <div>
                <h4 class="text-base font-semibold mb-2 text-primary">Category</h4>
                <p class="text-base text-secondary">{{ $experience->category }}</p>
            </div>
            <div>
                <h4 class="text-base font-semibold mb-2 text-primary">Patient</h4>
                <p class="text-base text-secondary">{{ $experience->client }}</p>
            </div>
            @if($experience->link)
            <div>
                <h4 class="text-base font-semibold mb-2 text-primary">Reference Link</h4>
                <a href="{{ $experience->link }}" target="_blank" class="text-base text-blue-600 dark:text-sky-400 hover:underline flex items-center gap-2">
                    <span>View Reference</span>
                    <i data-lucide="external-link" class="w-4 h-4"></i>
                </a>
            </div>
            @endif
            <div>
                <h4 class="text-base font-semibold mb-2 text-primary">Preview</h4>
                <img src="{{ $experience->image }}" alt="{{ $experience->title }} Preview" class="rounded-xl shadow-lg w-full">
            </div>
        </div>
    </div>
    <div class="border-t border-border-color pt-10">
        <h3 class="text-xl font-semibold mb-6 text-primary">Other Experiences</h3>
         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($otherExperiences as $otherExperience)
             <a href="{{ route('experience.show', $otherExperience) }}" class="card rounded-xl overflow-hidden group hover:-translate-y-1.5 transition-transform duration-300">
                 <div class="p-6">
                     <h4 class="text-lg font-semibold mb-2 text-primary">{{ $otherExperience->title }}</h4>
                     <p class="font-semibold text-blue-600 dark:text-sky-400 hover:underline text-base flex items-center gap-2 mt-3"><span>View Experience</span><i data-lucide="arrow-right" class="w-4 h-4"></i></p>
                 </div>
             </a>
             @endforeach
         </div>
    </div>
</section>
@endsection
