@foreach($sidebar1 as $data1)
<div class="card">
    <div class="card-heading">
        <a href="{{URL::to('/shop/'.$data1->slug)}}" data-toggle="collapse" data-target="#collapse{{$data1->id}}">{{ $data1->name }}</a>
    </div>
    @if( $data1->sub_categories == 'co')
    <div id="collapse{{$data1->id}}" class="collapse show" data-parent="#accordionExample">
        <div class="card-body">
            <div class="shop__sidebar__categories">
                <ul class="nice-scroll">
                    @foreach($sidebar2 as $data2)
                        @if( $data1->id == $data2->id_category )
                        <li>
                        <a href="{{URL::to('/shop/'.$data2->slug)}}">{{ $data2->name }}</a>
                        @if( $data2->sub_categories == 'co')
                            <a href="javascript:;" onclick="sidebar('idSidebar{{$data2->id}}')" style="float:right;margin-right:2px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                    <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/>
                                </svg>
                            </a>
                            <ul id="idSidebar{{$data2->id}}" style="display:none;padding-left:15px;height: auto;">
                            @foreach($sidebar3 as $data3)
                            @if( $data2->id == $data3->id_category )
                                <li>
                                    <a href="{{URL::to('/shop/'.$data3->slug)}}">{{ $data3->name }}</a>                
                                </li>
                            @endif
                            @endforeach
                            </ul>
                        @else
                        @if( $data2->id == $data3->id_category )
                            <a href="{{URL::to('/shop/'.$data2->slug)}}">{{ $data2->name }}</a>
                            @endif
                        @endif
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>
@endforeach

<script>
function sidebar(idSidebar) {
  $('#' + idSidebar).toggle(500);
}
</script>

<style>
.shop__sidebar__categories ul li a {
    color: #333333;
    font-weight: 400;
}
</style>