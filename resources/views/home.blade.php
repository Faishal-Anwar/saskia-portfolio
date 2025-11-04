
@extends('layouts.app')

@section('title', "Home | Saskia Mariska's Portfolio")

@section('content')
<section id="home" class="content-section space-y-12">
    <!-- Restructured Hero Section -->
    <div data-aos="fade-up" class="space-y-6 pt-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-4xl font-bold text-primary">Saskia Mariska</h1>
                <p class="text-xl text-secondary mt-1">Professional Nurse</p>
            </div>
            <div class="flex items-center gap-4 flex-shrink-0">
                 <div class="flex items-center gap-2 text-primary px-3 py-1.5 rounded-full text-sm font-semibold">
                     <span class="relative flex h-2.5 w-2.5">
                         <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                         <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                     </span>
                     <span>Ready to Help You</span>
                 </div>
                <a href="{{ route('contact') }}" class="bg-sky-600 text-white px-5 py-2.5 rounded-xl font-semibold text-base hover:bg-sky-700 dark:bg-sky-600 dark:hover:bg-sky-700 transition-all duration-300 transform hover:scale-105">Contact Me</a>
            </div>
        </div>
        <div>
            <p class="text-secondary text-lg leading-relaxed text-justify">
                Hello 👋, I'm Saskia. I am dedicated to providing compassionate and effective healthcare, focusing on patient well-being and optimal recovery. I specialize in critical care, wound management, and health education to empower patients and their families.
            </p>
        </div>
    </div>

    <div data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 text-primary">What I Do</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Card 1: Patient Care -->
            <div data-aos="fade-up" data-aos-delay="100" class="service-card card p-6 rounded-2xl text-left transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="p-3 rounded-lg bg-slate-700 dark:bg-slate-700">
                            <i data-lucide="heart-pulse" class="w-7 h-7 text-sky-400 dark:text-sky-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-primary">Patient Care</h3>
                    </div>
                    <i data-lucide="chevron-down" class="arrow-icon w-5 h-5 text-secondary transition-transform"></i>
                </div>
                <div class="service-details">
                    <p class="text-secondary text-base text-justify pt-4">I provide comprehensive and compassionate patient care, focusing on individual needs, comfort, and recovery. My approach integrates clinical expertise with empathy to ensure the best possible outcomes.</p>
                </div>
            </div>

            <!-- Card 2: Medication Management -->
            <div data-aos="fade-up" data-aos-delay="200" class="service-card card p-6 rounded-2xl text-left transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="p-3 rounded-lg bg-slate-700 dark:bg-slate-700">
                            <i data-lucide="pill" class="w-7 h-7 text-indigo-400 dark:text-indigo-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-primary">Medication Management</h3>
                    </div>
                    <i data-lucide="chevron-down" class="arrow-icon w-5 h-5 text-secondary transition-transform"></i>
                </div>
                <div class="service-details">
                    <p class="text-secondary text-base text-justify pt-4">I meticulously manage medication administration, ensuring accuracy, safety, and adherence to prescribed treatments. My focus is on minimizing risks and optimizing therapeutic effects.</p>
                </div>
            </div>

            <!-- Card 3: Health Education -->
            <div data-aos="fade-up" data-aos-delay="300" class="service-card card p-6 rounded-2xl text-left transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="p-3 rounded-lg bg-slate-700 dark:bg-slate-700">
                            <i data-lucide="book-open-check" class="w-7 h-7 text-emerald-400 dark:text-emerald-400"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-primary">Health Education</h3>
                    </div>
                    <i data-lucide="chevron-down" class="arrow-icon w-5 h-5 text-secondary transition-transform"></i>
                </div>
                <div class="service-details">
                    <p class="text-secondary text-base text-justify pt-4">I empower patients and their families with vital health knowledge, promoting self-care, disease prevention, and healthy lifestyle choices. My goal is to foster informed decision-making.</p>
                </div>
            </div>

        </div>
    </div>

    <div data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 text-primary">My Background</h2>
        <div class="card p-8 rounded-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-10">
                @php
                    $icons = [
                        'Academic Education' => 'graduation-cap',
                        'Experience' => 'briefcase',
                        'Non-Formal Education' => 'book-open',
                        'Certifications' => 'award',
                    ];
                @endphp

                @foreach ($abouts as $category => $items)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <h3 class="text-lg font-semibold mb-4 flex items-center gap-3 text-primary">
                            <i data-lucide="{{ $icons[$category] ?? 'circle' }}" class="w-6 h-6 text-primary"></i>
                            <span>{{ $category }}</span>
                        </h3>
                        <ul class="space-y-3 text-secondary text-base pl-9">
                            @foreach($items as $item)
                            <li>
                                {{ $item->title }}
                                <p class="text-xs text-slate-400 dark:text-slate-500">
                                    {{ \Carbon\Carbon::parse($item->start_date)->format('M Y') }} -
                                    {{ $item->end_date ? \Carbon\Carbon::parse($item->end_date)->format('M Y') : 'Present' }}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

            </div>
             <div class="text-right mt-8">
                <a href="{{ route('about.index') }}" class="font-semibold text-blue-600 dark:text-sky-400 hover:underline text-base flex items-center justify-end gap-2">
                    <span>View Full Details</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </div>

    @php
        $colors = [
            'bg-sky-900 text-sky-300 dark:bg-sky-900 dark:text-sky-300',
            'bg-emerald-900 text-emerald-300 dark:bg-emerald-900 dark:text-emerald-300',
            'bg-rose-900 text-rose-300 dark:bg-rose-900 dark:text-rose-300',
            'bg-amber-900 text-amber-300 dark:bg-amber-900 dark:text-amber-300',
            'bg-indigo-900 text-indigo-300 dark:bg-indigo-900 dark:text-indigo-300',
        ];
    @endphp

    <!-- Featured Experience Section -->
    @if($featuredExperiences->count() > 0)
    <div data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 text-primary">Featured Experience</h2>
        <div class="space-y-8">
            @foreach($featuredExperiences as $experience)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="card rounded-2xl overflow-hidden group hover:-translate-y-1.5 transition-transform duration-300">
                <div class="overflow-hidden"><img src="{{ $experience->image }}" alt="{{ $experience->title }}" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"></div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-primary">{{ $experience->title }}</h3>
                    <p class="text-secondary mb-4 text-base text-justify">{{ $experience->overview }}</p>
                    <a href="{{ route('experience.show', $experience->slug) }}" class="font-semibold text-blue-600 dark:text-sky-400 hover:underline text-base flex items-center gap-2"><span>View Details</span><i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Latest Experience Section -->
    <div data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 text-primary">Recent Experiences</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($latestExperiences as $experience)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="card rounded-2xl overflow-hidden group hover:-translate-y-1.5 transition-transform duration-300">
                <div class="overflow-hidden"><img src="{{ $experience->image }}" alt="{{ $experience->title }}" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"></div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-primary">{{ $experience->title }}</h3>
                    <p class="text-secondary mb-4 text-base text-justify">{{ $experience->overview }}</p>
                    <a href="{{ route('experience.show', $experience->slug) }}" class="font-semibold text-blue-600 dark:text-sky-400 hover:underline text-base flex items-center gap-2"><span>View Details</span><i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>
            </div>
            @endforeach
        </div>
         <div class="text-right mt-8">
            <a href="{{ route('experience.index') }}" class="font-semibold text-blue-600 dark:text-sky-400 hover:underline text-base flex items-center justify-end gap-2">
                <span>View All Experiences</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
    </div>
    
    <div data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 text-primary">Skills</h2>
        <div class="card p-8 rounded-2xl">
            <ul class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @forelse ($skills as $skill)
                    <li class="flex items-center gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                        <span class="text-primary">{{ $skill->name }}</span>
                    </li>
                @empty
                    <p class="text-secondary col-span-full text-center">No skills have been added yet.</p>
                @endforelse
            </ul>
            <div class="text-right mt-8">
                <a href="{{ route('skills.index') }}" class="font-semibold text-blue-600 dark:text-sky-400 hover:underline text-base flex items-center justify-end gap-2">
                    <span>View All Skills</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </div>

    <div data-aos="zoom-in" data-aos-delay="500" class="card p-10 rounded-2xl grid-background">
        <div class="text-center">
            <h2 class="text-2xl font-semibold mb-4 max-w-md mx-auto text-primary">Need compassionate nursing care?</h2>
            <a href="{{ route('contact') }}" class="mt-6 inline-block bg-sky-600 text-white px-8 py-3 rounded-xl font-semibold text-base hover:bg-sky-700 dark:bg-sky-600 dark:hover:bg-sky-700 transition-all duration-300 transform hover:scale-105">
                Contact Saskia
            </a>
        </div>
    </div>
</section>
@endsection
