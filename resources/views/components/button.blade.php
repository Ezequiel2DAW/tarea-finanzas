
@switch($data[0])
    @case('src')
        <a href="{{$data[1]}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{$slot}}</a>
        @break
    @case('name')
        <input type="submit" name="{{$data[1]}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{$slot}}</input>
        @break
@endswitch

