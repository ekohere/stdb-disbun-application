<div class="port-post mb-30">
    <div class="mb-30">
        <div class="title mb-2 text-bold-700 font-small-3 text-gray-dark text-uppercase"><a href="{{ url('post-utama') }}" class="text-gray-dark">Lainnya <i class="fa fa-angle-right text-primary pl-2"></i> </a></div>
        <div class="divider"></div>
    </div>
    <div class="row">
        @foreach($listPost as $item)
            @if($loop->first)
                <div class="col-lg-12 mb-30">
                    <div class="blog blog-simple blog-left text-left clearfix typography ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <img class="img-fluid mb-15 rounded" src="{{ asset($item->getFirstMediaUrl("default","thumb")) }}" alt="" style="height: 150px;width: 100%;object-fit: cover">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div>
                                    <span class="badge badge-warning mb-10">{{ $item['postCategory']->name }}</span>
                                    <h6 class="text-black text-bold-600 font-small-3 desc-p"><a href="{{ url('post/'.$item->slug) }}">{{ $item->title }}</a></h6>

                                    <div class="row font-small-1 text-bold-600 text-blue-grey">
                                        <div class="col-8">
                                            <span>admin</span><i class="fa fa-circle pl-2 pr-2" style="font-size: 6px"></i>
                                            <span class="">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }} </span>
                                        </div>
                                        <div class="col-4 text-right">
                                            <span><i class="fa fa-comment-o"></i> 0</span>
                                        </div>
                                    </div>

                                    <div class="desc-p-3 font-small-2 mt-2">
                                        {{ strip_tags($item->content,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @foreach($listPost->slice(0, 6)  as $index => $item)
            @if($index != 0)
                <div class="col-lg-12 mb-15">
                    <div class="blog blog-simple blog-left text-left clearfix typography ">
                        <div class="row">
                            <div class="col-4">
                                <img class="img-fluid mb-15 rounded" src="{{ asset($item->getFirstMediaUrl("default","thumb")) }}" alt="" style="height: auto;width: 100%;object-fit: cover">
                            </div>
                            <div class="col-8 pl-0">
                                <div>
                                    <h6 class="text-black text-bold-600 font-small-2 desc-p"><a href="{{ url('post/'.$item->slug) }}">{{ $item->title }}</a></h6>
                                    <span class="font-small-1 text-bold-600 text-blue-grey">{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM Y') }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
