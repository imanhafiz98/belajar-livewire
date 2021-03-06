@if ($paginator->hasPages())

<ul class="flex justify-between">

    <!-- prev -->

    @if($paginator->onFirstPage())
    <li class="w-16 px-2 py-1 text-center rounded broder bg-gray-200 cursor-pointer">Prev</li>

    @else
    <li class="w-16 px-2 py-1 text-center rounded broder shadow bg-white-100 cursor-pointer" wire:click="previousPage">
        Prev</li>

    @endif

    <!-- end prev -->

    <!-- numbers -->

    @foreach($elements as $page => $url)
    @if($page = $paginator->currentPage())
        <li class="mx-2 w-10 px-2 py-1 text-center rounded broder shadow bg-blue-500 text-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>

    @else
        <li class="mx-2 w-10 px-2 py-1 text-center rounded broder shadow bg-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li>
    @endif
    @endforeach

    <!-- end numbers -->

    <!-- next -->

    @if($paginator->hasMorePages())
    <li class="w-16 px-2 py-1 text-center rounded broder shadow bg-white-100 cursor-pointer" wire:click="nextPage">Next
    </li>

    @else
    <li class="w-16 px-2 py-1 text-center rounded broder bg-gray-200">Next
    </li>

    @endif

    <!-- end next -->

</ul>

@endif
