<div class="row">
@foreach ($books as $item)
    <div class="card col-sm-3" style="padding:10px">
        <div class="card-block">
            <img class="img-27" src="{{asset($item->photo)}}">
            <p class="card-text" style="padding: 10px;">{{$item->name}} </p>
        </div>
        <a class="modal-btn2" href="{{route('book.detail', [$item->id, strtolower(str_replace(' ', '-', $item->name))])}}">
            Show details
        </a>
    </div>
@endforeach
</div>