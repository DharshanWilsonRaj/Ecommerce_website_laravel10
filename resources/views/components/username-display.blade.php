<div>
    <span class="fw-bold">

        @if (auth()->check())
        {{ auth()->user()->name }}
        <i class="fa-solid fa-user fs-5"></i>
        @endif
    </span>
</div>
