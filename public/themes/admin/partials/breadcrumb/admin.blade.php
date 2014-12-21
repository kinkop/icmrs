@if (!empty($datas))
<ul class="breadcrumb">
    <?php $i = 0; ?>
    @foreach ($datas as $data)
        <li><a @if (!empty($data['url']))href="{{  $data['url'] }}"@endif>@if ($i == 0)<i class="fa fa-home"></i>@endif {{ $data['name']  }}</a></li>
    <?php ++$i; ?>
    @endforeach
</ul>
@endif