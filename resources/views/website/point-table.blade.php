@extends('website.layouts.layoutPage')
@section('pageTitle',__('messages.Points Table'))

@section('body')
    @include('website.layouts.breadcrump', ['currentPage' => __('messages.Points Table'),'image' => '/upload/general/point-table.jpg'])



    <div class="rs-point-table sec-spacer">
        <div class="container">
            <ul class="nav nav-tabs point-menu">
                @foreach ($championShips as $key => $champion)
                    <li class="nav-item"><a class="nav-link {{$key == 0 ? 'active' : ''}}" id="tab-{{$key}}" data-toggle="tab" href="#tab{{$key}}" data-toggle="tab" role="tab" aria-controls="tab{{$key}}" aria-selected="true">
                    <img src="{{$champion->image}}" style="height:40px" class="mx-1" alt="{{$champion->current_translation->title}}"> {{$champion->current_translation->title}}</a></li>
                @endforeach

            </ul>

            <div class="tab-content">
                @foreach ($championShips as $key => $champion)
                    <div id="tab{{$key}}" class="tab-pane fade {{$key == 0 ? 'show active' : ''}}" role="tabpanel" aria-labelledby="tab-{{$key}}">
                        <table>
                            <tr>
                                <td>#</td>
                                <td class="team-name">@lang('messages.Team')</td>
                                <td>@lang('messages.PL')</td>
                                <td>@lang('messages.W')</td>
                                <td>@lang('messages.D')</td>
                                <td>@lang('messages.L')</td>
                                <td>@lang('messages.PTS')</td>
                            </tr>
                            @foreach ($champion->clubs() as $key =>  $club)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td class="team-name">{{$club->current_translation->title}}</td>
                                    <td>{{$club->results($champion->id)->count()}}</td>
                                    <td>{{$club->winingMatches($champion->id)->count()}}</td>
                                    <td>{{$club->drawMatches($champion->id)->count()}}</td>
                                    <td>{{$club->loosingMatches($champion->id)->count()}}</td>
                                    <td>{{$club->getPoints($champion->id)}}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




    @include('website.components.brand',['brands' => $brands])


@endsection
