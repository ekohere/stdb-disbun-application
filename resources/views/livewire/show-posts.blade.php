<div class="justify-content-center mb-40">
    <div class="tab round nav-center">
        <ul class="nav nav-tabs mb-30" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{$activeAll}} show mb-10 font-small-3" wire:click="allCategories()" id="tab-all-content" data-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">Semua</a>
            </li>
            @foreach($postCategories as $postCategory)
                <li class="nav-item">
                    <a class="nav-link @if($postCategory->id==$idCategory) active show @endif mb-10 font-small-3" wire:click="showPosts({{$postCategory->id}})"  data-toggle="tab" href="#tab-{{$postCategory->name}}" role="tab" aria-controls="tab-{{$postCategory->name}}" aria-selected="true">
                        @if (Config::get('app.locale') == 'en')
                            {{$postCategory->name_english}}
                        @elseif ( Config::get('app.locale') == 'id' )
                            {{$postCategory->name}}
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="tab-all" role="tabpanel" aria-labelledby="tab-all-content">
                <div class="row" >
                    @foreach($listPosts as $listPost)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-20">
                            <div class="blog-entry box-shadow-0-1 rounded">
                                <div class="entry-image clearfix x-image-left">
                                    <img class="img-fluid rounded-top" src="{{ asset($listPost->getFirstMediaUrl('default','thumb')) }}" alt="@if ( Config::get('app.locale') == 'en')
                                         {{$listPost->image_caption_english}}
                                         @elseif ( Config::get('app.locale') == 'id' )
                                         {{$listPost->title}}
                                         @endif" style="height: 180px;width: 100%;object-fit: cover">
                                </div>
                                <div class="blog-detail rounded-1 p-3 x-content-right">
                                    <span class="badge badge-warning mb-10">
                                         @if (Config::get('app.locale') == 'en')
                                            {{ $listPost['postCategory']['name_english'] }}
                                        @elseif ( Config::get('app.locale') == 'id' )
                                            {{ $listPost['postCategory']['name'] }}
                                        @endif
                                        </span>
                                    <h6 class="text-black text-bold-600 font-small-3 mb-10 desc-p"><a href="{{route('detail-post', $listPost->slug)}}">
                                         @if ( Config::get('app.locale') == 'en')
                                         {{$listPost->title_english}}
                                         @elseif ( Config::get('app.locale') == 'id' )
                                         {{$listPost->title}}
                                         @endif</a></h6>
                                    <div class="entry-content">
                                        <p class="desc-p x-desc">
                                            @if ( Config::get('app.locale') == 'en')
                                            {!! strip_tags($listPost->content_english,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') !!}
                                            @elseif ( Config::get('app.locale') == 'id' )
                                            {!! strip_tags($listPost->content,'/<([a-z][a-z0-9]*)[^>]*?(\/?)>/si') !!}
                                            @endif

                                        </p>
                                    </div>
                                    <div class="entry-meta text-blue-grey">
                                        <ul>
                                            <li><span class="font-small-2 text-bold-600"><i class="fa fa-calendar-o"></i>{{ date('d F Y', strtotime($listPost->created_at)) }}</span></li>
                                            <li><span class="font-small-2 text-bold-600"><i class="fa fa-eye font-small-3"></i>{!! views($listPost)->count(); !!}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 text-center mt-30" id="btnAll">
        <a class="button button-border black icon x-small text-capitalize" href="{{route('list-posts')}}"> Selengkapnya <i class="fa fa-long-arrow-right"></i> </a>
    </div>
</div>






