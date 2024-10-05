<!DOCTYPE html>
<ul>
    @foreach($cities as $city)
        <li>
            <a href="{{ route('city.show', ['city' => Str::slug($city['name'])]) }}"
               style="{{ $slug == Str::slug($city['name']) ? 'font-weight: bold;' : '' }}">
                {{ $city['name'] }}
            </a>
        </li>
    @endforeach
</ul>
