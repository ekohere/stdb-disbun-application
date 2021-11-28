<div class="port-post mb-30">
    <div class="mb-30">
        <div class="title mb-2 text-bold-800 font-small-3 text-gray-dark text-uppercase"><a href="{{ url('post-utama') }}" class="text-gray-dark"><i class="fa fa-plus"></i>Indeks <i class="fa fa-angle-right text-primary pl-2"></i> </a></div>
        <div class="divider"></div>
    </div>
    <ul class="list-unstyled">
        @foreach($postCategorys as $item)
            <li class="text-uppercase font-small-3">
                <a href="{{ url('category/'.$item->slug) }}" class="text-gray-dark text-bold-600"><i class="fa fa-folder pr-1"></i> {{ $item->name }} <span class="tooltip-content float-right" data-placement="top" data-toggle="tooltip" data-original-title="Lorem ipsum dolor sit amet"><span class="badge badge-secondary">{{ count($item['posts']) }}</span></span></a>
                <div class="divider mt-2 mb-2"></div>
            </li>
        @endforeach
    </ul>
</div>
