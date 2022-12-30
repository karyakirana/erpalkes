@props([
    'href' => '#'
])
<!--begin::Menu item-->
<div class="menu-item px-3">
    <a href="{{$href}}" {{$attributes->class('menu-link px-3')}}>{{$slot}}</a>
</div>
<!--end::Menu item-->
