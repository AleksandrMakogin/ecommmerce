

@php
    $tags_en = \App\Models\Proudct::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_ru = \App\Models\Proudct::groupBy('product_tags_ru')->select('product_tags_ru')->get();
@endphp




<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">

        <div class="tag-list">

            @if(session()->get('language') == 'russian')

                @foreach($tags_ru as $tag)
                    <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_ru) }}">
                        {{ str_replace(',',' ',$tag->product_tags_ru)  }}</a>
                @endforeach

            @else

                @foreach($tags_en as $tag)
                    <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tags_en) }}">
                        {{ str_replace(',',' ',$tag->product_tags_en)  }}</a>
                 @endforeach

@endif

        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
