<div {{ $attributes->merge(['class' => 'text-xl']) }}>
    <h1>{{ $title }}</h1>
    <h2>{{ $subtitle }}</h2>
    <h1>Hello from sidebar component</h1>
    {{ $info }}
    @foreach($list('another') as $item)
        {{ $item }}
    @endforeach
    {{ $slot }}
</div>
