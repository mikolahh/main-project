@extends('layouts.app')
@section('content')
<section class="my-container">    
    <h1 class="text-green-700 text-3xl">{{ $title }}</h1>
    <p class="font-script">{{ $description }}</p>
    <div x-data="{ test: true }">
        <h2>Тестируем alpine.js</h2>
        <button @click="test = !test">click</button>
        <span x-show="test">WORKS</span>
    </div>
</section>
<section class="my-container">
    <h2>view-based single-file component livewire counter-component</h2>
    <livewire:draft.counter-component/>
<livewire:draft.post.create/>
    
    
</section>
@endsection
